<template>
	<div>

		<Header :title="title" :desc="desc"/>

		<PanelHome/>

	</div>
</template>


<script>
	import Header from '../../components/Molecules/jumbotron'
	import PanelHome from '../../components/Home/PanelHome'

	export default{
		components: {
			Header,
			PanelHome
		},
		data(){
			return {
				title: 'Evoush Official',
				desc: 'Your Eternal Future'
			}
		}
	}
</script>


