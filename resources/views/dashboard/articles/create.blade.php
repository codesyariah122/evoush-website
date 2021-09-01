@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        	<a href="{{route('articles.index')}}" class="btn btn-success mt-2 mb-3">Articles List</a>
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

                            {{-- <pre>
                                {{
                                    var_dump($authors)
                                }}
                            </pre> --}}

                            <form
                                action="{{route('articles.store')}}"
                                method="POST"
                                enctype="multipart/form-data"
                                class="shadow-sm p-3 bg-white"
                                >
                                @csrf

                                <label for="title">Title</label> <br>
                                <input type="text" class="form-control {{$errors->first('title') ? "is-invald" : ""}} " name="title"
                                placeholder="Article title" id="title" value="{{old('title')}}">
                                <div class="invalid-feedback">
                                    {{$errors->first('title')}}
                                </div>
                                <br>

                                <label for="category">Category</label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="">Pilih Category Article</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="author">Author</label>
                                <select name="author" class="form-control" id="author">
                                    <option value="">Pilih Author</option>
                                    @foreach($authors as $author)
                                        <option value="{{$author->name}}">{{$author->name}}</option>
                                    @endforeach
                                </select>
                                <br>

                               {{--  <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control {{$errors->first('slug') ? "is-invald" : ""}}" value="{{old('slug')}}">
                                <div class="invalid-feedback">
                                    {{$errors->first('slug')}}
                                </div>
                                <br> --}}

                                <label for="cover">Cover</label>
                                <input type="file" class="form-control {{$errors->first('cover') ? "is-invald" : ""}}" name="cover" id="cover">
                                <div class="invalid-feedback">
                                    {{$errors->first('cover')}}
                                </div>
                                <br>

                                <label for="headline">Headline</label>
                                <textarea name="headline" id="headline" class="form-control {{$errors->first('headline') ? "is-invald" : ""}}" placeholder="-Articles Headline" id="headline">{{old('headline')}}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('headline')}}
                                </div>
                                <br>

                                <label for="full-featured-non-premium">Content</label><br>
                                <textarea name="content" id="full-featured-non-premium" class="form-control {{$errors->first('content') ? "is-invald" : ""}}" placeholder="Article content here">{{old('content')}}</textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('content')}}
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

