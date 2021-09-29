<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.homepage.partials.meta')

    @include('layouts.homepage.partials.head')

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
{{-- Check Condition For Product page --}}

{{-- @if(Request::segment(2) !== 'Kosmetik' && Request::segment(2) !== 'Nutrisi')
  @include('layouts.homepage.partials.navigation')
@endif --}}

    {{-- Page Content --}}
    @yield('content')
    {{-- End Page Content --}}

{{-- Check Condition For Product page --}}
{{-- @include('layouts.homepage.partials.backToTop')
@if(Request::segment(2) !== 'Kosmetik' && Request::segment(2) !== 'Nutrisi')
  @include('layouts.homepage.partials.footer')
@endif --}}


<script src="{{mix('js/app.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@include('layouts.homepage.partials.script')

</body>
</html>