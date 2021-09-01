<div id="parallax-end-about">
	<div class="parallax" :style="parallax.style">
		<div class="row justify-content-center">
			<div class="caption">
				<!-- <h2 v-html="parallax.caption"></h2> -->
				<h1 v-html="parallax.company"></h1>
				<br>
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
						'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/event/2.jpg)`,
					},
					caption: `Kami adalah sarana bagi <span style="font-family: SpringSakura;">Semangat</span> Anda <br/> untuk <span style="font-family: SpringSakura;"> Membangun </span> <span style="font-family: SpringSakura;">Bisnis</span> yang <span style="font-family: SpringSakura; color: coral;"> Cemerlang</span>`,
					company: `<span style="font-family: 'walkway';color: red; font-weight: 900;">evoush</span> 
					<span style="font-family: 'Walkway'; color: #fff;text-shadow: 0 3px 20px rgba(0, 0, 0, 1.5);">Opportunity</span>`
				}
			}
		}
	})
</script>


<style>
  
  .parallax{
    height: 35vh; 
    background-size: cover;
    margin:0;
  }

  .caption {
    background:rgba(255,255,255,0.3);
    /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
    position: absolute;
    margin-top: 1.5rem;
    width: 100%;
    text-align: center;
    color: #fff;
  }
  .caption h1,h2 {
    font-family: 'Walkway', cursive;font-weight:bold;
    text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
    margin-bottom: .9rem;
    font-size: 21px;
    margin-top: 1rem;
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
    .caption h1, h2 {
      font-family:Walkway !important;
      font-weight:600;
      text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
      margin-bottom: .9rem;
      font-size: 41px!important;
      margin-top: 1.5rem;
    }
    .caption a{
      font-size: 18px;
    }
}
</style>