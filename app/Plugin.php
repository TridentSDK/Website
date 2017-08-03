<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\Plugin
 *
 * @property integer $id
 * @property integer $userid
 * @property string $name
 * @property string $description
 * @property string $logo
 * @property string $latestversion
 * @property boolean $hidden
 * @property integer $views
 * @property integer $favourites
 * @property integer $downloads
 * @property boolean $accepted
 * @property string $website
 * @property string $fulldescription
 * @property string $repo_display_url
 * @property string $repo_clone_url
 * @property string $primary
 * @property string $secondary
 * @property integer $license
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property int $space
 * @property string $artifact
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereSpace($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereArtifact($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereLatestversion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereHidden($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereFavourites($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereAccepted($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereFulldescription($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereRepoDisplayUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereRepoCloneUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin wherePrimary($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereSecondary($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereLicense($value)
 * @mixin \Eloquent
 */
class Plugin extends Model {

    use SoftDeletes;

    protected $table = "plugin";

	/**
	 * @return Plugin|null
	 */
	public static function findBySpace($space, $plugin){
		return Plugin::whereExists(function ($query) use ($space) {
			$query->select(\DB::raw(1))
				->from("plugin_space")
				->whereRaw("plugin.space = plugin_space.id")
				->where('name', $space);
		})->whereArtifact($plugin)->first();
	}

    /**
     * @param int $perPage
     * @return Plugin[]
     */
	public static function popularPlugins($perPage = 18){
	    return Plugin::query()
            ->orderBy("downloads", "desc")
            ->paginate($perPage);
    }

	/**
	 * @return PluginVersion[]
	 */
	public function versions(){
		return PluginVersion::wherePluginid($this->id)->get();
	}

    /**
     * @return PluginVersion
     */
    public function version($version){
        return PluginVersion::wherePluginid($this->id)->whereVersion($version)->first();
    }

    /**
     * @return PluginSpace
     */
    public function getSpace(){
        return PluginSpace::whereId($this->space)->first();
    }

}
