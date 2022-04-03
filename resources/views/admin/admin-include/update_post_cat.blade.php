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




<form action="{{route('admin.updatepostcat-submit')}}" method="post">
    @csrf
    <small class="text-muted">Cat az</small>
    <input type="text" name="cat_az" value="{{$post_cat->cat_az}}" placeholder="cat az" class="form-control" required>

    <small class="text-muted">Cat en</small>
    <input type="text" name="cat_en" value="{{$post_cat->cat_en}}" placeholder="cat en" class="form-control">

    <small class="text-muted">Cat ru</small>
    <input type="text" name="cat_ru" value="{{$post_cat->cat_ru}}" placeholder="cat ru" class="form-control">

    <small class="text-muted">Url</small>
    <input type="text" name="url" value="{{$post_cat->url}}" placeholder="Url" class="form-control" required><br>

    <small class="text-muted">Color</small>
    <input type="color" name="color" value="{{$post_cat->color}}"><br>
    
    <input type="hidden" name="cat_id" value="{{$post_cat->id}}"><br><br>

    <div class="d-grid pb-5">
        <button class="btn btn-primary btn-lg" type="submit">Update post category</button>
    </div>
</form>

@endsection
