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

{{-- content --}}
{{-- Mamam dong kak maman --}}

@section('content')

	<section id="about">
		{{-- Hero Jumbotron --}}
		@include('pages.products.components.hero')
		{{-- Panel Header --}}
		@include('pages.products.components.panelheader')
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		{{-- Panel Kosmetik --}}
		@include('pages.products.components.panelkosmetik')
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		{{-- Parallax Kosmetik --}}
		@include('pages.products.components.parallaxbeauty')

		@include('pages.products.components.kosmetiklist')
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		{{-- Panel Focus --}}
		@include('pages.products.components.panelnutrisi')
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		@include('pages.products.components.parallaxhealthy')
		@include('pages.products.components.nutrisilist')
		<h1 class="underline" style="margin-top: 5rem;"></h1>
		{{-- parallax end --}}
		@include('pages.products.components.parallaxproduct')
	</section>


<style type="text/css">
/*section {
	width: 100%;
}*/
	.wrapper-pricing {
		display: table;
		height: 100%;
		width: 100%;
	}

	.container-fostrap {
		display: table-cell;
		padding: 1em;
		text-align: center;
		vertical-align: middle;
	}
	.fostrap-logo {
		width: 100px;
		margin-bottom:15px
	}

	.card-pricing {
		display: block; 
		margin-bottom: 20px;
		line-height: 1.42857143;
		background-color: #fff;
		border-radius: 2px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
		transition: box-shadow .25s;
		margin-left: -.5rem!important;
	}
	.card-pricing:hover {
		box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	}
/*.img-card-pricing {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
    }*/
    .img-card-pricing{
    	width: 300px;
    	height: 30vh;
    	object-fit:cover!important; 
    	transition: all .25s ease;
    } 
    .card-content-pricing {
    	padding:15px;
    	text-align:left;
    }
    .card-title-pricing {
    	margin-top:0px;
    	font-weight: 700;
    	font-size: 1.65em;
    }
    .card-title-pricing a {
    	color: #000;
    	text-decoration: none !important;
    }
    .card-read-more-pricing {
    	border-top: 1px solid #D4D4D4;
    }
    .card-read-more-pricing a {
    	text-decoration: none !important;
    	padding:10px;
    	font-weight:600;
    	text-transform: uppercase
    }
#about{
	width: 100%;
}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#about{
		width: 100%;
	}
	.card-pricing {
		display: block; 
		margin-bottom: 20px;
		line-height: 1.42857143;
		background-color: #fff;
		border-radius: 2px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
		transition: box-shadow .25s; 
	}

	.img-card-pricing{
    	width: 100%;
    	height: 70vh;
    	object-fit:cover!important; 
    	transition: all .25s ease;
    } 
}
</style>
@endsection

