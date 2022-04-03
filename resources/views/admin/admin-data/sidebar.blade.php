<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cosoldes admin</title>
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}admin-assets/css/style.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/icon/css/icon.css" rel="stylesheet">
    <script src="{{asset('/')}}admin-assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header p-4 border-bottom">
               <a href="{{route('admin.home')}}"><h5>Consoldes admin</h5></a> 
            </div>

            <ul class="list-unstyled components">
                <li class="sidelink">
                    <a href="{{route('admin.lessoncat')}}">Lesson category</a>
                </li>

                <li class="sidelink">
                    <a href="{{route('admin.lesson')}}">Lesson</a>
                </li>

                <li class="sidelink">
                    <a href="{{route('admin.postcat')}}">Post category</a>
                </li>
                <li class="sidelink">
                    <a href="{{route('admin.post')}}">Post</a>
                </li>
                <li class="sidelink">
                    <a href="{{route('admin.user')}}">Users</a>
                </li>
                <li class="sidelink">
                    <a href="{{route('admin.contact')}}">Contact</a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ms-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('home',app()->getLocale())}}" target="_blank">Consoldes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="col-md-11 mx-auto pb-5">