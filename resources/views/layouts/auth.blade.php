<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
   <script src="{{ mix('/js/app.js') }}" defer></script>
   <title>@yield('title')</title>
</head>
<body>
  <div id="app">@yield('content')</div>
</body>
</html>