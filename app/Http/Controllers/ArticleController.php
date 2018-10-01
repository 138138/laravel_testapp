<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Common;
use Auth;

class ArticleController extends Controller
{
    public function index()
    {
    //      return "index";
            //$articles = Article::all();
            /*$common = new Common();
            $articles = $common->get_article();*/
            $articles = Common::get_article();
            $article = new Article();
            $common = new Common();
            /*echo "<pre>"; print_r($common); print_r($article); exit();*/
            return view('article.list',compact('articles'));
    }

    public function create()
    {
    //    return "create called...!!";

        return view('article.create');
    }

    public function store(Request $request)
    {
        echo "store called";
        /*echo "<pre>"; print_r($request->all()); echo "</pre>";*/
    //    print_r(Article::all());
    //    dd(Article::all());

        // method 1 - no need Article model inside things - like mutator,accessesor,fillable,guarded

        /*$article = new Article;
        $article->user_id = Auth::user()->id;
        $article->content = $request->content;
        $article->post_on = $request->post_on;
        $article->live = (boolean)$request->live;
        $article->save();*/

        Article::create($request->all());

        return redirect('/article');   
    }

    public function show($id)
    {
    //    return 'show called...!!!';

        //  $article = Article::find($id);
            $article = Article::findOrFail($id);
          return view('article.show',compact('article'));  
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit',compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
    //  dd(print_r($article));
        $article->update($request->all());
    }

    public function destroy($id)
    {
        
    }
}
