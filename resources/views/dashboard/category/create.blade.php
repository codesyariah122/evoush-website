@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('status'))
            <div class="alert alert-success">
               {{session('status')}}
           </div>
           @endif

        	<a href="{{route('categories.index')}}" class="btn btn-success mt-2 mb-3">Category List</a>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <form
                         enctype="multipart/form-data"
                         class="bg-white shadow-sm p-3"
                         action="{{route('categories.store')}}"
                         method="POST">
                         @csrf
                         <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" id="name">
                         </div>

                         <div class="invalid-feedback">
                             {{$errors->first('name')}}
                         </div>
                         <br>
                         
                         <div class="form-group">
                             <label for="image">Image Category</label>
                             <input type="file" class="form-control {{$errors->first('image') ? "is-invalid" : ""}} " name="image" value="{{old('image')}}">
                         </div>

                         <div class="invalid-feedback">
                             {{$errors->first('image')}}
                         </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection