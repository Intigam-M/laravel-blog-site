@extends('master')
@section('csd_title') Consoldes @endsection
@section('csd_description') "@lang('page_lang.consoldes_title')" @endsection
@section('csd_keyword') "Consulting, Solution, Design" @endsection
@section('main')

<!-- content service -->
<div class="col-lg-9 mb-5">
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <span>Mesajınız uğurla göndərildi!</span>
            </div>
        @endif  

        @if(session('msj_error'))
            <div class="alert alert-danger" role="alert">
                <span>Mesajınız göndərilmədi!</span>
            </div>
        @endif  

        <h4 class="text-center" style="color: #555;">Contact Us</h4>
        <form method="post" action="{{route('contact.submit')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input class="form-control" type="text" name="name" placeholder="Name" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input class="form-control" type="email" name="email" placeholder="Email Address" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" type="text" name="message" placeholder="Message" style="height: 10rem;" required ></textarea>
            </div>

            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<!-- content service //-->

@endsection