@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('users.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Event Lists</a>

            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>
                <div class="card-body">
                	<div class="col-md-8">

                		@if(session('status'))
                		<div class="alert alert-success">
                			{{session('status')}}
                		</div>
                		@endif

                		<form
                		enctype="multipart/form-data"
                		class="bg-white shadow-sm p-3"
                		action="{{route('event.store')}}"
                		method="POST">
                		@csrf
                		<label for="title">Title</label>
                		<input
                		class="form-control {{$errors->first('title') ? "is-invalid": ""}}" placeholder="Event Title" type="text"
                            name="title" id="tite" />
                            <div class="invalid-feedback">
                               {{$errors->first('tite')}}
                           </div>
                		<br>
                		<label for="quotes">Slogan</label>
                		<textarea
                        name="quotes"
                        id="quotes"
                        class="form-control {{$errors->first('quotes') ? "is-invalid" : ""}}"
                        value="{{old('quotes')}}" placeholder="Event slogan"></textarea>

                        <div class="invalid-feedback">
                            {{$errors->first('quotes')}}
                        </div>
                        <br>

                        <label for="cover">Cover</label>
                        <br>
                        <input
                        id="cover"
                        name="cover"
                        type="file"
                        class="form-control">

                        <hr class="my-3">
                        <br>
                        <label for="file">File</label>
                        <br>
                        <input
                        id="file"
                        name="files[]"
                        type="file"
                        class="form-control"
                        multiple="multiple"
                        >

                        <hr class="my-3">
                        <br>

                        <label for="full-featured-non-premium">Content</label>
                        <textarea
                        name="content"
                        id="full-featured-non-premium" class="form-control"
                        class="form-control {{$errors->first('content') ? "is-invalid" : ""}}"
                        value="{{old('content')}}"></textarea>

                        <div class="invalid-feedback">
                            {{$errors->first('content')}}
                        </div>
                        <br>

                        <label for="link">Link</label>
                        <input type="text" name="link" id="link" placeholder="https://your-link-event.com/your-link-event-id" class="form-control {{$errors->first('link') ? 'is-invalid' : ''}}" value="{{old('link')}}">
                        <div class="invalid-feedback">
                            {{$errors->link}}
                        </div>

                		<input
                		class="btn btn-primary"
                		type="submit"
                		value="Save"/>
                	</form>

                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    ul li{
        list-style: none;
    }
</style>
@endsection