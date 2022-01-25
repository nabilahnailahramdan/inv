<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name') }}</title>
  @include('layouts.inc.ext-css')
</head>
<body>
<div class="jumbotron text-center bg-white">
  <img src="{{ url('images/logo.jpg') }}" width="200" />
    <h3>Selamat Datang di Aplikasi Invensa</h3>
    <h3>Aplikasi Sarana dan Prasarana SMK</h3>
</div>
@include('layouts.inc.ext-js')
</body>
</html>