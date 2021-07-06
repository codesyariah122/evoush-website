<div id="intents-contact">
  <div class="container mt-5">
    <div v-for="panel in panels" >
      <div class="row">
        <div class="col-md-6" id="form-contact">
          <div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
            <h1 v-html="panel.header"></h1>
            <p v-html="panel.paragraph" style="text-align: justify;"></p>
            <blockquote class="text-danger mt-5" style="font-family: Walkway; font-size: 15px; font-weight:800; text-align: justify;">
              @{{panel.quote}}
            </blockquote>
          </div>

          @if(session('status'))
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="alert alert-success">
                {{session('status')}}
              </div>
            </div>
          </div>
          @endif

          @if(session('errors'))
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="alert alert-danger">
                {{session('errors')}}
              </div>
            </div>
          </div>
          @endif

          <div data-aos="zoom-out-left" data-aos-easing="ease-out-sine" data-aos-duration="1500">
            <div class="polaroid">
              
              @include('pages.contact.components.contactform')
              {{-- <div class="polaroid-body">
                <pre>
                  @{{results}}
                </pre>
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-6 col-sm-6">
          <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
            <div v-if="panel.anim">
              <img :src="panel.anim" class="img-responsive anim">
            </div>
          </div>
        </div>
      </div> 
    </div>
  </div>
</div>

<script type="text/javascript">
  new Vue({
    el: '#intents-contact',
    data(){
      return {
        panels: [
          {
            id:1,
            header: `<span style="font-family: 'Walkway';"> Contact Message</span>`,
            paragraph: `<b>Sebagai sarana untuk lebih dekat dengan anda</b> sehingga kami akan selalu terhubung dengan anda <b style="color: #ff3b40;">evousher</b> melalui media komunikasi <i class="fas fa-mobile-alt" style="font-size: 31px;"></i> <b style="color: #ff3b40;">evoush</b>, yang tak terbatas.`,
            quote: `Silahkan isi form berikut dengan benar dan sesuai untuk mengirim pesan ataupun pertanyaan yang ada di benak anda mengenai Bisnis Evoush, Join Evoush Atau apapun mengenai Evoush kepada management / admin kami`,
            vector: "",
            iframe: "https://www.youtube.com/embed/4uY11lCCKUs?rel=0",
            anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/contactus2.gif"
          }
        ],
        categorys: [],
        results: [],
        ip:'',
        codeNumber: '',
        countryCode: '',
        flag: '',
        country: '',
        city: '',
      }
    },
    mounted(){
      this.getCategory(),
      this.getIp(),
      this.getLocation(this.ip)
    },
    methods: {
      getCategory(){
        axios.get('/api/categorymessage/search')
        .then(res => {
          this.categorys = res.data
        })
      },

      getIp(){
        axios.get('https://api.ipify.org/?format=json')
        .then(res => {
          this.ip = res.data.ip
        })
      },

      getLocation(ip){
        axios.get(`https://ipapi.co/${ip}/json/`)
        .then(res => {
          this.results = res.data
          this.codeNumber = res.data.country_calling_code.substring(1)
          this.countryCode = res.data.country_code
          this.flag = `https://www.countryflags.io/${res.data.country_code}/shiny/32.png`
          this.country = res.data.country_name
          this.city = res.data.city
        })
      }
    }
  })
</script>


<style>
  @media only screen and (max-device-width: 812px) {
    #intents-about{
      width: 100%!important;
      margin-top: -1rem;
    }

    #intents-about p{
      text-indent: 21px;
      text-align: justify;
      margin-top: 1rem;
      margin-left: 1rem;
    }
    .intents-about-img{
      width: 320px !important;
      margin-left: -.1rem;
    }
    .ganjil-img{
      width: 300px!important;
    }
    .anim{
      width: 300px!important;
    }

    /* polaroid */
    .polaroid{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
      color: rgba(0, 0, 0, 0.7);
      position: relative;
      /*text-align: center;*/
      margin-bottom: 1rem;
      margin-top:5rem;
      border-radius: 25%;
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

  }
  /* DESKTOP VERSION */
  @media (min-width: 992px) { 
    #intents-about{
      width: 100%!important;
    }
    #intents-about p{
      font-family: 'Poiret One';
      font-size: 23px!important;
      margin-top: 1rem!important;
      margin-left: 1.3rem;
      text-align: justify;
      text-indent: 18px;
    }
    .intents-about-img{
      width: 500px !important;
      height: 400px !important;
      /*margin-left: -.1rem;*/
    }

    .anim{
      width: 600px!important;
    }

    .polaroid{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
      color: rgba(0,0,0,0.7);
      position: relative;
      margin-bottom: 3rem;
      margin-top:2rem;
      border-radius: 5%!important;
      width: 100%!important;
    }
    .polaroid-body{
      width:100%!important;
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

  }
</style>