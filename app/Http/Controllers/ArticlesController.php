<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //render a list a resource
    public function show($id){
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    //show a single resource
    public function index(){
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(){
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles');
    }

    public function edit($id){
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id){
        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();

        return redirect('/articles/' . $article->id);
    }

    public function destroy(){
        //delete the resource
    }

}
