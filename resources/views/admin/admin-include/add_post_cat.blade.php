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



    <form action="{{route('admin.addpostcat-submit')}}" method="post">
        @csrf
        <small class="text-muted">Cat az</small>
        <input type="text" name="cat_az" value="{{old('cat_az')}}" class="form-control" required>

        <small class="text-muted">Cat en</small>
        <input type="text" name="cat_en" value="{{old('cat_en')}}" class="form-control">

        <small class="text-muted">Cat ru</small>
        <input type="text" name="cat_ru" value="{{old('cat_ru')}}" class="form-control">
        
        <small class="text-muted">Url</small>
        <input type="text" name="url" value="{{old('url')}}" class="form-control" required><br>

        <small class="text-muted">Color</small>
        <input type="color" name="color" value="{{old('color')}}"><br><br>

        <div class="d-grid pb-5">
            <button class="btn btn-primary btn-lg" type="submit">Submit</button>
        </div>
    </form>

@endsection


