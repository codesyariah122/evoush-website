@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

	<div class="container">
		<div class="row justify-content-center">
		    <div class="col-12 col-xs-12 col-sm-12">
		        <a href="{{route('users.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Users List</a>
		        @if($user->status === 'INACTIVE')
			        <a href="{{ route('send.email', [Request::segment(4)]) }}" class="btn btn-sm btn-info mt-2 mb-3">Sending Information</a>
			        <form action="{{route('member.activated', [Request::segment(4)])}}" method="POST">
			        	@csrf
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" name="id" value="{{ Request::segment(4) }}">
                        <input type="hidden" name="status" value="ACTIVE">
                        <button type="submit" class="btn btn-danger btn-sm mt-2 mb-3">Activation Member</button>
			        </form>
			    @endif


		        <div class="card">
		            <div class="card-header">{{ __('Detail User') }} | {{$user->name}}</div>
		                <div class="card-body">
		                	<div class="col-md-8">
		                		<ul class="list-group">
		                			@if($sponsor->count() > 0)
			                			<li class="list-group-item">
			                				<strong>Sponsor :
			                					<a href="/dashboard/evoush/users/{{ $sponsor[0]->sponsor_id }}" class="btn-link">
			                						{{ $sponsor[0]->sponsor_username }}
			                					</a>
			                				</strong>
			                			</li>
			                		@endif

			                			<li class="list-group-item">
			                				<b>Name: {{$user->name}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				@if($user->avatar)
			                					<img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
			                				@else
			                					<img src="https://www.seekpng.com/png/detail/72-729756_how-to-add-a-new-user-to-your.png" class="img-fluid rounded-pill" width="100">
			                				@endif
			                			</li>
			                			<li class="list-group-item">
			                				<b>Username: {{$user->username}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				<b>Email: {{$user->email}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				<b>Phone number : {{$user->phone}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				<b>Province : {{$user->province}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				<b>City : {{$user->city}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				<b>Address : {{$user->address ? $user->address : '- / belum menambahkan alamat'}}</b>
			                			</li>
			                			<li class="list-group-item">
			                				Role: <span class="badge badge-primary">
			                					@foreach (json_decode($user->roles) as $role)
			                						{{$role}}
			                					@endforeach
			                				</span>
			                			</li>
			                			<li class="list-group-item">
			                				Achievements : <br>
			                				@if($user->achievements)
				                				@if(in_array("SAPHIRE", json_decode($user->achievements)))
				                					<span class="badge badge-success"><i class="fas fa-fw fa-award"></i> SAPHIRE</span>
				                				@elseif(in_array("STAR SAPHIRE", json_decode($user->achievements)))
				                					<span class="badge badge-primary"><i class="fas fa-fw fa-medal"></i> STAR SAPHIRE</span>
				                				@else
				                					<span class="badge badge-danger">No Achievements</span>
				                				@endif
				                			@else
				                				<span class="badge badge-danger">No Achievements</span>
				                			@endif
			                			</li>
			                			@if($followers->count() > 0)
			                			<li class="list-group-item">
			                				Member : <br>
			                				<ul style="list-style: none;">
			                					@foreach($followers as $follower)
			                					<li>
			                						@if($follower->avatar)
			                						<img src="{{asset('storage/'. $follower->avatar)}}" width="128px"/>
			                						@else
			                						<img src="https://www.seekpng.com/png/detail/72-729756_how-to-add-a-new-user-to-your.png" class="img-fluid rounded-pill" width="100">
			                						@endif
			                						<a href="/dashboard/evoush/users/{{ $follower->user_id }}">{{ $follower->username }}</a>
			                					</li>
			                					@endforeach
			                				</ul>
			                			</li>
			                			@else
			                			<li class="list-group-item">
			                				Member : <br>
			                				<div class="alert alert-info" role="alert">
			                					Belum ada member join !
			                				</div>
			                			</li>
			                			@endif


		                		</ul>


		                	</div>
		                </div>
		        </div>

		    </div>
		</div>
	</div>

@endsection
