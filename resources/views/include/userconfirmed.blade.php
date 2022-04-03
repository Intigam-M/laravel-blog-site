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
   
    </style>
    </head>
<body>

<div class="container">
    <div class="col-lg-5 col-md-10 mt-5 p-3 mx-auto bg-white">
        <div class="col-md-10 col-sm-10 mx-auto pb-5 pt-5">

            <div class="col-md-9 col-lg-9 col-sm-9 mb-4 mx-auto">
                <a href="{{route('home')}}"><img id="img" src="{{asset('/')}}assets/images/logo/logo.png" style="width: 100%; height:100%;"></a>
            </div>

                 <div class="alert alert-success mt-5" role="alert">
                  <h6 style="font-family: Poppins, sans-serif; text-align: center; ">@lang('page_lang.confirm_true')</h6>
                </div>
          
          <div class="text-center">
            <a href="{{route('home')}}" class="btn btn-primary mt-5">@lang('page_lang.back_consoldes')</a>
          </div>

        </div>
    </div>
</div>


</body>
</html>