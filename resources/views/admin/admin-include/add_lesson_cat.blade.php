@extends('admin.admin_master')
@section('main')


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
            {{$error}}
            </div>
        @endforeach
    @endif 

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <span>Kateqoriya əlavə olundu!</span>
        </div>
    @endif  



    <form action="{{route('admin.addlessoncat-submit')}}" method="post">
        @csrf
        <input type="text" name="cat_az" value="{{old('cat_az')}}" placeholder="cat az" class="form-control" required><br>
        <input type="text" name="cat_en" value="{{old('cat_en')}}" placeholder="cat en" class="form-control"><br>
        <input type="text" name="cat_ru" value="{{old('cat_ru')}}" placeholder="cat ru" class="form-control"><br>
        <textarea  name="title_az">{{old('title_az')}}</textarea><br>
        <textarea  name="title_en">{{old('title_en')}}</textarea><br>
        <textarea  name="title_ru">{{old('title_ru')}}</textarea><br>
        <input type="text" name="url" value="{{old('url')}}" placeholder="Url" class="form-control" required><br>
        <div class="d-grid pb-5">
            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>
    </form>
    
@endsection


