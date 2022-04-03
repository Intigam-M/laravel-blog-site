@extends('master')
@section('csd_title') Consoldes @endsection
@section('csd_description') "@lang('page_lang.consoldes_title')" @endsection
@section('csd_keyword') "Consulting, Solution, Design" @endsection
@section('main')

<!-- subject-lessons content  -->
<div class="col-lg-9 mb-5 subject-lessons">

    <div class="col-md-12 border p-4 mb-5 subject-head">
        @php
            $lesson_header="title_".app()->getLocale();
            if(empty($cat->$lesson_header)){$lesson_header="title_az";}
        @endphp
        {!! $cat->$lesson_header !!}
    </div>

    <div class="row mt-4">

        @foreach ($lesson as $less)

        @php
            $lesson_titles="title_".app()->getLocale();
            if(empty($less->$lesson_titles)){$lesson_titles="title_az";}
        @endphp

        <li class="col-md-4"><a href="{{route('lesson',$less->url)}}" class="border">{{$less->$lesson_titles}}</a></li>

        @endforeach
    </div>

</div>
<!-- subject-lessons content //-->

@endsection