<div id="panel-focus-home">
	<div class="panel panel-default panel-focus">
		<div class="panel-body panel-body-focus">
			<div v-for="panel in panels">	
        <div class="row">
          <div class="col-md-4 col-xs-12 col-sm-12">
            <div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
              <img :src="`{{asset('storage')}}/${panel.cover}`" class="img-responsive" style="width: 400px;">
            </div>
          </div>
          <div class="col-md-6 col-xs-12 col-sm-12 content ganjil">
            <div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
              <h1 v-html="panel.title"></h1>
              <p class="ml-3" style="text-transform: capitalize;">
                @{{panel.quotes}}
              </p>

              <a class="btn btn-primary mt-3" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Lihat Detail
              </a>
              
              <div class="collapse" id="collapseExample">
                <div class="ml-1 mb-5" v-html="panel.content"></div>
                <div v-if="panel.link">
                  <video controls>
                          <source :src="panel.link" type="video/mp4">
                          <source src="mov_bbb.ogg" type="video/ogg">
                           Your browser does not support HTML video.
                  </video>
                </div>

              </div>

            </div>
          </div>
        </div>
			</div>
      {{-- <pre>
        @{{panels}}
      </pre> --}}
		</div>
	</div>
</div>

<script type="text/javascript">
	new Vue({
		el: '#panel-focus-home',
		data(){
			return {
				panels: []
			}
		},
    created(){
      this.getEventData()
    },
    methods: {
      getEventData(){
        axios.get('/api/evoush/event')
        .then(res => {
          this.panels = res.data
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
  margin-top: -2.7rem;
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
  font-size: 18px!important;
  /*text-indent: 21px;*/
  text-align: justify;
  margin-left: -.2rem!important;
  width: 100%;
}
.collapse p{
  font-size: 16px!important;
  margin-left: -.5rem!important;
}
.collapse video{
  width:315px!important;
  margin-left: -.3rem !important;
}

.panel-body-focus a {
  margin-left: 5rem;
  margin-bottom: 2rem;
}
/*end panel;*/

/* end polaroid */

/*mobile setup*/
@media only screen and (max-device-width: 812px) {
  .panel-body-focus img{
    width: 290px!important;
    height: 350px!important;
  }
}
/*end mobile*/

/* DESKTOP VERSION */
  @media (min-width: 992px) { 

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -8rem;
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
      height: 500px;
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
    .collapse video{
      width:650px!important;
      margin-left: -.3rem !important;
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

