<template>
	<div>
		<hr>
		<!-- <pre>
			{{ products }}
		</pre> -->
		<div class="container">
			<div class="row justify-content-center mt-5">
				<div v-for="product in products" class="col-md-4 mb-5">
					<div class="card">
						<img :src="`https://raw.githubusercontent.com/evoush-products/bahan_evoush/main/migration_db/${product.cover}`" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">{{ product.title }}</h5>
							<p class="card-text text-truncate" v-html="product.description" v-snip="20"></p>
							<a :href="`https://evoush.com/product/${product.slug}`" class="btn btn-primary" target="_blank">Go somewhere</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default{
		props: ['products']
	}
</script>