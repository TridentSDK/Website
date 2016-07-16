<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\NewsArticle
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $date
 * @property string $text
 * @property string $title
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\NewsArticle whereTitle($value)
 * @mixin \Eloquent
 */
class NewsArticle extends Model {

    protected $table = "news_article";

}
