@extends('layouts.homepage.global')
{{-- meta head --}}
@section('title'){{$title}}@endsection
@section('canonical'){{ $canonical }}@endsection
@section('meta_desc'){{$meta_desc}}@endsection
@section('meta_key'){{$meta_key}}@endsection
@section('meta_author'){{$meta_author}}@endsection
@section('og_title'){{$og_title}}@endsection
@section('og_site_name'){{$og_site_name}}@endsection
@section('og_desc'){{$og_desc}}@endsection
@section('og_image'){{$og_image}}@endsection
@section('og_url'){{$og_url}}@endsection

@section('content')

	<section id="contact">
		{{-- Hero Jumbotron --}}
		@include('pages.contact.components.hero')
		{{-- Panel Header --}}
		<h1 class="underline" style="margin-top: 5rem;"></h1>
		@include('pages.contact.components.panelcontact')
		{{-- Panel Intents --}}
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		{{-- parallax end --}}
		@include('pages.contact.components.parallaxend')
	</section>



<style type="text/css">
/*section {
	width: 100%;
}*/
#contact{
	width: 100%;
}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#contact{
		width: 100%;
	}
}
</style>
@endsection