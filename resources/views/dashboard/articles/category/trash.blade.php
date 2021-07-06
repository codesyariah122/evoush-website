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
                			<form action="{{route('category-article.index')}}">
                				<div class="input-group">
                					<input
                					type="text"
                					class="form-control"
                					placeholder="Filter by category name"
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
                					{{route('category-article.index')}}">Published</a>
                				</li>
                				<li class="nav-item">
                					<a class="nav-link active" href="
                					{{route('category-article.trash')}}">Trash</a>
                				</li>
                			</ul>
                		</div>
                	</div>
                	<hr class="my-3">
                	<div class="row">
                		<div class="col-md-12">
                			<table class="table table-bordered">
                				<thead>
                					<tr>
                						<th>Nama</th>
                						<th>Caption</th>
                						<th>Action</th>
                					</tr>
                				</thead>
                				<tbody>
                					@foreach($categories as $category)
                					<tr>
                						<td>{{$category->category_name}}</td>
                						<td>{{$category->caption}}</td>
                						
                						<td>
                							<a href="{{route('category-article.restore', [$category->id])}}" class="btn btn-success btn-sm">Restore</a>

                							<form
                							class="d-inline"
                							action="{{route('category-article.deletepermanent', [$category->id])}}"
                							method="POST"
                							onsubmit="return confirm('Delete this category permanently?')"
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