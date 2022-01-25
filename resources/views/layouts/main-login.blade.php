<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3{{ isset($title) ? '  '.$title : '' }}</title>
  @include('layouts.inc.ext-css')
</head>
<body class="hold-transition login-page">
    @yield('content')
    @include('layouts.inc.ext-js')
</body>
</html