<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //render a list a resource
    public function show(Article $article){
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
        Article::create($this->validateArticle());
        return redirect(route('articles.index'));
    }

    public function edit(Article $article){
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article){
        $article->update($this->validateArticle());   
        return redirect($article->path());
    }

    //delete the resource
    public function delete(Article $article){
        $article->delete();
        return redirect(route('articles.index'));
    }

    protected function validateArticle(){
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }

}
