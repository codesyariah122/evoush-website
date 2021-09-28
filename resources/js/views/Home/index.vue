<template>
	<div>

		<!-- <Header :title="title" :desc="desc"/> -->

		<PanelHome :products="products"/>

		<!-- <pre>
			{{ products }}
		</pre> -->

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
				desc: 'Your Eternal Future',
				products: []
			}
		},


		mounted(){
			this.getProduct()
		},

		methods: {
			getProduct(){
				this.axios
				.get('/api/product/all')
				.then(res => {
					this.products = res.data
				})
			}
		}
	}
</script>




