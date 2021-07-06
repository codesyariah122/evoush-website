@extends('layouts.homepage.global')
{{-- meta head --}}
@section('title'){{$title}}@endsection
@section('meta_desc'){{$meta_desc}}@endsection
@section('meta_key'){{$meta_key}}@endsection
@section('meta_author'){{$meta_author}}@endsection
@section('og_title'){{$og_title}}@endsection
@section('og_desc'){{$og_desc}}@endsection
@section('og_image'){{$og_image}}@endsection
@section('og_url'){{$og_url}}@endsection


{{-- content --}}
@section('content')

	<section id="profile">
		
		
		{{-- Hero Jumbotron --}}
		@include('pages.profile.createcomponents.hero')

		{{-- Panel Focus --}}
		@include('pages.profile.createcomponents.panelcreate')
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		{{-- parallax end --}}
		@include('pages.profile.createcomponents.parallaxcreate')

	</section>

	
	<style type="text/css">
	/*section {
		width: 100%;
	}*/
	#profile{
		width: 100%;
	}
	/* DESKTOP VERSION */
	@media (min-width: 992px) { 
		#profile{
			width: 100%;
		}
	}
	</style>
@endsection

