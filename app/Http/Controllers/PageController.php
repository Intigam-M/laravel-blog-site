<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LessonCategory;
use App\Models\Lesson;
use App\Models\Post;
use App\Models\Contact;
use App\Models\PostCategory;

class PageController extends Controller
{

    public function __construct()
    {
        $LessonCategory = LessonCategory::get();
        $post = Post::where('status',1)->get();
        view()->share('category', $LessonCategory);
        view()->share('post', $post);
    }


    public function home()
    {
        return view('include.home');
    }

    public function blog()
    {
        $posts= DB::table('post')->join('post_category', 'post.cat_url', '=', 'post_category.url') 
        ->join('users', 'post.author', '=', 'users.id')
        ->select('post.*','users.name','users.surname','post_category.cat_az','post_category.cat_en','post_category.cat_ru','post_category.color')
        ->orderBy('id', 'desc')->where("status",1)
        ->get();
        return view('include.blog',compact('posts'));
    }

    public function blogsCat(Request $request)
    {
        $blog_cat = $request->cat;
        $count_url = PostCategory::where('url',$blog_cat)->count();

        if($count_url != 0){
        $posts= DB::table('post')->join('post_category', 'post.cat_url', '=', 'post_category.url') 
        ->join('users', 'post.author', '=', 'users.id')
        ->select('post.*','users.name','users.surname','post_category.cat_az','post_category.cat_en','post_category.cat_ru','post_category.color')
        ->where("cat_url",$blog_cat)
        ->orderBy('id', 'desc')->where("status",1)
        ->get();
        return view('include.blog',compact('posts'));
        }else{
            return redirect()->back();
        }
    }

    public function singleBlog(Request $request)
    {
        $blog_url = $request->blog;
        $count_url = Post::where('url',$blog_url)->count();

        if($count_url != 0){
            $key = 'post' . $blog_url;
            if (!session($key)) {
                Post::whereUrl($blog_url)->increment('hit', 1);
                session()->put($key,1);
            }
            
            $singlepost = Post::where("url",$blog_url)->where("status",1)->get()->first();
            return view('include.single-post',compact('singlepost'));
        }else{
            return redirect()->back();
        }
    }



    public function contact()
    {
        return view('include.contact');
    }

    public function businessS()
    {
        return view('include.business');
    }

   
    public function projectM()
    {
        return view('include.prj-managment');
    }

    public function programming()
    {
        return view('include.programming');
    }

    public function catSubjects(Request $request)
    {
        $lesson_cat = $request->cat;
        $count_url = LessonCategory::where('url',$lesson_cat)->count();

        if($count_url != 0){
        $cat = LessonCategory::where("url",$lesson_cat)->get()->first();
        $lesson = Lesson::where("cat_url",$lesson_cat)->where('status',1)->get();
        return view('include.lesson-titles',compact(['lesson','cat']));
        }else{
            return redirect()->back();
        }
    }

    public function lesson(Request $request)
    {
        $less_url = $request->less;
        $count_url = Lesson::where('url',$less_url)->count();

        if($count_url != 0){
        
        $key = 'lesson' . $less_url;
        if (!session($key)) {
            Lesson::whereUrl($less_url)->increment('hit', 1);
            session()->put($key,1);
        }

        $lesson = Lesson::where("url",$less_url)->where('status',1)->get()->first();
        return view('include.lesson',compact('lesson'));
        }else{
            return redirect()->back();
        }
    }


    public function contactSubmit(Request $request)
    {
        $current_date = date('Y-m-d');
        $msj_count = Contact::where('created_at','like','%'.$current_date.'%')->count();

        if($msj_count < 30){

            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
            ]);

            return redirect()->back()->with('success',' ');
        }
       return redirect()->back()->with('msj_error',' ');
    }

  














}
