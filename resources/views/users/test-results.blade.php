<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div style="margin-top: 230px;" class="jumbotron text-center">
  
    <h1 class="display-3 text-success">Finalizou o teste</h1>
    @if($user_grade->grade > 50)
    <p class="lead">A sua pontuação foi: <h5 class="text-success"><strong>{{$user_grade->grade}}%</strong></h5></p>
    @else
    <p class="lead">A sua pontuação foi: <h5 class="text-danger"><strong>{{$user_grade->grade}}%</strong></h5></p>
    @endif
    <hr>
    <p class="lead">
      <a class="btn btn-success btn-sm" href="/users/dashboard" role="button">Voltar para os seus cursos</a>
    </p>
  </div>
</body>

