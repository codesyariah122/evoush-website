@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	
        	<div class="row">
        		<div class="col-md-6">			
		        	<form action="{{route('contact.index')}}" class="mt-2 mb-3">
		        		<div class="input-group">
		        			<input
		        			type="text"
		        			class="form-control"
		        			placeholder="Filter by contact name"
		        			name="name">
		        			<div class="input-group-append">
		        				<input
		        				type="submit"
		        				value="Filter"
		        				class="btn btn-primary">
		        			</div>
		        		</div>
		        	</form>
        		</div>

	        	<div class="col-md-6">
	        		<ul class="nav nav-pills card-header-pills">
	        			<li class="nav-item">
	        				<a class="nav-link active" href="
	        				{{route('contact.index')}}">Published</a>
	        			</li>
	        			<li class="nav-item">
	        				<a class="nav-link" href="
	        				{{route('contact.trash')}}">Trash</a>
	        			</li>
	        		</ul>
	        	</div>
        	</div>


        	@if(session('status'))
        	<div class="row">
        		<div class="col-md-12">
        			<div class="alert alert-warning">
        				{{session('status')}}
        			</div>
        		</div>
        	</div>
        	@endif


            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
	             	<div class="row">
						<div class="col-md-12">
					 	<table class="table table-bordered table-stripped table-responsive">
						 <thead>
						 <tr>
						 <th><b>Name</b></th>
						 <th><b>Email</b></th>
						 <th><b>Phone</b></th>
						 <th><b>Category</b></th>
						 <th><b>Message</b></th>
						 <th><b>Country</b></th>
						 <th><b>City</b></th>
						 <th><b>Ip Address</b></th>
						 <th><b>Actions</b></th>
						 </tr>
						 </thead>
						 <tbody>
						 @foreach ($contacts as $contact)
						 <tr>
						 <td>{{$contact->name}}</td>
						 <td>{{$contact->email}}</td>
						 <td>{{$contact->phone}}</td>
						 <td>
						 	{{$contact->category_name}}
						 </td>
						 <td>{{$contact->message}}</td>
						 <td>{{$contact->country}}</td>
						 <td>{{$contact->city}}</td>
						 <td>{{$contact->ip_address}}</td>
						 <td>
						 	<form
						 	class="d-inline"
						 	action="{{route('contact.destroy', [$contact->id])}}"
						 	method="POST"
						 	onsubmit="return confirm('Move contact to trash?')"
						 	>
						 	@csrf
							 	<input
							 	type="hidden"
							 	value="DELETE"
							 	name="_method">
							 	<input
							 	type="submit"
							 	class="btn btn-danger btn-sm"
							 	value="Trash">
							 </form>
						 </td>
						 </tr>
						 @endforeach
						 </tbody>
						 <tfoot>
						 <tr>
						{{--  <td colSpan="10">
						 {{$contacts->appends(Request::all())->links()}}
						 </td> --}}
						 </tr>
						 </tfoot>
					 	</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection