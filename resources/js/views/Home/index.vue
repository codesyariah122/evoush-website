<template>
	<div>

		<Header :title="title" :desc="desc"/>

		<PanelHome :products="products"/>

		<!-- <pre>
			{{ products }}
		</pre> -->
		<Footer/>
	</div>
</template>


<script>
	import Header from '../../components/Molecules/jumbotron'
	import PanelHome from '../../components/Home/PanelHome'
	import Footer from '../../components/Layout/Footer'

	export default{
		components: {
			Header,
			PanelHome,
			Footer
		},
		data(){
			return {
				title: 'Evoush Administrator',
				desc: 'https://raw.githubusercontent.com/evoush-products/bahan_evoush/master/assets/img/LOGO231.png',
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




