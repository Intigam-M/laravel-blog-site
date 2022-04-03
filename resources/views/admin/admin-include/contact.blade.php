@extends('admin.admin_master')
@section('main')

<style>
  .zerobtn{
   background: none;
   border: none;
   padding: 0;
  }
</style>

<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Name</th>
        <th class="text-center" scope="col">Email</th>
        <th class="text-center" scope="col">Read</th>
        <th class="text-center" scope="col">Created</th>
        <th class="text-center" scope="col">Info</th>
      </tr>
    </thead>
    <tbody>
      @php $row_inc = 1; @endphp
        @foreach ($contact as $contact)
            <tr>
                <th class="text-center" scope="row">{{$row_inc}}</th>
                <td>{{$contact->name}}</td>
                <td>{{$contact->email}}</td>
                <td class="text-center {{$contact->read == 1 ? "text-success" : "text-danger"}}"> <b>{{$contact->read == 1 ? "Oxunub" : "Oxunmayıb"}}</b> </td>
                <td class="text-center">{{$contact->created_at}}</td>
                <td class="text-center">
                    <form action="{{route('admin.contactinfo')}}" method="post">
                        @csrf
                        <input type="hidden" name="contact_id" value="{{$contact->id}}">
                        <button class="zerobtn text-primary">Read</button>
                    </form>
                </td>
            </tr>
            @php $row_inc = $row_inc+1; @endphp
        @endforeach
    </tbody>
  </table>
@endsection
