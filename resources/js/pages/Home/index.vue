<template>
  <div>

    <Hero/>
    
    <!-- <PanelHeader/> -->
    <h1 class="underline" style="margin-top: 5rem;"></h1>

    <PanelIntents/>
    <h1 class="underline" style="margin-top: 5rem;"></h1>

    <ParallaxHome/>

    <PanelFocus/>
    <h1 class="underline" style="margin-top: 3rem;"></h1>

    <ParallaxEnd/>

    <Popup/>
  </div>
</template>


<script>
	import Hero from '../../components/Home/hero'
	import PanelHeader from '../../components/Home/panelheader'
	import PanelIntents from '../../components/Home/panelintents'
	import ParallaxHome from '../../components/Home/parallaxhome'
	import PanelFocus from '../../components/Home/panelfocus'
	import ParallaxEnd from '../../components/Home/parallaxend'
	import Popup from '../../components/molecules/popup'

	export default {
		components: {
			Hero,
			PanelHeader,
			PanelIntents,
			ParallaxHome,
			PanelFocus,
			ParallaxEnd,
			Popup
		},
		data(){
			return {
				show: true
			}
		}
	}
</script>

<style scoped>
	/*section {
		width: 100%;
	}*/
	#home{
		width: 100%;
	}
	/* DESKTOP VERSION */
	@media (min-width: 992px) { 
		#home{
			width: 100%;
		}
	}
</style>