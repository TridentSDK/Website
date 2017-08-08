<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

/**
 * TridentSDK\PluginVersion
 *
 * @property integer $id
 * @property integer $pluginid
 * @property string $version
 * @property string $filename
 * @property string $changelog
 * @property string $trident_version
 * @property string $md5_hash
 * @property integer $downloads
 * @property boolean $accepted
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property integer $file_size
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion wherePluginid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereChangelog($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereTridentVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereMd5Hash($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereAccepted($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereFileSize($value)
 * @mixin \Eloquent
 */
class PluginVersion extends Model {

    use SoftDeletes;

    protected $table = "plugin_version";

    protected $fillable = ['pluginid', 'version', 'filename', 'changelog', 'trident_version', 'md5_hash', 'file_size'];

	/**
	 * @return PluginVersionDependency[]
	 */
	public function dependencies(){
		return PluginVersionDependency::wherePluginId($this->pluginid)->whereVersionId($this->id)->get();
	}

    /**
     * @param $space string Plugin Space
     * @param $artifact string Artifact
     * @return string URL to download
     */
	public function downloadUrl($space, $artifact){
	    return url(Storage::url("plugins/" . $space . "/" . $artifact . "/" . $this->filename));
    }

    /**
     * @return Plugin|null
     */
    public function getPlugin(){
	    return Plugin::find($this->pluginid);
    }

}
