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

        // validation
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

        // Video post upload
        $video_regular_link = $request -> video;
        $convert_embed_link = str_replace("watch?v=","embed/",$video_regular_link);



        $post_type_arr = [
            "post_type"        => $request -> post_type,
            "post_image"       => $file_name,
            "post_gallery"     => $gallery,
            "post_video"       => $convert_embed_link,
            "post_audio"       => $request -> audio,
            "post_quote"       => $request -> quote,
        ];

        // Data Send
        $post = Post::create([
            "title"  => $request -> title,
            "slug"  => $this -> makeSlug($request -> title),
            "user_id"  => Auth :: user() -> id,
            "content"  => $request -> content,
            "featured"  => json_encode($post_type_arr),
        ]);

        // Relationship
        $post -> categories() -> attach($request -> pcat);
        $post -> tags() -> attach($request -> ptag);

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
    public function edit($id)
    {
        $tags = Tag::where("status",true)->get();
        $cats = Category::where("status",true)->get();
        $post = Post::find($id);

        // post category set
        $cat_arr = [];
        foreach($post -> categories as $cat){
            array_push($cat_arr,$cat -> id);
        }

        // post tag set
        $tag_arr = [];
        foreach($post -> tags as $tag){
            array_push($tag_arr,$tag -> id);
        }
        
        return view("admin.post.edit",[
            "tags"      => $tags,
            "cats"      => $cats,
            "post"      => $post,
            "cat_arr"   => $cat_arr,
            "tag_arr"   => $tag_arr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request -> all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> categories() -> detach($post -> categories);
        $post -> tags() -> detach($post -> tags);
        $post -> delete();

        return redirect() -> route("post.index") -> with("success","Post Deleted Successfull!");
    }
}
