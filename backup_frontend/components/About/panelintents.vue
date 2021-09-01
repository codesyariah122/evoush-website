<template>
	<div>
		<div id="intents-about">
			<div class="container mt-5">
				<div v-for="panel in panels" >
					<div v-if="panel.id % 2 == 1">
						<div class="row">
							<div class="col-md-4">
								<div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
									<h1 v-html="panel.header"></h1>
									<p v-html="panel.paragraph"></p>
								</div>
							</div>
							<div class="col-md-8 col-xs-6 col-sm-6">
								<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<!-- div v-if="panel.iframe" class="embed-responsive embed-responsive-1by1">
										<iframe width="600" height="400" class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe>
									</div> -->
									
									<CarouselVideo/>

									<!-- 
									<div v-else>
										<img :src="panel.vector" class="img-responsive ganjil-img">
									</div> -->
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
						<div class="row justify-content-center mt-5 mb-5">
							<div class="col-md-12 col-xs-12 col-sm-12">
								<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
									<img :src="panel.vector" class="img-responsive intents-about-img">
								</div>
							</div>
							<div class="col-md-12 col-xs-12 col-sm-12 mt-5">
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
	</div>
</template>


<script>
	import CarouselVideo from './carouselvideo'


	export default {
		components:{
			CarouselVideo
		},
		data(){
			return {
				panels: [
					{
						id:1,
						header: `Selamat datang evousher`,
						paragraph: `<b>PT. Pineleng Indah Cemerlang</b> Sebagai landasan hukum dan rumah yang menaungi bahtera bisnis dengan merk dagang  <b>evoush</b>. Ayo kita bangun bersama semangat dalam meraih kesuksesan dalam bisnis.`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/management/PAK%20MUS.jpg",
						iframe: "https://www.youtube.com/embed/WpYLfr7FDXA"
					},
					{
						id: 2,
						header: `Legalitas Merupakan Kekuatan`,
						paragraph: `Segala bentuk bisnis memang perlu landasan hukum yang sah dan tentunya kuat dalam melengkapi standarisasi berbisnis yang memiliki nilai kualitas di era masa kini, bukan hanya melulu tentang bisnis yang menjanjikan di balik itu semua legalitas adalah standarisasi bagi kami. Karena di era perkembangan teknologi nano saat ini semua informasi harus tepat dan jelas berdasarkan landasan hukum yang memayunginya guna mendapatkan hati dalam kepercayaan berbisnis.`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/management/1.jpg",
						anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/management2.gif"
					},
					{
						id: 3,
						header: `Bentuklah team Terbaik Anda dan sadari setiap Potensi  Kesuksesan Bersama di evoush`,
						paragraph: `Skala kesuksesan yang beragam pada setiap individu adalah sebuah potensi yang berhak memiliki tempat terbaik untuk mengolah dan mengembangkannya, di <b>evoush</b> ruang anda untuk mengeksploaris setiap potensi menjadi semakin luas... <details><summary>Baca Selanjutnya</summary> Neraca keberhasilan kita dalam berbisnis tak selamanya dari potensi pribadi dalam mengeksekusi strategy berbisnis, namun adakalanya ide yang fresh dan strategy yang lebih briliant mencuat dari isi kepala pribadi yang lainnya,  dengan menyadari setiap peluang dan kesempatan untuk membuka cakrawala dalam berbisnis, menyatukan setiap ide dan strategy bersama kita yakin kita akan semakin siap untuk menarik setiap peluang terbaik dalam mewujudkan kesuksesan berbisnis dengan income besar yang siap menanti anda.</details>`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/vector_image/vector28.jpg",
						anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim48.gif"
					},
					{
						id: 4,
						header: `Management evoush`,
						paragraph: `Yang menjadi faktor sebuah bisnis cepat berkembang pesat karena adanya management yang solid dan utuh, yang selalu senantiasa menjadi support bagi perkembangan bisnis member-member <b>evoush</b>. Sejatinya menjadi sebuah pemicu semangat untuk selalu percaya dan fokus pada bisnis ini. Berikut lengkapnya profile mengenai management <b>evoush</b> : <br/> <a href="{{route('management')}}" class="btn btn-success mt-3 mb-3">Management Evoush</a>`,
						vector: "",
						anim: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/management1.gif"
					}
				],

				ip:'',
				city: ''
			}
		},
	}
</script>


<style scoped>
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
		width: 100% !important;
		margin-left: -.1rem;
	}
	.ganjil-img{
		width: 300px!important;
	}
	.anim{
		width: 300px!important;
	}

}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#intents-about{
		width: 100%!important;
	}
	#intents-about p{
		font-family: 'Poiret One';
		font-size: 21px;
		margin-top: 1rem!important;
		margin-left: 1.3rem;
		text-align: justify;
		text-indent: 18px;
	}
	.intents-about-img{
		width: 100% !important;
		height: 100% !important;
		margin-left: -.1rem;
	}

	.ganjil-img{
		width: 600px!important;
	}
	.anim{
		width: 600px!important;
	}
}
</style>