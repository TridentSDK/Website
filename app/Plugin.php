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

    static $licenses = [
        1 => ["Academic Free License v3.0", "https://choosealicense.com/licenses/afl-3.0"],
        2 => ["GNU Affero General Public License v3.0", "https://choosealicense.com/licenses/agpl-3.0"],
        3 => ["Apache License 2.0", "https://choosealicense.com/licenses/apache-2.0"],
        4 => ["Artistic License 2.0", "https://choosealicense.com/licenses/artistic-2.0"],
        5 => ["BSD 2-clause \"Simplified\" License", "https://choosealicense.com/licenses/bsd-2-clause"],
        6 => ["BSD 3-clause Clear License", "https://choosealicense.com/licenses/bsd-3-clause-clear"],
        7 => ["BSD 3-clause \"New\" or \"Revised\" License", "https://choosealicense.com/licenses/bsd-3-clause"],
        8 => ["Boost Software License 1.0", "https://choosealicense.com/licenses/bsl-1.0"],
        9 => ["Creative Commons Attribution 4.0", "https://choosealicense.com/licenses/cc-by-4.0"],
        10 => ["Creative Commons Attribution Share Alike 4.0", "https://choosealicense.com/licenses/cc-by-sa-4.0"],
        11 => ["Creative Commons Zero v1.0 Universal", "https://choosealicense.com/licenses/cc0-1.0"],
        12 => ["Educational Community License v2.0", "https://choosealicense.com/licenses/ecl-2.0"],
        13 => ["Eclipse Public License 1.0", "https://choosealicense.com/licenses/epl-1.0"],
        14 => ["European Union Public License 1.1", "https://choosealicense.com/licenses/eupl-1.1"],
        15 => ["GNU General Public License v2.0", "https://choosealicense.com/licenses/gpl-2.0"],
        16 => ["GNU General Public License v3.0", "https://choosealicense.com/licenses/gpl-3.0"],
        17 => ["ISC License", "https://choosealicense.com/licenses/isc"],
        18 => ["GNU Lesser General Public License v2.1", "https://choosealicense.com/licenses/lgpl-2.1"],
        19 => ["GNU Lesser General Public License v3.0", "https://choosealicense.com/licenses/lgpl-3.0"],
        20 => ["LaTeX Project Public License v1.3c", "https://choosealicense.com/licenses/lppl-1.3c"],
        21 => ["MIT License", "https://choosealicense.com/licenses/mit"],
        22 => ["Mozilla Public License 2.0", "https://choosealicense.com/licenses/mpl-2.0"],
        23 => ["Microsoft Public License", "https://choosealicense.com/licenses/ms-pl"],
        24 => ["Microsoft Reciprocal License", "https://choosealicense.com/licenses/ms-rl"],
        25 => ["University of Illinois/NCSA Open Source License", "https://choosealicense.com/licenses/ncsa"],
        26 => ["SIL Open Font License 1.1", "https://choosealicense.com/licenses/ofl-1.1"],
        27 => ["Open Software License 3.0", "https://choosealicense.com/licenses/osl-3.0"],
        28 => ["PostgreSQL License", "https://choosealicense.com/licenses/postgresql"],
        29 => ["The Unlicense", "https://choosealicense.com/licenses/unlicense"],
        30 => ["Do What The F*ck You Want To Public License", "https://choosealicense.com/licenses/wtfpl"],
        31 => ["zlib License", "https://choosealicense.com/licenses/zlib"]
    ];

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

    /**
     * @return string
     */
    public function getSpaceWithArtifact(){
        return $this->getSpace()->name . "/" . $this->artifact;
    }

    /**
     * @return string
     */
    public function getLicense(){
        return Plugin::$licenses[$this->license];
    }

}
