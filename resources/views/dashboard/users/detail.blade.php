@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
		    <div class="col-12 col-xs-12 col-sm-12">
		        <a href="{{route('users.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Users List</a>

		        <a href="{{ route('send.email', [$user->id]) }}" class="btn btn-sm btn-info mt-2 mb-3">Sending Information</a>

		        <div class="card">
		            <div class="card-header">{{ __('Detail User') }} | {{$user->name}}</div>
		                <div class="card-body">
		                	<div class="col-md-8">
		                		<b>Name:</b> <br/>
		                		{{$user->name}}
		                		<br><br>
		                		@if($user->avatar)
		                		<img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
		                		@else
		                		No avatar
		                		@endif
		                		<br>
		                		<br>
		                		<b>Username:</b><br>
		                		{{$user->email}}
		                		<br>
		                		<br>
		                		<b>Phone number</b> <br>
		                		{{$user->phone}}
		                		<br><br>
		                		<b>Address</b> <br>
		                		{{$user->address}}

		                		<br>
		                		<br>
		                		<b>Roles:</b> <br>
		                		@foreach (json_decode($user->roles) as $role)
		                		&middot; {{$role}} <br>
		                		@endforeach

		                	</div>
		                </div>
		        </div>

		    </div>
		</div>
	</div>

@endsection
