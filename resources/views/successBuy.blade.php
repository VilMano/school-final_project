<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div style="margin-top: 230px;" class="jumbotron text-center">
    <h1 class="display-3">Obrigado pela sua compra</h1>
    <p class="lead">Deverá fazer transferência bancária para: <h5 style="color: green;"><strong>PT18 1531 5123 1234 5678 9110 0</strong></h5></p>
<p>Preço: {{$final_price}}€</p>
    <hr>
    <p>
      Algum problema? <a style="text-decoration: none; color: green;" href="/contacts">Contacta-nos</a>
    </p>
    <p class="lead">
      <a class="btn btn-success btn-sm" href="{{route('all_courses')}}" role="button">Ir para cursos</a>
    </p>
  </div>
</body>

