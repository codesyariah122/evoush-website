<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- Meta Tag Seo --}}
<link rel="canonical" href="@yield('canonical')" />
<meta name="description" content="@yield('meta_desc')">
<meta name="keywords" content="@yield('meta_key')">
<meta name="author" content="@yield('meta_author')">
<meta property="og:url" content="@yield('og_url')">
<meta property="og:type" content="website" />
<meta property="og:site_name" content="@yield('og_site_name')" />
<meta property="og:title" content="@yield('og_title')">
<meta property="og:description" content="@yield('og_desc')">
<meta property="og:image" content="@yield('og_image')">
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="598" />

{{-- <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" /> --}}
<title>@yield('title')</title>
{{-- Fav icon --}}
<link rel="shortcut icon" href="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/logo/fav_evoush.png">
{{-- Google Adsense --}}
<script data-ad-client="ca-pub-8390872078103831" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
{{-- @include('meta::manager', [
	'title'         => 'Evoush::Official - Indonesia',
	'description'   => 'Your Eternal Future | Bisnis Network Marketing yang menjanjikan di masa pandemi',
	'image'         => asset('images/banner/new-model-1.jpg'),
]) --}}