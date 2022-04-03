@extends('master')
@section('main')

@php
    $lesson_title="title_".app()->getLocale();
    $lesson_content="post_".app()->getLocale();
    if(empty($lesson->$lesson_content)){$lesson_content="post_az";}
    if(empty($lesson->$lesson_title)){$lesson_title="title_az";}
@endphp

@section('csd_title') {{  $lesson->$lesson_title }} @endsection
@section('csd_description') "{{  $lesson->$lesson_title }}" @endsection
@section('csd_keyword') "{{ $lesson->tags }}" @endsection

<!-- lesson content -->
<div class="col-lg-9 mb-5">

    @if($lesson->youtube_frame)
        <div class="col-md-11" style="height: 300px;">
            {!! $lesson->youtube_frame !!}
        </div>
    @endif

    <div class="col-md-11 blogtextdiv mt-4">
        <h6 class="text-center blogtitle">{{ $lesson->$lesson_title }}</h6>
        {!! $lesson->$lesson_content !!}
    </div>

</div>
<!-- lesson content //-->

@endsection