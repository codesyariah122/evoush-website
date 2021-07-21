<template>
	<div>
		<div class="parallax" :style="parallax.style">
			<div class="row justify-content-center">
				<div class="caption">
					<p v-html="parallax.paragraph" class="mt-5 text-center"></p>
					<h2 v-html="parallax.title"></h2>
					<br>
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
						'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/product/parallax_beauty.jpg)`,
					},
					title: `<span style="font-family: Walkway; color: red;">evoush</span> <span style="font-family:'Reey Regular'; color: #fff">Beauty</span>`,
					paragraph: ''					
				}
			}
		}
	}
</script>

<style scoped>
.parallax{
	min-height: 300px!important; 
	background-size: cover;
	margin:0;
}

.caption {
	background:rgba(255,255,255,0.3);
	/* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
	position: absolute;
	margin-top: 2rem!important;
	width: 100%!important;
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
		margin-top: 15rem;
		width: 75%;
		text-align: center;
		color: #fff;
	}
	.caption h2 {
		font-family:Walkway !important;
		font-weight:600;
		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
		margin-bottom: .9rem;
		font-size: 50px;
	}
	.caption p{
		text-shadow: 0 3px 20px rgba(0, 0, 0, 7);
		font-weight: 700;
		width: 90%;
		font-size: 35px;
	}
	.caption a{
		font-size: 18px;
	}
}
</style>