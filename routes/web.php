<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminPageControl;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportExcelController;



Route::get('/',function(){
    return redirect()->to('http://127.0.0.1:8000/az')->send();
});

Route::group(['prefix'=>'{language}','middleware'=>'SetLanguage'], function(){

    Route::get('/',[PageController::class, 'home'])->name('home');
    Route::get('blogs',[PageController::class, 'blog'])->name('blogs');
    Route::get('contact',[PageController::class, 'contact'])->name('contact');
    Route::post('contact-submit',[PageController::class, 'contactSubmit'])->name('contact.submit');
    Route::get('business-sector',[PageController::class, 'businessS'])->name('business');
    Route::get('project-managment',[PageController::class, 'projectM'])->name('prj-managment');
    Route::get('programming',[PageController::class, 'programming'])->name('programming');

    Route::get('category/{cat}',[PageController::class, 'catSubjects'])->name('cat');
    Route::get('lessson/{less}',[PageController::class, 'lesson'])->name('lesson');
    Route::get('blog/{blog}',[PageController::class, 'singleBlog'])->name('blog');
    Route::get('blogs/{cat}',[PageController::class, 'blogsCat'])->name('blogcat');

    Route::middleware([isLogin::class])->group(function(){
        
        Route::get('login',[AuthController::class, 'login'])->name('login');
        Route::post('login',[AuthController::class, 'loginSubmit'])->name('login-submit');
        Route::get('signup',[AuthController::class, 'signup'])->name('signup');
        Route::post('signup',[AuthController::class, 'signupSubmit'])->name('signup-submit');
        Route::any('signup/userconfirm',[AuthController::class, 'userconfirm'])->name('userconfirm-submit');
        Route::any('signup/userconfirmed',[AuthController::class, 'userconfirmed']);

    });

    Route::get('logout',[AuthController::class, 'userLogout'])->name('user-logout');

});


Route::middleware([notLogin::class])->group(function(){
    Route::get('consoldes/admin-p',[AdminPageControl::class, 'adminHome'])->name('admin.home');

    // Lesson category
    
    Route::get('consoldes/admin-p/lesson-category',[AdminPageControl::class, 'lessonCategory'])->name('admin.lessoncat');
    Route::get('consoldes/admin-p/add-lesson-category',[AdminPageControl::class, 'addLessonCategory'])->name('admin.addlessoncat');
    Route::post('consoldes/admin-p/add-lesson-category',[AdminPageControl::class, 'addLessonCategorySubmit'])->name('admin.addlessoncat-submit');
    Route::post('consoldes/admin-p/delete-lesson-category',[AdminPageControl::class, 'deleteLessonCategory'])->name('admin.deletelessoncat');
    Route::any('consoldes/admin-p/update-lesson-category',[AdminPageControl::class, 'updateLessonCategory'])->name('admin.updatelessoncat');
    Route::post('consoldes/admin-p/update-lesson-category-submit',[AdminPageControl::class, 'updateLessonCategorySubmit'])->name('admin.updatelessoncat-submit');

    // Lesson category ---//

    // Post category

    Route::get('consoldes/admin-p/post-category',[AdminPageControl::class, 'postCategory'])->name('admin.postcat');
    Route::get('consoldes/admin-p/add-post-category',[AdminPageControl::class, 'addPostCategory'])->name('admin.addpostcat');
    Route::post('consoldes/admin-p/add-post-category',[AdminPageControl::class, 'addPostCategorySubmit'])->name('admin.addpostcat-submit');
    Route::post('consoldes/admin-p/delete-post-category',[AdminPageControl::class, 'deletePostCategory'])->name('admin.deletepostcat');
    Route::any('consoldes/admin-p/update-post-category',[AdminPageControl::class, 'updatePostCategory'])->name('admin.updatepostcat');
    Route::post('consoldes/admin-p/update-post-category-submit',[AdminPageControl::class, 'updatePostCategorySubmit'])->name('admin.updatepostcat-submit');

    // Post category ---//


    
    // Lesson 
    
    Route::get('consoldes/admin-p/lesson',[AdminPageControl::class, 'Lesson'])->name('admin.lesson');
    Route::get('consoldes/admin-p/add-lesson',[AdminPageControl::class, 'addLesson'])->name('admin.addlesson');
    Route::post('consoldes/admin-p/add-lesson',[AdminPageControl::class, 'addLessonSubmit'])->name('admin.addlesson-submit');
    Route::post('consoldes/admin-p/delete-lesson',[AdminPageControl::class, 'deleteLesson'])->name('admin.deletelesson');
    Route::any('consoldes/admin-p/update-lesson',[AdminPageControl::class, 'updateLesson'])->name('admin.updatelesson');
    Route::post('consoldes/admin-p/update-lesson-submit',[AdminPageControl::class, 'updateLessonSubmit'])->name('admin.updatelesson-submit');
    
    // Lesson ---//



    // Post

    Route::get('consoldes/admin-p/post',[AdminPageControl::class, 'Post'])->name('admin.post');
    Route::get('consoldes/admin-p/add-post',[AdminPageControl::class, 'addPost'])->name('admin.addpost');
    Route::post('consoldes/admin-p/add-post',[AdminPageControl::class, 'addPostSubmit'])->name('admin.addpost-submit');
    Route::post('consoldes/admin-p/delete-post',[AdminPageControl::class, 'deletePost'])->name('admin.deletepost');
    Route::any('consoldes/admin-p/update-post',[AdminPageControl::class, 'updatePost'])->name('admin.updatepost');
    Route::post('consoldes/admin-p/update-post-submit',[AdminPageControl::class, 'updatePostSubmit'])->name('admin.updatepost-submit');

    // Post ---//


    Route::get('consoldes/admin-p/users',[AdminPageControl::class, 'Users'])->name('admin.user');
    Route::get('consoldes/admin-p/contact',[AdminPageControl::class, 'Contact'])->name('admin.contact');
    Route::any('consoldes/admin-p/contactinfo',[AdminPageControl::class, 'ContactInfo'])->name('admin.contactinfo');




});


Route::get('consoldes/tool/excel-to-kmz',[ImportExcelController::class, 'index'])->name('tool.excel_to_kmz');
Route::post('consoldes/tool/excel-to-kmz/import',[ImportExcelController::class, 'importExcel'])->name('tool.excel_to_kmz.import');
