@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        	<a href="{{route('products.index')}}" class="btn btn-success mt-2 mb-3">Product List</a>
            @if(session('status'))
            <div class="alert alert-success">
               {{session('status')}}
            </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form
                                action="{{route('products.store')}}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="shadow-sm p-3 bg-white"
                                >
                                @csrf
                                <label for="title">Title</label> <br>
                                <input type="text" class="form-control {{$errors->first('title') ? "is-invald" : ""}} " name="title"
                                placeholder="Product title" value="{{old('title')}}">
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                                <br>
                                <label for="cover">Cover</label>
                                <input type="file" class="form-control {{$errors->first('cover') ? "is-invald" : ""}}" name="cover">
                                <div class="invalid-feedback">
                                    {{$errors->first('cover')}}
                                </div>
                                <br>

                                <label for="sliders">Sliders</label>
                                <input type="file"
                                    class="form-control {{$errors->first('slider') ? "is-invald" : ""}}"
                                    name="slider[]" 
                                    multiple="multiple">
                                <div class="invalid-feedback">
                                    {{$errors->first('cover')}}
                                </div>
                                <br>
                                
                                <label for="full-featured-non-premium">Detail Description</label><br>
                                <textarea name="description" id="full-featured-non-premium" class="form-control {{$errors->first('description') ? "is-invald" : ""}}" placeholder="Give a description about this product" value="{{old('description')}}"></textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('description')}}
                                </div>
                                <br>

                                <label for="categories">Categories</label><br>
                                    <select
                                    name="categories[]"
                                    multiple
                                    id="categories"
                                    class="form-control">
                                    </select>
                                <br>

                                <label for="mini-description">Preview Description</label><br>
                                <textarea name="mini_description" id="mini-description" class="form-control {{$errors->first('mini_description') ? "is-invald" : ""}}" placeholder="-Preview Description">{{old('mini_description')}}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('mini_description')}}
                                </div>
                                <br>

                                <label for="stock">Stock</label><br>
                                <input type="number" class="form-control {{$errors->first('stock') ? "is-invald" : ""}}" id="stock" name="stock"
                                min=0 value={{old('stock')}}>
                                <div class="invalid-feedback">
                                    {{$errors->first('stock')}}
                                </div>
                                <br>

                                <label for="Price">Price</label> <br>
                                <input type="number" class="form-control {{$errors->first('price') ? "is-invald" : ""}}" name="price" id="price"
                                placeholder="Book price" value="{{old('price')}}">
                                <div class="invalid-feedback">
                                    {{$errors->first('price')}}
                                </div>
                                <br>
                                <button 
                                class="btn btn-primary"
                                name="save_action"
                                value="PUBLISH">Publish</button>
                                <button
                                class="btn btn-secondary"
                                name="save_action"
                                value="DRAFT">Save as draft</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

