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

        	<a href="{{route('categorymessage.index')}}" class="btn btn-success mt-2 mb-3">Category List</a>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <form
                         class="bg-white shadow-sm p-3"
                         action="{{route('categorymessage.update', [$category->id])}}"
                         method="POST">
                         @csrf
                         <input
                         type="hidden"
                         value="PUT"
                         name="_method">

                         <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="category_name" class="form-control {{$errors->first('category_name') ? "is-invalid" : ""}} " id="name" value="{{old('category_name') ? old('category_name') : $category->category_name}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('category_name')}}
                         </div>
                         <br>

                         <div class="form-group">
                            <label for="name">Caption</label>
                            <input type="text" name="caption" class="form-control {{$errors->first('caption') ? "is-invalid" : ""}} " id="name" value="{{old('caption') ? old('caption') : $category->caption}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('caption')}}
                         </div>
                         <br>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection