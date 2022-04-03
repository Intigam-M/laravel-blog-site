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
            <span>Lesson əlavə olundu!</span>
        </div>
    @endif  



    <form action="{{route('admin.addlesson-submit')}}" method="post">
        @csrf

        <select name="category" value="{{old('category')}}" class="form-control" required="required">
            <option value="" hidden>--Select Category--</option>
            @foreach ($lesson_cat as $lesson_cat)
                @if (old('category') == $lesson_cat->url)
                    <option value="{{$lesson_cat->url}}" selected>{{$lesson_cat->cat_az}}</option>
                @else
                    <option value="{{$lesson_cat->url}}">{{$lesson_cat->cat_az}}</option>
                @endif
            @endforeach
        </select>

        <small class="text-muted">Title az</small>
        <input type="text" name="title_az" value="{{old('title_az')}}" class="form-control" required>

        <small class="text-muted">Title en</small>
        <input type="text" name="title_en" value="{{old('title_en')}}" class="form-control">

        <small class="text-muted">Title ru</small>
        <input type="text" name="title_ru" value="{{old('title_ru')}}" class="form-control">

        <small class="text-muted">Post az</small>
        <textarea  name="post_az">{{old('post_az')}}</textarea>

        <small class="text-muted">Post en</small>
        <textarea  name="post_en">{{old('post_en')}}</textarea>

        <small class="text-muted">Post ru</small>
        <textarea  name="post_ru">{{old('post_ru')}}</textarea>
        
        <small class="text-muted">Youtube frame</small>
        <input type="text" name="y_frame" value="{{old('y_frame')}}" class="form-control">
       
        <small class="text-muted">Tags</small>
        <input type="text" name="tag" value="{{old('tag')}}" placeholder="exp: HTML, CSS, Programming" class="form-control">

        <small class="text-muted">Url</small>
        <input type="text" name="url" value="{{old('url')}}" placeholder="Url" class="form-control" required><br>
        
        <select name="status" value="{{old('status')}}"  class="form-control" required="required">
            <option value="" hidden>--Select Status--</option>
            <option value="1"   @if (old('status') == 1) selected @endif>Public</option>
            <option value="0" @if (old('status') == 0 and !empty(old('status'))) selected @endif>Draft</option>
        </select><br>
     
        <div class="d-grid pb-5">
            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>

    </form>

@endsection


