@extends('admin.admin_master')
@section('main')


@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">
    {{$error}}
    </div>
@endforeach
@endif 

@if(session('cat_updated'))
  <div class="alert alert-success" role="alert">
      <span>Kateqoriya update olundu!</span>
  </div>
@endif  

@if(session('url_error'))
  <div class="alert alert-danger" role="alert">
      <span>Daxil edilən url artıq mövcuddur!</span>
  </div>
@endif  




<form action="{{route('admin.updatelessoncat-submit')}}" method="post">
    @csrf
    <small class="text-muted">Cat az</small>
    <input type="text" name="cat_az" value="{{$lesson_cat->cat_az}}" placeholder="cat az" class="form-control" required>

    <small class="text-muted">Cat en</small>
    <input type="text" name="cat_en" value="{{$lesson_cat->cat_en}}" placeholder="cat en" class="form-control">

    <small class="text-muted">Cat ru</small>
    <input type="text" name="cat_ru" value="{{$lesson_cat->cat_ru}}" placeholder="cat ru" class="form-control">

    <small class="text-muted">Title az</small>
    <textarea  name="title_az">{{$lesson_cat->title_az}}</textarea>

    <small class="text-muted">Title en</small>
    <textarea  name="title_en">{{$lesson_cat->title_en}}</textarea>

    <small class="text-muted">Title ru</small>
    <textarea  name="title_ru">{{$lesson_cat->title_ru}}</textarea>

    <small class="text-muted">Url</small>
    <input type="text" name="url" value="{{$lesson_cat->url}}" placeholder="Url" class="form-control" required><br>
    
    <input type="hidden" name="cat_id" value="{{$lesson_cat->id}}">
    <div class="d-grid pb-5">
        <button class="btn btn-primary btn-lg" type="submit">Update lesson category</button>
    </div>
</form>

@endsection
