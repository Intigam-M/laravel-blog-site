@extends('master')
@section('csd_title') Consoldes @endsection
@section('csd_description') "@lang('page_lang.consoldes_title')" @endsection
@section('csd_keyword') "Consulting, Solution, Design" @endsection
@section('main')

<!-- blog content  -->
<div class="col-lg-9 mb-5">
    <div class="row">
        @foreach ($posts as $posts)

            @php
                $color = $posts->color;
                $post_title="title_".app()->getLocale();
                $post_cat="cat_".app()->getLocale();
                if(empty($posts->$post_cat)){$post_cat="cat_az";}
                if(empty($posts->$post_title)){$post_title="title_az";}
            @endphp

            <div class="col-md-6 pb-3">
                <div class="col-md-12 p-4 rounded postcat-div">
                    <a href="{{route('blogcat',$posts->cat_url)}}" class="postcat-link" style="background-color: <?php echo $color; ?> ;">{{$posts->$post_cat}}</a>
                    <a href="{{route('blog',$posts->url)}}">
                        <h3>{{$posts->$post_title}}</h3>
                        <div class="row">
                            <div class="col-7">
                                <span> {{$posts->name." ".$posts->surname}}</span>
                            </div>
                            <div class="col-5">
                                <label class="pull-right">
                                    <i class="fa fa-calendar" aria-hidden="true">&nbsp; &nbsp;</i> {{$posts->created}}
                                </label>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- blog content //-->

@endsection