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

        	<a href="{{route('products.index')}}" class="btn btn-success mt-2 mb-3">Product List</a>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-8">

                            <form enctype="multipart/form-data" method="POST" action="{{route('products.update', [$product->id])}}" class="p-3 shadow-sm bg-white">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{old('title') ? old('title') : $product->title}}" class="form-control {{$errors->first('title') ? "is-invalid" : ""}} " placeholder="Product Title" id="title">
                                </div>
                                <div class="invalid-feedback">
                                  {{$errors->first('title')}}
                              </div>
                              <br>

                                <div class="form-group">
                                    <label for="cover">Cover</label>
                                    <small class="text-muted">Current cover</small><br>
                                    @if($product->cover)
                                    <img src="{{asset('storage/' . $product->cover)}}" width="96px"/>
                                    @endif
                                    <br><br>
                                    <input
                                    type="file"
                                    class="form-control"
                                    name="cover"
                                    >
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                    cover</small>
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <label for="slider">Slider</label>
                                    <small class="text-muted">Current slider</small><br>
                                    @if($product->slider)
                                    {{-- @php
                                        $sliders = explode(",", $product->slider);
                                        // var_dump($sliders); die;
                                    @endphp --}}

                                    @foreach(json_decode($product->slider, true) as $slider)
                                        <img src="{{asset('storage/product-sliders/' . $slider)}}" width="96px"/>
                                    @endforeach
                                    @endif
                                    <br><br>
                                    <input
                                    type="file"
                                    class="form-control"
                                    name="slider[]" 
                                    multiple="multiple"
                                    >
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                    slider</small>
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{old('slug') ? old('slug') : $product->slug}}" placeholder="enter-a-slug" class="form-control {{$errors->first('slug') ? "is-invalid" : ""}} ">
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('slug')}}
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="full-featured-non-premium">Description</label>
                                    <textarea name="description" id="full-featured-non-premium" class="form-control {{$errors->first('description') ? "is-invalid" : ""}} ">{{old('description') ? old('description') : $product->description}}</textarea>
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('description')}}
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select multiple class="form-control {{$errors->first('categories') ? "is-invalid" : ""}} " name="categories[]"
                                    id="categories"></select>
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('categories')}}
                                </div>
                                <br>

                                <label for="mini-description">Preview Description</label><br>
                                <textarea name="mini_description" id="mini-description" class="form-control {{$errors->first('mini_description') ? "is-invald" : ""}}" placeholder="-Preview Description">{{old('mini_description') ? old('mini_description') : $product->mini_description}}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('mini_description')}}
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="stock">Stock</label><br>
                                    <input type="text" class="form-control {{$errors->first('stock') ? "is-invalid" : ""}}" placeholder="Stock"
                                    id="stock" name="stock" value="{{old('stock') ? old('stock') : $product->stock}}">
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('stock')}}
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control {{$errors->first('price') ? "is-invalid" : ""}}" name="price"
                                    placeholder="Price" id="price" value="{{old('price') ? old('price') : $product->price}}">
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('price')}}
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                       <option {{$product->status == 'PUBLISH' ? 'selected' : ''}}
                                        value="PUBLISH">PUBLISH</option>
                                        <option {{$product->status == 'DRAFT' ? 'selected' : ''}}
                                            value="DRAFT">DRAFT</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary" value="PUBLISH">Update</button>
                            </form>

                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

let categories = {!! $product->categories !!}
categories.forEach(function(category){
  let option = new Option(category.name, category.id, true, true);
  $('#categories').append(option).trigger('change');
});
</script>

@endsection