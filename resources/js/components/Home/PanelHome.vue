<template>
	<div>
		<div class="container">
			<div class="row justify-content-center">

				<!-- <pre>
					{{ products }}
				</pre> -->

				<div v-for="product in products" class="col-md-4 mb-5">
					<div class="card">
						<img :src="`https://raw.githubusercontent.com/evoush-products/bahan_evoush/main/migration_db/${product.cover}`" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">{{ product.title }}</h5>
							<p class="card-text text-truncate" v-html="product.description"></p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
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