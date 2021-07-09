<template>
	<div>
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
						<div class="col-md-8 col-xs-8 col-sm-8">
							<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
								<div v-if="panel.iframe" class="embed-responsive embed-responsive-1by1">
									<iframe class="embed-responsive-item" :src="panel.iframe" allowfullscreen></iframe>
								</div>
								<div v-else>
									<img :src="panel.vector" class="img-responsive panel-cosmetic-img">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div v-else>
					<div class="row genap-kosmetik mb-5">
						<div class="col-md-6 col-xs-6 col-sm-6">
							<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
								<img :src="panel.vector" class="img-responsive panel-cosmetic-img">
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
</template>

<script>
	export default {
		data(){
			return {
				panels: [
					{
						id:1,
							header: `Beauty Evoush`,
							paragraph: `<b>Product Cosmetics Evoush</b> Bukan hanya kaya manfaat, namun setiap product-product kami, akan menjadi sebuah faktor unggul bagi  Bisnis Anda di <b>evoush</b>.`,
						vector: '',
						iframe: "https://www.youtube.com/embed/cpe16Oe9kzY"
					},
					{
						id:2,
							header: 'Kecantikan Yang Menginspirasi',
							paragraph: `<b>Tak Ayal</b> penampilan cantik merupakan sesuatu yang digandrungi terlebih di era milenial saat ini. Banyak faktor bisa menunjang bisnis kita, yang pertama mungkin dari sebuah riasan itu sendiri, bagaimana sebuah penampilan yang terjaga dengan ikhlasnya anda selalu menjaga performanya yang di hari ini dan masa mendatang akan selalu menjadi sebuah pusat bagi kepercayaan alam semesta memberikan hasil terbaik dari kerja keras dang tanggung jawab kita untuk menjaga performa penampilan.`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim43.gif",
						iframe: ''
					},
					{
						id: 3,
							header: 'Tak Melulu Soal Keuntungan Dan Penghasilan',
							paragraph: `Berbisnis di Evoush tidak melulu hanya keuntungan dan raup penghasilan semata, dibalik usaha, kerja keras dan adu strategi kita dalam berbisnis ada nilai lain yang patut kita ingat, kita adalah sebagai insan merupakan mahluk yang sempurna dengan segala anugerah yang Allah berikan... <details><summary>Baca Selanjutnya</summary> Selayaknya bagi kita untuk merawat dan menjaganya sehingga sang pencipta pun akan selalu merestui dan mengiringi setiap peluang kita dalam berbisnis, lain lagi jika hanya keuntungan semata, dunia ini seperti tidak ada batasnya, apapun kita mau, apapun kita inginkan, dan mengapa kita tidak mencoba untuk menilai sisi yang lebih dalam dari sebuah keuntungan dan raupan penghasilan kita semata dalam semangat berbisnis di Evoush ini, patut kita banggakan faktor lain yang menunjang keberhasilan kita.</details>`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/anim51.gif",
						iframe:''
					}
				]
			}
		}
	}
</script>
<style scoped>
@media only screen and (max-device-width: 812px) {
	#panel-kosmetik{
		width: 100%!important;
		margin-top: -1rem;
	}
	#panel-kosmetik h1{
		margin-left: 1rem;
		text-align: center;
	}
	#panel-cosmetic p{
		text-indent: 21px;
		text-align: justify;
		margin-top: 1rem;
		margin-left: 1rem;
		text-transform: lowercase;
	}
	.panel-cosmetic-img{
		width: 320px !important;
		margin-left: -.1rem;
	}

}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#panel-cosmetic{
		width: 100%!important;
	}
	#panel-kosmetik p{
		font-family: 'Poiret One';
		font-size: 21px!important;
		margin-top: 1rem!important;
		margin-left: 1.3rem;
		text-align: justify;
		text-indent: 18px;
	}
	.panel-cosmetic-img{
		width: 800px !important;
		margin-left: -.1rem;
	}
	.genap-kosmetik {
		margin-top: 5rem!important;
		/*margin-bottom: 3rem;*/
	}
	.genap-kosmetik h1,p {
		margin-top: 5rem;
		margin-left: 2rem;
	}
	.genap-kosmetik img{
		width: 600px !important;
		margin-left: -7rem;
	}
}
</style>