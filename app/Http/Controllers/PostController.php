<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::latest()->get();
        return view("admin.post.index",[
            "all_data"     => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::where("status",true)->get();
        $cats = Category::where("status",true)->get();
        return view("admin.post.create",[
            "tags"      => $tags,
            "cats"      => $cats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this -> validate($request,[
            "title"    => ["required"]
        ]);


        // Standard post upload
        $file_name = "";
        if($request -> hasFile("image")){
            $file_name = $this -> fileUpload($request,"image","media/posts/");
        }


        // Gallery post upload
        $gallery = [];
        if($request -> hasFile("gallery")){
            foreach($request -> file("gallery") as $gall){
                $gallery_file_name = md5(time().rand()) . "." . $gall -> getClientOriginalExtension();
                $gall -> move("media/posts/",$gallery_file_name);
                array_push($gallery,$gallery_file_name);
            }
        }

        $post_type_arr = [
            "post_type"        => $request -> post_type,
            "post_image"       => $file_name,
            "post_gallery"     => $gallery,
            "post_video"       => $request -> video,
            "post_audio"       => $request -> audio,
            "post_quote"       => $request -> quote,
        ];

        Post::create([
            "title"  => $request -> title,
            "slug"  => $this -> makeSlug($request -> title),
            "user_id"  => Auth :: user() -> id,
            "content"  => $request -> content,
            "featured"  => json_encode($post_type_arr),
        ]);
        return redirect() -> route("post.index") -> with("success","Post Added Sussessfull");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
