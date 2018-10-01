<?php

namespace App;

/*use Illuminate\Database\Eloquent\Model;*/
use App\Article;

class Common /*extends Model*/
{
	public static function get_article()
	{
		$article = Article::all();
   		return $article;
	}
}
