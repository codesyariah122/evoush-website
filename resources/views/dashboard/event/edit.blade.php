@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('event.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Event List</a>

            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                	<div class="col-md-8">
                		@if(session('status'))
                		<div class="alert alert-success">
                			{{session('status')}}
                		</div>
                		@endif
                		<form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                        action="{{route('event.update', [$event->id])}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <label for="title">Title</label>
                        <input value="{{old('title') ? old('title') : $event->title}}"
                        class="form-control {{$errors->first('title') ? "is-invalid" : ""}}"
                        placeholder="Title Event" type="text" name="title" id="title"/>
                        <div class="invalid-feedback">
                           {{$errors->first('title')}}
                       </div>
                       <br>

                       <label for="quotes">Slogan</label>
                       <textarea
                       name="quotes"
                       id="quotes"
                       class="form-control {{$errors->first('quotes') ? "is-invalid" : ""}}" placeholder="Event slogan">{{old('quotes') ? old('quotes') : $event->quotes}}</textarea>
                       <div class="invalid-feedback">
                        {{$errors->first('quotes')}}
                      </div>
                      <br>

                    <label for="cover">Cover Event</label>
                     <br>
                     Current cover : <br>
                    @if($event->cover)
                    <img src="{{asset('storage/'.$event->cover)}}" width="120px" />
                     <br>
                    @else
                     No cover event
                    @endif
                    <br>
                    <input id="cover" name="cover" type="file" class="form-control">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                     cover</small>
                    <hr class="my-4">

                    <label for="cover">File Event</label>
                     <br>
                     Current file : <br>
                     <td width="600">
                      @if($event->file)
                      <ul>
                        @foreach(json_decode($event->file, true) as $file)
                        <li>
                            <img src="{{asset('storage/event-files/' . $file)}}" width="96px" style="margin-bottom: 15px;"/> <br>
                        </li>
                        @endforeach
                    </ul>
                     @else
                     No event file
                     @endif
                </td>

                    <br>
                    <input id="file" name="files[]" type="file" class="form-control" multiple="multiple">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                     file</small>
                    <hr class="my-4">

                    <label for="full-featured-non-premium">Content</label>
                    <textarea
                     name="content"
                     id="full-featured-non-premium" class="form-control"
                     class="form-control {{$errors->first('content') ? "is-invalid" : ""}}">
                       {{old('content') ? old('content') : $event->content}}
                    </textarea>

                    <div class="invalid-feedback">
                      {{$errors->first('content')}}
                    </div>
                    <br>

                    <label for="link">Link Video/Content</label>
                    <input type="text" name="link" placeholder="https://event-link.com/event-video-id" id="link" class="form-control {{$errors->first('link') ? "is-invalid" : ""}} value="{{old('link') ? old('link') : $event->title}}">
                    <div class="invalid-feedback">
                        {{$errors->first('link')}}
                    </div>
                    <br>

                    <input class="btn btn-primary" type="submit" value="Simpan"/>
                    </form>

                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection