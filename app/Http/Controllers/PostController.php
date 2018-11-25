<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function create(){
        return view('post.create');
    }
    public function store(){
       Post::create([
           'title'=>request('title'),
           'content'=>request('content')
       ]);
    }
}
