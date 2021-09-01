@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a href="{{route('categories.create')}}" class="btn btn-sm btn-primary mt-2 mb-3">Create Category</a>
        	<div class="row">
        		<div class="col-md-6">			
		        	<form action="{{route('categories.index')}}" class="mt-2 mb-3">
		        		<div class="input-group">
		        			<input
		        			type="text"
		        			class="form-control"
		        			placeholder="Filter by category name"
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
	        				{{route('categories.index')}}">Published</a>
	        			</li>
	        			<li class="nav-item">
	        				<a class="nav-link" href="
	        				{{route('categories.trash')}}">Trash</a>
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
					 	<table class="table table-bordered table-stripped">
						 <thead>
						 <tr>
						 <th><b>Name</b></th>
						 <th><b>Slug</b></th>
						 <th><b>Image</b></th>
						 <th><b>Actions</b></th>
						 </tr>
						 </thead>
						 <tbody>
						 @foreach ($categories as $category)
						 <tr>
						 <td>{{$category->name}}</td>
						 <td>{{$category->slug}}</td>
						 <td>
						 @if($category->image)
						 <img
						 src="{{asset('storage/' . $category->image)}}"
						 width="48px"/>
						 @else
						 No image
						 @endif
						 </td>
						 <td>
						 	<a href="{{route('categories.edit', [$category->id])}}" class="btn btn-info btn-sm"> Edit </a>
						 	<form
						 	class="d-inline"
						 	action="{{route('categories.destroy', [$category->id])}}"
						 	method="POST"
						 	onsubmit="return confirm('Move category to trash?')"
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
						 <td colSpan="10">
						 {{$categories->appends(Request::all())->links()}}
						 </td>
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