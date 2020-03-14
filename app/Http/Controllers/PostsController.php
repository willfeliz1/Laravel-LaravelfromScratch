<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug){
    
        // $posts = [
        //     'my-first-post' => 'hellow, this is my first post',
        //     'my-second-post' => 'second post'
        // ];

        $post = \DB::table('posts')->where('slug', $slug)->first();
        
        return view ('post', [
            'post' => $post
        ]);
    }
}
