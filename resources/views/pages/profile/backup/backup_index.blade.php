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

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				
				<ul>
					<li>Username : {{$user->username}}</li>
					<li>Name : {{$user->name}}</li>
					<li>Email : {{$user->email}}</li>
					<li>Quotes : {{$user->quotes}}</li>
					@if(Auth::user())
						<li>
							<a class="btn btn-sm btn-primary" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					@endif
				</ul>

			</div>
		</div>
	</div>

@endsection