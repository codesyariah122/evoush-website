@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
<div id="add-user">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12">
                <a href="{{route('users.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Users List</a>

                    <div class="card">
                        <div class="card-header">{{ __('Create User') }}</div>
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
                        		action="{{route('users.store')}}"
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
                        		<label for="username">Username</label>
                        		<input
                        		class="form-control {{$errors->first('username') ? "is-invalid" : ""}}"
                        		placeholder="username"
                        		type="text"
                        		name="username"
                        		id="username"
                                value="{{old('username')}}"
                                />
                                <div class="invalid-feedback">
                                   {{$errors->first('username')}}
                               </div>
                        		<br>

                                <label for="">Pencapian</label>
                                <br>
                                <input
                                type="checkbox"
                                name="achievements[]"
                                class="{{$errors->first('achievements') ? "is-invalid" : ""
                                    }}"
                                id="STAR-SAPHIRE"
                                value="STAR SAPHIRE">
                                <label for="STAR-SAPHIRE">Star Saphire</label>

                                <input
                                    type="checkbox"
                                    name="achievements[]"
                                    class="{{$errors->first('achievements') ? "is-invalid" : ""}}"
                                id="SAPHIRE"
                                value="SAPHIRE">
                                <label for="SAPHIRE">Saphire</label>
                                <br>

                        		<label for="">Roles</label>
                        		<br>
                        		<input
                        		type="checkbox"
                                class="{{$errors->first('roles') ? "is-invalid" : ""}}"
                        		name="roles[]"
                        		id="ADMIN"
                        		value="ADMIN">
                        		<label for="ADMIN">Administrator</label>
                        		<input
                                class="{{$errors->first('roles') ? "is-invalid" : ""}}"
                        		type="checkbox"
                        		name="roles[]"
                        		id="STAFF"
                        		value="STAFF">
                        		<label for="STAFF">Staff</label>

                        		<input
                                class="{{$errors->first('roles') ? "is-invalid" : ""}}"
                        		type="checkbox"
                        		name="roles[]"
                        		id="CUSTOMER"
                        		value="CUSTOMER">
                        		<label for="CUSTOMER">Customer</label>
                                <div class="invalid-feedback">
                                   {{$errors->first('roles')}}
                               </div>

                               <input
                                class="{{$errors->first('roles') ? "is-invalid" : ""}}"
                                type="checkbox"
                                name="roles[]"
                                id="MEMBER"
                                value="MEMBER">
                                <label for="MEMBER">Member</label>
                                <div class="invalid-feedback">
                                   {{$errors->first('roles')}}
                                </div>
                                <br>
                                
                                <input
                                class="{{$errors->first('roles') ? "is-invalid" : ""}}"
                                type="checkbox"
                                name="roles[]"
                                id="AUTHOR"
                                value="AUTHOR">
                                <label for="AUTHOR">Author</label>
                                <div class="invalid-feedback">
                                   {{$errors->first('roles')}}
                                </div>
                                <br>

                        		<label for="phone">Phone number</label>
                        		<br>
                        		<input
                        		type="text"
                        		name="phone"
                        		class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}" value="{{old('phone')}}">

                                <div class="invalid-feedback">
                                   {{$errors->first('phone')}}
                               </div>

                        		<br>
                        		<label for="address">Address</label>
                        		<textarea
                        		name="address"
                        		id="address"
                        		class="form-control"></textarea>

                        		<br>
                        		<label for="avatar">Foto</label>
                        		<br>
                        		<input
                        		id="avatar"
                        		name="avatar"
                        		type="file"
                        		class="form-control">

                        		<hr class="my-3">
                        		<label for="email">Email</label>
                        		<input
                        		class="form-control {{$errors->first('email') ? "is-invalid" : ""}}"
                        		placeholder="user@mail.com"
                        		type="text"
                        		name="email"
                        		id="email"
                                value="{{old('email')}}"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                        		<br>

                                <label for="quotes">Quotes</label>
                                <textarea
                                name="quotes"
                                id="quotes"
                                class="form-control {{$errors->first('quotes') ? "is-invalid" : ""}}"
                                value="{{old('quotes')}}"></textarea>

                                <div class="invalid-feedback">
                                    {{$errors->first('quotes')}}
                                </div>
                                <br>

                                <label for="full-featured-non-premium">About</label>
                                <textarea
                                name="about"
                                id="full-featured-non-premium" class="form-control"
                                class="form-control"></textarea>
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

                               <div class="form-group">
                                 <label for="facebook">Facebook</label>
                                  <input
                                    class="form-control"
                                    placeholder="Username Facebook" type="text" name="facebook" id="facebook"/>
                               </div>
                                <br>

                                <div class="form-group">
                                  <label for="instagram">Instagram</label>
                                  <input
                                    class="form-control"
                                    placeholder="Username Instagram" type="text" name="instagram" id="instagram"/>
                                </div>
                                <br>

                                <div class="form-group">
                                  <label for="youtube">Youtube</label>
                                  <input
                                    class="form-control"
                                    placeholder="https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw" type="text" name="youtube" id="youtube"/>
                                </div>
                                <br>

                               <div class="form-group">
                                <label for="province">Province</label>
                                  <select name="province" class="form-control" v-on:change="getCity">
                                    <option value="" data-id="">Choose Province</option>
                                    <option v-for="provins in provinces.provinsi" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">@{{provins.nama}}</option>
                                  </select>
                              </div>
                              <br>

                              <div class="form-group">
                                <label for="city">City</label>
                                  <select name="city" class="form-control" id="city">
                                    <option value="">Choose City</option>
                                    <option v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
                                  </select>
                              </div>
                              <br>

                              <div class="form-group">
                                <label for="parallax">Parallax Profile</label>
                                 <input id="parallax" name="parallax" type="file" class="form-control">
                                 <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                 Parallax Image</small>
                              </div>
                               <br>
                               <hr class="my-3">

                               

                        		<label for="password">Password</label>
                        		<input
                        		class="form-control {{$errors->first('password') ? "is-invalid" : ""}} "
                        		placeholder="password"
                        		type="password"
                        		name="password"
                        		id="password"
                                value="{{old('password')}}"/>
                                <div id="show-password" class="show" v-on:click="showPassword">
                                    <div v-if="showing === false">
                                        <span v-html="show"></span> Show
                                    </div>
                                    <div v-else>
                                        <span v-html="hide"></span> Hide
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>
                        		<br>
                        		<label for="password_confirmation">Password Confirmation</label>
                        		<input
                        		class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}} "
                        		placeholder="password confirmation"
                        		type="password"
                        		name="password_confirmation"
                        		id="password_confirmation"
                                value="{{old('password_confirmation')}}"/>

                                <div id="show-password" class="show" v-on:click="showPasswordConfirm">
                                    <div v-if="showingConfirm === false">
                                        <span v-html="show"></span> Show
                                    </div>
                                    <div v-else>
                                        <span v-html="hide"></span> Hide
                                    </div>
                                </div>

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
        el:'#add-user',
        data(){
            return {
                provinces: [],
                citys: [],
                showing: false,
                showingConfirm: false,
                show: `<i class="fas fa-fw fa-eye"></i>`,
                hide: `<i class="fas fa-low-vision"></i>`
            }
        },

        mounted(){
            this.getProvinsi()
        },

        methods: {
            getProvinsi(){
                axios.get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
                .then(res => {
                    this.provinces = res.data        
                })
            },

            getCity(e){
                const id = e.target.value
                axios.get(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`)
                .then(res => {
                    this.citys = res.data
                })
            },

            showPassword(){
                const password = document.querySelector('#password')
                if(password.type === "password"){
                    password.type = "text"
                    this.showing = true
                }else{
                    password.type = "password"
                    this.showing = false
                }           
            },

            showPasswordConfirm(){
                const password = document.querySelector('#password_confirmation')
                if(password.type === "password"){
                    password.type = "text"
                    this.showingConfirm = true
                }else{
                    password.type = "password"
                    this.showingConfirm = false
                }
            }
        },

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