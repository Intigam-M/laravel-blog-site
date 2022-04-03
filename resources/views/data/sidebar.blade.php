<div class="col-lg-3 pe-0 sidebar-cat">

    <div class="col-lg-10 offset-lg-2">
        <h3>@lang('page_lang.category')</h3>
        @foreach ($category as $lesson_cat)

        @php
            $less_cat="cat_".app()->getLocale();
            if(empty($lesson_cat->$less_cat)){$less_cat="cat_az";}
        @endphp

            <li class="list-unstyled"><a href="{{route('cat',$lesson_cat->url)}}">{{ $lesson_cat->$less_cat }}</a></li>
        @endforeach
    </div>
    <div class="col-lg-10 mt-5 offset-lg-2">
        <h3>@lang('page_lang.topic')</h3>
        @foreach ($post as $postdata)

         @php
            $last5post="title_".app()->getLocale();
            if(empty($postdata->$last5post)){$last5post="title_az";}
         @endphp

            <li class="list-unstyled"><a href="{{route('blog',$postdata->url)}}">{{ $postdata->$last5post }}</a></li>
        @endforeach
    </div>

</div>