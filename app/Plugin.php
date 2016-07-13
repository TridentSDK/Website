<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Plugin
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $creationdate
 * @property string $name
 * @property integer $lastupdate
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
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereCreationdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereLastupdate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereLatestversion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereHidden($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereViews($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereFavourites($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereDownloads($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereAccepted($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereFulldescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereRepoDisplayUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereRepoCloneUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin wherePrimary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereSecondary($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Plugin whereLicense($value)
 * @mixin \Eloquent
 */
class Plugin extends Model {

    protected $table = "plugin";

}
