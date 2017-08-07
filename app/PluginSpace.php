<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\PluginSpace
 *
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $id
 * @property int $entity_id
 * @property bool $organisation
 * @property string $name
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereEntityId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereOrganisation($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginSpace whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PluginSpace extends Model {

    protected $table = "plugin_space";

    protected $fillable = ['entity_id', 'organisation', 'name'];

    /**
     * @param $id
     * @return PluginSpace|null
     */
    public static function findSpace($id) {
        var_dump($id);
        if($id == -1){
            $space = PluginSpace::whereEntityId(\Auth::user()->id)->whereOrganisation(false)->first();

            var_dump($space);

            if($space == null){
                $space = PluginSpace::create([
                    'entity_id' => \Auth::user()->id,
                    'organisation' => false,
                    'name' => \Auth::user()->username,
                ]);
            }

            var_dump($space);

            return $space;
        }

        return PluginSpace::whereEntityId(\Auth::user()->id)->whereOrganisation(true)->first();
    }

}
