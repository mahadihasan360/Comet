<?php

namespace App\Http\Controllers\comet;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
 
    /**
     * Show blog
     */
    public function blogShow(){
        
        $data = Post::latest() -> get();
        return view("comet.blog",[
            "blog_data"     => $data
        ]);
    }
}
