<template>
	<div>
		<div id="parallax-end-profile">
			<div v-if="profile.parallax" class="parallax" :style="`background-image: url('../../../storage/${profile.parallax}')`">
				<div class="row justify-content-center">
					<div class="caption">
						<div v-if="profile.quotes">
							<blockquote class="blockquote-footer">{{profile.quotes}}</blockquote>
							<br>
							<h4 class="text-danger">
								Quotes by : <span style='text-transform: capitalize;'> {{profile.name}}</span>
							</h4>						
						</div>
						<div v-else>
							<h2 class="text-danger"><span style="text-transform: capitalize;">{{profile.username}}</span> belum membuat quotes</h2>
						</div>
					</div>
				</div>
			</div>

			<div v-else class="parallax" :style="parallax.cover">
				<div class="row justify-content-center">
					<div class="caption">
						<div v-if="profile.quotes">
							<blockquote class="blockquote-footer">{{profile.quotes}}</blockquote>
							<br>
							<h4 class="text-danger">
								Quotes by : <span style='text-transform: capitalize;'> {{profile.name}}</span>
							</h4>						
						</div>
						<div v-else>
							<h2 class="text-danger"><span style="text-transform: capitalize;">{{profile.username}}</span> belum membuat quotes</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['profileData'],
		data(){
			return {
				profile: this.profileData[0],
				parallax: {
					cover:{
						backgroundImage: 'url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/registration2.jpg)'
					}
				}
			}
		}
	}
</script>


<style scoped>
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
.caption blockquote {
	font-family: 'Walkway', cursive;font-weight:bold;
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	margin-bottom: .9rem;
	font-size: 21px;
	color:#fff !important;
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
	.caption blockquote {
		font-family:Walkway !important;
		font-weight:600;
		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
		margin-bottom: .9rem;
		font-size: 25px;
		color:#fff !important;
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