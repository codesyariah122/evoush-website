<template>
	<div>
		<div id="parallax-end-about">
			<div class="parallax" :style="parallax.style">
				<div class="row justify-content-center">
					<div class="caption">
						<h1 style="font-family: Walkway; text-transform: lowercase!important; color: #ff3b40;" class="display-4">
						<Logo/> <span style="color:#fff;">{{parallax.caption}}</span>
					</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Logo from '../molecules/brand'

	export default {
		components: {
			Logo
		},
		data(){
			return {
				parallax: {
					style: {
						'background-image': `url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/member-list/parallax_member_list.jpg)`,
					},
					caption: 'Member',
					company: `<span style="font-family: 'walkway';color: #ff3b40; font-weight: 900;">evoush</span> | <span style="font-family:Walkway; color:#fff;text-shadow: 0 3px 20px rgba(0, 0, 0, 1.5);">Member</span> `
				}
			}
		}
	}
</script>

<style scoped>
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
	width: 100%;
	text-align: center;
	color: #fff;
}
.caption h2 {
	font-family: 'Walkway', cursive;font-weight:bold;
	text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
	margin-bottom: .9rem;
	font-size: 18px;
	margin-top: 1rem!important;
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
		margin-top: 15.5rem;
		width: 100%;
		text-align: center;
		color: #fff;
	}
	.caption h2 {
		font-family:Walkway !important;
		font-weight:600;
		text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
		margin-bottom: .9rem;
		font-size: 41px;
	}
	.caption a{
		font-size: 18px;
	}
}
</style>