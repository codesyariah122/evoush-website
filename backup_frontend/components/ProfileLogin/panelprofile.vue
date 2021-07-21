<template>
	<div>
		<div id="panel-profile">
			<div class="panel panel-focus">
				<div class="panel-body panel-body-focus">
					<div class="row">
						<div class="col-md-12 col-xs-12 col-sm-12">
							<div class="profile-content">

								<!-- looping profile data -->
								<div v-for="profile in profiles">
									<div v-if="profile.avatar">
										<a :href="`../../../storage/${profile.avatar}`" class="profile-popup">
											<img :src="`../../../storage/${profile.avatar}`" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
										</a>
									</div>

									<div v-else>
										<img :src="noAvatar" class="image--profile img-responsive rounded-circle center-block d-block mx-auto" alt="Sample Image">
									</div>

									<div class="container mt-3">
										<div class="row justify-content-center">
											<center>
												<div class="col-md-6 col-xs-6 col-sm-6">
													<div class="alert alert-success alert-dismissible fade show" role="alert">
														<strong>Halo {{profile.name}}!</strong> Anda sedang login menggunakan <b>Username : {{profile.username}} </b>.
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
												</div>
												<br>
												<div class="col-4 col-xs-6 col-sm-6">
													<div class="fb-share-button btn-lg" 
														:data-href="`https://evoush.com/member/${profile.username}`" 
														data-layout="button_count">
													</div>
												</div>
											</center>
										</div>

										<div class="row justify-content-center mt-3 mb-3">
											<div class="col-md-6 col-xs-8 col-sm-8">
												<a href="/marketing-plan" class="btn btn-hover color-4">Marketing Plan</a>
											</div>
										</div>

									</div>

									<!-- ini untuk bagian tabs profile -->

									<ProfileTabs :profile-data="profileData"/>

								</div>
								<!-- end looping profile data -->

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</template>


<script>
	import ProfileTabs from './tabsprofile'

	export default {

		components: {
			ProfileTabs
		},

		props: ['profileData'],
		data(){
			return {
				path: window.location.href,
				loading: true,
				profiles: this.profileData,
				noAvatar: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg',
			}
		},
	}
</script>

<style scoped>
/*panel*/

.image--profile {
	width: 155px;
	height: 160px;
	margin-top: 5rem!important;
	display: flex;
	justify-content: center;
}

.image--profile-member {
	width: 100px;
	height: 100px;
	display: flex;
	justify-content: center;
}

.quotes{
	font-size: 16px!important;
	font-family: 'Walkway';
	/*color: firebrick;*/
}
.socials{
	display: flex;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	list-style: none;
	font-size: 11px!important;
	margin-left:-2rem!important;
}
.fa-instagram-square {
	color: transparent;
	background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
	background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
	background-clip: text;
	-webkit-background-clip: text;
}
.panel-focus{
	box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
	border-radius: 12px;
	margin-top: -5rem;
	padding: 12px;
	background-color: white!important;
/*  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;*/
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
	margin-top: -11rem;
	width: 100%;
	/*padding: 5px;*/
}

.list-member{
	list-style: none;
	display: flex;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	margin-top: 7rem!important;
	margin-right: 1.5rem!important;
}
/*end panel;*/

label{
	text-align: left;
}
.modal-body-member{
	text-align: left!important;
}

/*button*/
.btn-hover {
	width: 100%;
	font-size: 16px;
	font-weight: 600;
	color: #fff;
	cursor: pointer;
	margin: 20px;
	height: 35px;
	text-align:center;
	border: none;
	background-size: 300% 100%;

	border-radius: 50px;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}

.btn-hover:hover {
	background-position: 100% 0;
	moz-transition: all .4s ease-in-out;
	-o-transition: all .4s ease-in-out;
	-webkit-transition: all .4s ease-in-out;
	transition: all .4s ease-in-out;
}

.btn-hover:focus {
	outline: none;
}
.btn-hover.color-1 {
	background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
	box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
}
.btn-hover.color-4 {
	background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);
	box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
}
/*end button*/
/* DESKTOP VERSION */
@media (min-width: 992px) {
	.profile-content{

	}
	.image--profile {
		width: 155px;
		height: 160px;
		margin-top: -10rem!important;
		display: flex;
		justify-content: center;
	}
	.image--profile-member {
		width: 100px;
		height: 100px;
		display: flex;
		justify-content: center;
	}
	.profile-data h1{

	}
	.quotes{
		width: 40%!important;
		font-size: 18px!important;
		font-family: 'Walkway';
		/*color: firebrick;*/
	}
	.socials{
		display: flex;
		flex-wrap: nowrap;
		justify-content: center;
		align-items: center;
		list-style: none;
	}
	.fa-instagram-square {
		color: transparent;
		background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
		background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
		background-clip: text;
		-webkit-background-clip: text;
	}

	/*panel*/
	.panel-focus{
		box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
		border-radius: 12px;
		margin-top: -8rem;
		/*padding: 12px;*/
		background-color: white;
		margin-left: 3.5rem;
		width: 90%;
		/*height: 50vh;*/
	}
	.panel-body-focus {
		margin-top: 5rem;
		/*padding: 15px;*/
	}

	.panel-body-focus p{
		font-size: 18px;
		font-weight: 400;
		text-align: justify;
	}

	.list-member{
		list-style: none;
		display: flex;
		flex-wrap: nowrap;
		justify-content: center;
		align-items: center;
		margin-top: 10rem!important;
		margin-right: 3rem!important;
	}

	label{
		text-align: left!important;
	}

	.modal-body-member{
		text-align: left!important;
	}
}
</style>