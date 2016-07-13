<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\NewsArticle
 *
 * @property integer $id
 * @property integer $userid
 * @property integer $date
 * @property string $text
 * @property string $title
 * @method static \Illuminate\Database\Query\Builder|\App\NewsArticle whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NewsArticle whereUserid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NewsArticle whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NewsArticle whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\NewsArticle whereTitle($value)
 * @mixin \Eloquent
 */
class NewsArticle extends Model {

    protected $table = "news_article";

}
