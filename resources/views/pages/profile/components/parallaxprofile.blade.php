<div id="parallax-end-about">
  @if($user->parallax)
	<div class="parallax" :style="parallax.style">
    @else
    <div class="parallax" :style="parallax.cover">
      @endif
		<div class="row justify-content-center">
			<div class="caption">
				<h2 v-html="parallax.caption"></h2>
				<h4 v-html="parallax.company"></h4>
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
						backgroundImage: `url({{asset('storage/'.$user->parallax)}})`,
					},
          cover:{
            backgroundImage: 'url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/registration2.jpg)'
          },
					caption: `{{($user->quotes) ? $user->quotes : 'Belum ada quote'}}`,
					company: `<span style="font-family: 'walkway';color: #ff3b40; font-weight: 900;">Quote by : </span> | <span style="font-family:Walkway; color:#fff;text-shadow: 0 3px 20px rgba(0, 0, 0, 1.5);">{{ucfirst($user->name)}}</span> `
				}
			}
		}
	})
</script>


<style>
  
  .parallax{
    min-height: 300px;
    background-size: cover;
    margin:0;
  }

  .caption {
    background:rgba(255,255,255,0.3);
    /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
    position: absolute;
    margin-top: 3rem;
    width: 100%;
    text-align: center;
    color: #fff;
  }
  .caption h2 {
    font-family: 'Walkway', cursive;font-weight:bold;
    text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
    margin-bottom: .9rem;
    font-size: 21px;
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
      margin-top: 15rem;
      width: 85%;
      text-align: center;
      color: #fff;
    }
    .caption h2 {
      font-family:Walkway !important;
      font-weight:600;
      text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
      margin-bottom: .9rem;
      font-size: 25px;
    }
    .caption p{
      text-shadow: 0 3px 20px rgba(0, 0, 0, 7);
      font-weight: 700;
      width: 90%;
      font-size: 15px;
    }
    .caption a{
      font-size: 18px;
    }
}
</style>