@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
               <div class="col-md-6 mt-2"></div>
               <div class="col-md-6">
                   <ul class="nav nav-pills">
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.index')}}">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.index', ['status' =>
                           'publish'])}}">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.index', ['status' =>
                           'draft'])}}">Draft</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.trash')}}">Trash</a>
                       </li>
                   </ul>
               </div>
           </div>
           <hr class="my-3">

        	<a href="{{route('articles.index')}}" class="btn btn-success mt-2 mb-3">
        		Back Article Lists
        	</a>

            @if(session('status'))
                <div class="alert alert-success">
                   {{session('status')}}
               </div>
            @endif

            <form
                action="{{route('articles.index')}}" class="mt-2 mb-2"
                >
                <div class="input-group">
                    <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
                    <div class="input-group-append">
                       <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
               {{--  <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Nutrisi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Kosmetik</a>
                  </li>
                </ul> --}}
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="card mb-3">
                            <img class="card-img-top" src="{{asset('storage/'.$article->cover)}}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">{{$article->title}}</h5>
                              <p class="card-text">{{$article->content}}</p>
                              <blockquote class="blockquote-footer">
                                Category : <b>{{$article->category_name}}</b>
                              </blockquote>
                              <p class="card-text">
                                  <small class="text-muted">
                                    {{
                                      date_format($article->created_at, 'd/m/Y H:i:s')
                                    }} | Author : <b>{{$article->author}}</b>
                                  </small>
                              </p>
                            </div>
                          </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection