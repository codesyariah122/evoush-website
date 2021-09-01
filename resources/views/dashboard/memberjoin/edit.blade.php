@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
<div id="edit-member">
    
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-12 col-xs-12 col-sm-12">
                <a href="{{route('member.index')}}" class="btn btn-sm btn-success mt-2 mb-3">Member Lists</a>
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
                      </pre>
 --}}
                    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                          action="{{route('member.update', [$member->user_id])}}" method="POST">
                        @csrf
                      <input type="hidden" value="PUT" name="_method">
                      <input type="hidden" name="roles[]" value="FOLLOWER">
                      
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{old('name') ? old('name') : $member->name}}" class="form-control">
                        <div class="invalid-feedback">
                          {{$errors->first('name')}}
                        </div>
                      </div>

                      <br>

                      <div class="form-group">
                        <label for="avatar">Profile Picture</label>
                         <br>
                         Current Picture: <br>
                         @if($member->avatar)
                         <img src="{{asset('storage/'.$member->avatar)}}" width="120px" />
                         <br>
                         @else
                         <small class="text-danger">No Picture</small>
                         @endif
                         <br>
                         <input id="avatar" name="avatar" type="file" class="form-control">
                         <small class="text-muted">Kosongkan jika tidak ingin mengubah
                         profile picture</small>
                      </div>

                      <div class="form-group">
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" value="{{old('username') ? old('username') : $member->username}}" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}">

                          <div class="invalid-feedback">
                            {{$errors->first('username')}}
                          </div>
                      </div>
                        <br>

                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" value="{{old('email') ? old('email') : $member->email}}" id="email" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}">
                        <div class="invalid-feedback">
                          {{$errors->first('email')}}
                        </div>
                        <br>
                      </div>

                      <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" value="{{old('phone') ? old('phone') : $member->phone}}" id="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}">
                        <div class="invalid-feedback">
                          {{$errors->first('phone')}}
                        </div>
                        <br>
                      </div>

                        <div class="form-group">
                           <label for="">Status</label>
                           <br/>
                           
                           <input {{$member->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE"
                           type="radio" id="active" name="status"> <label
                           for="active">Active</label>

                           <input {{$member->status == "INACTIVE" ? "checked" : ""}}
                           value="INACTIVE" type="radio"  id="inactive"
                           name="status"> <label for="inactive">Inactive</label>
                           <br>
                        </div>

                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address') ?
                            old('address') : $member->address}}</textarea>
                        <div class="invalid-feedback">
                          {{$errors->first('address')}}
                        </div>
                        <br>
                      </div>


                       <div class="form-group">
                        <label for="province">Province</label>
                        @if($member->province)
                          <select name="province"  class="form-control" id="province">
                            <option value="{{$member->province}}">{{$member->province}}</option>
                            <option value="" data-id="">Ubah Provinsi</option>
                            <option v-for="provins in provinces.provinsi" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">@{{provins.nama}}</option>
                          </select>
                        @else
                          <select name="province" class="form-control" v-on:change="getCity">
                            <option value="" data-id="">Pilih Provinsi</option>
                            <option v-for="provins in provinces.provinsi" v-bind:value="provins.id" :value="provins.id" :data-id="provins.id" id="province">@{{provins.nama}}</option>
                          </select>
                        @endif
                      </div>
                      <br>

                      <div class="form-group">
                        <label for="city">City</label>
                        @if($member->city)
                          <select name="city" class="form-control" id="city">
                            <option value="{{$member->city}}">{{$member->city}}</option>
                            <option value="">Ubah Kota</option>
                            <option v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
                          </select>
                        @else
                          <select name="city" class="form-control" id="city">
                            <option value="">Pilih Kota</option>
                            <option v-for="city in citys.kota_kabupaten" :key="city.id" :value="city.nama">@{{city.nama}}</option>
                          </select>
                        @endif
                      </div>
                      <br>

                      
                       <input class="btn btn-primary" type="submit" value="Update"/>
                      
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
    el:'#edit-member',
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
            this.provinces = res.data        
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