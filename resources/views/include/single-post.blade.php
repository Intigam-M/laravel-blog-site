@extends('master')
@section('main')

<!-- blog content  -->
<div class="col-lg-9 mb-5">

    @php
        $single_post_title="title_".app()->getLocale();
        $single_post="post_".app()->getLocale();
        if(empty($singlepost->$single_post)){$single_post="post_az";}
        if(empty($singlepost->$single_post_title)){$single_post_title="title_az";}
    @endphp
    
    @section('csd_title') {{ $singlepost->$single_post_title }} @endsection
    @section('csd_description') "{{ $singlepost->$single_post_title }}" @endsection
    @section('csd_keyword') "{{ $singlepost->tags }}" @endsection



    @if($singlepost->image)
        <div class="col-md-7 mx-auto">
            <img src="{{asset('/')}}assets/images/post/{{ $singlepost->image }}" class="img-thumbnail" alt="Cinque Terre" width="100%">
        </div>
    @endif

    @if($singlepost->youtube_frame)
        <div class="col-md-11" style="height: 300px;">
            {!! $singlepost->youtube_frame !!}
        </div>
    @endif


    <div class="col-md-11 blogtextdiv mt-4">
        <h6 class="text-center blogtitle">{{ $singlepost->$single_post_title }}</h6>
        {!! $singlepost->$single_post !!}
    </div>

</div>
<!-- blog content //-->

@endsection