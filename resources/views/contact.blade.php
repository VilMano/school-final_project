@extends('layouts/app')

@section('head')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Elearn project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css')}}">
<link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
<style>
    .navbar-light .navbar-nav .nav-link:hover,
    .navbar-light .navbar-nav .nav-link:focus {
        color: #27AE60 !important;
    }

    body{
        background-color: #ddd!important;
    }
</style>


@endsection

@section('content')
<div class="super_container">
    <div class="contact_sections" id="contact-form">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact_title text-center">Fala connosco</div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-6 grouped_col">

                    <div class="contact_post d-flex flex-row align-items-start justify-content-start">
                        <div class="index_image">
                            <img src="{{ asset('images/img_contact_guest.JPG')}}" alt="Unavailable">
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 grouped_col">
                    <div class="contact d-flex flex-row align-items-start justify-content-start">
                        <form class="contact_form" action="action_page.php">

                            <label for="fname">Primeiro Nome</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">

                            <label for="lname">Último Nome</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                            <label for="subject">Assunto</label>
                            <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                            <input type="submit" value="Enviar">

                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 contact_info">
                    <div class="contact d-flex flex-row align-items-start justify-content-between">
                        <div class="contact_adress d-flex flex-row align-items-start justify-content-between"><img src="{{ asset('images/location.png')}}" alt="Unavailable">Lorem ipsum</div>
                        <div class="contact_telephone d-flex flex-row align-items-start justify-content-between"><img src="{{ asset('images/phone.png')}}" alt="Unavailable">Lorem ipsum</div>
                        <div class="contact_email d-flex flex-row align-items-start justify-content-between"><img src="{{ asset('images/message.png')}}" alt="Unavailable">Lorem ipsum</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection