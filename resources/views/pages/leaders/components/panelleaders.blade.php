 <div id="panel-focus-about">
  <div class="panel panel-focus">
    <div class="panel-body panel-body-focus">
      <div class="row">
        {{-- <h1 class="underline" style="margin-top: 5rem;"></h1> --}}
        {{-- <pre>
          @{{members[1]}}
        </pre>--}}

        <div v-for="content in contents" class="col-md-12 col-xs-12 col-sm-12 mb-5">
          <a class="image-popup" data-toggle="modal" :data-target="`#modal-member${content.id}`">
            <img :src="content.image" class="img-responsive img-leader" data-toggle="popover" :title="content.name" :data-content="`Click gambar untuk melihat profile ${content.name}`">
          </a>
        </div>
      </div>

      <div class="row">
        <div v-for="member in members" class="col-md-12 col-xs-12 col-sm-12">
          <!-- Modal -->
          <div class="modal fade" :id="`modal-member${member.id}`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-center" id="exampleModalLabel">Profile : @{{member.name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                          
                        <div class="card mb-3">
                          <div class="row no-gutters">
                            <div class="col-md-4">
                              <a :href="`{{asset('storage')}}/${member.avatar}`" class="profile-popup col-sm-4">
                                <img :src="`{{asset('storage')}}/${member.avatar}`" :alt="member.name" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
                              </a>
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title">
                                  @{{member.name}} | @{{member.username}}
                                </h5>
                                <blockquote class="blockquote-footer">
                                  @{{member.quotes}} <br>
                                  <small class="text-info">Quotes By : @{{member.name}}</small>  
                                </blockquote>
                                
                                <h5 class="card-title text-secondary">Social Links @{{member.name}}</h5>
                                  <ul class="socials">
                                    <li>
                                      <a :href="`https://wa.me/${member.phone}?text=Hallo%20${member.name}%20saya%20tertarik%20untuk%20join%20Evoush, %20apa%20anda%20bisa%20bantu%20saya`" target="_blank">
                                        <i class="fab fa-fw fa-2x fa-whatsapp text-success"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a :href="`https://www.facebook.com/${member.facebook}`" target="_blank">
                                        <i class="fab fa-fw fa-2x fa-facebook text-primary"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a :href="`https://www.instagram.com/${member.instagram}`" target="_blank">
                                        <i class="fab fa-fw fa-2x fa-instagram-square"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a :href="member.youtube" target="_blank">
                                        <i class="fab fa-fw fa-2x fa-youtube text-danger"></i>
                                      </a>
                                    </li>
                                    <li>
                                      <a :href="`mailto:${member.email}`" target="_blank">
                                        <i class="fas fa-fw fa-2x fa-envelope-open-text text-warning"></i>
                                      </a>
                                    </li>
                                  </ul>

                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a :href="`/member/${member.username}`" type="button" class="btn btn-primary" target="_blank">Lihat Profile</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>



 <script type="text/javascript">
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'top',
        trigger : 'hover'
      });
      $('.profile-popup').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery: {
          enabled: false
        },
        zoom: {
          enabled: true,
          duration: 300,
          easing: 'ease-in-out',
          opener: function (openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }
      });
    });
    new Vue({
      el: '#panel-focus-about',
      data(){
        return {
          title: 'Management Evoush',
          members: [],
          contents: [
            {id: 3, name: 'Citra Devi Jianti', image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/top-leaders/citra%20devi.jpg'},
            {id: 4, name: 'Saidah Laila', image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/top-leaders/saidah.jpg'},
            {id: 5, name: 'Endang Ekawati, S.E', image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/top-leaders/endang.jpg'},
            {id: 6, name: 'Hendriyanto', image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/top-leaders/hendri.jpg'},
            {id: 8, name: 'Ramhad', image:'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/top-leaders/rahmad.jpg'}
          ],
          member_avatar: '',
        }
      },
      mounted(){
        this.getAllMember()
      },

      methods: {
        getAllMember(){
          axios.get('/api/evoush/top-leaders')
          .then( res => {
            this.members = res.data
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
  width: 90%!important;
  height: 100%!important;
  margin-left: 1.2rem;
}
.panel-body-focus {
  margin-top: 1rem;
  /*padding: 5px;*/
}

.image-popup{
  cursor: pointer;
}
.img-leader{
  width: 300px!important;
  margin-bottom: -2rem!important;
}
.image--profile {
  width: 155px;
  height: 160px;
  margin-top: 5rem!important;
  display: flex;
  justify-content: center;
}

.image--profile-member {
  width: 100px!important;
  height: 100px!important;
  display: flex;
  justify-content: center;
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
/*end panel;*/

/* DESKTOP VERSION */
  @media (min-width: 992px) {

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -8rem;
      /*padding: 12px;*/
      background-color: white;
      margin-left: 3.5rem;
      width: 90%!important;
      height: 100%!important;
      /*height: 50vh;*/
    }
    .panel-body-focus{
      height: 100%!important;
    }
    
    .image-popup{
      cursor: pointer;
    }

    .img-leader{
      width: 100%!important;
      /*height: 70vh!important;*/
    }

    .image--profile {
      width: 155px;
      height: 160px;
      margin-top: -10rem!important;
      display: flex;
      justify-content: center;
    }
    .image--profile-member {
      width: 130px!important;
      height: 130px!important;
      display: flex;
      justify-content: center;
    }

     .socials{
      display: flex;
      flex-wrap: nowrap;
      justify-content: left;
      align-items: left;
      list-style: none;
    }
    .fa-instagram-square {
      color: transparent;
      background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
      background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
      background-clip: text;
      -webkit-background-clip: text;
    }

  }
</style>
