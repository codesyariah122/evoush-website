@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
<div id="add-menu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12">
                <a href="{{route('menus.index')}}" class="btn btn-sm btn-success mt-2 mb-3">List Menu</a>

                    <div class="card">
                        <div class="card-header">{{ __('Create Menu') }}</div>
                        <div class="card-body">
                        	<div class="col-md-8">

                        		@if(session('status'))
                        		<div class="alert alert-success">
                        			{{session('status')}}
                        		</div>
                        		@endif

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                        		<form
                        		enctype="multipart/form-data"
                        		class="bg-white shadow-sm p-3"
                        		action="{{route('menus.store')}}"
                        		method="POST">
                        		@csrf
                        		<label for="name">Name</label>
                        		<input
                        		class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text"
                                    name="name" id="name" value="{{old('name')}}" />
                                    <div class="invalid-feedback">
                                       {{$errors->first('name')}}
                                   </div>
                        		<br>
                                <label for="link">Link</label>
                                <input
                                class="form-control {{$errors->first('link') ? "is-invalid": ""}}" placeholder="Link Menu" type="text"
                                    name="link" id="link" value="{{old('link')}}" />
                                    <div class="invalid-feedback">
                                       {{$errors->first('link')}}
                                   </div>
                                <br>
                                <label for="icon">Icon</label>
                                <input
                                class="form-control {{$errors->first('icon') ? "is-invalid": ""}}" placeholder="Icon Menu" type="text"
                                    name="icon" id="icon" value="{{old('icon')}}" />
                                    <div class="invalid-feedback">
                                       {{$errors->first('icon')}}
                                   </div>
                                <br>
                                <label for="submenu">Submenu</label>
                                <input
                                class="form-control {{$errors->first('submenu') ? "is-invalid": ""}}" placeholder="Submenu" type="text"
                                    name="submenu" id="submenu" value="{{old('submenu')}}" />
                                    <div class="invalid-feedback">
                                       {{$errors->first('submenu')}}
                                   </div>
                                <br>


                                <div class="invalid-feedback">
                                    {{$errors->first('password_confirmation')}}
                                </div>
                        		<br>
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
    </div>
</div>

<script type="text/javascript">
    new Vue({
        el:'#add-menu',
    })
</script>

<style type="text/css">
    ul li{
        list-style: none;
    }
    .show {
        cursor: pointer;
        font-size: 16px!important;
        margin-top: 1.3rem!important;
    }
</style>
@endsection