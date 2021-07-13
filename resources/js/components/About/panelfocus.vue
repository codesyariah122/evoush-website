<template>
  <div>
    <div class="panel panel-default panel-focus">
      <div class="panel-body panel-body-focus">
        <div v-for="panel in panels">
          <div v-if="panel.id % 2 == 1">
            <div class="row">
              <div class="col-md-6 col-xs-12 col-sm-12">
                <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                  <!-- <img :src="panel.vector" class="img-responsive" style="width: 500px;"> -->

                  <Carousel/>

                </div>
              </div>
              <div class="col-md-4 col-xs-12 col-sm-12 content ganjil">
                <div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
                  <h1 style="font-weight: 900;" v-html="panel.header"></h1>

                  <p class="ml-1">
                    Alamat : <b v-html="panel.lokasi"></b> <br>
                    Jam : Buka - <b v-html="panel.jam"></b> | 
                    <span v-if="status == 'Tutup'" class="text-danger" style="font-weight: bold;" v-html="status"></span> 
                    <span v-else-if="status == 'Belum Buka'" class="text-secondary" style="font-weight: bold;" v-html="status"></span> 
                    <span v-else class="text-success" style="font-weight: bold;" v-html="status"></span>
                    <br>
                    Kesehatan &amp; Keselamatan : <span v-html="panel.kesehatan_keselamatan"></span>
                  </p>
                </div>
              </div>
            </div>

            <div v-if="panel.anim" class="row justify-content-end mt-2 mb-2">
              <div class="p-2">
                <img :src="panel.anim" class="img-responsive anim">
              </div>
            </div>
            <h1 class="underline"></h1>
          </div>

          <div v-else class="mb-5">
            <div class="row">
              <div class="genap col-12 col-xs-12 col-sm-12">
                <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                  <div class="embed-responsive embed-responsive-21by9">
                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" :src="panel.map" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-7.46097&amp;mlon=112.74037#map=17/-7.46097/112.74037&amp;layers=D">View Larger Map</a></small>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>


<script>
  import Carousel from './carousel'

  export default {
    components: {
      Carousel
    },
    data(){
      return {
        status: '',
        time:{
          now: null,
          close: 18,
          buka: 8
        },
        panels: [
        {
          id:1,
          header: `Our Office`,
          lokasi: "Pergudangan sirie, Jl. Raya Rangkah Kidul No.20, Rangkah Kidul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61234",
          jam: "08:00",
          kesehatan_keselamatan: `
          Perlu janji temu <br/> 
          <ol>
          <li>Wajib mengenakan masker</li>
          <li>Wajib mengukur suhu tubuh</li> 
          <li>Staf mengenakan masker</li>
          <li>Staf telah melakukan pengukuran suhu tubuh</li>
          <li>Staf wajib menyemprotkan disinfektan ke permukaan di antara kunjungan pelanggan</li>
          </ol>`,
          map: "https://www.openstreetmap.org/export/embed.html?bbox=112.73208618164064%2C-7.467283443100185%2C112.7485227584839%2C-7.45424124788113&amp;layer=mapnik",
          anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim30.gif",
          vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/kantor/Depan.jpg",
        },

        {
          id:2,
          map: 'https://www.openstreetmap.org/export/embed.html?bbox=112.73625969886781%2C-7.463964422148426%2C112.74447798728944%2C-7.457975227662974&amp;layer=mapnik&amp;marker=-7.460969835154217%2C112.74036884307861',
          anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim30.gif",
          vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/kantor/Depan.jpg",
        }

        ]
      }
    },

    mounted(){
      this.getClose()
    },
    methods: {
      getClose(){
        this.time.now = new Date().getHours()
        if(this.time.now >= this.time.close){
          this.status = "Tutup"
        }else if(this.time.now < this.time.buka) {
          this.status = "Belum Buka"
        }else{
          this.status = "Buka"
        }
      }
    }
  }
</script>

<style scoped>
/*panel*/
.panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -1.7rem;
  padding: 12px;
  background-color: white!important;
  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
  margin-top: 1rem;
  padding: 5px;
}
/*.panel-body-focus img{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);border-radius:0%;
  }*/

  .panel-body-focus p{
    line-height: 25px;
    font-size: 18px;
    /*text-indent: 21px;*/
    text-align: justify;
    margin-left: .1rem!important;
    width: 100%;
  }
  .panel-body-focus a {
    margin-left: 5rem;
    margin-bottom: 2rem;
  }
  /*end panel;*/
  /* polaroid */
  .polaroid{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
    color: rgba(0, 0, 0, 0.7);
    position: relative;
    text-align: center;
    margin-bottom: 1rem;
    margin-top:2rem;
  }

  .polaroid img{
    width: 350px;
    height: 300px;
    margin-top: 1rem;
  }
  .polaroid-body p{
    padding: 15px;
    color:black;
    font-family: 'Poiret One', cursive;font-weight:bold;
    font-size: 25px; 
  }

  .polaroid-body h2{
    padding: 25px;
    color:black;
    font-family: 'Poiret One', cursive;font-weight:bold;
    font-size: 25px;
  }
  /* end polaroid */

  /*mobile setup*/
  @media only screen and (max-device-width: 812px) {
    .panel-focus img{
      width: 290px!important;
      height: 270px!important;
    }
  }
  /*end mobile*/

  /* DESKTOP VERSION */
  @media (min-width: 992px) { 

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -5rem;
      padding: 12px;
      background-color: white;
      margin-left: 3.5rem;
      width: 90%;
      /*height: 50vh;*/
    }
    .panel-body-focus {
      margin-top: .1rem;
      padding: 15px;
    }
    .panel-body-focus img{
      height: 350px;
      /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);*/
    }
    
    .panel-body-focus p{
      font-size: 18px;
      font-weight: 400;
      text-align: justify;
    }
    .panel-body-focus a {
      margin-left: 5rem;
    }
    .panel-body-focus .anim{
      width: 550px;
    }

    /*end panel;*/

    .genap h1{
      margin-left: -.1rem!important;
    }
    .genap p{
      margin-left: -.1rem!important;
    }
    .genap a{
      margin-left: -.1rem!important;
    }

    .ganjil h1{
      margin-left: 8.7rem !important;
    }
    .ganjil p{
      margin-left: 8.7rem !important;
    }
    .ganjil a{
      margin-left: 7rem !important;
    }
    /* content */

    /*polaroid*/
    .polaroid{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
      color: rgba(0,0,0,0.7);
      position: relative;
      text-align: center;
      margin-bottom: 3rem;
      margin-top:2rem;
    }

    .polaroid-body h2{
      padding: 15px;
      color:black;
      font-family: 'Poiret One', cursive;font-weight:bold;
      font-size: 25px;
    }

    .polaroid-body p{
      padding: 15px;
      color:black;
      font-family: 'Poiret One', cursive;font-weight:bold;
      font-size: 25px; 
    }

    .polaroid-vector{
      width: 500px;
      height: 500px;
      margin-top: 1rem;
      margin-left: .1rem;
    }
    /*end polaroid*/

  }
</style>