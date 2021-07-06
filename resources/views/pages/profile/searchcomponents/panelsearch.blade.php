 <div id="panel-focus-search">
  <div class="panel panel-default panel-focus">
    <div class="panel-body panel-body-focus">
      <div class="row justify-content-center">
        <div class="col-8 mb-5 mt-5">
          <h4 class="text-center text-secondary">Kolom Pencarian Member</h4>
          <!-- Another variation with a button -->
          <div class="input-group">
            <input type="text" id="keyword" class="form-control" placeholder="cari berdasarkan nama member" autofocus="on" autocomplete="off" v-on:keyup.13="enterMember($event)">
            <div class="input-group-append">
              <button class="btn btn-danger" id="cari" type="button" v-on:click="getMemberUsername">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>

         <div class="col-md-6 col-xs-6 col-sm-6">
          
          <div v-if="notActive">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Oopps ! </strong> member yang anda cari, belum <span class="text-danger">di aktivasi</span> oleh member sponsor.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>

          <div v-if="error">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Silahkan input ! </strong> nama member yang akan di cari, <span class="text-danger">terlebih dahulu</span>.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>

          <div v-else>
            <div v-if="show">
              <div v-if="empty">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Ooops ! </strong> Member yang anda cari belum <span class="text-danger">Terdaftar</span> atau belum masuk di database kami.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>

              <div v-else>
                <div class="card mb-3">
                  <div v-if="result.cover">
                    <img class="card-img-top" :src="`{{asset('storage/')}}/${result.cover}`" alt="Card image cap">                  
                  </div>
                  <div v-else>
                    <img class="card-img-top" src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/bg7.jpg" alt="Card image cap">
                  </div>
                  <div class="card-body">
                    <div class="row justify-content-center">
                      <div class="col-12">
                        <div v-if="result.avatar">
                          <img :src="`{{asset('storage/')}}/${result.avatar}`" class="img-responsive rounded-circle center-block d-block mx-auto profile-img">
                        </div>
                        <div v-else>
                          <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/examples/studio-4.jpg" class="img-responsive rounded-circle center-block d-block mx-auto profile-img">
                        </div>

                      </div>

                      <div class="col-12 mt-2">
                        <h3 class="text-center mb-3">@{{result.username}}</h3>
                        <center>
                          <div v-if="result.status">
                            <span class="badge badge-success">@{{result.status}}</span>
                          </div>                          
                        </center>
                      </div>

                      {{-- <div class="col-12">
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
                                  <li><b>Nama : </b> @{{result.name}} </li>
                                  <li><b>Email : </b> @{{result.email}} </li>
                                  <li><b>Phone : </b> @{{result.phone}} </li>
                                  <li><b>Alamat : </b> @{{result.address}} </li>
                                  <li><b>Kota : </b> @{{result.city}} | @{{result.province}} </li>
                                  <li><b>Quotes : </b> @{{result.quotes}} </li>
                                  <li><b>About : </b></li>
                                  <li v-html="result.about"></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                    </div>

                    <div class="row justify-content-center mt-5">
                      <div class="col-12">
                        <center>
                          <a :href="`/member/${result.username}`" class="btn btn-success">View Profile</a>
                        </center>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            
            <div v-else> <!-- else show -->
              <h4 class="text-success">Hasil pencarian akan muncul disini ...</h4>
            </div>
            
          </div> <!-- else error -->

        </div>       
      </div>
      
      <h1 class="underline" style="margin-top: 5rem;"></h1>

      <div class="row justify-content-center mb-5">
        <div class="col-md-6">
          <img :src="prolog.vector" class="img-responsive vector">
        </div>

        <div class="col-md-4">
          <p style="font-family: 'Walkway';" v-html="prolog.content">
          </p>
        </div>  
      </div>
      

    </div>
  </div>
</div>

<script type="text/javascript">
  new Vue({
    el: '#panel-focus-search',
    data(){
      return {
        result: {},
        show: false,
        empty:false,
        error: false,
        notActive: false,
        Keyword:'',
        status: '',
        keycode: '',
        prolog: {
          content: `Ketikan nama <span class="text-danger"><b>member</b></span> yang ingin dicari di bagian kolom input pencarian diatas <small class="text-info">(Diharapkan member telah terdaftar sebagai member evoush dan telah mengirimkan data pada team kreatif evoush tentang informasi member evoush tersebut)</small>`,
          vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/search_member_anim1.gif"
        }
      }
    },

    methods: {
      getMember(e){
        const keyword = e.target.value
        axios.get(`/api/member/search/${keyword}`)
        .then(res=>{
          if(res.data.length > 0){
            this.empty = false
            this.show = true
            this.result = res.data[0]
          }else{
            this.empty = true
            this.show = true
          }
        })
      },

      getMemberUsername(){
        const keyword = document.querySelector('#keyword').value
        if(keyword == ''){
          this.error = true
          keyword.value = '' 
          document.getElementById('keyword').value=''
          this.emptyAlert('Ooops !! Sory Sepertinya anda belum mengisi kolom input pencarian', 'https://1.bp.blogspot.com/-WgZXdPd5JwI/XaqDfFjBzBI/AAAAAAAAAOg/9cdjzRQ6o3059FvzG6JuttbEvIykYHtnwCLcBGAsYHQ/s1600/Nyan-Cat-GIF-source.gif')
        }else{
          axios.get(`/api/member/search/${keyword}`)
          .then(res=>{
            if(res.data.length > 0){
              this.empty = false
              this.show = true
              this.result = res.data[0]
              this.status = res.data[0].status
              keyword.value = ''
              document.getElementById('keyword').value=''
              if(res.data[0].status == "INACTIVE"){
                this.Keyword = keyword
                this.empty = true
                this.show = false
                this.notActive = true
                keyword.value = ''
                document.getElementById('keyword').value=''
                this.emptyAlert(`Ooops !! Username <b>${res.data[0].username}</b> belum di aktivasi`, 'https://media.tenor.com/images/f5cb4fb6a45ea2a469fd3ef5b1ad06f8/tenor.gif')
              }else{
                this.emptyAlert(`Okay !! Username <b>${res.data[0].username}</b> ditemukan`, 'https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038')
              }
            }else{
              this.empty = true
              this.show = true
              keyword.value = ''
              document.getElementById('keyword').value=''
              this.emptyAlert('Ooops !! Sory Username yang anda cari nampaknya tidak terdaftar', 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif')
            }
            
          })
        }
      },

      enterMember(event){
        const keyword = event.target.value
        if(keyword == ''){
          this.error = true
          keyword.value = ''
          document.getElementById('keyword').value=''
          this.emptyAlert('Ooops !! Sory Sepertinya anda belum mengisi kolom input pencarian', 'https://1.bp.blogspot.com/-WgZXdPd5JwI/XaqDfFjBzBI/AAAAAAAAAOg/9cdjzRQ6o3059FvzG6JuttbEvIykYHtnwCLcBGAsYHQ/s1600/Nyan-Cat-GIF-source.gif')
        }else{
          this.error = false
          axios.get(`/api/member/search/${keyword}`)
          .then(res => {
            if(res.data.length > 0){
              this.empty = false
              this.show = true
              this.result = res.data[0]
              keyword.value = ''
              document.getElementById('keyword').value=''
              if(res.data[0].status == "INACTIVE"){
                this.Keyword = keyword
                this.empty = true
                this.show = false
                this.notActive = true
                keyword.value = ''
                document.getElementById('keyword').value=''
                this.emptyAlert(`Ooops !! Username <b>${res.data[0].username}</b> belum di aktivasi`, 'https://media.tenor.com/images/f5cb4fb6a45ea2a469fd3ef5b1ad06f8/tenor.gif')
              }else{
                this.emptyAlert(`Okay !! Username <b>${res.data[0].username}</b> ditemukan`, 'https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038')
              }
            }else{
              this.empty = true
              this.show = true
              keyword.value = ''
              document.getElementById('keyword').value=''
              this.emptyAlert('Ooops !! Sory Username yang anda cari nampaknya tidak terdaftar', 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif')
            }
          })
        }
      },

      emptyAlert(message, gif){
        Swal.fire({
          title: message,
          width: 600,
          padding: '1em',
          background: '#fff url(/images/trees.png)',
          backdrop: `
          rgba(0,0,123,0.4)
          url("${gif}")
          left top
          no-repeat
          `
        })
      }
    }
  })
</script>


<style>
  /*panel*/
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
  margin-top: -1rem;
  /*padding: 5px;*/
}
.vector{
  width:300px;
  height: 250px;
}
input:focus{
  background-color: salmon;
}
ul li{
  list-style: none;
}
.card-body img{
  width: 230px!important;
  height: 230px!important;
  margin-top: -7rem!important;
}
.profile-img{
  margin-top: -15rem!important;
}
/*end mobile*/

/* DESKTOP VERSION */
@media (min-width: 992px) { 
input:focus{
  background-color: salmon;
}
ul li{
  list-style: none;
}
.card-body img{
  width: 230px!important;
  height: 230px!important;
  margin-top: -7rem!important;
}
.card-img-top{
  height: 350px!important;
  width: 580px!important;
}
 /*panel*/
 .panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -5.5rem;
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
.panel-body-focus img{
  width: 600px;
  height: 600px;
}
.panel-body-focus p{
  font-size: 23px;
  font-weight: 400;
  text-align: justify;
}


}
</style>
