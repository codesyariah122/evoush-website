<div id="detail-view">
	<div class="container-fluid">
		<div class="row">
			<!-- left content -->
			<div class="col-sm-7 col-12 bg-dark text-white py-2 d-flex align-items-center justify-content-center fixed-top bg-img" id="left" :style="{ backgroundImage: `url(/storage/${product.cover})` }">
				<div class="row justify-content-start" id="product-context">
					<div class="col-12 col-sm-12 col-xs-12">
						<nav class="navbar navbar-light transparent-nav navbar-prod">
							{{-- <a href="/">
								@include('layouts.homepage.partials.brand')
							</a>
							<ul class="navbar-nav mr-auto">
								<li class="nav-item active text-primary">
									<a class="nav-link-prod" href="/product">Products</a>
								</li>
							</ul> --}}					
						</nav>
					</div>
					<div class="col-12 col-sm-12 col-xs-12 prod-detail">
							
					</div>
				</div>
			</div>
				<!-- end left content -->

				<!-- right content -->
				<div class="col-6 invisible col-2"><!--hidden spacer--></div>
				<div class="col-sm-4 col-12 offset-0 offset-sm-6 py-2" id="right">
					<div class="row justify-content-center right-prod-detail">
						<div class="col-12">
							<a href="/product#kosmetik-list" v-if="product.categories[0].name == 'Kosmetik'" id="back-cosmetics" class="btn btn-primary mb-2"> Kembali Ke Products </a>

							<a v-else href="/product#nutrisi-list" id="back-nutrisi" class="btn btn-primary mb-2">Kembali Ke Product</a>

							<h1>
								@{{product.title}}
							</h1>					
							<blockquote class="text-success" v-html="product.mini_description"></blockquote>
							
							<blockquote class="text-primary ml-3">
								Category : <a href="`/categories/${product.categories[0].name}`">@{{product.categories[0].name}}</a>
							</blockquote>
						
						
						<p v-html="product.description" class="mb-5"></p>


						<center>
							<div v-if="category == 'Kosmetik'">
								<nav aria-label="...">
									<ul class="pagination">

										<div v-if="product.id == 4">
											<li class="page-item disabled">
												<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
											</li>
										</div>

										<div v-else>
											<div v-if="product.id == 6">
												<li class="page-item">
													<a class="page-link" v-on:click="paging($event)" tabindex="-1" aria-disabled="true" :data-id="product.id - 2">Previous</a>
												</li>
											</div>
											<li class="page-item">
												<a class="page-link" v-on:click="paging($event)" tabindex="-1" aria-disabled="true" :data-id="product.id - 1">Previous</a>
											</li>
										</div>

										<div v-if="product.id >= 13">
											<li class="page-item disabled ml-auto">
												<a class="page-link" aria-disabled="true">Next</a>
											</li>
										</div>
										<div v-else>
											<div v-if="product.id == 6">
												<li class="page-item ml-auto">
													<a class="page-link" v-on:click="paging($event)" :data-id="product.id + 2">Next</a>
												</li>
											</div>
											<div v-else>
												<li class="page-item ml-auto">
													<a class="page-link" v-on:click="paging($event)" :data-id="product.id + 1">Next</a>
												</li>
											</div>
										</div>
									</ul>
								</nav>
							</div>

							<div v-else>
								<nav aria-label="...">
									<ul class="pagination">

										<div v-if="product.id == 1">
											<li class="page-item disabled">
												<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
											</li>
										</div>

										<div v-else>
											<li class="page-item">
												<a class="page-link" v-on:click="paging($event)" tabindex="-1" aria-disabled="true" :data-id="product.id - 1">Previous</a>
											</li>
										</div>

										<div v-if="product.id == 3">
											<li class="page-item disabled ml-auto">
												<a class="page-link" aria-disabled="true">Next</a>
											</li>
										</div>
										<div v-else>
											<li class="page-item ml-auto">
												<a class="page-link" v-on:click="paging($event)" :data-id="product.id + 1">Next</a>
											</li>
										</div>
									</ul>
								</nav>
							</div>
						</center>
					
					<h1 class="underline mb-3" style="margin-top: 2rem;"></h1>

					</div>
				</div>
			</div>
			<!-- end right content -->
		</div>
	</div>
</div>

<script type="text/javascript">
	new Vue({
		el: '#detail-view',
		data(){
			return {
				product: '',
				category: `{{Request::segment(2)}}`,
				slug: `{{Request::segment(3)}}`,
				pagingData: '',
				value: '',
				length: ''
			}
		},

		mounted(){
			this.getDetailProduct()
		},

		methods: {
			getDetailProduct(){
				axios.get(`/api/detail/${this.category}/${this.slug}`)
				.then(res => {
					this.product = res.data[0]
				})
			},

			paging(e){
				this.value = e.target.getAttribute('data-id')
				axios.get(`/api/paging/${this.category}/${this.value}`)
				.then(res => {
					this.product = res.data[0]
				})
			}
		}

	})
</script>

<style>
.page-link{
	cursor: pointer;
}
.bg-img{
	/*background-size: cover;*/
	background-size: 100% 100%;
	background-repeat: no-repeat;
	width: 100%;
	overflow: hidden;
}
#right{
	margin-top: 21rem!important;	
	width: 30%!important;
}
#left{
	height: 50vh;
	position: absolute;
}
.navbar-prod{
	margin-top: -1rem!important;
	margin-left: 12rem!important;
	width: 100%;
}

.nav-link-prod {
	color: #fff !important;
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 7.7);
	text-transform: uppercase;
	margin-right: 3px;
}


.prod-detail{
	margin-top: 13rem!important;
}
.prod-detail h1{
	text-shadow: 1px 1px 1px rgba(50, 10, 0, 100);
	text-transform: capitalize;
	margin-left: 1rem;
}
.right-prod-detail p{
	font-size: 21px;
	text-align: justify;
	text-indent: 18px!important;
}
/* responsively apply fixed position */
@media (min-width: 576px){
    #left {
        position: fixed;
        top: 0;
        bottom: 0;
    }
    #product-context{
    	margin-left: 1rem!important;
    }
}

/* DESKTOP VERSION */
@media (min-width: 992px) { 
	.page-link{
		cursor: pointer;
	}

	#right{
		margin-top: 1rem!important;
	}

	.bg-img{
		/*background-size: cover;*/
		background-size: 100% 100%;
		background-repeat: no-repeat;
		/*height: 100vh;*/
		width: 100vw;
		overflow: hidden;
	}
	#right{
		margin-left: 10rem;
	}
	#left{
		height: 100vh;
		position: absolute;
	}
	.navbar-prod{
		margin-top: -12rem!important;
		margin-left: -20rem!important;
		width: 100%;
	}
	.nav-link-prod:hover::after{
		content:'';
		display: block;
		border-bottom: 3px solid #0B63DC;
		width: 50%;
		margin:auto;
		padding-bottom: 5px;
		margin-bottom: -8px;
	}
	.prod-detail{
		margin-top: 15rem!important;
	}
	.prod-detail h1{
		text-shadow: 1px 1px 1px rgba(0, 0, 0, 50);
		text-transform: capitalize;
	}
	.right-prod-detail p{
		font-size: 21px;
		text-align: justify;
		text-indent: 18px!important;
	}
}
</style>