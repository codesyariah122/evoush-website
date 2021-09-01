<template>
	<div>
		<div id="panel-intents-home">
			<div class="container mt-5">

				<div v-for="panel in panels" >
					<div v-if="panel.id % 2 == 1">
						<div class="row">
							<div class="col-md-4">
								<div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">	
									<h1 v-html="panel.header"></h1>
									<div v-if="panel.welcome">
										<span v-html="panel.welcome"></span> <span class="text-primary" v-html="city" style="font-weight:900;"></span>
										<p v-html="panel.paragraph"></p>
									</div>
									<div v-else>
										<p v-html="panel.paragraph"></p>
									</div>
								</div>
							</div>
							<div class="col-md-8 col-xs-8 col-sm-8">
								<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<div v-if="panel.iframe">
										<!-- <iframe class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe> -->
										<video controls>
											<source :src="panel.iframe" type="video/mp4">
											<source src="mov_bbb.ogg" type="video/ogg">
													Your browser does not support HTML video.
										</video>
									</div>
									<div v-else>
										<img :src="panel.vector" class="img-responsive intents-home-img">
									</div>
								</div>
							</div>
							<div v-if="panel.carousel">
								<div class="col-md-12 col-xs-12 col-sm-12 mt-3 mb-5">
									<carousel/>
								</div>
							</div>

						</div>
					</div>
					<div v-else>
						<div class="row genap-home">
							<div class="col-md-8 col-xs-6 col-sm-6">
								<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<div v-if="panel.id == 2">
										<VideoCarousel/>
									</div>
									<div v-else>
										<img :src="panel.vector" class="img-responsive intents-home-img">
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-6 col-sm-6">
								<div data-aos="zoom-out-right" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<h1 v-html="panel.header"></h1>
									<p class="mt-5" v-html="panel.paragraph"></p>
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
	import carousel from './carousel'
	import VideoCarousel from './carouselvideo'

	export default {
		components: {
			carousel,
			VideoCarousel
		},
		data(){
			return {
				ip:'',
				city: '',
				panels: [
				{
					id:1,
					header: `New Product <span>  Evoush </span> `,
					welcome: `Halo <b style='font-family: lowercase;'>evousher</b>`,
					paragraph: `<b>Segera realease</b> product terbaru kami  <span> yang pastinya </span> melalui proses produksi dengan kualitas terbaik yang menjadikan product ini kaya akan manfaat bagi kesehatan kita.`,
					vector: "",
					iframe: "https://github.com/codesyariah122/bahan-evoush/blob/main/videos/teaser/210769414_865265850741933_1297354379708905451_n.mp4?raw=true",
					carousel: true
				},
				{
					id:2,
					header: `<span> Product-product </span> unggulan dengan kualitas terbaik di tiap category nya`,
					welcome: '',
					paragraph: `<b>Komoditas </b> unggulan bagi dunia usaha tentunya adalah product-product nya, selain kualitas tentunya ada banyak faktor lain seperti design package nya terlebih hingga ke nilai manfaatnya. Kami mengedepankan segala faktor terbaik dan unggulan diatas, tentunya sebagai kelengkapan bisnis kita di evoush.`,
					vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim32.gif",
					carousel: false
				},
				{
					id: 3,
					header: `Bergabung  dan bersinarlah bersama <span>Evoush</span>`,
					welcome:'',
					paragraph: `Berbisnis di <b style='font-family: lowercase;'>evoush</b> merupakan sebuah investasi yang menjanjikan. Setelah anda bergabung , anda akan menjadi bagian dalam bisnis  Bersama kami.Bersama kami merupakan  pilihan yang tepat. Karena, anda akan memiliki pengalaman baru yang mengesankan dalam dunia bisnis . <br/><b style='font-family: lowercase;'>evoush</b> dengan rangkaian produk kesehatan dan kecantikan yang merupakan sebuah modal lengkap bagi diri dan bisnis anda.`,
					vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim33.gif",
					carousel: false
				}
				]
			}
		},

		beforeMount(){
			this.getIp(),
			this.getLocation(this.ip)
		},
		methods: {
			getIp(){
				this.axios
				.get('https://api.ipify.org/?format=json')
				.then(res => {
		        	// console.log(res)
		        	this.ip = res.data.ip
        		})
        		.catch(err => console.log(err.message))
			},
			getLocation(ip){
				this.axios
				.get(`https://ipapi.co/${ip}/json/`)
				.then(res => {
					this.city = res.data.city
				})
				.catch(err => console.log(err.message))
			}
		}
		
	}
</script>


<style scoped>
@media only screen and (max-device-width: 812px) {
	#intents-home{
		width: 100%!important;
		margin-top: -1rem;
	}

	#panel-intents-home p{
		text-indent: 21px;
		text-align: justify;
		margin-top: 1rem;
		margin-left: 1rem;
	}
	#panel-intents-home h1{
		text-transform: uppercase;
	}
	#panel-intents-home video{
      width:355px!important;
      margin-top:1rem!important;
    }
	.intents-home-img{
		width: 300px !important;
		height: 300px !important;
		margin-left: -.1rem;
	}

}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#panel-intents-home{
		width: 100%!important;
	}
	#panel-intents-home p{
		font-family: 'Poiret One';
		font-size: 21px!important;
		margin-top: 1rem!important;
		margin-left: 1.3rem;
		text-align: justify;
		text-indent: 18px;
	}

	#panel-intents-home h1{
		text-transform: uppercase;
	}
	#panel-intents-home video{
      width:650px!important;
      margin-top: -1rem!important;
    }
	.genap-home {
		margin-top: 3rem;
		/*margin-bottom: 3rem;*/
	}

	.genap-home img{
		width: 800px !important;
		margin-left: -7rem;
	}
}
</style>>