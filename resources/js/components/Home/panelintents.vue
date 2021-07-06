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
									<div v-if="panel.iframe" class="embed-responsive embed-responsive-1by1">
										<iframe class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe>
									</div>
									<div v-else>
										<img :src="panel.vector" class="img-responsive intents-home-img">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div v-else>
						<div class="row genap-home">
							<div class="col-md-6 col-xs-6 col-sm-6">
								<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<img :src="panel.vector" class="img-responsive intents-home-img">
								</div>
							</div>
							<div class="col-md-6 col-xs-6 col-sm-6">
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
	export default {
		data(){
			return {
				ip:'',
				city: '',
				panels: [
				{
					id:1,
					header: `Bisnis Income <span>  Fantastis </span> `,
					welcome: `Halo <b style='font-family: lowercase;'>evousher</b>`,
					paragraph: `<b>Jadilah Leader</b> di Kota Anda, Bentuk Jati Diri Anda Sebagai Pebisnis dengan <span> Income Fantastis </span> Hanya di <span style='font-family: lowercase!important;'><b>evoush</b></span>.`,
					vector: "",
					iframe: "https://www.youtube.com/embed/0H81i8_dPmM"
				},
				{
					id:2,
					header: `Tunjukan <span> Strategimu </span> agar semakin dikenal`,
					welcome: '',
					paragraph: `<b>Dedikasikan Diri anda</b> dengan seluruh kemampuan anda, dan buat orang lain tertarik untuk mencoba produk kita. Setiap hasil kerja kerasmu akan dihargai dengan nilai kepuasan oleh pengguna.`,
					vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim32.gif",
				},
				{
					id: 3,
					header: `Bergabung  dan bersinarlah bersama <span>Evoush</span>`,
					welcome:'',
					paragraph: `Berbisnis di <b style='font-family: lowercase;'>evoush</b> merupakan sebuah investasi yang menjanjikan. Setelah anda bergabung , anda akan menjadi bagian dalam bisnis  Bersama kami.Bersama kami merupakan  pilihan yang tepat. Karena, anda akan memiliki pengalaman baru yang mengesankan dalam dunia bisnis . <br/><b style='font-family: lowercase;'>evoush</b> dengan rangkaian produk kesehatan dan kecantikan yang merupakan sebuah modal lengkap bagi diri dan bisnis anda.`,
					vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim33.gif",
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