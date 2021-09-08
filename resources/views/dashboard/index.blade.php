@extends('layouts.dashboard.global', ['brand' => 'evoush'])
@section('title') {{$title}} @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <b>{{Auth::user()->username}}</b> </div>

                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(in_array("ADMIN", json_decode(Auth::user()->roles)))
                         <b>{{ __('You are logged in ! as a')}} ADMINISTRATOR </b>

                    @elseif(in_array("MEMBER", json_decode(Auth::user()->roles)))
                        <b>{{ __('You are logged in !')}} as a MEMBER SPONSOR </b>
                    @elseif(in_array("FOLLOWER", json_decode(Auth::user()->roles)))
                        <b>{{ __('You are logged in !')}} as a MEMBER </b> | <b>{{Auth::user()->username}}</b>
                        <br>

                        <blockquote class="blockquote-footer">
                            Your Sponsor : <a href="{{route('member.username', [$sponsor->username])}}"><b>{{$sponsor->username}}</b></a>
                        </blockquote>
                    @elseif(in_array("AUTHOR", json_decode(Auth::user()->roles)))
                        <b>{{ __('You are logged in ! as a')}} AUTHOR  | {{Auth::user()->username}}</b>
                    @elseif(in_array("STAFF", json_decode(Auth::user()->roles)))
                        <b>{{ __('You are logged in ! as a')}} STAFF  | {{Auth::user()->username}}</b>
                    @endif
                    {{-- {{Auth::user()->roles}} --}}

                    {{-- {{in_array("ADMIN", json_decode(Auth::user()->roles)) ? "ADMIN" : ""}} --}}

                    {{-- @if(!in_array("ADMIN", json_decode(Auth::user()->roles)))

                    <h1>Anda Login Sebagai Staff</h1>

                    @endif --}}

                    {{-- {{
                        count(array_intersect(["ADMIN"], json_decode(Auth::user()->roles)))
                    }}
 --}}

                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    blockquote{
        font-size: 21px!important;
    }
</style>
@endsection
