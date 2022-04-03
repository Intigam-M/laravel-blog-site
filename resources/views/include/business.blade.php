@extends('master')
@section('csd_title') Business sector | Consoldes @endsection
@section('csd_description') "@lang('page_lang.consoldes_title')" @endsection
@section('csd_keyword') "Consulting, Solution, Design" @endsection
@section('main')


<!-- business sector service -->
<div class="col-lg-9">

    <div class="col-sm-6">
        <img src="{{asset('/')}}assets/images/servicefoto/business-sector.png" class="img-thumbnail" alt="Cinque Terre" width="100%">
    </div>

    <div class="col-md-12 mt-5 pb-5">
        <h4 class="text-center servicetitle">@lang('page_lang.business_sector1')</h4>
        <div class="col-sm-12 service-text">
        @lang('page_lang.business_sector_content')
        </div>
    </div>

</div>
<!-- business sector service //-->

@endsection