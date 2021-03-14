<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class siteUIcontroller extends Controller
{
    public function index()
    {
        return view('site.welcome') ->with('blog_name'  , Setting::first()->blog_name)
                                    ->with('setting'    , Setting::first())
                                    ->with('categories' , Category::take(5)->get())
                                    ->with('tags'       , Tag::all())
                                    ->with('first_post' , Post::orderBy('created_at','desc')->first())
                                    ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                                    ->with('third_post' , Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first()) 
                                    ->with('fourth_post', Post::orderBy('created_at','desc')->skip(3)->take(1)->get()->first())                             
                                    ->with('fifth_post' , Post::orderBy('created_at','desc')->skip(4)->take(1)->get()->first());                                                          

    }


    public function showPost ($slug)
    {

        $post       = Post::where('slug' , $slug)->first();
        $next_post  = Post::where('id' , '>' , $post->id)->min('id');
        $prev_post  = Post::where('id' , '<' , $post->id)->max('id');

        return view('site.singlepost')->with('post'       , $post )
                                      ->with('next_post'  , Post::find($next_post) )
                                      ->with('prev_post'  , Post::find($prev_post) )
                                      ->with('setting'    , Setting::first())
                                      ->with('categories' , Category::take(5)->get())
                                      ->with('tags'       , Tag::all());

    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('site.category')->with('category'   , $category)
                                    ->with('categories' , Category::take(5)->get())
                                    ->with('setting'    , Setting::first())
                                    ->with('tags'       , Tag::all());
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        return view('site.tag')->with('tag'        , $tag)
                               ->with('categories' , Category::take(5)->get())
                               ->with('setting'    , Setting::first())
                               ->with('tags'       , Tag::all());
    }

    public function search(Request $request)
    {
        $post = Post::where('title' , 'like' , '%' . $request->search . '%')->get();
        return view('site.results')->with('posts'      , $post)
                                   ->with('query'      , $request->search)
                                   ->with('setting'    , Setting::first())
                                   ->with('categories' , Category::take(5)->get())
                                   ->with('tags'       , Tag::all());
    }


}
