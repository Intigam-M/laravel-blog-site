@extends('admin.admin_master')
@section('main')

<style>
  .zerobtn{
   background: none;
   border: none;
   padding: 0;
  }
</style>

@if(session('cat_deleted'))
  <div class="alert alert-success" role="alert">
      <span>Kateqoriya silindi!</span>
  </div>
@endif  
@if(session('cat_deleted_error'))
  <div class="alert alert-danger" role="alert">
      <span><b>Silinmə alınmadı.</b> Bu kateqoriyaya bağlı mövzular var!</span>
  </div>
@endif 

<a href="{{route('admin.addlessoncat')}}" class="pull-right btn btn-primary mb-2">Add lesson category</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Cat az</th>
        <th class="text-center" scope="col">Cat url</th>
        <th class="text-center" scope="col">Created</th>
        <th class="text-center" scope="col">Updated</th>
        <th class="text-center" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $row_inc = 1; @endphp
        @foreach ($lesson_cat as $lesson_cat)
            <tr>
                <th class="text-center" scope="row">{{$row_inc}}</th>
                <td>{{$lesson_cat->cat_az}}</td>
                <td>{{$lesson_cat->url}}</td>
                <td class="text-center">{{$lesson_cat->created_at}}</td>
                <td class="text-center">{{$lesson_cat->updated_at}}</td>
                <td class="text-center">
                  <div class="row">
                    <div class="col-6">
                      <form action="{{route('admin.updatelessoncat')}}" method="post">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{$lesson_cat->id}}">
                        <button class="zerobtn text-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                      </form>
                    </div>
                    <div class="col-6">
                      <form action="{{route('admin.deletelessoncat')}}" method="post" onsubmit="return confirm('Do you want to delete?');">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{$lesson_cat->id}}">
                        <input type="hidden" name="cat_url" value="{{$lesson_cat->url}}">
                        <button class="zerobtn text-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                      </form>
                    </div>
                  </div>
                </td>
            </tr>
            @php $row_inc = $row_inc+1; @endphp
        @endforeach
    </tbody>
  </table>
@endsection
