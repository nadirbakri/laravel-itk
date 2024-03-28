@extends('login.template_login')

@section('title-content')
<title>Download Stream Mobile</title>
@endsection

@section('css-content')
<style type="text/css">
    html, body {
        height: 100vh;
        margin: 0;
        background-color: #005088;
    }

    .poppins-regular {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .poppins-bold {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        font-style: normal;
    }

    .left-content {
        color: white;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .right-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    img {
        height: 400px !important;
        width: auto;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
    }

    ::selection {
        background-color: #f53f51;
        color: #fff;
    }

    @media only screen and (max-width: 1023px) {
        .right-content {
            display: none;
        }
    }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee+Spice&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@endsection

@section('content')
<div class="container h-100">
  <div class="row h-100">
    <div class="col-12 col-lg-7 left-content">
        <h6 class="poppins-regular">WELCOME TO</h6>
        <h1 class="poppins-bold">STREAM MOBILE</h1>
        <h6 class="poppins-regular">PT. Intikom Berlian Mustika</h6>
        
        <div class="button-container mt-3">
            <a href="https://streamportal.intikom.net/download/new_revamp/Stream_Revamp.apk" type="button" class="btn btn-light rounded-pill pt-2 pb-2 pl-3 pr-3  mr-3">DOWNLOAD FOR ANDROID</a>
            <a href="https://streamportal.intikom.net/download/new_revamp/mobile_stream_iOS_revamp.plist" type="button" class="btn btn-light rounded-pill pt-2 pb-2 pl-3 pr-3 ">DOWNLOAD FOR IOS</a>
        </div>
    </div>
    <div class="col-12 col-lg-5 right-content">
        <img src="{{ asset('pictures/hero-img.png') }}" alt="Logo">
    </div>
  </div>
</main>
@endsection
