@extends('admin.admin_master')
@section('main')

    <div class="col-md-9">
        <div class="mb-3">
           <span class="text-secondary">Name:</span> {{$contactinfo->name}}<br>
           <span class="text-secondary">From:</span> {{$contactinfo->email}}<br>
           <span class="text-secondary">Date:</span> {{$contactinfo->created_at}}
        </div>

        <div class="border rounded p-3">
            <p class="text-secondary">Message:</p>
            <i>{{$contactinfo->message}}</i>
        </div>
    </div>
@endsection
