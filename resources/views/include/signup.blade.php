<!DOCTYPE html>
<html lang="en">

<head>
    <title>Consoldes</title>
    <meta charset="utf-8">
    <meta name="description" content= "@lang('page_lang.consoldes_title')" >
    <meta name="keywords" content= "Consulting, Solution, Design" >
    <meta name="author" content="Consoldes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{asset('/')}}assets/js/bootstrap.bundle.min.js"></script>
    <link href="{{asset('/')}}assets/icon/css/icon.css" rel="stylesheet">
    <style type="text/css">
        body{
            background-color: #ecf0f4;
        }
        .sign-input{
            width: 100%;
            height: 40px;
            border:none;
            border-bottom: 1px solid #cccccc;
            padding-left: 10px;
            margin-top:5%;  
        }
        .sign-input:focus {
            outline: none;
        }
    </style>
    </head>
<body>

<div class="container">
    <div class="col-lg-5 col-md-10 mt-5 p-3 mx-auto bg-white">
        <div class="col-md-10 col-sm-10 mx-auto pb-5 pt-5">

            <div class="col-md-9 col-lg-9 col-sm-9 mb-4 mx-auto">
                <a href="{{route('home')}}"><img id="img" src="{{asset('/')}}assets/images/logo/logo.png" style="width: 100%; height:100%;"></a>
            </div>

            <form method="post" action="{{route('signup-submit')}}">
                @csrf
                <input type="text" name="name" value="{{old('name')}}" class="sign-input"  placeholder="@lang('page_lang.name')" autocomplete="off" required maxlength=30 >
                <input type="text" name="surname" value="{{old('surname')}}" class="sign-input" placeholder="@lang('page_lang.surname')" required maxlength=30 >
                <input type="email" name="email" value="{{old('email')}}" class="sign-input" placeholder="Email" maxlength=60 >
                <input type="password" name="password" class="sign-input" minlength="8" placeholder="@lang('page_lang.password')" required>
            
                <div class="d-grid">
                    <input type="submit" class="btn btn-success mt-5" value="@lang('page_lang.register_btn')">
                </div>
            </form><br>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center" role="alert">
                       @lang('page_lang.unique_mail')
                    </div>
                @endforeach
            @endif 


            <p>@lang('page_lang.yes_account') <a href="{{route('login')}}" style="text-decoration: none;">@lang('page_lang.pls_enter')</a></p>
        </div>
    </div>
</div>


</body>
</html>