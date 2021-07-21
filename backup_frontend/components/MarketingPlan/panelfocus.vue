<template>
  <div>
    <div id="panel-focus-home">
      <div class="panel panel-default panel-focus">
        <div class="panel-body panel-body-focus">
          <div v-for="panel in panels">

            <div v-if="panel.id % 2 == 1">
              <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-12">
                  <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                    <img :src="panel.vector" class="img-responsive" style="width: 500px;">
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12 content ganjil">
                  <div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
                    <h1 v-html="panel.header"></h1>
                    <p class="ml-1" v-html="panel.paragraph"></p>
                  </div>
                </div>
              </div>

                <div v-if="panel.anim && panel.id !== 3" class="row justify-content-end mt-2 mb-5">
                  <div class="p-2">
                    <img :src="panel.anim" class="img-responsive anim">
                  </div>
                </div>

                <div v-else>
                  <div class="row justify-content-end mt-2 mb-2">
                            <!--  <div class="p-2 embed-responsive embed-responsive-1by1">
                                <iframe class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe>
                            </div> -->
                            <div class="p-2">
                              <img :src="panel.anim" class="img-responsive anim">
                            </div>
                        </div>
                    </div>

              <h1 class="underline"></h1>

            </div>

              <div v-else class="mb-5">
                <div class="row">
                  <div class="genap col-md-6 col-xs-12 col-sm-12">
                    <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                      <h1 v-html="panel.header"></h1>
                      <p v-html="panel.paragraph"></p>
                    </div>
                  </div>
                  <div class="col-md-6 col-xs-12 col-sm-12 content">
                    <div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
                      <img :src="panel.vector" class="img-responsive" style="width: 500px;">
                    </div>
                  </div>
                </div>
                <div v-if="panel.anim" class="row justify-content-start mt-2 mb-2">
                  <div class="p-2">
                    <img :src="panel.anim" class="img-responsive anim">
                  </div>
                </div>
                
                <h1 class="underline mt-2 mb-3"></h1>

                <div class="col-md-12 col-xs-12 col-sm-12">
                  <div v-if="panel.iframe">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe>
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
  export default {
    data(){
      return {
        panels: [
          {
            id:2,
            header: `Marketing Plan.</span>.`,
            paragraph: `<span><b>evoush</b></span> sebagai merk dagang dari <b>PT. Pineleng Indah Cemerlang</b>, mempunyai standar bisnis terbaik dengan marketing plan lengkap, yang selengkapnya dapat anda simak dalam penjelasan video dari <b>Coach Rifqi</b> berikut ini, silahkan di simak...`,
            anim: "",
            vector: "",
            iframe: 'https://www.youtube.com/embed/2020_7Rtpi4'
          }
        ]
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