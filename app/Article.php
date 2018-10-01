<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

/*    protected function setLiveAttribute($live = "off")
    {
    	$this->attributes['live'] = $live;
    }*/

	protected $fillable = ['user_id','content','live','post_on'];

    protected function setLiveAttribute($value)
    {
    	$this->attributes['live'] = (boolean)($value);
    }

    public function get_article()
    {
    	$articles = Article::all();
    	return $articles;
    }
}