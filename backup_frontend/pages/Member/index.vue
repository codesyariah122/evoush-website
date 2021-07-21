<template>
	<div>
		<Hero/>

		<MemberList/>
		<h1 class="underline" style="margin-top: 5rem;"></h1>

		<ParallaxMember/>
		
	</div>
</template>


<script>
	import Hero from '../../components/Member/hero'
	import MemberList from '../../components/Member/memberlist'
	import ParallaxMember from '../../components/Member/parallaxmember'

	export default {
		components: {
			Hero,
			MemberList,
			ParallaxMember
		},

	}
</script>

<style scoped>
#member{
	width: 100%;
}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
	#member{
		width: 100%;
	}
}
</style>