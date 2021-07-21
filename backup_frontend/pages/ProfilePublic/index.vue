<template>
	<div>
		<div v-if="loading">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-12 col-xs-12 col-sm-12">
						<center>
							<img src="https://motiongraphicsphoebe.files.wordpress.com/2018/10/8ee212dac057d412972e0c8cc164deee.gif?w=545&h=409" class="img-responsive">
						</center>
					</div>	
				</div>
			</div>
		</div>
		<div v-else>
			<Hero :profile-data="profiles"/>
			<PanelProfile :profile-data="profiles"/>

			<h1 class="underline" style="margin-top: 5rem;"></h1>

			<ParallaxProfile :profile-data="profiles"/>

		</div>
	</div>
</template>

<script>
	import Hero from '../../components/ProfilePublic/hero'
	import PanelProfile from '../../components/ProfilePublic/panelprofile'
	import ParallaxProfile from '../../components/ProfilePublic/parallaxprofile'
	
	export default{
		components: {
			Hero,
			PanelProfile,
			ParallaxProfile
		},

		data(){
			return {
				path: window.location.href,
				loading: true,
				profiles: []
			}
		},
		mounted(){
			this.getProfileData()
		},

		methods: {
			getProfileData(){
				const username = this.path.substr(this.path.lastIndexOf('/') + 1);
				this.axios(`/api/evoush/profile-data/${username}`)
				.then( res => {
					this.profiles = res.data
				})
				.catch(err => console.log(err.response))
				.finally(() => this.loading = false)
			}
		}

	}
</script>