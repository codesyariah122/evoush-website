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
@section('content')

	<section id="error">
		
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<img src="{{$og_image}}" class="img-responsive">
					<blockquote class="blockquote-footer">
						Maaf username <b class="text-danger">{{$user}}</b>, sepertinya belum terdaftar dalam system web replika kami, mungkin anda bisa mencoba untuk kontak admin web official evoush 
					</blockquote>

					<a @click="historyBack()" class="btn btn-success btn-block">Kembali</a>	

					<a href="{{route('evoush.contact')}}" class="btn btn-info btn-block text-white mb-5">Admin Contact</a>
				</div>
			</div>
		</div>

	</section>

	<script type="text/javascript">
		new Vue({
			el: '#error',
			methods: {
				historyBack(){
					window.history.back()
				},
			}
		})
	</script>

	
	<style type="text/css">
	/*section {
		width: 100%;
	}*/
	#error{
		width: 100%;
	}
	#error img{
		width:100%;
	}
	#error a {
		cursor: pointer;
	}
	/* DESKTOP VERSION */
	@media (min-width: 992px) { 
		#error{
			width: 100%;
			margin-top: -5rem!important;
		}
		#error img{
			width: 100%;
		}
		#error a {
			cursor: pointer;
		}
		
		.content{
			margin-left: 13rem!important;
		}

		#error blockquote{
			font-size: 25px;
			font-family: 'Walkway';
		}
	}
	</style>
@endsection

