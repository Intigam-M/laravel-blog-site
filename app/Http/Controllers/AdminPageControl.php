<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LessonCategory;
use App\Models\PostCategory;
use App\Models\Lesson;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;

class AdminPageControl extends Controller
{
  
    public function adminHome()
    {
        $post = Post::count();
        $lesson = Lesson::count();
        $user = User::count();
        return view('admin.admin-include.home',compact(['post','lesson','user']));
    }


    // ---------------------------Lesson category

    public function lessonCategory()
    {
        $lesson_cat = LessonCategory::orderBy('id', 'DESC')->get();
        return view('admin.admin-include.lesson_cat',compact('lesson_cat'));
    }

    public function addLessonCategory()
    {
        return view('admin.admin-include.add_lesson_cat');
    }
    
    public function addLessonCategorySubmit(Request $request)
    {
        $request->validate([
            'url' => 'unique:lesson_category',
            'title_az' => 'required',
        ],
        [
            'url.unique' => 'Daxil edilən url artıq mövcuddur!',
            'title_az.required' => '"Title az" xanasını boş qoymayın!'
        ]);

        $url = $request->url;
       
        LessonCategory::create([
            'cat_az' => $request->cat_az,
            'cat_en' => $request->cat_en,
            'cat_ru' => $request->cat_ru,
            'title_az' =>$request->title_az,
            'title_en' =>$request->title_en,
            'title_ru' =>$request->title_ru,
            'url' => sefLink($url),
            
        ]);

       return redirect()->back()->with('success',' ');

    }


    public function deleteLessonCategory(Request $request)
    {
        $lesson = Lesson::where('cat_url',$request->cat_url)->count();

        if($lesson == 0){
            LessonCategory::whereId($request->cat_id)->delete();
            return redirect()->back()->with('cat_deleted',' ');
        }
        return redirect()->back()->with('cat_deleted_error',' ');
    }

    
    public function updateLessonCategory(Request $request)
    {
        if($request->cat_id){
            session()->put('lesson_cat_id',$request->cat_id);
            $lesson_cat = LessonCategory::find($request->cat_id);
        }else{
            $lesson_cat = LessonCategory::find(session('lesson_cat_id'));
        }
        return view('admin.admin-include.update_lesson_cat', compact('lesson_cat'));
    }


    public function updateLessonCategorySubmit(Request $request)
    {
        $request->validate(['title_az' => 'required',],['title_az.required' => '"Title az" xanasını boş qoymayın!']);
        $url = $request->url;
        $count_url = LessonCategory::where('url',$url)->where('id', '!=' ,$request->cat_id)->count();

        if($count_url == 0){
       
            LessonCategory::whereId($request->cat_id)->update([
                'cat_az' => $request->cat_az,
                'cat_en' => $request->cat_en,
                'cat_ru' => $request->cat_ru,
                'title_az' =>$request->title_az,
                'title_en' =>$request->title_en,
                'title_ru' =>$request->title_ru,
                'url' => sefLink($url),
                
            ]);

            return redirect()->route('admin.updatelessoncat')->with('cat_updated',' ');

        }else{
            return redirect()->route('admin.updatelessoncat')->with('url_error',' ');
        }
    }

    // ---------------------------Lesson category------///




    // ---------------------------Post category

    public function postCategory()
    {
        $post_cat = PostCategory::orderBy('id', 'DESC')->get();
        return view('admin.admin-include.post_cat',compact('post_cat'));
    }

    public function addPostCategory()
    {
        return view('admin.admin-include.add_post_cat');
    }
    
    public function addPostCategorySubmit(Request $request)
    {
        $request->validate([ 'url' => 'unique:post_category',],[ 'url.unique' => 'Daxil edilən url artıq mövcuddur!', ]);
        $url = $request->url;
       
        PostCategory::create([
            'cat_az' => $request->cat_az,
            'cat_en' => $request->cat_en,
            'cat_ru' => $request->cat_ru,
            'color' => $request->color,
            'url' => sefLink($url),
            
        ]);
       return redirect()->back()->with('success',' ');
    }


    public function deletePostCategory(Request $request)
    {
        $lesson = Post::where('cat_url',$request->cat_url)->count();

        if($lesson == 0){
            PostCategory::whereId($request->cat_id)->delete();
            return redirect()->back()->with('cat_deleted',' ');
        }
        return redirect()->back()->with('cat_deleted_error',' ');
    }

    public function updatePostCategory(Request $request)
    {
        if($request->cat_id){
            session()->put('post_cat_id',$request->cat_id);
            $post_cat = PostCategory::find($request->cat_id);
        }else{
            $post_cat = PostCategory::find(session('post_cat_id'));
        }
        return view('admin.admin-include.update_post_cat', compact('post_cat'));
    }


    public function updatePostCategorySubmit(Request $request)
    {
        $url = $request->url;
        $count_url = PostCategory::where('url',$url)->where('id', '!=' ,$request->cat_id)->count();

        if($count_url == 0){
       
            PostCategory::whereId($request->cat_id)->update([
                'cat_az' => $request->cat_az,
                'cat_en' => $request->cat_en,
                'cat_ru' => $request->cat_ru,
                'color' => $request->color,
                'url' => sefLink($url),
            ]);

            return redirect()->route('admin.updatepostcat')->with('cat_updated',' ');

        }else{
            return redirect()->route('admin.updatepostcat')->with('url_error',' ');
        }
    }


    // ---------------------------Post category-----////



    

    // ---------------------------Lesson 

    public function Lesson()
    {
        $lesson= Lesson::join('lesson_category', 'lesson.cat_url', '=', 'lesson_category.url') 
        ->select('lesson.*','lesson_category.cat_az')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.admin-include.lesson',compact('lesson'));
    }

    public function addLesson()
    {
        $lesson_cat = LessonCategory::get(['cat_az','url']);
        return view('admin.admin-include.add_lesson',compact('lesson_cat'));
    }
    
    public function addLessonSubmit(Request $request)
    {
        $request->validate([
            'url' => 'unique:lesson',
            'post_az' => 'required',
        ],
        [
            'url.unique' => 'Daxil edilən url artıq mövcuddur!',
            'post_az.required' => '"Post az" xanasını boş qoymayın!'
        ]);

        $url = $request->url;
       
        Lesson::create([
            'cat_url' => $request->category,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'post_az' =>$request->post_az,
            'post_en' =>$request->post_en,
            'post_ru' =>$request->post_ru,
            'tags' =>$request->tag,
            'youtube_frame' =>$request->y_frame,
            'status' =>$request->status,
            'url' => sefLink($url),
            
        ]);

       return redirect()->back()->with('success',' ');

    }

    
    public function deleteLesson(Request $request)
    {
        Lesson::whereId($request->lesson_id)->delete();
        return redirect()->back()->with('cat_deleted',' ');
    }


    public function updateLesson(Request $request)
    {
        $lesson_cat = LessonCategory::get(['cat_az','url']);
        if($request->lesson_id){
            session()->put('lesson_id',$request->lesson_id);
            $lesson = Lesson::find($request->lesson_id);
        }else{
            $lesson = Lesson::find(session('lesson_id'));
        }
        return view('admin.admin-include.update_lesson', compact(['lesson','lesson_cat']));
    }

    
    public function updateLessonSubmit(Request $request)
    {
        $request->validate(['post_az' => 'required',],['post_az.required' => '"Post az" xanasını boş qoymayın!']);
        $url = $request->url;
        $count_url = Lesson::where('url',$url)->where('id', '!=' ,$request->lesson_id)->count();

        if($count_url == 0){
       
            Lesson::whereId($request->lesson_id)->update([
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'post_az' =>$request->post_az,
                'post_en' =>$request->post_en,
                'post_ru' =>$request->post_ru,
                'tags' =>$request->tag,
                'youtube_frame' =>$request->y_frame,
                'status' =>$request->status,
                'url' => sefLink($url),
                
            ]);

            return redirect()->route('admin.updatelesson')->with('lesson_updated',' ');

        }else{
            return redirect()->route('admin.updatelesson')->with('url_error',' ');
        }
       
    }

    // ---------------------------Lesson  ----//// 




    // ---------------------------Post 

    public function Post()
    {
        $post= Post::join('post_category', 'post.cat_url', '=', 'post_category.url') 
        ->select('post.*','post_category.cat_az')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.admin-include.post',compact('post'));
    }

    public function addPost()
    {
        $post_cat = PostCategory::get(['cat_az','url']);
        return view('admin.admin-include.add_post',compact('post_cat'));
    }


    public function addPostSubmit(Request $request)
    {
        $request->validate([
            'url' => 'unique:post',
            'post_az' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'url.unique' => 'Daxil edilən url artıq mövcuddur!',
            'post_az.required' => '"Post az" xanasını boş qoymayın!'
        ]);

        $imageName = $request->image; 
        if(!empty($request->image)){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/post'), $imageName);
        }

        $url = $request->url;
        $user_id = Auth::id();
       
        Post::create([
            'cat_url' => $request->category,
            'author' => $user_id,
            'title_az' => $request->title_az,
            'title_en' => $request->title_en,
            'title_ru' => $request->title_ru,
            'post_az' =>$request->post_az,
            'post_en' =>$request->post_en,
            'post_ru' =>$request->post_ru,
            'tags' =>$request->tag,
            'image' =>$imageName,
            'youtube_frame' =>$request->y_frame,
            'status' =>$request->status,
            'created' =>date("d-m-Y"),
            'updated' =>date("d-m-Y"),
            'url' => sefLink($url),
            
        ]);

       return redirect()->back()->with('success',' ');

    }

        
    public function deletePost(Request $request)
    {
        if(!empty($request->image)){
            $image_path = "assets/images/post/$request->image"; 
            if (file_exists($image_path)) {unlink($image_path);}
        }
        Post::whereId($request->post_id)->delete();
        return redirect()->back()->with('post_deleted',' ');
    }


    public function updatePost(Request $request)
    {
        $post_cat = PostCategory::get(['cat_az','url']);
        if($request->post_id){
            session()->put('post_id',$request->post_id);
            $post = Post::find($request->post_id);
        }else{
            $post = Post::find(session('post_id'));
        }
        return view('admin.admin-include.update_post', compact(['post','post_cat']));
    }


    public function updatePostSubmit(Request $request)
    {
        $request->validate(['post_az' => 'required',],['post_az.required' => '"Post az" xanasını boş qoymayın!']);
        $url = $request->url;
       
        $imageName = $request->image; 
        $post_oldimg = Post::whereId($request->post_id)->first('image');
        if(!empty($request->image)){
            
            $image_path = "assets/images/post/$post_oldimg->image"; 
            if (!empty($post_oldimg->image)){unlink($image_path);}

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/post'), $imageName);

        }else{
            $imageName = $post_oldimg->image;
        }

        $count_url = Post::where('url',$url)->where('id', '!=' ,$request->post_id)->count();

        if($count_url == 0){
       
            Post::whereId($request->post_id)->update([
                'title_az' => $request->title_az,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'post_az' =>$request->post_az,
                'post_en' =>$request->post_en,
                'post_ru' =>$request->post_ru,
                'tags' =>$request->tag,
                'image' =>$imageName,
                'youtube_frame' =>$request->y_frame,
                'status' =>$request->status,
                'updated' =>date("d-m-Y"),
                'url' => sefLink($url),
                
            ]);

            if($request->reset_image == 'reset'){
                Post::whereId($request->post_id)->update([
                    'image' =>'',
                ]);

                $image_path1 = "assets/images/post/$post_oldimg->image"; 
                if (!empty($post_oldimg->image)){unlink($image_path1);}
            }

            return redirect()->route('admin.updatepost')->with('post_updated',' ');

        }else{
            return redirect()->route('admin.updatepost')->with('url_error',' ');
        }
       
    }


    // ---------------------------Post -----////

    
    public function Users()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.admin-include.user',compact('users'));
    }

    public function Contact()
    {
        $contact = Contact::orderBy('id', 'DESC')->get();
        return view('admin.admin-include.contact',compact('contact'));
    }

    public function ContactInfo(Request $request)
    {
        if($request->contact_id){
            Contact::whereId($request->contact_id)->update(['read' => 1,]);
            session()->put('contact_id',$request->contact_id);
            $contactinfo = Contact::find($request->contact_id);
        }else{
            $contactinfo = Contact::find(session('contact_id'));
        }

        return view('admin.admin-include.contactinfo',compact('contactinfo'));
    }


    
}
