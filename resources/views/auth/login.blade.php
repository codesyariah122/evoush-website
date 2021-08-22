@if(Auth::check() && Auth::user()->username === "administrator")
{{
    session(['already' => 'Anda sudah melakukan login sebagai administrator'])
}}
<script>
    window.location="{{route('dashboard.evoush')}}"
</script>
@endif
@extends('layouts.auth.app')
@section('title') Evoush::Profile | Login::Page @endsection


@section('content')
<div id="login">
    {{-- <h3 class="text-primary mt-2 mb-5 text-center">Login System</h3> --}}

    <div class="row justify-content-center">
        {{-- @include('layouts.components.logo') --}}
        <h1 class="header-text" style="font-family: 'Walkway';">Administrator Login</h1>
        <blockquote class="blockquote-footer">
            <span class="text-danger">evoush</span> website management content
        </blockquote>
    </div>

    @if(session('status'))
    <div class="alert alert-success">
     {{session('status')}}
    </div>
    @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

                    {{-- <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                        <div class="col-md-8">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="esername" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>Oops ! terjadi kesalahan dalam proses login.<br/>{{$message }} Hubungi pihak Administrator
                                </strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ 'Password yang anda inputkan salah'.$message }}</strong>
                            </span>
                            @enderror
                            <div id="show-password" class="show" v-on:click="showPassword">
                                <div v-if="showing === false">
                                    <span v-html="show"></span> Show
                                </div>
                                <div v-else>
                                    <span v-html="hide"></span> Hide
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <button type="submit" class="btn btn-block btn-hover color-4">
                                {{ __('Login') }}
                            </button>

                            <a @click="historyBack()" class="btn btn-hover color-1 btn-block mt-2 back-btn">Back</a>
                           {{--  @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-danger mx-auto">Register Admin</a>
                            <div class="mb-5"></div>
                            @endif --}}

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>

            </div>

            <style type="text/css">
                .login-page{
                    margin-top: 1rem!important;
                }
                #login-page {
                    background: rgba(255, 255, 255, 0.5);
                }
                .show {
                    cursor: pointer;
                    font-size: 16px!important;
                    margin-top: 1.3rem!important;
                }

                .header-text{
                    background: -webkit-linear-gradient(#eee, #333);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                }

                /*button*/
                .btn-hover {
                    width: 100%;
                    font-size: 16px;
                    font-weight: 600;
                    color: #fff;
                    cursor: pointer;
                    margin: 20px;
                    height: 35px;
                    text-align:center;
                    border: none;
                    background-size: 300% 100%;

                    border-radius: 50px;
                    moz-transition: all .4s ease-in-out;
                    -o-transition: all .4s ease-in-out;
                    -webkit-transition: all .4s ease-in-out;
                    transition: all .4s ease-in-out;
                }

                .btn-hover:hover {
                    background-position: 100% 0;
                    moz-transition: all .4s ease-in-out;
                    -o-transition: all .4s ease-in-out;
                    -webkit-transition: all .4s ease-in-out;
                    transition: all .4s ease-in-out;
                }

                .btn-hover:focus {
                    outline: none;
                }
                .btn-hover.color-1 {
                    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
                    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
                }
                .btn-hover.color-4 {
                    background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);
                    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
                }
                .back-btn{
                    margin-bottom: 15rem!important;
                }
                /*end button*/
                @media (min-width: 992px) {
                    .back-btn{
                        margin-bottom: 0;
                    }
                }
            </style>

            @endsection
