@extends('admin.admin_master')
@section('main')


@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
@endforeach
@endif 

@if(session('post_updated'))
  <div class="alert alert-success" role="alert">
      <span>Post update olundu!</span>
  </div>
@endif  

@if(session('url_error'))
  <div class="alert alert-danger" role="alert">
      <span>Daxil edilən url artıq mövcuddur!</span>
  </div>
@endif  




<form action="{{route('admin.updatepost-submit')}}" method="post" enctype="multipart/form-data">
    @csrf

    <small class="text-muted">Category</small>
    <select name="category" value="{{old('category')}}" class="form-control" required="required">
        <option value="" hidden>--Select Category--</option>
        @foreach ($post_cat as $post_cat)
            @if ($post->cat_url == $post_cat->url)
                <option value="{{$post_cat->url}}" selected>{{$post_cat->cat_az}}</option>
            @else
                <option value="{{$post_cat->url}}">{{$post_cat->cat_az}}</option>
            @endif
        @endforeach
    </select>

    <small class="text-muted">Title az</small>
    <input type="text" name="title_az" value="{{$post->title_az}}" class="form-control" required>

    <small class="text-muted">Title en</small>
    <input type="text" name="title_en" value="{{$post->title_en}}" class="form-control">

    <small class="text-muted">Title ru</small>
    <input type="text" name="title_ru" value="{{$post->title_ru}}" class="form-control">

    <small class="text-muted">Post az</small>
    <textarea  name="post_az">{{$post->post_az}}</textarea>

    <small class="text-muted">Post en</small>
    <textarea  name="post_en">{{$post->post_en}}</textarea>

    <small class="text-muted">Post ru</small>
    <textarea  name="post_ru">{{$post->post_ru}}</textarea>
    
    <small class="text-muted">Youtube frame</small>
    <input type="text" name="y_frame" value="{{$post->youtube_frame}}" class="form-control">

    <small class="text-muted">Tags</small>
    <input type="text" name="tag" value="{{$post->tags}}" placeholder="exp: HTML, CSS, Programming" class="form-control">

    <small class="text-muted">Url</small>
    <input type="text" name="url" value="{{$post->url}}" class="form-control" required>

    <small class="text-muted">Image</small>
    <input type="file" name="image" value="{{$post->image}}" class="form-control">

    <input type="checkbox" value="reset" name="reset_image" id="reset_image"><label class="text-muted" for="reset_image">Reset image</label><br>

    <small class="text-muted">Status</small>
    <select name="status" value="{{old('status')}}"  class="form-control" required="required">
        <option value="" hidden>--Select Status--</option>
        <option value="1" @if ($post->status== 1) selected @endif>Public</option>
        <option value="0" @if ($post->status== 0) selected @endif>Draft</option>
    </select><br>
    
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <div class="d-grid pb-5">
        <button class="btn btn-primary btn-lg" type="submit">Update post</button>
    </div>
</form>

@endsection
