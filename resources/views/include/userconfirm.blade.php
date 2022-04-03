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
        .confirm-text{font-family: Poppins, sans-serif;}
    </style>
    </head>
<body>

<div class="container">
    <div class="col-lg-5 col-md-10 mt-5 p-3 mx-auto bg-white">
        <div class="col-md-10 col-sm-10 mx-auto pb-5 pt-5">

            <div class="col-md-9 col-lg-9 col-sm-9 mb-4 mx-auto">
                <a href="{{route('home')}}"><img id="img" src="{{asset('/')}}assets/images/logo/logo.png" style="width: 100%; height:100%;"></a>
            </div>

            <form method="post" action="{{route('userconfirm-submit')}}">
                @csrf
                <input type="text" class="sign-input" name="usercode" placeholder="Code" autocomplete="off" required>
                <input type="hidden"name="email" value="{{$useremail}}">
               
                <div class="d-grid">
                    <input type="submit" class="btn btn-success mt-5"value="@lang('page_lang.confirm_btn')">
                </div>
            </form><br>
            <p class="confirm-text">@lang('page_lang.confirm_code')</p>
            <p class="confirm-text">Email: <b>{{$useremail}}</b></p> 
            @if(isset($confirmerror))
                <div class="alert alert-danger text-center" role="alert">
                  @lang('page_lang.confirm_err')
                </div>
            @endif  


        </div>
    </div>
</div>


</body>
</html>