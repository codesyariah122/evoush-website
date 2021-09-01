<template>
	<div>
		<Hero/>
		<PanelFocus/>
		<h1 class="underline" style="margin-top: 3rem;"></h1>

		<ParallaxMarketing/>
	</div>
</template>

<script>
	import Hero from '../../components/MarketingPlan/hero'
	import PanelFocus from '../../components/MarketingPlan/panelfocus'
	import ParallaxMarketing from '../../components/MarketingPlan/parallaxmarketing'

	export default {
		components: {
			Hero,
			PanelFocus,
			ParallaxMarketing
		}
	}
</script>

<style scoped>
	/*section {
		width: 100%;
	}*/
	#marketing-plan{
		width: 100%;
	}
	/* DESKTOP VERSION */
	@media (min-width: 992px) { 
		#marketing-plan{
			width: 100%;
		}
	}
</style>