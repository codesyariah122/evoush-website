<div id="parallax-end-about">
  <div class="parallax" :style="parallax.style">
    <div class="row justify-content-center">
      <div class="caption">
        <div class="container">
          <div class="row no-gutters justify-content-center">
            <div class="col-md-6 col-xs-12 col-sm-12">
              <h1 class="display-4 text-center" style="font-family:'Walkway'; text-transform: lowercase!important; color: #ff3b40;">
                @include('layouts.homepage.partials.brand')<span style="font-size: 4rem;font-weight: 900;" v-html="parallax.brand"></span> 
                <span style="font-family: 'Walkway'; text-transform: capitalize; color: #fff;" v-html="parallax.title"></span>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  new Vue({
    el: '#parallax-end-about',
    data(){
      return {
        parallax: {
          style: {
            'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/management/parallax-management.jpg)`
          },
          brand: "voush",
          title: "Top Leaders"
        }
      }
    }
  })
</script>


<style>
  
  .parallax{
    min-height: 250px; 
    background-size: cover;
    margin:0;
  }

  .caption {
    background:rgba(255,255,255,0.3);
    /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
    position: absolute;
    margin-top: 2rem;
    width: 100%;
    text-align: center;
    color: #fff;
  }
  .caption h2 {
    font-family: 'Walkway', cursive;font-weight:bold;
    text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
    margin-bottom: .9rem;
    font-size: 18px;
  }
  .caption p{
    text-shadow: 0 3px 20px rgba(0, 0, 0, 0.9);
    font-weight: 700;
    width: 90%;
    font-size: 14px;
    text-align: justify;
  }
  .caption a{
    font-size: 18px;
  }
  @media only screen and (max-device-width: 812px) {
    .parallax {
      background-attachment: scroll;
    }
  }
 /*DESKTOP VERSION*/
@media (min-width: 992px) { 
    /* all parallax top and bottom */
    .parallax{
      min-height: 500px; 
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      margin:0;
    }

    .caption {
      background:rgba(255,255,255,0.3);
      /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
      position: absolute;
      margin-top: 15.5rem;
      width: 100%;
      text-align: center;
      color: #fff;
    }
    .caption h2 {
      font-family:Walkway !important;
      font-weight:600;
      text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
      margin-bottom: .9rem;
      font-size: 41px;
    }
    .caption a{
      font-size: 18px;
    }
}
</style>