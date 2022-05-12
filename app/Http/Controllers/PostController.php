<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;


use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();
       return view('posts.index')->with('posts',$posts);
    }

    public function admin()
    {
       return view('admin');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $tx = Post::existingTags();
       return view('posts.create')->with('tx',$tx);
        // return $tx;
        // $auth = auth()->user()->id;
        // return $auth;
    }


    public function test()
    { 
        $tx = Post::existingTags();
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::all();
        $cax = Category::pluck('title','id');
        return view('test')
        ->with('tx',$tx)
        ->with('categories',$categories)
        ->with('allCategories',$allCategories)
        ->with('cax',$cax);
        
       
    }

    public function tags($tag){
        $tags = Post::withAnyTag($tag)->get();
        return view('tags.index')->with('tags',$tags);
    }


    public function cat($x){
     
        $posts = Post::whereJsonContains('cat', $x)->get();
        return view('category.cat')->with('posts',$posts);
    


     
    }

    public function ajax(Request $request){
      
        $this->validate($request,['post_title'=>'required','post_body'=>'required']);    
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        
        else{
            $fileNameToStore='noimage.jpg';
        }

        $tags = explode(",", $request->tags);
        $post = new Post;
        $post->post_title=$request->input('post_title');
        $post->post_body=$request->input('post_body');
        $post->cat=$request->input('post_body');
        $post->image=$fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tag($tags);
        $post->save();
        return redirect('/post')->with('success','Post Added');



    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['post_title'=>'required','post_body'=>'required']);    
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension =$request->file('image')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
        }

        
        else{
            $fileNameToStore='noimage.jpg';
        }

        $tags = explode(",", $request->tags);
        $post = new Post;
        $post->post_title=$request->input('post_title');
        $post->post_body=$request->input('post_body');
        $post['cat'] = $request->input('cat');
        $post->image=$fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();
        $post->tag($tags);
        $post->save();
        return redirect('/post/create')->with('success','Post Added');
     

    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $cat = Category::all();
       return view('posts.show')->with('post',$post)->with('cat',$cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,['post_title'=>'required','post_body'=>'required'
    ]);

    $post = Post::find($id);
    $post->post_title=$request->input('post_title');
    $post->post_body=$request->input('post_body');
    $post->save();
    return redirect('/post')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/post')->with('success','Post Removed');

    }
}
