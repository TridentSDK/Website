<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\PluginVersionDependency
 *
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property int $plugin_id
 * @property int $version_id
 * @property string $dependency_space
 * @property string $dependency_name
 * @property string $dependency_version
 * @property string $comparator
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereComparator($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereDependencyName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereDependencySpace($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereDependencyVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency wherePluginId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereVersionId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersionDependency whereUpdatedAt($value)
 */
class PluginVersionDependency extends Model {

	protected $table = "plugin_version_dependency";

	public function toString(){
		return $this->comparator.$this->dependency_space."/".$this->dependency_name.":".$this->dependency_version;
	}

	public function getMavenVersion(){
		switch($this->comparator){
			default:
				return "[".$this->dependency_version."]";
				break;
			case ">":
				return "(".$this->dependency_version.",)";
				break;
			case ">=":
				return "[".$this->dependency_version.",)";
				break;
			case "<":
				return "(,".$this->dependency_version.")";
				break;
			case "<=":
				return "(,".$this->dependency_version."]";
				break;
			case "~":
				// TODO Implement semantic versioning
				return $this->dependency_version;
				break;
		}
	}

}
