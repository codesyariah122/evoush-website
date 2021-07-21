<div id="hero-about">
	<div class="jumbotron jumbotron-fluid jumbotron-content" :style="image">
		<div class="container">
			<div class="row no-gutters justify-content-end ml-3">
				<div class="col-md-4 col-xs-4 col-sm-4">
					<h1 class="display-4 text-center" style="font-family:'Walkway'; text-transform: lowercase!important; color: #ff3b40; font-weight: 900;"><span style="color: #fff;" v-html="title"></span>
            {{-- @include('layouts.homepage.partials.brand')<span v-html="brand"></span>  --}}
					</h1>
					<p class="blockquote-text text-justify" style="font-size: 21px; color: white;" v-html="paragraph"> </p>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	new Vue({
		el: '#hero-about',
		data(){
			return {
				image: {
					backgroundImage: `url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/jumbotron5.jpg')`
				},
				brand: "voush",
				title: `Contact <span style="color:#ff3b40;">Us</span>`,
				paragraph: `<span style="font-family: Walkway; color: red; font-weight: 1000;">evoush</span> contact page merupakan layanan message yang kami dedikasikan untuk anda para evousher sebagai fasilitas guna menunjang komunikasi kami dengan anda para evousher.`
			}
		}
	})
</script>


<style scoped>
/* jumbotron */

.jumbotron-content {
  /* background-size: cover;
  height: 540px; */
  text-align: center;
  position: relative;
  background-color: #17234E;
/*  margin-bottom: 0;
  height: 100vh;*/
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain
  /*min-height: 100vh;
  width: 100%;*/
  /*-webkit-background-size: cover;
  background-size: cover;
  position: relative;*/
  clip-path: polygon(50% 0%, 100% 0, 100% 89%, 92% 92%, 84% 94%, 50% 100%, 0 100%, 0 59%, 0 0);
  z-index: -1!important;
}

.jumbotron-content .container {
  z-index: 1;
  position: relative;
  margin-top: -5rem!important;
}

.jumbotron-content::after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
  position: absolute;
  bottom: 0;
  /*margin-left: -0.7rem;*/
}

.jumbotron-content .display-4 {
  color: white;
  text-align: center;
  margin-top: 9rem;
  font-weight: 200;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
  margin-bottom: 10px!important;
  font-family: 'Walkway';
}

.jumbotron-content .display-4 span {
  font-weight: 500;
  color: tomato;
}

.jumbotron-content p {
  font-weight: 500;
  font-size: 21px;
  color: #FFFFF0;
  font-family: "Poiret One", cursive;
  font-weight: bold;
}

/* DESKTOP VERSION */
@media (min-width: 992px) { 
  /* jumbotron */
  .jumbotron-content{
    margin-top: -75px;
    height: 840px;
    z-index: -1!important;
    min-height: 100vh;
    width: 100%;
    -webkit-background-size: cover;
    background-size: cover;
    position: relative;
    clip-path: polygon(50% 0%, 100% 0, 100% 89%, 92% 92%, 84% 94%, 50% 100%, 0 100%, 0 59%, 0 0);
  }
  .jumbotron-content .display-4{
    text-transform: capitalize;
  }
  .jumbotron-content p{
    font-size: 31px!important;
  }
}
</style>