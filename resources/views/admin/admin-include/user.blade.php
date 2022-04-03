@extends('admin.admin_master')
@section('main')

<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Name</th>
        <th class="text-center" scope="col">Surname</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Role</th>
        <th class="text-center" scope="col">Status</th>
        <th class="text-center" scope="col">Updated</th>
        <th class="text-center" scope="col">Created</th>
      </tr>
    </thead>
    <tbody>
      @php $row_inc = 1; @endphp
        @foreach ($users as $user)
            <tr>
                <th class="text-center" scope="row">{{$row_inc}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
                <td class="text-center @if($user->user_role == 1) text-danger @endif ">{{$user->user_role == 1 ? "Admin" : "User"}}</td>
                <td class="text-center">{{$user->active == 1 ? "Active" : "Passive"}}</td>
                <td class="text-center">{{$user->created_at}}</td>
                <td class="text-center">{{$user->updated_at}}</td>
            </tr>
            @php $row_inc = $row_inc+1; @endphp
        @endforeach
    </tbody>
  </table>
@endsection
