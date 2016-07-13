<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PluginVersion
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
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion wherePluginid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereChangelog($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereTridentVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereMd5Hash($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\App\PluginVersion whereAccepted($value)
 * @mixin \Eloquent
 */
class PluginVersion extends Model {

    protected $table = "plugin_version";

}
