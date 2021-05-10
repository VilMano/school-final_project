<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/video-js.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div style="margin-top: 230px;" class="jumbotron text-center">
    <h1 class="display-3">O seu pedido foi realizado com sucesso</h1>
    <p class="lead">
      <a class="btn btn-success btn-sm" href="/admin" role="button">Voltar para a área de administrador</a>
    </p>
  </div>
</body>

