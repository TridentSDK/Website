<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\Plugin
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
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereCreationdate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereLastupdate($value)
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
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\Plugin whereUpdatedAt($value)
 */
class Plugin extends Model {

    protected $table = "plugin";

}
