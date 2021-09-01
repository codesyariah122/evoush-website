 <div id="panel-focus-about">
  <div class="panel panel-focus">
    <div class="panel-body panel-body-focus">
        <div class="row">
          <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="profile-content">

            
              <!-- 
                <pre>
                  {{var_dump($user)}}
                </pre> -->
                <!-- <div v-if="avatar">
                  <img :src="avatar" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
                </div>

                <div v-else>
                  <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/examples/studio-4.jpg" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
                </div>  -->

              <div v-if="profile.avatar">
                <a :href="avatar" class="profile-popup">
                  <img :src="avatar" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
                </a>
              </div>

              <div v-else>
                <img :src="noAvatar" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
              </div>

              
              
              <div class="container mt-3">
                <div class="row justify-content-center">

                  @if(Auth::check() && Auth::user()->username == $user->username)
                    <div class="col-md-4 col-xs-12 col-sm-12">
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Halo {{ucfirst(Auth::user()->name)}}!</strong> Anda telah login menggunakan <b>username : {{Auth::user()->username}} </b>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  @endif


                  
                  <center>
                    <div class="col-12 mt-3 mb-5">
                      <div class="fb-share-button btn-lg" 
                        :data-href="`https://evoush.com/member/${profile.username}`" 
                        data-layout="button_count">
                      </div>
                    </div>

                    <div class="col-md-12 col-xs-12 col-sm-12 mt-3 mb-3">
                      <a href="{{route('marketing.plan')}}" class="btn btn-hover color-4">Marketing Plan</a>
                    </div>

                  </center>
                  
                  {{-- Tabs Profile --}}

                  <div class="col-md-12 col-xs-12 col-sm-12 mt-2 mb-5">
                    <center>
                      <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-fw fa-laptop-house fa-2x"></i></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-address-card fa-fw fa-2x"></i></a>
                        </li>
                        @if(in_array("MEMBER", json_decode($user->roles)))
                          <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-fw fa-users fa-2x"></i></a>
                          </li>
                        @else
                          <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fas fa-fw fa-user-tie fa-2x"></i></a>
                          </li>
                        @endif
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                          <!-- Home -->
                          <!-- <pre>
                            {{
                              var_dump($user)
                            }}
                          </pre> -->

                              <ul style="list-style-type: none;" class="profile-data">
                                <li><h4>@{{name}}</h4></li>     
                                <li><b>@{{profile.city}} | @{{profile.province}}</b></li>
                                {{-- <li><b>@{{profile.username}}</b></li> --}}
                                <div v-if="profile.status">
                                  <li>
                                    <b>Status : </b><span class="badge badge-success text-white">@{{profile.status}}</span>
                                  </li>
                                </div>
                              </ul>
                              <center class="mt-5 mb-5">
                                <h4 class="text-secondary">Lebih lanjut tentang @{{profile.name}}</h4>
                                <ul class="socials">
                                  <li>
                                    <a :href="`https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20tertarik%20untuk%20join%20Evoush, %20apa%20anda%20bisa%20bantu%20saya`" target="_blank">
                                      <i class="fab fa-fw fa-4x fa-whatsapp text-success"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <a :href="`https://www.facebook.com/${profile.facebook}`" target="_blank">
                                      <i class="fab fa-fw fa-4x fa-facebook text-primary"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <a :href="`https://www.instagram.com/${profile.instagram}`" target="_blank">
                                      <i class="fab fa-fw fa-4x fa-instagram-square"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <a :href="profile.youtube" target="_blank">
                                      <i class="fab fa-fw fa-4x fa-youtube text-danger"></i>
                                    </a>
                                  </li>
                                  <li>
                                    <a :href="`mailto:${profile.email}`" target="_blank">
                                      <i class="fas fa-fw fa-4x fa-envelope-open-text text-warning"></i>
                                    </a>
                                  </li>
                                </ul>
                              </center>

                              <div class="col-md-12 mt-3 mb-3">
                                  @if(!Auth::user() && in_array("MEMBER", json_decode($user->roles)))

                                  <div v-if="showing_axios">
                                    <div v-if="error">
                                      <div class="alert alert-danger">
                                        <blockquote class="blockquote-footer"><b class="text-primary">@{{err_msg}}</b></blockquote>
                                        <br>
                                        <span>@{{messages.name}}</span><br>
                                        <span>@{{messages.email}}</span><br>
                                        <span>@{{messages.phone}}</span><br>
                                        <span>@{{messages.password}}</span><br>
                                        <span>@{{messages.password_confirmation}}</span><br>
                                      </div>
                                    </div>

                                    <div v-else>
                                      <div class="alert alert-success">
                                        @{{messages}}
                                        <br>
                                        <a :href="`https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20${name_join}%20telah%20join%20untuk%20menjadi%20member%20anda, %20bisakah%20saya%20dibantu%20untuk%20proses%20aktivasi%20akun%20member%20saya`" target="_blank" class="btn btn-primary mt-2">Aktivasi Akun</a>
                                      </div>
                                    </div>
                                  </div>

                                  <h4 class="text-primary mt-4">Join member @{{profile.username}} : </h4>
                                  <a class="btn btn-success" @click="addNewMember">Join Member</a>

                                  @include('pages.profile.components.formjoin')


                                  @else
                                    <div class="col-md-6 mb-3">
                                      @if(count($joins) > 0)
                                      <div class="alert alert-primary" role="alert">
                                        <b>{{Auth::user()->username}}</b> anda mempunya <b class="text-danger">{{count($joins)}} member </b> baru yang belum di aktivasi, check disini untuk mengaktivasi member anda : <br> <a href="{{route('member.index')}}">Check Member Baru</a>
                                      </div>
                                      @endif
                                    </div>

                                  @endif
                              </div>

                          </div>

                          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                            {{-- Profile --}}
                            <div class="col-12">
                              @if($user->quotes)
                                <blockquote class="text-center text-secondary quotes">
                                  <b>"{{$user->quotes}}"</b>
                                  <br>
                                  <small class="text-dark mt-2">
                                    Quotes by : <b>@{{name}}</b>
                                  </small>
                                </blockquote>
                              @else
                                <blockquote class="text-center text-secondary quotes">
                                  <small class="text-danger mt-2">
                                    <b>@{{name}}</b> belum membuat quotes
                                  </small>
                                </blockquote>
                            @endif
                            </div>

                            @if($user->about)
                            <div class="col-md-6">
                              <h3>Success Story : </h3>
                              <div v-if="profile.about">
                                <p class="text-justify" v-html="profile.about"></p>
                              </div>
                              <div v-else>
                                <small class="text-danger">
                                  @{{profile.username}} @{{profile.about}}
                                </small>
                              </div>
                            </div>
                            @else
                            <div class="col-md-6">
                              <h3>About @{{profile.username}}</h3>
                              <div v-if="profile.about">
                                <p class="text-justify" v-html="profile.about"></p>
                              </div>
                              <div v-else>
                                <small class="text-danger">
                                  @{{profile.username}} belum ada success story
                                </small>
                              </div>
                            </div>
                            @endif

                          </div>
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                            {{-- Member lists --}}

                              <div class="container">
                                <div class="row justify-content-center">
                                  @if(in_array("MEMBER", json_decode($user->roles)))
                                    <div v-if="members.message">
                                      <div class="alert alert-success"><b class="text-info">@{{name}}</b> @{{members.message}}</div>
                                    </div>
                                    <div v-else class="col-md-12">
                                      <div v-for="member in members" class="col-md-4">
                                        <div class="card mb-3">
                                          <div class="row no-gutters">
                                            <div class="col-md-4">
                                              <div v-if="member.avatar">
                                                <img :src="`{{asset('storage')}}/${member.avatar}`" :alt="member.name" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
                                              </div>
                                              <div v-else>
                                                <img :src="noAvatar" :alt="member.name" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
                                              </div>
                                            </div>
                                            <div class="col-md-8">
                                              <div class="card-body">
                                                <h5 class="card-title">
                                                  <a :href="`/member/${member.username}`">@{{member.name}}</a></h5>

                                                  <blockquote class="blockquote-footer">
                                                    @{{member.city}} | @{{member.province}}
                                                  </blockquote>

                                                  <p class="card-text ml-2">Join pada : 
                                                      <small class="text-muted">@{{times}}</small>
                                                  </p>

                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                      
                                      {{-- <pre>
                                        @{{members}}
                                      </pre> --}}
                                    @else
                                    <div class="col-md-4">
                                      <div class="card mb-3">
                                        <div class="row no-gutters">
                                          <div class="col-md-4">
                                            @if($sponsor->avatar)
                                              <img src="{{asset('storage/'.$sponsor->avatar)}}" alt="{{$sponsor->name}}" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
                                            @else
                                              <img :src="noAvatar" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
                                            @endif
                                          </div>
                                          <div class="col-md-8">
                                            <div class="card-body">
                                              <h5 class="card-title">
                                                <a href="{{route('member.username', [$sponsor->username])}}">{{$sponsor->name}}</a>
                                              </h5>
                                              <b>{{in_array("MEMBER", json_decode($sponsor->roles)) ? "SPONSOR MEMBER" : "MEMBER"}}</b>
                                              <br>
                                              <b>Status</b> :<span class="badge badge-success text-white">@{{profile.status}}</span>

                                              <blockquote class="blockquote-footer">
                                                {{$sponsor->quotes}} <br>
                                                <small class="text-secondary">Quotes By : {{$sponsor->username}}</small>
                                              </blockquote>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  @endif

                                </div>
                              </div>
                          </div>
                        </div>
                      </center>
                    </div>


                    {{-- End Tabs --}}

                </div>
              </div>

            </div>
          </div>
        </div>

    </div>
  </div>
</div>



 <script type="text/javascript">
    new Vue({
      el: '#panel-focus-about',
      data(){
        return {
          profile: [],
          avatar: '',
          noAvatar: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg',
          members: [],
          times:[],
          name:'',
          href: '',
          path: window.location.href,
          provinces: [],
          citys: [],
          showing: false,
          showingConfirm: false,
          show: `<i class="fas fa-fw fa-eye"></i>`,
          hide: `<i class="fas fa-low-vision"></i>`,
          results: '',
          response: '',
          success: false,
          field: {},
          messages:{},
          err_msg: '',
          error: false,
          name_join: '',
          showing_axios: false
        }
      },

      mounted(){
        this.getMemberProfile(),
        this.getDataJoinMember(),
        this.getProvinsi()
      },

      methods: {

        addNewMember(){
          $('#newMemberJoin').modal({
            'show': true
          })
        },

        storeNewMember(){
          const password = document.querySelector('#password').value
          const confirm_password = document.querySelector('#password_confirmation').value

          if(password !== confirm_password){
            this.getAlert("Password konfirmasi tidak sama", 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif')
          }else{
             this.field = {
              sponsor_id: document.querySelector('#sponsor_id').value,
              roles: document.querySelector('#roles').value,
              status: document.querySelector('#status').value,
              user_path: document.querySelector('#username_path').value,
              name: document.querySelector('#name').value,
              email: document.querySelector('#email').value,
              phone: document.querySelector('#phone').value,
              province: document.querySelector('#province').value,
              city: document.querySelector('#city').value,
              password: password,
              password_confirmation: confirm_password
            }
            axios.post('/api/member/new-join', this.field)
            .then(res => {
              this.getAlert(res.data.message, 'https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038')
              $('#newMemberJoin').modal('hide')
              this.messages = res.data.message
              this.showing_axios=true
              this.error = false
              this.success = true
              this.name_join = this.field.name
            })
            .catch(err => {
              console.log(err.response.data)
              this.getAlert(err.response.data.message, 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif')
              $('#newMemberJoin').modal('hide')
              this.messages = err.response.data.errors
              this.err_msg = err.response.data.message
              this.showing_axios = true
              this.success = false
              this.error = true
            })
            .finally(() => this.success = true)
          }
          
        },

        getAlert(message, gif){
          Swal.fire({
            title: message,
            width: 600,
            padding: '3em',
            background: '#fff url(https://github.com/codesyariah122/bahan-evoush/blob/main/images/banner/jumbotron5.jpg)',
            backdrop: `
            rgba(0,0,123,0.4)
            url("${gif}")
            left top
            no-repeat
            `
          })
        },

        getMemberProfile()
        {
          const lastURLSegment = this.path.substr(this.path.lastIndexOf('/') + 1);
          axios.get(`/api/member/${lastURLSegment}`)
          .then(res=>{
            this.profile = res.data[0]
            this.avatar = `{{asset('storage/')}}/${res.data[0].avatar}`
            this.name = res.data[0].name.toUpperCase()
          })
        },

        getDataJoinMember()
        {
          const lastURLSegment = this.path.substr(this.path.lastIndexOf('/') + 1);
          axios.get(`/api/member/join/${lastURLSegment}`)
          .then( res => {

            this.members = res.data


            res.data.map(m => {
              let datetimes = new Date(m.created_at)
              switch(datetimes.getMonth()+1){
                case 1:
                var month = 'Januari';
                break;
                case 2:
                var month = 'Februari';
                break;
                case 3:
                var month = 'Maret';
                break;
                case 4:
                var month = 'April';
                break;
                case 5:
                var month = 'Mei';
                break;
                case 6:
                var month = 'Juni';
                break;
                case 7:
                var month = 'Juli';
                break;
                case 8:
                var month = 'Agustus';
                break;
                case 9:
                var month = 'September';
                break;
                case 10:
                var month = 'Oktober';
                break;
                case 11:
                var month = 'November';
                break;
                case 12:
                var month = 'Desember';
                break;
                default:
                var month  = 'Tidak ada';
                break;
              }

              this.times = datetimes.getDate()+'-'+month+'-'+datetimes.getFullYear()+', '+datetimes.getHours()+':'+datetimes.getMinutes()+':'+datetimes.getSeconds()
              // console.log(this.times)
            })
            
          })
        },

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

      }
    })
  </script>
<style>
/*panel*/

.image--profile {
  width: 155px;
  height: 160px;
  margin-top: 5rem!important;
  display: flex;
  justify-content: center;
}

.image--profile-member {
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
}

.quotes{
  font-size: 16px!important;
  font-family: 'Walkway';
  /*color: firebrick;*/
}
.socials{
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  list-style: none;
  font-size: 11px!important;
  margin-left:-2rem!important;
}
.fa-instagram-square {
  color: transparent;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background-clip: text;
  -webkit-background-clip: text;
}
.panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -5rem;
  padding: 12px;
  background-color: white!important;
/*  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;*/
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
  margin-top: -11rem;
  width: 100%;
  /*padding: 5px;*/
}

.list-member{
  list-style: none;
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  margin-top: 7rem!important;
  margin-right: 1.5rem!important;
}
/*end panel;*/

label{
  text-align: left;
}
.modal-body-member{
  text-align: left!important;
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
/*end button*/
/* DESKTOP VERSION */
  @media (min-width: 992px) {
    .profile-content{
      
    }
    .image--profile {
      width: 155px;
      height: 160px;
      margin-top: -10rem!important;
      display: flex;
      justify-content: center;
    }
    .image--profile-member {
      width: 100px;
      height: 100px;
      display: flex;
      justify-content: center;
    }
    .profile-data h1{

    }
    .quotes{
      width: 40%!important;
      font-size: 18px!important;
      font-family: 'Walkway';
      /*color: firebrick;*/
    }
    .socials{
      display: flex;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      list-style: none;
    }
    .fa-instagram-square {
      color: transparent;
      background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
      background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
      background-clip: text;
      -webkit-background-clip: text;
    }

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -8rem;
      /*padding: 12px;*/
      background-color: white;
      margin-left: 3.5rem;
      width: 90%;
      /*height: 50vh;*/
    }
    .panel-body-focus {
      margin-top: 5rem;
      /*padding: 15px;*/
    }
 
    .panel-body-focus p{
      font-size: 18px;
      font-weight: 400;
      text-align: justify;
    }
    
    .list-member{
      list-style: none;
      display: flex;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: center;
      margin-top: 10rem!important;
      margin-right: 3rem!important;
    }

    label{
      text-align: left!important;
    }

    .modal-body-member{
      text-align: left!important;
    }
  }
</style>








<!-- tab profile baru backup -->
<template>
  <div>
    <!-- Tabs Profile -->

    <div class="col-md-12 col-xs-12 col-sm-12 mt-2 mb-5">
      <center>
        <blockquote class="blockquote-footer">
          Tap panel navigasi dibawah untuk pindah / melihat informasi selanjutnya
        </blockquote>

        <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item active">
            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fas fa-fw fa-laptop-house fa-2x"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fas fa-address-card fa-fw fa-2x"></i></a>
          </li>
          <div v-if="role == 'MEMBER'">
            <li class="nav-item">
              <a class="nav-link" id="pills-sponsor-tab" data-toggle="pill" href="#pills-sponsor" role="tab" aria-controls="pills-sponsor" aria-selected="false"><i class="fas fa-fw fa-users fa-2x"></i></a>
            </li>
          </div>
          <div v-else>
            <li class="nav-item">
              <a class="nav-link" id="pills-member-tab" data-toggle="pill" href="#pills-member" role="tab" aria-controls="pills-member" aria-selected="false"><i class="fas fa-fw fa-user-tie fa-2x"></i></a>
            </li>
          </div>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


            <ul style="list-style-type: none;" class="profile-data">
              <li><h4 style="text-transform: capitalize;">{{profile.name}}</h4></li>     
              <li><b>{{profile.city}} | {{profile.province}}</b></li>
              <div v-if="profile.status">
                <li>
                  <b>Status : </b><span class="badge badge-success text-white">{{profile.status}}</span>
                </li>
              </div>
            </ul>
            <center class="mt-5 mb-5">
              <ul class="socials">
                <li>
                  <a :href="`https://wa.me/${profile.phone}?text=Hallo%20${profile.name}%20saya%20tertarik%20untuk%20join%20Evoush, %20apa%20anda%20bisa%20bantu%20saya`" target="_blank">
                    <i class="fab fa-fw fa-4x fa-whatsapp text-success"></i>
                  </a>
                </li>
                <li>
                  <a :href="`https://www.facebook.com/${profile.facebook}`" target="_blank">
                    <i class="fab fa-fw fa-4x fa-facebook text-primary"></i>
                  </a>
                </li>
                <li>
                  <a :href="`https://www.instagram.com/${profile.instagram}`" target="_blank">
                    <i class="fab fa-fw fa-4x fa-instagram-square"></i>
                  </a>
                </li>
                <li>
                  <a :href="profile.youtube" target="_blank">
                    <i class="fab fa-fw fa-4x fa-youtube text-danger"></i>
                  </a>
                </li>
                <li>
                  <a :href="`mailto:${profile.email}`" target="_blank">
                    <i class="fas fa-fw fa-4x fa-envelope-open-text text-warning"></i>
                  </a>
                </li>
              </ul>
            </center>

          </div>

          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container">
              <div class="row justify-content-center">
                <CardAbout :profile-data="profile"/>
              </div>
            </div>
          </div>

          <div v-if="role == 'MEMBER'">
            <div class="tab-pane fade" id="pills-sponsor" role="tabpanel" aria-labelledby="pills-sponsor-tab">
              ini untuk lists member join
            </div>
          </div>

          <div v-else>
            <div class="tab-pane fade" id="pills-member" role="tabpanel" aria-labelledby="pills-member-tab">
              ini untuk sponsor member
            </div>
          </div>

        </div>
      </center>
    </div>
  </div>
</template>


<script>
  import CardAbout from './cardabout'
  
  export default {
    components: {
      CardAbout
    },
    props: ['profileData'],
    data(){
      return {
        roles:this.profileData[0].roles,
        role: '',
        profile: this.profileData[0],
        noAvatar: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg',
        members: {},
        joins: {},
        length: null,
        loading:true,
        results: [],
        showing: false,
        error: false
      }
    },

    mounted(){
      this.checkRoles(),
      this.getMemberJoinActive(),
      this.getMemberJoinInActive()
    },

    methods:{
      checkRoles(){
        const check = this.roles.includes("MEMBER")
        if(check){
          this.role = "MEMBER"
        }else{
          this.role = "FOLLOWER"
        }
      },

      getMemberJoinActive(){
        this.axios
        .get(`/api/member/join/active/${this.profileData[0].username}`)
        .then( res => {
          this.members = res.data
        })
        .catch(err => console.log(err.response))
        .finally(() => this.loading = false)
      },

      getMemberJoinInActive(){
        this.axios
        .get(`/api/member/join/inactive/${this.profileData[0].username}`)
        .then(res => {
          this.joins = res.data
          this.length = this.joins.length
        })
        .catch(err => console.log(err.response))
        .finally(() => this.loading = false)
      },

    }
  }
</script>


<style scoped>
/*panel*/

.image--profile {
  width: 155px;
  height: 160px;
  margin-top: 5rem!important;
  display: flex;
  justify-content: center;
}

.image--profile-member {
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
}

.quotes{
  font-size: 16px!important;
  font-family: 'Walkway';
  /*color: firebrick;*/
}
.socials{
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  list-style: none;
  font-size: 11px!important;
  margin-left:-2rem!important;
}
.fa-instagram-square {
  color: transparent;
  background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
  background-clip: text;
  -webkit-background-clip: text;
}
.panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -5rem;
  padding: 12px;
  background-color: white!important;
/*  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;*/
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
  margin-top: -11rem;
  width: 100%;
  /*padding: 5px;*/
}

.list-member{
  list-style: none;
  display: flex;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  margin-top: 7rem!important;
  margin-right: 1.5rem!important;
}
/*end panel;*/

label{
  text-align: left;
}
.modal-body-member{
  text-align: left!important;
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



/*end button*/
/* DESKTOP VERSION */
@media (min-width: 992px) {
  .profile-content{

  }
  .image--profile {
    width: 155px;
    height: 160px;
    margin-top: -10rem!important;
    display: flex;
    justify-content: center;
  }
  .image--profile-member {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
  }
  .profile-data h1{

  }
  .quotes{
    width: 40%!important;
    font-size: 18px!important;
    font-family: 'Walkway';
    /*color: firebrick;*/
  }
  .socials{
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    list-style: none;
  }
  .fa-instagram-square {
    color: transparent;
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    background-clip: text;
    -webkit-background-clip: text;
  }

  /*panel*/
  .panel-focus{
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
    border-radius: 12px;
    margin-top: -8rem;
    /*padding: 12px;*/
    background-color: white;
    margin-left: 3.5rem;
    width: 90%;
    /*height: 50vh;*/
  }
  .panel-body-focus {
    margin-top: 5rem;
    /*padding: 15px;*/
  }

  .panel-body-focus p{
    font-size: 18px;
    font-weight: 400;
    text-align: justify;
  }

  .list-member{
    list-style: none;
    display: flex;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    margin-top: 10rem!important;
    margin-right: 3rem!important;
  }

  label{
    text-align: left!important;
  }

  .modal-body-member{
    text-align: left!important;
  }
}
</style>













