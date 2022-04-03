
@extends('master')
@section('csd_title') Consoldes @endsection
@section('csd_description') "@lang('page_lang.consoldes_title')" @endsection
@section('csd_keyword') "Consulting, Solution, Design" @endsection
@section('main')

<!-- content service -->
<div class="col-lg-9">

    <div class="col-lg-10 mx-auto">
        <h6 class="homemaintitle">@lang('page_lang.consoldes')</h6>
    </div>

    <section class="gallery-block cards-gallery">
        <div class="row">

            <div class="col-md-6 col-sm-8 mx-auto col-lg-4">
                <div class="card border-1 transform-on-hover">
                    <a href="{{route('business')}}">
                        <div class="homecardimageframe">
                            <img src="assets/images/servicefoto/business-sector.png"
                                class="card-img-top rounded mx-auto d-block">
                        </div>
                    </a>
                    <div class="card-body">
                        <p><a href="{{route('business')}}">@lang('page_lang.business_sector')</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-8 mx-auto col-lg-4">
                <div class="card border-1 transform-on-hover">
                    <a href="{{route('prj-managment')}}">
                        <div class="homecardimageframe">
                            <img src="assets/images/servicefoto/project-managment.png"
                                class="card-img-top rounded mx-auto d-block">
                        </div>
                    </a>
                    <div class="card-body">
                        <p><a href="{{route('prj-managment')}}">@lang('page_lang.prj_mng')</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-8 mx-auto col-lg-4">
                <div class="card border-1 transform-on-hover">
                    <a href="{{route('programming')}}">
                        <div class="homecardimageframe">
                            <img src="assets/images/servicefoto/programming.png" class="card-img-top rounded mx-auto d-block">
                        </div>
                    </a>
                    <div class="card-body">
                        <p><a href="{{route('programming')}}">@lang('page_lang.programming')</a></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
<!-- content service //-->

@endsection