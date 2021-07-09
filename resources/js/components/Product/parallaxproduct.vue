<template>
	<div>
		<div id="parallax-product">
			<div class="parallax-product" :style="parallax.style">
				<div class="row justify-content-center">
					<div class="caption-parallax-product">
						<p v-html="parallax.paragraph" class="mt-2"></p>
						<h2 v-html="parallax.title"></h2>
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
				parallax: {
					style: {
						'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/new_banner7.1.jpg)`,
					},
					title: `<span style="font-family: Walkway; color: red;">evoush</span> <span style="font-family:'Walkway'; color: #fff">Indonesia</span>`,
					paragraph: '<span style="font-family: Walkway;">Your Eternal Future</span>.'
				}
			}
		}
	}
</script>

<style scoped>
.parallax-product{
	min-height: 300px;
	background-size: cover;
	margin:0;
}

.caption-parallax-product {
	background:rgba(255,255,255,0.3);
	/* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
	position: absolute;
	margin-top: 5rem!important;
	width: 100%;
	text-align: center;
	color: #fff;
}
.caption-parallax-product h2 {
	font-family: 'Poiret One', cursive;font-weight:bold;
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	margin-bottom: .9rem;
	font-size: 18px;
}
.caption-parallax-product p{
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	font-weight: 700;
	width: 90%;
	font-size: 14px;
	text-align: center;
}
.caption-parallax-product a{
	font-size: 18px;
}
@media only screen and (max-device-width: 812px) {
	.parallax {
		background-attachment: scroll;
	}
/*    .caption-parallax-product{
      margin-top: 22rem!important;
      }*/
  }
  /*DESKTOP VERSION*/
  @media (min-width: 992px) { 
  	/* all parallax top and bottom */
  	.parallax-product{
  		min-height: 500px; 
  		background-attachment: fixed;
  		background-position: center;
  		background-repeat: no-repeat;
  		background-size: cover;
  		margin:0;
  	}

  	.caption-parallax-product {
  		background:rgba(255,255,255,0.3);
  		/* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
  		position: absolute;
  		margin-top: 16.5rem!important;
  		width: 100%;
  		text-align: center;
  		color: #fff;
  	}
  	.caption-parallax-product h2 {
  		font-family:SpringSakura !important;
  		font-weight:600;
  		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
  		margin-bottom: .9rem;
  		font-size: 41px;
  		margin-top: 1rem;
  	}
  	.caption-parallax-product a{
  		font-size: 18px;
  	}
  	.caption-parallax-product p{
  		font-size: 31px;
  		text-align: center;
  		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
  	}
  }
</style>