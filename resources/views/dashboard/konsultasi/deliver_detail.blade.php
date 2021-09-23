@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div id="sending" class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('delivers.index')}}" class="btn btn-sm btn-danger btn-lg text-white mt-2 mb-3">Kembali</a>

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif


            <div class="card">
                <div class="card-header">{{ __('Detail Delivery Docter') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach($deliver_details as $detail)
                            <li class="list-group-item">
                                Nama : <strong>{{ $detail->fullname }}</strong>
                            </li>
                            <li class="list-group-item">
                                Phone : <strong>{{ $detail->phone }}</strong>
                            </li>
                            <li class="list-group-item">
                                City : <strong>{{ $detail->city }}</strong>
                            </li>
                            <li class="list-group-item">
                                Usia : <strong>{{ $detail->age }} Tahun</strong>
                            </li>
                            <li class="list-group-item">
                                Jenis Kelamin : <strong>{{ $detail->gender }}</strong>
                            </li>
                            <li class="list-group-item">
                                <strong>Message : </strong><br>
                                <blockquote>
                                    {!! $detail->message !!}
                                </blockquote>
                            </li>
                            <li class="list-group-item">
                                <strong>Jawaban : </strong><br>
                                @if($detail->jawaban)
                                    <blockquote>
                                        {!! $detail->jawaban !!}
                                    </blockquote>
                                @else
                                    <span class="badge badge-danger">{{ 'Belum Terjawab' }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                	{{-- <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                        action="{{route('details.update', [$detail->id])}}" method="POST">
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