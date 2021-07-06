<template>
	<div>
		<div class="parallax-about" :style="parallax.style">
			<div class="row justify-content-center">
				<div class="caption-parallax-about">
					<p v-html="parallax.paragraph" class="mt-1"></p>
					<h2 v-html="parallax.title"></h2>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				parallax: {
					style: {
						'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/business_idea1.jpg)`,
					},
					title: `<span style="font-family: Walkway; color: red;">evoush</span> <span style="font-family:'Walkway'; color: #fff">Indonesia</span>`,
					paragraph: '<span style="font-family: Walkway;"> JANGAN TAKUT GAGAL <br/> Karena <b>Orang</b> yang tidak pernah <b>Gagal Hanyalah </b> Orang yang todak pernah Melangkah</span>.'
				}
			}
		}
	}
</script>

<style scoped>
.parallax-about{
	height: 30vh;
	background-size: cover;
	margin:0;
}

.caption-parallax-about {
	background:rgba(255,255,255,0.3);
	/* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
	position: absolute;
	margin-top: .2rem!important;
	width: 100%;
	text-align: center;
	color: #fff;
}
.caption-parallax-about h2 {
	font-family: 'Poiret One', cursive;font-weight:bold;
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	margin-bottom: .2rem;
	font-size: 18px;
}
.caption-parallax-about p{
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	font-weight: 700;
	width: 90%;
	font-size: 14px;
	text-align: center;
}
.caption-parallax-about a{
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
	.parallax-about{
		min-height: 500px; 
		background-attachment: fixed;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		margin:0;
	}

	.caption-parallax-about {
		background:rgba(255,255,255,0.3);
		/* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
		position: absolute;
		margin-top: 3.5rem!important;
		width: 75%;
		text-align: center;
		color: #fff;
	}
	.caption-parallax-about h2 {
		font-family:SpringSakura !important;
		font-weight:600;
		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
		margin-bottom: .9rem;
		font-size: 41px;
		margin-top: 1rem;
	}
	.caption-parallax-about a{
		font-size: 18px;
	}
	.caption-parallax-about p{
		font-size: 31px;
		text-align: center;
		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	}
}
</style>