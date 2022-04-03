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

<a href="{{route('admin.addpostcat')}}" class="pull-right btn btn-primary mb-2">Add post category</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Cat az</th>
        <th class="text-center" scope="col">Cat url</th>
        <th class="text-center" scope="col">Color</th>
        <th class="text-center" scope="col">Created</th>
        <th class="text-center" scope="col">Updated</th>
        <th class="text-center" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $row_inc = 1; @endphp
        @foreach ($post_cat as $post_cat)
            <tr>
                <th class="text-center" scope="row">{{$row_inc}}</th>
                <td>{{$post_cat->cat_az}}</td>
                <td>{{$post_cat->url}}</td>
                <td>
                  <div class="col-md-12 p-2" style="background-color: {{$post_cat->color}} "></div>
                </td>
                <td class="text-center">{{$post_cat->created_at}}</td>
                <td class="text-center">{{$post_cat->updated_at}}</td>
                <td class="text-center">
                  <div class="row">
                    <div class="col-6">
                      <form action="{{route('admin.updatepostcat')}}" method="post">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{$post_cat->id}}">
                        <button class="zerobtn text-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                      </form>
                    </div>
                    <div class="col-6">
                      <form action="{{route('admin.deletepostcat')}}" method="post" onsubmit="return confirm('Do you want to delete?');">
                        @csrf
                        <input type="hidden" name="cat_id" value="{{$post_cat->id}}">
                        <input type="hidden" name="cat_url" value="{{$post_cat->url}}">
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
