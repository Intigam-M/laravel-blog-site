<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('csd_title')</title>
    <meta charset="utf-8">
    <meta name="description" content=@yield('csd_description')>
    <meta name="keywords" content=@yield('csd_keyword')>
    <meta name="author" content="Consoldes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/js/jquery-3.6.0.min.js"></script>
    <link href="{{asset('/')}}assets/icon/css/icon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}assets/css/prism.css">
    <script src="{{asset('/')}}assets/js/prism.js"></script>
    <link href="{{asset('/')}}assets/css/main.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/css/jquery.back-to-top.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid p-0" style="overflow:hidden;">
        <div class="container p-0">
            <div class="col-lg-11 col-sm-12 mx-auto bg-white maina4div">

                <!-- logo language consoldes app login -->

                <div class="row">
                    <div class="col-md-6">

                        <div class="col-md-6 m-4">
                            <a href="{{route('home')}}">
                                <img src="{{asset('/')}}assets/images/logo/logo.png" style="width: 100%; height:100%;">
                            </a>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2"> 
                                @if(auth()->check())
                                    <button onclick="userDropdown()" class="dropdownBtn user-dropbtn rounded-circle">
                                        <i class="fa fa-user" aria-hidden="true" style="color:#999; font-size:20px; pointer-events: none;"></i>
                                    </button>
                                    <div class="dropdown userDropdown rounded">
                                        @php
                                            $user = Auth::user();
                                        @endphp
                                        <h6 class="text-center">{{$user->name." ".$user->surname}}</h6>
                                        <p class="text-center">{{$user->email}}</p><hr>
                                        <a href="{{route('user-logout')}}">@lang('page_lang.exit_btn')</a>
                                    </div>

                                @else
                                    <a href="{{route('login')}}" class="btn btn-primary">@lang('page_lang.signin')</a>
                                @endif
                            </div>
                            <div class="p-2">

                                <svg width="25" height="35" class="pt-2">
                                    <circle r="2" cx="5"  cy="5"/>
                                    <circle r="2" cx="12" cy="5"/>
                                    <circle r="2" cx="19" cy="5"/>
                                    <circle r="2" cx="5"  cy="12"/>
                                    <circle r="2" cx="12" cy="12"/>
                                    <circle r="2" cx="19" cy="12"/>
                                    <circle r="2" cx="5"  cy="19"/>
                                    <circle r="2" cx="12" cy="19"/>
                                    <circle r="2" cx="19" cy="19"/>
                                </svg>

                            </div>
                            <div class="p-2">
            
                                @php
                                    $currentUrl = url()->current();
                                    $currentLang=app()->getlocale(); 
                                    $urlAZ=str_replace($currentLang, 'az', $currentUrl);
                                    $urlEN=str_replace($currentLang, 'en', $currentUrl);
                                    $urlRU=str_replace($currentLang, 'ru', $currentUrl);
                                @endphp

                                <div class="langdropdown">
                                    <button onclick="showLang()" class="dropdownBtn langbtn"> {{app()->getLocale()}} </button>
                                    <div class="dropdown available-lang">
                                        @if (!app()->isLocale('az')) <a href="{{$urlAZ}}">az</a> @endif
                                        @if (!app()->isLocale('en')) <a href="{{$urlEN}}">en</a> @endif
                                        @if (!app()->isLocale('ru')) <a href="{{$urlRU}}">ru</a> @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- logo language consoldes app login //-->


                <!-- nav -->

                <nav class="navbar navbar-expand-lg navbar-light bg-white border-top border-bottom">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::segment(2)=='')active @endif" aria-current="page" href="{{route('home')}}">@lang('page_lang.home')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::segment(2)=='blogs')active @endif" href="{{route('blogs')}}">@lang('page_lang.blog')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::segment(2)=='contact')active @endif" href="{{route('contact')}}">@lang('page_lang.contact')</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('tool.excel_to_kmz')}}">Import excel</a>
                                </li>

                                @if (Auth::check() && Auth::user()->user_role == '1') 
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="{{route('admin.home')}}" target="_blank">Admin</a>
                                    </li>
                                @endif
                               
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- nav //-->

                <!-- content -->
                <div class="col-md-12 mt-4 ps-4 pe-4 content-maindiv">
                    <div class="row">


<script>
    function showLang() {  $(".available-lang").toggle(); }
    function userDropdown() { $(".userDropdown").toggle(); }

    // close all dropdown menu when click outside
    $(document).mouseup(function(e) 
    {
        var container = $(".dropdown");
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        { container.hide(); }
        
    });
</script>  


                    