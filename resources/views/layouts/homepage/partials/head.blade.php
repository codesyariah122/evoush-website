
<script src="{{asset('dashboard/vendor/jquery/jquery.min.js')}}"></script>
{{-- Fav icon --}}
<link rel="shortcut icon" href="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/logo/fav_evoush.png">
{{-- stylesheet --}}
<link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<link href="https://fonts.googleapis.com/css2?family=Poiret+One&family=Poppins:wght@900&family=Quicksand:wght@500&display=swap" rel="stylesheet">
<link href="{{ asset('css/web.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script data-ad-client="ca-pub-8390872078103831" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdn.tiny.cloud/1/36xbwrnfekuspwhfv02z1kuwy3sz4nbehpqkb3x7bh8tek86/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript" src="{{asset('js/WebApp.js')}}"></script>

{{-- first style --}}
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
*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}
body{
  background-color: #fff!important;
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
}
</style>