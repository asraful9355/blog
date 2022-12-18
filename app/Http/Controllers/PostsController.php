<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Toastr;
use PhpParser\Node\Stmt\Function_;
use App\Models\Tag;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts= Post:: all();
        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       =  Tag::all();


        if($categories->count() > 0 ) {

            return view('admin.posts.create', compact('categories','tags'));
        }else{
            Toastr::warning('you must have some categories before attemping create post', 'Message', ["positionClass" => "toast-top-center"]);
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             //dd($request->all());
              $this->validate($request, [
                'title'         => 'required|unique:posts|max:100|min:5',
                'featured'      => 'required',
                'category_id'   => 'required',
                'content'       => 'required',
             
            ]);
    
            $str = $request->title; 
            $slug = trim(preg_replace('/\s+/', '-', $str));
    
            //dd($request->all());
            $featured = $request->featured; 
            $featured_new_name = time().$featured->getClientOriginalName(); 
            $featured->move('uploads/posts', $featured_new_name);
    
            $post = Post::create([
                'title' => $request->title,
                'slug' => $slug,
                'featured' => 'uploads/posts/'.$featured_new_name,
                'category_id' => $request->category_id,
                'content' => $request->content,
            
            ]);

            $post->user_id = Auth::user()->id;
            $post->save();
         
        //dd($request->all());
        Toastr::success('Post Added Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('post.create');
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
        $categories = Category::all();
        $posts = Post::find ($id);
        $tags       =  Tag::all();
        

        return view('admin/posts/edit',compact('categories','posts','tags'));
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
        $post = Post::find($id);
        
        $this->validate($request, [
            'title'         => 'required',
            'content'       => 'required'
        ]);
        $str = $request->title; 
        $slug = trim(preg_replace('/\s+/', '-', $str));

        if($request->hasfile('featured')){
             
        $featured = $request->featured; 
        $featured_new_name = time().$featured->getClientOriginalName(); 
        $featured->move('uploads/posts', $featured_new_name);
        unlink($post->featured);
        $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->slug   = $slug;
        $post->category_id= $request->category_id;
        $post->content    = $request->content;
        $post->save();
        $post->tags()->sync($request->tags);
          //dd($request->all());
        Toastr::success('Post Updated Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find ($id);
        $post->delete();
        Toastr::success('Post trash Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->back();

    }
    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin/posts/trash',compact('posts'));
       
    }
    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id',$id);
        $posts->restore();
        Toastr::success('Post restore  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('post.trash');
       
    }
    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        $file_path = $posts->featured;
        unlink($file_path);
        $posts->forceDelete();
        Toastr::error('Post Permanently Deleted  Successfully ', 'Message', ["positionClass" => "toast-top-center"]);
        return redirect()->route('post.trash');   
    }

    public function subscribe(Request $request)
    {
        
      $posts = new Post ;
      
      $posts->subscribe = $request->email;
      $posts->save();

    
         
    }


}

