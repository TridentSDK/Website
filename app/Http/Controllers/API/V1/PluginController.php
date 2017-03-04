<?php

namespace TridentSDK\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use TridentSDK\Enums\ApiError;
use TridentSDK\ForumPost;
use TridentSDK\ForumPostLike;
use TridentSDK\Http\Controllers\Controller;
use TridentSDK\Plugin;
use TridentSDK\PluginSpace;

class PluginController extends Controller {

    public function __construct(){
        $this->middleware("token", ['only' => [
            'likePost',
            'dislikePost'
        ]]);
    }

    public function find(Request $request, $space, $plugin){
	    if(empty($space)){
		    return response()->json(ApiError::SPACE_NOT_PROVIDED, 400);
	    }
	    if(empty($plugin)){
		    return response()->json(ApiError::PLUGIN_NOT_PROVIDED, 400);
	    }

	    $pluginModel = Plugin::findBySpace($space, $plugin);

        if($pluginModel == null){
            return response()->json(ApiError::PLUGIN_NOT_FOUND, 400);
        }

        $data = array();
	    $data["id"] = $pluginModel->id;
	    $data["name"] = $pluginModel->name;
	    $data["description"] = $pluginModel->description;
	    $data["logo"] = $pluginModel->logo;
	    $data["views"] = $pluginModel->views;
	    $data["favourites"] = $pluginModel->favourites;
	    $data["downloads"] = $pluginModel->downloads;
	    $data["website"] = $pluginModel->website;

	    $versions = array();

	    foreach($pluginModel->versions() as $versionModel){
	    	$version = array();
		    $version["id"] = $versionModel->id;
		    $version["filename"] = $versionModel->filename;
		    $version["changelog"] = $versionModel->changelog;
		    $version["trident_version"] = $versionModel->trident_version;
		    $version["md5_hash"] = $versionModel->md5_hash;
		    $version["downloads"] = $versionModel->downloads;
		    $version["release"] = $versionModel->created_at->timestamp;

		    $dependencies = array();
			foreach($versionModel->dependencies() as $dependencyModel){
				array_push($dependencies, $dependencyModel->toString());
			}

			$version["dependencies"] = $dependencies;

		    $versions[$versionModel->version] = $version;
	    }

	    $data["versions"] = $versions;

        return response()->json(["success" => true, "plugin" => $data]);
    }

}
