@extends('admin.admin_master')
@section('main')

<style>
  .zerobtn{
   background: none;
   border: none;
   padding: 0;
  }
</style>

@if(session('post_deleted'))
  <div class="alert alert-success" role="alert">
      <span>Post silindi!</span>
  </div>
@endif  

<a href="{{route('admin.addpost')}}" class="pull-right btn btn-primary mb-2">Add post</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Category</th>
        <th class="text-center" scope="col">Title az</th>
        <th class="text-center" scope="col">Url</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">View</th>
        <th class="text-center" scope="col">Created</th>
        <th class="text-center" scope="col">Updated</th>
        <th class="text-center" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @php $row_inc = 1; @endphp
        @foreach ($post as $post)
            <tr>
                <th class="text-center" scope="row">{{$row_inc}}</th>
                <td>{{$post->cat_az}}</td>
                <td>{{$post->title_az}}</td>
                <td>{{$post->url}}</td>
                <td class="text-center">{{$post->status == 1 ? "Public" : "Draft"}}</td>
                <td class="text-center">{{$post->hit}}</td>
                <td class="text-center">{{$post->created}}</td>
                <td class="text-center">{{$post->updated}}</td>
                <td class="text-center">
                  <div class="row">
                    <div class="col-6">
                      <form action="{{route('admin.updatepost')}}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button class="zerobtn text-primary"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                      </form>
                    </div>
                    <div class="col-6">
                      <form action="{{route('admin.deletepost')}}" method="post" onsubmit="return confirm('Do you want to delete?');">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="image" value="{{$post->image}}">
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
