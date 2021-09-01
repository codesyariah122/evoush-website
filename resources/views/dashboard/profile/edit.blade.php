@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection
@section('content')
<div id="edit-profile">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 col-xs-12 col-sm-12">

              <a href="{{route('profile.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Profile List</a>

              <div class="card">
                  <div class="card-header">{{ $title }}</div>
                  <div class="card-body">
                  	<div class="col-md-8">
                  		@if(session('status'))
                  		<div class="alert alert-success">
                  			{{session('status')}}
                  		</div>
                  		@endif

                      {{-- <pre>
                        @{{citys}}
                      </pre>--}}
                      
                  		<form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                          action="{{route('profile.update', [$profile->id])}}" method="POST">
                          @csrf
                        <input type="hidden" value="PUT" name="_method">

                        <div class="form-group">
                          <label for="nama">Fullname</label>
                          <input type="text" name="name" id="name" value="{{old('name') ? old('name') : $profile->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}">

                          <div class="invalid-feedback">
                            {{$errors->first('name')}}
                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                           <label for="avatar">Profile Cover</label>
                           <br>
                           Current Picture: <br>
                           @if($profile->avatar)
                           <img src="{{asset('storage/'.$profile->avatar)}}" width="120px" />
                           <br>
                           @else
                           <small class="text-danger">No Picture</small>
                           @endif
                           <br>
                           <input id="avatar" name="avatar" id="avatar" type="file" class="form-control">
                           <small class="text-muted">Kosongkan jika tidak ingin mengubah
                           profile picture</small>
                           <hr class="my-4">
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" value="{{old('username') ? old('username') : $profile->username}}" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}" 
                          {{(in_array('ADMIN', json_decode(Auth::user()->roles))) ? '' : 'disabled'}}
                          >

                          <div class="invalid-feedback">
                            {{$errors->first('username')}}
                          </div>
                        </div>
                        <br>


                        <input type="hidden" name="roles[]" value="{{in_array('ADMIN', json_decode(Auth::user()->roles)) ? "ADMIN" : ""}}">

                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" id="email" value="{{old('email') ? old('email') : $profile->email}}" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}">

                          <div class="invalid-feedback">
                            {{$errors->first('email')}}
                          </div>
                        </div>
                        <br>

                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address') ?
                        old('address') : $profile->address}}</textarea>
                        <div class="invalid-feedback">
                         {{$errors->first('address')}}
                       </div>
                       <br>

                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="number" name="phone" id="phone" value="{{old('phone') ? old('phone') : $profile->phone}}" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}">

                          <div class="invalid-feedback">
                            {{$errors->first('phone')}}
                          </div>
                        </div>
                        <br>

                        <hr class="my-4">
                        
                        <div class="form-group">
                         <label for="quotes">Quotes</label>
                         <textarea name="quotes" id="quotes" class="form-control {{$errors->first('quotes') ? "is-invalid" : ""}}">{{old('quotes') ?
                         old('quotes') : $profile->quotes}}</textarea>
                         <div class="invalid-feedback">
                           {{$errors->first('quotes')}}
                         </div>
                         <br>
                       </div>

                       <div class="form-group">
                         <label for="cover">Profile Cover</label>
                         <br>
                         Current Cover: <br>
                         @if($profile->cover)
                         <img src="{{asset('storage/'.$profile->cover)}}" width="120px" />
                         <br>
                         @else
                         <small class="text-danger">No Cover</small>
                         @endif
                         <br>
                         <input id="cover" name="cover" type="file" class="form-control">
                         <small class="text-muted">Kosongkan jika tidak ingin mengubah
                         cover</small>
                         <hr class="my-4">
                       </div>

                       <div class="form-group">
                         <label for="about">About</label>
                         <textarea name="about" id="about" class="form-control {{$errors->first('about') ? "is-invalid" : ""}}">{{old('about') ?
                            old('about') : $profile->about}}</textarea>
                            <div class="invalid-feedback">
                             {{$errors->first('about')}}
                         </div>
                       </div>
                       <br>

                       <div class="form-group">
                         <label for="facebook">Facebook</label>
                          <input value="{{old('facebook') ? old('facebook') : $profile->facebook}}"
                            class="form-control {{$errors->first('facebook') ? "is-invalid" : ""}}"
                            placeholder="Username Facebook" type="text" name="facebook" id="facebook"/>
                          <div class="invalid-feedback">
                            {{$errors->first('facebook')}}
                          </div>
                       </div>
                        <br>

                        <div class="form-group">
                          <label for="instagram">Instagram</label>
                          <input value="{{old('instagram') ? old('instagram') : $profile->instagram}}"
                            class="form-control {{$errors->first('instagram') ? "is-invalid" : ""}}"
                            placeholder="Username Instagram" type="text" name="instagram" id="instagram"/>
                          <div class="invalid-feedback">
                            {{$errors->first('instagram')}}
                          </div>
                        </div>
                        <br>

                        <div class="form-group">
                          <label for="youtube">Youtube</label>
                          <input value="{{old('youtube') ? old('youtube') : $profile->youtube}}"
                            class="form-control {{$errors->first('youtube') ? "is-invalid" : ""}}"
                            placeholder="https://www.youtube.com/channel/UCxptCTRqJ5amS9nmztsG7jw" type="text" name="youtube" id="youtube"/>
                          <div class="invalid-feedback">
                            {{$errors->first('youtube')}}
                          </div>
                        </div>
                        <br>

                       <div class="form-group">
                        <label for="province">Province</label>
                        {{-- @if($profile->province) --}}
                        {{-- <pre>
                          @{{provinces}}
                        </pre> --}}
                          <select name="province"  class="form-control" id="province" v-on:change="getCity">
                            <option value="{{$profile->province}}">{{$profile->province}}</option>
                            <option value="" data-id="">Choose Province</option>
                            <option v-for="provins in provinces" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">@{{provins.nama}}</option>
                          </select>
                        {{-- @else
                          <select name="province" class="form-control" v-on:change="getCity">
                            <option value="" data-id="">Choose Province</option>
                            <option v-for="provins in provinces.provinsi" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">@{{provins.nama}}</option>
                          </select>
                        @endif --}}
                      </div>
                      <br>

                      <div class="form-group">
                        <label for="city">City</label>
                        {{-- @if($profile->city) --}}
                          <select name="city" class="form-control" id="city">
                            <option value="{{$profile->city}}">{{$profile->city}}</option>
                            <option v-if="citys" v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
                          </select>
{{--                         @else
                          <select name="city" class="form-control" id="city">
                            <option value="">Choose City</option>
                            <option v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
                          </select>
                        @endif --}}
                      </div>
                      <br>

                      <div class="form-group">
                        <label for="parallax">Parallax Profile</label>
                         <br>
                         Current Parallax: <br>
                         @if($profile->parallax)
                         <img src="{{asset('storage/'.$profile->parallax)}}" width="120px" />
                         <br>
                         @else
                         <small class="text-danger">No Parallax Image</small>
                         @endif
                         <br>
                         <input id="parallax" name="parallax" type="file" class="form-control">
                         <small class="text-muted">Kosongkan jika tidak ingin mengubah
                         Parallax Image</small>
                         <hr class="my-4">
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
  
</div>
 
 <script type="text/javascript">
   new Vue({
    el:'#edit-profile',
      data(){
        return {
          provinces: [],
          citys: []
        }
      },

      mounted(){
        this.getProvinsi()
      },

      methods: {
        getProvinsi(){
          axios.get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')
          .then(res => {
            this.provinces = res.data.provinsi
            console.log(this.provinces)      
          })
        },

        getCity(e){
          const id = e.target.value
          axios.get(`https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`)
          .then(res => {
            this.citys = res.data
          })
        }
      }

   })
 </script> 

@endsection