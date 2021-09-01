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
                         action="{{route('categories.update', [$category->id])}}"
                         method="POST">
                         @csrf
                         <input
                         type="hidden"
                         value="PUT"
                         name="_method">

                         <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control {{$errors->first('name') ? "is-invalid" : ""}} " id="name" value="{{old('name') ? old('name') : $category->name}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('name')}}
                         </div>
                         <br>

                         <div class="form-group">
                            <label for="name">Category Slug</label>
                            <input type="text" name="slug" class="form-control {{$errors->first('slug') ? "is-invalid" : ""}} " id="name" value="{{old('slug') ? old('slug') : $category->slug}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('slug')}}
                         </div>
                         <br>

                         <div class="form-group">
                            @if($category->image)
                            <span>Current image</span><br>
                            <img src="{{asset('storage/'. $category->image)}}" width="120px">
                            <br><br>
                            @endif
                             <input
                             type="file"
                             class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"
                             name="image">
                             <small class="text-muted">Kosongkan jika tidak ingin mengubah
                             gambar</small>
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