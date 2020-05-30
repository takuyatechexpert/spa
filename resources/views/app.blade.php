<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  
  <title>Document</title>
  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <Header-component></Header-component>
    {{-- <task-list-component></task-list-component> --}}

    <router-view></router-view>
  </div>
</body>
</html>