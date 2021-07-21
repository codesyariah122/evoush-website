<template>
	<div>
		<!-- <pre>
			<div v-for="panel in panels">
				<h1>
					{{panel.header}}
				</h1>
			</div>
		</pre> -->
		<div v-for="panel in panels">
			<div data-aos="zoom-in" data-aos-easing="ease-in-sine" data-aos-duration="1500">
				<div class="panel panel-default panel-header" style="margin-top: -5rem;">
					<div class="panel-body panel-body-header">
						<div class="row">
							<div data-aos="fade-left">
								<div class="col-md-3">
									<img :src="panel.vector" class="img-responsive header-img">
								</div>
							</div>

							<div class="col-md-6">
								<h2 style="font-family: Walkway;" class="ml-1" v-html="panel.header"> </h2>
								<p class="mt-3" v-html="panel.paragraph"></p>
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
						header: `Your Eternal Future`,
						paragraph: `Di Tempat inilah kami awali semangat untuk membangun bisnis masa depan anda yang Cemerlang hanya bersama <b>evoush</b>. Bangun kejayaan bisnis anda  dengan penuh semangat  tuntun strategy anda bersama team anda satukan semua gagasan menjadi sebuah gugusan yang meleburkan energy menjadi satu cahaya besar.`,
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg"
					}
				]
			}
		}
	}
</script>

<style scoped>
/*panel*/
.panel-header{
	box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
	border-radius: 12px;
	padding: 12px;
	background-color: white;
	display: flex;
	flex-wrap: nowrap;
	align-content: justify-content-center;
	width: 90%;
	margin-left: 1rem;
	z-index: 1!important;
}
.panel-body-header {
	margin-top: 1rem;
	padding: 5px;
}
.panel-body-header img{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);border-radius:0%;
	margin-bottom: 2rem;
	margin-top: -1rem;
}
.panel-body-header h1{
	margin-top: 2rem;
	margin-left: -1rem;
	font-family: 'SpringSakura';
	font-size: 31px!important;
}
.panel-body-header p{
	line-height: 25px;
	font-size: 18px;
	text-indent: 21px;
	text-align: justify;
	margin-left: .1rem!important;
	width: 100%;
}
.panel-body-header a {
	margin-left: 5rem;
	margin-bottom: 2rem;
}

/*end panel;*/
/* polaroid */
.polaroid{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
	color: rgba(0, 0, 0, 0.7);
	position: relative;
	text-align: center;
	margin-bottom: 1rem;
	margin-top:2rem;
}

.polaroid img{
	width: 350px;
	height: 300px;
	margin-top: 1rem;
}
.polaroid-body p{
	padding: 15px;
	color:black;
	font-family: 'Poiret One', cursive;font-weight:bold;
	font-size: 25px; 
}

.polaroid-body h2{
	padding: 25px;
	color:black;
	font-family: 'Poiret One', cursive;font-weight:bold;
	font-size: 25px;
}
/* end polaroid */

/*mobile setup*/
@media only screen and (max-device-width: 812px) {
	.panel-header img{
		width: 290px!important;
		height: 270px!important;
	}
}
/*end mobile*/
/* DESKTOP VERSION */
@media (min-width: 992px) { 

	/*panel*/
	.panel-header{
		box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
		border-radius: 12px;
		margin-top: -7rem!important;
		padding: 12px;
		background-color: white;
		margin-left: 7rem!important;
		width: 80%;
		height: 53vh;
		z-index: 1!important;
	}
	.panel-body-header {
		margin-top: 2rem!important;
		padding: 15px;
		margin-left: 2rem;
		width: 100%;
	}
	.panel-body-header img{
		width: 400px!important;
		/*height: 200px!important;*/
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);
	}
	.panel-body-header h1{
		margin-left: 3rem;
		font-family: 'SpringSakura';
	}
	.panel-body-header p{
		margin-left: 1rem !important;
		font-size: 16px;
		text-align: justify;
	}
	.panel-body-header a {
		margin-left: 5rem;
	}
	.panel-body-header .header-img{
		width: 330px;
		height: 300px;
		margin-right: 1.5rem;
		margin-top: -2rem;
	}
	/*end panel;*/
	/* content */

	/*polaroid*/
	.polaroid{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
		color: rgba(0,0,0,0.7);
		position: relative;
		text-align: center;
		margin-bottom: 3rem;
		margin-top:2rem;
	}

	.polaroid-body h2{
		padding: 15px;
		color:black;
		font-family: 'Poiret One', cursive;font-weight:bold;
		font-size: 25px;
	}

	.polaroid-body p{
		padding: 15px;
		color:black;
		font-family: 'Poiret One', cursive;font-weight:bold;
		font-size: 25px; 
	}

	.polaroid-vector{
		width: 500px;
		height: 600px;
		margin-top: 1rem;
		margin-left: .1rem;
	}
	/*end polaroid*/

}
</style>