@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-xs-12 col-sm-12">
			<h4>Send Email To Member</h4>
		</div>

		@if(session('status'))
		<div class="alert alert-danger">
			{{session('status')}}
		</div>
		@endif

		<div class="col-lg-12 col-xs-12 col-sm-12">
			<form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
				action="{{route('sending.email.member')}}" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{ $user->user_id }}">
				<label for="name">Name</label>
				<input value="{{old('name') ? old('name') : $user->name}}"
				class="form-control {{$errors->first('name') ? "is-invalid" : ""}}"
				placeholder="Full Name" type="text" name="name" id="name"/>
				<div class="invalid-feedback">
					{{$errors->first('name')}}
				</div>
				<br>
				<label for="username">Username</label>
				<input value="{{old('username') ? old('username') : $user->username}}" class="form-control {{$errors->first('username') ? "is-invalid" : ""}} "
				placeholder="username" type="text" name="username" id="username"/>
				<div class="invalid-feedback">
					{{$errors->first('username')}}
				</div>
				<br>
				<input value="{{$user->password}}"
				type="hidden" name="password_db"/>
				<br>
				<label for="check_password">Check Password</label>
				<input class="form-control {{$errors->first('check_password') ? "is-invalid" : ""}} "
				placeholder="Check Password" type="password" name="check_password" id="check_password"/>
				<div class="invalid-feedback">
					{{$errors->first('check_password')}}
				</div>
				<br>
				<label for="email">Email</label>
				<input value="{{old('email') ? old('email') : $user->email}}" class="form-control
				{{$errors->first('email') ? "is-invalid" : ""}} "
				placeholder="user@mail.com" type="text" name="email" id="email"/>
				<div class="invalid-feedback">
					{{$errors->first('email')}}
				</div>
				<br>
				<label for="phone">Phone number</label>
				<br>
				<input type="number" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" value="{{old('phone') ?
				old('phone') : $user->phone}}">
				<div class="invalid-feedback">
					{{$errors->first('phone')}}
				</div>
				<br>
				<label for="province">Province</label>
				<input value="{{old('province') ? old('province') : $user->province}}" class="form-control
				{{$errors->first('province') ? "is-invalid" : ""}} " type="text" name="province"/>
				<div class="invalid-feedback">
					{{$errors->first('province')}}
				</div>
				<br>
				<label for="province">City</label>
				<input value="{{old('city') ? old('city') : $user->city}}" class="form-control
				{{$errors->first('city') ? "is-invalid" : ""}} " type="text" name="city"/>
				<div class="invalid-feedback">
					{{$errors->first('city')}}
				</div>
				<br>
				{{-- <label for="full-featured-non-premium">Message</label>
				<div class="invalid-feedback">
					{{$errors->first('message')}}
				</div>
				<textarea name="message" id="full-featured-non-premium" class="form-control {{$errors->first('message') ? "is-invalid" : ""}} mb-5">
					{{old('message') ? old('message') : $user->message}}
				</textarea> --}}

				<button class="btn btn-primary mt-5"> Kirim Email </button>
				<br>
			</form>
		</div>

	</div>
</div>

@endsection
