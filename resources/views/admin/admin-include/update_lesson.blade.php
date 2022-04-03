@extends('admin.admin_master')
@section('main')


@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
@endforeach
@endif 

@if(session('lesson_updated'))
  <div class="alert alert-success" role="alert">
      <span>Lesson update olundu!</span>
  </div>
@endif  

@if(session('url_error'))
  <div class="alert alert-danger" role="alert">
      <span>Daxil edilən url artıq mövcuddur!</span>
  </div>
@endif  




<form action="{{route('admin.updatelesson-submit')}}" method="post">
    @csrf

    <small class="text-muted">Category</small>
    <select name="category" value="{{old('category')}}" class="form-control" required="required">
        <option value="" hidden>--Select Category--</option>
        @foreach ($lesson_cat as $lesson_cat)
            @if ($lesson->cat_url == $lesson_cat->url)
                <option value="{{$lesson_cat->url}}" selected>{{$lesson_cat->cat_az}}</option>
            @else
                <option value="{{$lesson_cat->url}}">{{$lesson_cat->cat_az}}</option>
            @endif
        @endforeach
    </select>

    <small class="text-muted">Title az</small>
    <input type="text" name="title_az" value="{{$lesson->title_az}}" class="form-control" required>

    <small class="text-muted">Title en</small>
    <input type="text" name="title_en" value="{{$lesson->title_en}}" class="form-control">

    <small class="text-muted">Title ru</small>
    <input type="text" name="title_ru" value="{{$lesson->title_ru}}" class="form-control">

    <small class="text-muted">Post az</small>
    <textarea  name="post_az">{{$lesson->post_az}}</textarea>

    <small class="text-muted">Post en</small>
    <textarea  name="post_en">{{$lesson->post_en}}</textarea>

    <small class="text-muted">Post ru</small>
    <textarea  name="post_ru">{{$lesson->post_ru}}</textarea>
    
    <small class="text-muted">Youtube frame</small>
    <input type="text" name="y_frame" value="{{$lesson->youtube_frame}}" class="form-control">
       
    <small class="text-muted">Tags</small>
    <input type="text" name="tag" value="{{$lesson->tags}}" placeholder="exp: HTML, CSS, Programming" class="form-control">

    <small class="text-muted">Url</small>
    <input type="text" name="url" value="{{$lesson->url}}" class="form-control" required>

    <small class="text-muted">Status</small>
    <select name="status" value="{{old('status')}}"  class="form-control" required="required">
        <option value="" hidden>--Select Status--</option>
        <option value="1" @if ($lesson->status== 1) selected @endif>Public</option>
        <option value="0" @if ($lesson->status== 0) selected @endif>Draft</option>
    </select><br>
    
    <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
    <div class="d-grid pb-5">
        <button class="btn btn-primary btn-lg" type="submit">Update lesson</button>
    </div>
</form>

@endsection
