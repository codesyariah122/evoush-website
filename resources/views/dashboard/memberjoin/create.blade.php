@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
<div id="add-user">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xs-12 col-sm-12">
                <a href="{{route('member.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Member Lists</a>

                <p>
                    Menambahkan member baru untuk sponsor <b>{{$user->username}}</b>
                </p>
                    <div class="card">
                        <div class="card-header">{{ __('Create New Member') }}</div>
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
                        		action="{{route('member.store')}}"
                        		method="POST">
                        		@csrf

                                <input type="hidden" name="sponsor_id" value="{{$user->id}}">
                                <input type="hidden" name="roles[]" value="FOLLOWER">
                                <input type="hidden" name="status" value="INACTIVE">

                        		<label for="name">Name</label>
                        		<input
                        		class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Format : nama lengkap" type="text"
                                    name="name" id="name" />
                                    <div class="invalid-feedback">
                                       {{$errors->first('name')}}
                                   </div>
                        		<br>

                               <label for="email">Email</label>
                                <input
                                class="form-control {{$errors->first('email') ? "is-invalid" : ""}}"
                                placeholder="Format : user@alamatemail.com (gunakan email aktif anda)"
                                type="text"
                                name="email"
                                id="email" value="{{old('email')}}"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>
                        		<br>

                        		<label for="phone">Phone number</label>
                        		<br>
                        		<input
                        		type="text"
                        		name="phone"
                                placeholder="format: 6282xxxxxxxxx (max: 13digit)"
                        		class="form-control">
                        		<br>

                        		<label for="address">Address</label>
                        		<textarea
                        		name="address"
                        		id="address"
                                placeholder="Format : Jl. Alamat tempat tinggal anda No.xx"
                        		class="form-control"></textarea>

                        		<br>
                        		<label for="avatar">Foto</label>
                        		<br>
                        		<input
                        		id="avatar"
                        		name="avatar"
                        		type="file"
                        		class="form-control">
                                <small class="text-danger">Kosongkan jika tidak ingin mengupload foto</small>

                        		<hr class="my-3">

                                <label for="quotes">Quotes</label>
                                <textarea
                                name="quotes"
                                id="quotes"
                                class="form-control {{$errors->first('quotes') ? "is-invalid" : ""}}"
                                value="{{old('quotes')}}" placeholder="Quotes : maximal karakter 100 karakter"></textarea>

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
                        		value="Kirim"/>
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