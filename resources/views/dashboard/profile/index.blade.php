@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-xs-12 col-sm-12">

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
          
            <div class="card mb-3">
              <img class="card-img-top" src="{{($profile->cover) ? asset('storage/'. $profile->cover) : 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/bg7.jpg'}}" alt="Card image cap">
              <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{($profile->avatar) ? asset('storage/'.$profile->avatar) : 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/examples/studio-4.jpg'}}" class="img-responsive rounded-circle center-block d-block mx-auto">
                    </div>

                    <div class="col-12 mt-2">
                        <h3 class="text-center">{{$profile->username}}</h3>
                    </div>

                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Detail Profile
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <ul style="list-style: none;">
                                          <li><b>Nama : </b> {{$profile->name}} </li>
                                          <li><b>Email : </b> {{$profile->email}} </li>
                                          <li><b>Phone : </b> {{$profile->phone}} </li>
                                          <li><b>Alamat : </b> {{$profile->address}} </li>
                                          <li><b>Kota : </b> {{$profile->city}} | {{$profile->province}} </li>
                                          <li><b>Quotes : </b> {{$profile->quotes}} </li>
                                          <li><b>About : </b> {{$profile->about}} </li>
                                      </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="row justify-content-center mt-5">
                    <div class="col-12">
                        <center>
                            <a href="{{route('profile.edit', [$profile->id])}}" class="btn btn-primary">Edit Profile</a>
                            {{-- <a href="{{route('member.username', ['username' => $profile->username])}}" class="btn btn-success" target="_blank">View Profile</a> --}}
                        </center>
                    </div>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>

<style type="text/css">
    ul li{
        list-style: none;
    }
    .card-body img{
        width: 170px;
        height: 150px;
        margin-top: -7rem!important;
    }
</style>
@endsection