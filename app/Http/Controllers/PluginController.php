<?php

namespace TridentSDK\Http\Controllers;

use TridentSDK\Http\Requests\PostPluginRequest;
use TridentSDK\Http\Requests\UploadPluginRequest;
use TridentSDK\Plugin;
use TridentSDK\PluginSpace;
use TridentSDK\PluginVersion;

class PluginController extends Controller {

    public function list(){
        return view('plugins.layout', [
            "plugins" => \TridentSDK\Plugin::popularPlugins()
        ]);
    }

    public function plugin($id){
        $plugin = Plugin::find($id);

        if($plugin == null){
            return redirect("/404/");
        }

        return view('plugins.plugin', [
            "plugin" => $plugin
        ]);
    }

    public function newPlugin(){
        return view('plugins.new');
    }

    public function postNewPlugin(PostPluginRequest $request){
        $space = PluginSpace::findSpace(\Request::get("plugin-space"));

        if($space == null){
            return redirect()->back()->withErrors("Space not found", "plugin");
        }

        // TODO Make this more predictable
        $artifact = \Request::get("plugin-name");
        $artifact = strtolower($artifact);
        $artifact = preg_replace("/[^a-z0-9]/", "-", $artifact);
        $artifact = preg_replace("/^-|-$/", "", $artifact);

        $plugin = Plugin::create([
            'userid' => \Auth::user()->id,
            'name' => \Request::get("plugin-name"),
            'description' => \Request::get("short-description"),
            'fulldescription' => \Request::get("full-description"),
            'primary' => \Request::get("primary-category"),
            'secondary' => implode(",", \Request::get("secondary-category")),
            'license' => \Request::get("plugin-license"),
            'artifact' => $artifact,
            'space' => $space->id,
        ]);

        return view('plugins.plugin-posted', [
            "url" => "/plugin/".$plugin->id
        ]);
    }

    public function upload($id){
        $plugin = Plugin::find($id);

        if($plugin == null){
            return redirect("/404/");
        }

        return view('plugins.upload', [
            'plugin' => $plugin
        ]);
    }

    public function postUpload(UploadPluginRequest $request, $id){
        $plugin = Plugin::find($id);

        if($plugin == null){
            return redirect("/404/");
        }

        $uMajor = \Request::get("plugin-version-major");
        $uMinor = \Request::get("plugin-version-minor");
        $uPatch = \Request::get("plugin-version-patch");

        if(!empty($plugin->latestversion)) {
            list($major, $minor, $patch) = explode(".", $plugin->latestversion);

            $newVersionLower = false;
            if ($major >= $uMajor) {
                if ($major > $uMajor) {
                    $newVersionLower = true;
                } else if ($minor >= $uMinor) {
                    if ($minor > $uMinor) {
                        $newVersionLower = true;
                    } else if ($patch >= $uPatch) {
                        if ($patch > $uPatch) {
                            $newVersionLower = true;
                        } else {
                            return redirect()->back()->withErrors("New version is identical to previous version (" . $plugin->latestversion . ")", "plugin");
                        }
                    }
                }
            }

            if ($newVersionLower) {
                return redirect()->back()->withErrors("New version lower than previous version (" . $plugin->latestversion . ")", "plugin");
            }
        }

        $space = $plugin->getSpace();
        $file = \Request::file('plugin-file');
        $versionText = $uMajor . "." . $uMinor . "." . $uPatch;
        $filename = $plugin->artifact . "-" . $versionText . ".jar";

        $file->storeAs("plugins" . DIRECTORY_SEPARATOR . $space->name . DIRECTORY_SEPARATOR . $plugin->artifact, $filename);

        PluginVersion::create([
            'pluginid' => $plugin->id,
            'version' => $versionText,
            'filename' => $filename,
            'changelog' => \Request::get("changelog"),
            'trident_version' => \Request::get("trident-version"),
            'md5_hash' => md5_file($file->path())
        ]);

        $plugin->latestversion = $versionText;
        $plugin->save();

        return view('plugins.plugin-uploaded', [
            "plugin" => $plugin,
            "url" => "/plugin/".$plugin->id
        ]);
    }

}