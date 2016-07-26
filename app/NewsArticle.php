<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * TridentSDK\NewsArticle
 *
 * @property integer $id
 * @property integer $userid
 * @property string $text
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereTitle($value)
 * @mixin \Eloquent
 */
class NewsArticle extends Model {

    use SoftDeletes;

    protected $table = "news_article";

}
