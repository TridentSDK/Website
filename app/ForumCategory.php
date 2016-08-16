<?php

namespace TridentSDK;

use Illuminate\Database\Eloquent\Model;

/**
 * TridentSDK\ForumCategory
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property integer $rank
 * @property integer $order
 * @property integer $lastpost
 * @property integer $topics
 * @property integer $posts
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereParent($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereRank($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereOrder($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereLastpost($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereTopics($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory wherePosts($value)
 * @method static \Illuminate\Database\Query\Builder|\TridentSDK\ForumCategory whereDescription($value)
 * @mixin \Eloquent
 */
class ForumCategory extends Model {

    protected $table = "forum_category";

    public function breadCrumbs($firstHash = false){
        $self = array($this->name => ($firstHash) ? "#" : "/forum/category/".$this->id."/");
        if($this->parent != 0){
            return array_merge(ForumCategory::find($this->parent)->breadCrumbs(), $self);
        }else{
            return $self;
        }
    }

    public function children(){
        return ForumCategory::whereParent($this->id)->get();
    }

    public function lastPost(){
        return \Cache::remember('lastpost_'.$this->id, 1, function(){
            $latestPost = ForumPost::getModel()->topicCategory($this->id)->orderBy("created_at", "DESC")->limit(1)->first();

            if($this->hasChildren()) {
                $children = $this->children();
                $childrenToCheck = array();

                foreach ($children as $child){
                    array_push($childrenToCheck, $child->id);
                }

                while (count($childrenToCheck) > 0) {
                    $check = array_pop($childrenToCheck);
                    $category = ForumCategory::find($check);
                    $thisLatestPost = ForumPost::getModel()->topicCategory($category->id)->orderBy("created_at", "DESC")->limit(1)->first();

                    if($thisLatestPost->created_at > $latestPost->created_at){
                        $latestPost = $thisLatestPost;
                    }

                    if($category->hasChildren()){
                        array_push($childrenToCheck, $category->id);
                    }
                }
            }

            return $latestPost;
        });
    }

    public function pageTopics($perPage = 20){
        return ForumTopic::whereCategory($this->id)->whereDeleted(false)->orderBy("updated_at", "DESC")->paginate($perPage);
    }

    public function hasChildren(){
        return ForumCategory::whereParent($this->id)->exists();
    }

    public function newPost($post){
        $this->lastpost = $post;
        $this->posts = $this->posts + 1;
        $this->save();

        if($this->parent > 0){
            ForumCategory::find($this->parent)->newPost($post);
        }
    }

    public function newTopic($topic){
        $this->topics = $this->topics + 1;
        $this->save();

        if($this->parent > 0){
            ForumCategory::find($this->parent)->newTopic($topic);
        }
    }

}
