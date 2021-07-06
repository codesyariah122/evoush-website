<div id="intents-quran">
  <div class="container mt-5">
      <div v-for="panel in panels">
        <div v-if="panel.id % 2 == 1">
        <div class="row">
          <div class="col-md-6">
            <div class="context-quran" data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
              <h1>@{{panel.header}} @{{kota}}</h1>
              <pre>
                {{-- @{{results}} --}}
              </pre>
              <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" v-for="(item, value) in shalats">
                    <b class="text-info"><u>@{{value}}</u> : <span class="text-dark">@{{item}}</span></b>
                  </li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 col-xs-6 col-sm-6 mt-2">
            <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
                <img :src="panel.vector" class="img-responsive ganjil-img">
            </div>
          </div>
        </div>
        <div class="row justify-content-start">
          <div class="p-2">
            <div v-if="panel.anim">
              <img :src="panel.anim" class="img-responsive anim">
            </div>
          </div>
        </div>
      </div>
      <div v-else>
        <div class="row mt-5">
          <div class="col-md-6 col-xs-6 col-sm-6">
            <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
              <img :src="panel.vector" class="img-responsive intents-quran-img">
            </div>
          </div>
          <div class="col-md-4">
            <div data-aos="zoom-out-right" data-aos-easing="ease-in-sine" data-aos-duration="1500">
              <h1 v-html="panel.header"></h1>
              <p class="mt-5" v-html="panel.paragraph"></p>
            </div>
          </div>
        </div>
        <div class="row justify-content-end mb-5">
          <div class="p-2">
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
    el: '#intents-quran',
    data(){
      return {
        ip:'',
        kota: this.getCookie('city'),
        today: '',
        results: [],
        shalats: {},
        panels: [
          {
            id: 2,
            header: `Shalatlah Di Awal  Waktu`,
            quotes: `“Sesungguhnya shalat memiliki waktu yang telah ditetapkan bagi orang beriman.” <br/> (QS. An Nisaa’:103)`,
            paragraph: `Ibnu Jarir dalam kitab tafsirnya berkata, dari Al Auza’i, dari Musa bin Sulaiman, dari Al Qosim bin Mukhoymiroh mengenai firman Allah Ta’ala,
            <b>“Dan datanglah orang-orang setelah mereka yang menyia-nyiakan shalat.” (QS. Maryam: 59)</b>,
            Al Qosim berkata bahwa yang dimaksud ayat ini, “Mereka yang menyia-nyiakan waktu shalat. Sedangkan jika sampai meninggalkan shalat, maka kafir.” Dari Ummu Farwah, ia berkata,
            <b>“Rasulullah shallallahu ‘alaihi wa sallam </b> pernah ditanya, amalan apakah yang paling afdhol. Beliau pun menjawab,
            <b>“Shalat di awal waktunya.” (HR. Abu Daud no. 426. Syaikh Al Albani mengatakan bahwa hadits ini shahih)..</b>`,
            vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/vector_image/muslim7.jpg",
            anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/muslim3.gif"
          },
          {
            id: 3,
            header: 'Jadwal Shalat',
            paragraph: '',
            vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/vector_image/muslim6.jpg",
            anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/muslim2.gif"
          }
        ],
      }
    },
    created(){
      this.getIp(),
      this.getLocation(this.ip),
      this.formatDate()
    },
    mounted(){
      this.getShalat(this.kota, this.today)
    },

    methods: {
      getIp(){
        axios.get('https://api.ipify.org/?format=json')
        .then(res => {
          // console.log(res)
          this.ip = res.data.ip
        })
        .catch(err => console.log(err.message))
      },
      getLocation(ip){
        axios.get(`https://ipapi.co/${ip}/json/`)
        .then(res => {
          this.setCookie('city', res.data.city, 1)
        })
        .catch(err => console.log(err.message))
      },
      getShalat(city, today){
        axios.get(`https://api.pray.zone/v2/times/day.json?city=${city}&date=${today}`)
        .then(res => {
          this.results = res.data.results.datetime[0].times
          // console.log(this.results)
          // const dataShalat = Object.entries(this.results)
          this.shalats = this.results
          // console.log(this.shalats)
          // for(const [key, value] of dataShalat){
          //   console.log(key, value)
          //   this.shalat = `${key} : ${value}`
          // }
          
          // const dataShalat = Object.keys(this.results)
          // dataShalat.forEach(([key, value]) => {
          //   console.log(`${key} : ${value}`)
          //   this.shalat = dataShalat
          // })
        })
        .catch(err => console.log(err.message))
      },

      setCookie(cname, cvalue, exdays){
          const date = new Date()
          date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000))
          const expires = `Expires=${date.toGMTString()}`

          document.cookie=`${cname}=${cvalue};${expires}`;
      },

      getCookie(cname) {
        // console.log(cname)
        let name =`${cname}=`;
        let ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      },

      formatDate() {
        let d = new Date()
        let yy = d.getFullYear()
        let mm = d.getMonth()+1
        let dd = d.getDate()
        if(dd<10) 
        {
          dd='0'+dd;
        } 

        if(mm<10) 
        {
          mm='0'+mm;
        } 

        this.today = `${yy}-${mm}-${dd}`

      }
    }
  })
</script>


<style>
  @media only screen and (max-device-width: 812px) {
    #intents-quran{
      width: 100%!important;
      margin-top: -1rem;
    }

    #intents-quran p{
      text-indent: 21px;
      text-align: justify;
      margin-top: 1rem;
      margin-left: .5rem;
    }
    .intents-quran-img{
      width: 300px !important;
      margin-left: -.5rem!important;
    }
    .context-quran{
      margin-left: -1rem!important;
      /*width: 70%!important;*/
    }
    .ganjil-img{
      width: 300px!important;
      margin-left: -1rem;
    }
    .anim{
      width: 250px!important;
    }

  }
  /* DESKTOP VERSION */
  @media (min-width: 992px) { 
    #intents-quran{
      width: 100%!important;
    }
    #intents-quran .text{
      margin-left: 5rem!important;
      width:100%!important;
    }
    #intents-quran p{
      font-family: 'Poiret One';
      font-size: 21px;
      margin-top: 1rem!important;
      text-align: justify;
      text-indent: 18px;
    }
    .intents-quran-img{
      width: 500px !important;
      height: 400px !important;
      margin-left: -.1rem;
    }

    .ganjil-img{
      width: 600px!important;
    }
   /* .anim{
      width: 600px!important;
    }*/
  }
</style>