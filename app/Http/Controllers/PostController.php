<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts/index')->with( 'posts' , Post::all() );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with( 'categories' , Category::all() )
                                   ->with( 'tags'       , Tag::all() );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
            
                $this->validate($request,
                    [
                        'title'        => 'required',
                        'contentt'     => 'required',
                        'categoryName' => 'required',
                        'image'        => 'required',
                        'tags'         => 'required'
                    ]);
                if($request->hasFile('image'))
                {
                    $image              = $request->image;
                    $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath    = public_path('/uploads/posts');
                    $image->move( $destinationPath , $input['imagename']);
                }

                $post=Post::create([
                        "user_id"    =>  $id,
                        "title"      =>  $request->title,
                        "content"    =>  $request->contentt,
                        "category_id"=>  $request->categoryName,
                        "featured"   =>  'uploads/posts/' . $input['imagename'],
                        "slug"       =>  str_slug( $request->title )
                    ]);
                    
                $post->tag()->attach($request->tags);
                return view('posts.new_create')->with( 'categories' , Category::all() )
                                               ->with( 'tags'       , Tag::all() );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

     return view('posts/edit')
               ->with('posts'      ,  Post::find($id))
               ->with('categories' ,  Category::all())
               ->with('tags'       ,  Tag::all())
               ->with('posts_tags' ,  Post::find($id)->tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'title'         => 'required',
                'contentt'      => 'required',
                'categoryName'  => 'required',
                'tags'          => 'required',
                'file'          => 'required'
            ]);

            $image              = $request->image;
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath    = public_path('/uploads/posts');
            $image->move( $destinationPath , $input['imagename']);

            $posts              = Post::find($id);
            $posts->title       = $request->title;
            $posts->content     = $request->contentt;
            $posts->category_id = $request->categoryName;
            $posts->featured    ='uploads/posts/'. $input['imagename'];
            $posts->save();
            $posts->tags()->sync($request->tags);
            return redirect()->route('showpost');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('showpost');
    }

    public function trashed()
    {
        return view('posts.softdeleted')->with('posts',Post::onlyTrashed()->get());
    }

    public function harddelete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back();
    }
}
