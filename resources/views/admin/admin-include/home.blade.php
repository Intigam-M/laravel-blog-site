@extends('admin.admin_master')
@section('main')
<div class="row">
 
  <div class="col-md-4">
    <a href="{{route('admin.post')}}">
      <div class="col-md-12 border rounded p-5 bg-primary">
        <h1 class="text-white">Post: {{$post}}</h1>  
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="{{route('admin.lesson')}}">
      <div class="col-md-12 border rounded p-5 bg-primary">
        <h1 class="text-white">Lesson: {{$lesson}}</h1>  
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="{{route('admin.user')}}">
      <div class="col-md-12 border rounded p-5 bg-primary">
        <h1 class="text-white">User: {{$user}}</h1>  
      </div>
    </a>
  </div>

</div>
@endsection
