<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use App\Models\Post;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use Auth;

class FrontEndController extends Controller
{
    public function index(){
      $web_site_title = Setting::first()->site_name;
      $categories = Category::take(6)->get();
      $first_post = Post::orderBy('created_at', 'desc')->first();
      $second_post = Post::orderBy('created_at', 'desc')->skip(1)->first();
      $third_post = Post::orderBy('created_at', 'desc')->skip(2)->first();

      $sec_one = Category::find(6);
      $sec_two = Category::find(5);
      $sec_three = Category::find(4);
      $sec_four = Category::find(3);
      $sec_five = Category::find(2);
      $sec_six = Category::find(1);
      $setting =   Setting::first();

        return view('vendor.index', compact('web_site_title','categories','first_post','second_post','third_post','sec_one','sec_two','sec_three','sec_four','sec_five','sec_six','setting'));
    }

    public function singlePost($id,$slug){
      $post = Post::find($id);
      $view = $post->view ;
      $post->view = $view +1 ;
      $post->save();
      $web_site_title = Setting::first()->site_name;
      $post = Post::find($id);
     
      $title = $post->title; 
      $categories = Category::take(6)->get();
      $first_post = Post::orderBy('created_at', 'desc')->first();
      $setting =   Setting::first();
      $next_id = Post::where('id', '>', $post->id )->min('id');
      $next_post = Post::find($next_id);

      $prev_id = Post::where('id', '<', $post->id )->max('id');
      $prev_post = Post::find($prev_id);
       return view('vendor.single',compact('web_site_title','post','title','categories','first_post','setting','next_post','prev_post'));

    }
    public function singleCategory($id){
     
      $web_site_title = Setting::first()->site_name; 
      $categories = Category::take(6)->get();
      $settings = Setting::first();
      $category = Category::find($id);
      $title = $category->name;
      $setting =   Setting::first();

      return view('vendor.category', compact('web_site_title','categories','settings','title','category','setting'));
    }
    public function searchPost(){
      $search = request('query');
      $web_site_title = Setting::first()->site_name; 
      $categories = Category::take(6)->get();
      $setting =   Setting::first();
      $posts = Post::where('title','like','%'.$search.'%')->get();
      return view('vendor.search',compact('search','web_site_title','categories','setting','posts'));
    }

    public function tag($id){
      $tag = Tag::find($id);
      $web_site_title = Setting::first()->site_name; 
      $categories = Category::take(6)->get();
      $setting =   Setting::first();
       return view('vendor.tag',compact('tag','web_site_title','categories','setting'));
    }
}
