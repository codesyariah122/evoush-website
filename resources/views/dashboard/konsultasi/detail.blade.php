@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div id="sending" class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('consults.index')}}" class="btn btn-sm btn-danger btn-lg text-white mt-2 mb-3">Kembali</a>

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <div v-if="loading">
            	<img src="https://i.pinimg.com/originals/a4/f2/cb/a4f2cb80ff2ae2772e80bf30e9d78d4c.gif" class="img-fluid">
            </div>

            <div v-if="success">
            	<div class="alert alert-success">
            		@{{ message }}
            	</div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('Detail Konsultasi') }}</div>
                <div class="card-body">
                	<ul class="list-group list-group-flush">
                		<li class="list-group-item">
                			Nama : <strong>{{ $consult->fullname }}</strong>
                		</li>
                        <li class="list-group-item">
                            Username: <strong>{{ $consult->username }}</strong>
                        </li>
                		<li class="list-group-item">
                			Phone : <strong>{{ $consult->phone }}</strong>
                		</li>
                		<li class="list-group-item">
                			City : <strong>{{ $consult->city }}</strong>
                		</li>
                		<li class="list-group-item">
                			Usia : <strong>{{ $consult->age }} Tahun</strong>
                		</li>
                		<li class="list-group-item">
                			Jenis Kelamin : <strong>{{ $consult->gender }}</strong>
                		</li>
                		<li class="list-group-item">
                			<strong>Message : </strong><br>
                			<blockquote>
                				{!! $consult->message !!}
                			</blockquote>
                		</li>
                	</ul>
                	@if($consult->status === "INACTIVE")



                		<input type="hidden" name="consult_id" value="{{ $consult->id }}">
                		<input type="hidden" name="status" value="ACTIVE">
                		<input type="hidden" name="message" value="{{ $consult->message }}">
                		<a @click="SendingToDokter" href="https://wa.me/{{ $dokter_phone }}?text={{ $sending }}" class="btn btn-primary mt-5 btn-block" target="_blank">Send To Dokter</a>
                	@endif
                	{{-- <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                        action="{{route('consults.update', [$consult->id])}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" name="status" value="ACTIVE">
	                	<button type="submit" class="btn btn-primary btn-block mt-5">Delivery Question</button>
	                </form> --}}
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