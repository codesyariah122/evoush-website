@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        	<div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-6">
                			<form action="{{route('contact.index')}}">
                				<div class="input-group">
                					<input
                					type="text"
                					class="form-control"
                					placeholder="Filter by contact name"
                					value="{{Request::get('name')}}"
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
                					<a class="nav-link" href="
                					{{route('contact.index')}}">Published</a>
                				</li>
                				<li class="nav-item">
                					<a class="nav-link active" href="
                					{{route('contact.trash')}}">Trash</a>
                				</li>
                			</ul>
                		</div>
                	</div>
                	<hr class="my-3">
                	<div class="row">
                		<div class="col-md-12">
                			<table class="table table-bordered table-responsive">
                				<thead>
                					<tr>
                						<th>Nama</th>
                						<th>Email</th>
                						<th>Phone</th>
                                        <th>Category</th>
                                        <th>Message</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Ip Address</th>
                						<th>Action</th>
                					</tr>
                				</thead>
                				<tbody>
                					@foreach($contacts as $contact)
                					<tr>
                						<td>{{$contact->name}}</td>
                						<td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->category_name}}</td>
                                        <td>{{$contact->message}}</td>
                                        <td>{{$contact->country}}</td>
                                        <td>{{$contact->city}}</td>
                                        <td>{{$contact->ip_address}}</td>
                						<td>
                							<a href="{{route('contact.restore', [$contact->id])}}" class="btn btn-success btn-sm mb-2">Restore</a>

                							<form
                							class="d-inline"
                							action="{{route('contact.deletepermanent', [$contact->id])}}"
                							method="POST"
                							onsubmit="return confirm('Delete this contact permanently?')"
                							>
                							@csrf
                							<input
                							type="hidden"
                							name="_method"
                							value="DELETE"/>

                							<input
                							type="submit"
                							class="btn btn-danger btn-sm"
                							value="Delete"/>
                						</form>
                						</td>
                					</tr>
                					@endforeach
                				</tbody>
                				<tfoot>
                					{{-- <tr>
                						<td colSpan="10">
                							{{$contacts->appends(Request::all())->links()}}
                						</td>
                					</tr> --}}
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