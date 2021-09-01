<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="https://unpkg.com/vue@2.5.6/dist/vue.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/errors.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <div class="bg-image">
        <main :style="style" class="py-4">
            @yield('content')
        </main>
    </div>

<style type="text/css">
     @font-face {
          font-family: "SpringSakura";
          src: local("SpringSakura"), url("https://codesyariah122.github.io/assets/fonts/SpringSakura-3z1m8.woff") format("woff");
      }
      @font-face {
          font-family: "Reey Regular";
          src: local("Reey Regular"), url("https://codesyariah122.github.io/assets/fonts/Reey-Regular.woff") format("woff");
      }
      @font-face {
         font-family: 'Walkway';
         src:  url("{{asset('fonts/walkway/Walkway.ttf.woff')}}") format("woff"); 
         font-weight: normal;
         font-style: normal;
     }
     .bg-image{
        background-image : url({{asset('images/banner/new_banner8.jpg')}});
        background-attachment: fixed;
        height: 100vh;        
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

  .underline:after{
      content: '';
      display: block;
      margin: auto;
      margin-top: 15px;
      position: relative;
      margin-bottom:2rem;
      width: 100px;
      height: 2px;
      background:rgb(255, 99, 78);
  }


  @media only screen and (max-device-width: 812px) {
      body{
        width: 100%!important;
    }
    
</style>
</body>
</html>
