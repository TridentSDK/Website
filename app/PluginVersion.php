<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\PluginVersion
 *
 * @property integer $id
 * @property integer $pluginid
 * @property string $version
 * @property string $filename
 * @property string $changelog
 * @property integer $date
 * @property string $trident_version
 * @property string $md5_hash
 * @property integer $downloads
 * @property boolean $accepted
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion wherePluginid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereChangelog($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereTridentVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereMd5Hash($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereAccepted($value)
 * @mixin \Eloquent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\PluginVersion whereUpdatedAt($value)
 */
class PluginVersion extends Model {

    protected $table = "plugin_version";

}
