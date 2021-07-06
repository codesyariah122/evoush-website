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

        	<a href="{{route('articles.index')}}" class="btn btn-success mt-2 mb-3">Article Lists</a>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <form
                         class="bg-white shadow-sm p-3"
                         action="{{route('articles.update', [$article->id])}}"
                         method="POST">
                         @csrf
                         <input
                         type="hidden"
                         value="PUT"
                         name="_method">

                         <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control {{$errors->first('title') ? "is-invalid" : ""}} " id="title" value="{{old('title') ? old('title') : $article->title}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('title')}}
                         </div>
                         <br>

                         <div class="form-group">
                             <label for="author">Author</label>
                             <input type="text" name="author" class="form-control {{$errors->first('author') ? "is-invalid" : ""}}" id="author" value="{{old('author') ? old('author') : $article->author}}">
                         </div>
                         <div class="invalid-feedback">
                             {{$errors->first('author')}}
                         </div>
                         <br>

                         <div class="form-group">
                             <label for="category">Category</label>
                             <select name="category_id" id="category" class="form-control {{$errors->first('category_id') ? "is-invalid" : ""}}">
                                 <option value="{{old('category_id') ? old('category_id') : $article->category_id }}">{{$article->category_name}}</option>
                                 <option value="">Pilih Category</option>

                                 @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                 @endforeach
                             </select>
                             <div class="invalid-feedback">
                               {{$errors->first('category')}}
                            </div>
                         </div>

                         <div class="form-group">
                            <label for="cover">Cover</label>
                            <small class="text-muted">Current cover</small><br>
                            @if($article->cover)
                            <img src="{{asset('storage/' . $article->cover)}}" width="96px"/>
                            @endif
                            <br>
                            <input
                            type="file"
                            class="form-control mt-2"
                            name="cover"
                            >
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah
                            cover</small>
                        </div>

                        <div class="form-group">
                            <label for="headline">Headline</label>
                            <textarea name="headline" id="headline" class="form-control {{$errors->first('headline') ? "is-invalid" : ""}}">
                                {{old('headline') ? old('headline') : $article->headline}}
                            </textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('headline')}}
                           </div>
                        </div>

                        <div class="form-group">
                            <label for="full-featured-non-premium">Content</label>
                            <textarea
                            name="content"
                            id="full-featured-non-premium" class="form-control"
                            class="form-control {{$errors->first('content') ? "is-invalid" : ""}}">
                                {{old('content') ? old('content') : $article->content}}
                            </textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('content')}}
                           </div>
                            <br>
                        </div>

                        <button 
                        class="btn btn-primary"
                        name="save_action"
                        value="PUBLISH">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection