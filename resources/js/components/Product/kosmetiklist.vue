<template>
	<div id="kosmetik-list">
		<div class="panel panel-default panel-focus">
			<div class="panel-body panel-body-focus">
				<div class="row justify-content-center">
					<div class="col-12 text-center mb-5">
						<h1>
							<a href="/categories/kosmetik">
								Kosmetik
							</a>
						</h1>
					</div>
				</div>

				<div v-if="loading">
					<center>
						<img src="https://img.pikbest.com/58pic/35/39/61/62K58PICb88i68HEwVnm5_PIC2018.gif!bw700" width="200" class="img-responsive">
					</center>
				</div>

				<div v-else>
					<div  class="row">
						<div v-for="(result, index) in results.data" class="col-md-4 col-xs-12 col-sm-12">

							<div class="card-pricing">
								<a :href="`../../../storage/${result.cover}`" class="popup-result">
									<img :src="`../../../storage/${result.cover}`" :alt="result.title" class="img-card-pricing img-responsive"/>
								</a>

								<div class="col-12">
									<center>
										<div class="fb-share-button btn-lg mt-3 mb-5" :data-href="`https://evoush.com/product/${result.categories[0].name}/${result.title}`" data-layout="button_count">
										</div>
									</center>
								</div>

								<div class="card-content-pricing">
									<h5 class="card-title-pricing mt-2"> {{result.title}} </h5>
									<p class="card-text"><small class="text-muted">
										Category : {{result.categories[0].name}}
									</small></p>
									<blockquote class="blockquote-footer" v-html="result.mini_description"></blockquote>
								</div>

								<div class="card-read-more-pricing">
									<!-- <a :href="`/product/${result.categories[0].name}/${result.slug}`" class="btn btn-link btn-block">Detail Product</a> -->
									<!-- <a v-on:click="getDetail(result.categories[0].name, result.slug)" v-b-modal.modal-1 class="btn btn-link btn-block">Detail</a> -->
									<a v-on:click="getDetail(result.categories[0].name, result.slug)" data-target="#modalProduct" data-toggle="modal" class="btn btn-link btn-block">Detail</a>


								</div>
							</div>
						</div>

						<DetailProduct :details="details"/>

					</div>
				</div>
				
				<div class="row justify-content-center">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<br>
						<ul style="list-style: none;">
							<li><b>Page :{{results.from}}</b></li>
							<li><b>Per Page : {{results.per_page}}</b></li>
							<li><b>Total Page : {{results.total}}</b></li>
						</ul>
						<br>

						<pagination align="center" :data="results" @pagination-change-page="getResults"></pagination>

					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import DetailProduct from './detailproduct'

	export default{
		components: {
			DetailProduct
		},
		data(){
			return {
				results: {},
				details:[],
				loading: true
			}
		},

		created(){
			this.getResults()
		},

		methods:{
			getResults(page){
				this.axios
				.get(`/api/product/kosmetik?page=${page}`)
				.then(res => {
					console.log(res)
					return res.data
				})
				.then(data => {
					this.results = data
				})
				.catch(err => console.log(err.response))
				.finally(() => this.loading=false)
			},

			getDetail(category, slug){
				console.log(`${category} - ${slug}`)
				this.axios
				.get(`/api/detail/${category}/${slug}`)
				.then( res => {
					console.log(res)
					this.details = res.data
				})
				.catch(err => console.log(err.response))
				.finally(() => this.loading=false)
			}
		}
	}
</script>


<style scoped>
/*panel*/

.panel-focus{
	box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
	border-radius: 12px;
	margin-top: -1.7rem;
	padding: 12px;
	background-color: white;
	display: flex;
	flex-wrap: nowrap;
	align-content: justify-content-center;
	width: 90%;
	margin-left: 1.2rem;
}
.panel-body-focus {
	margin-top: 1rem;
	padding: 5px;
}
.panel-body-focus img{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);border-radius:0%;
}
.panel-body-focus p{
	line-height: 25px;
	font-size: 12px;
	text-indent: 21px;
	text-align: justify;
	margin-left: .1rem!important;
	width: 100%;
}
/*section {
	width: 100%;
	}*/
	.wrapper-pricing {
		display: table;
		height: 100%;
		width: 100%;
	}

	.container-fostrap {
		display: table-cell;
		padding: 1em;
		text-align: center;
		vertical-align: middle;
	}
	.fostrap-logo {
		width: 100px;
		margin-bottom:15px
	}

	.card-pricing {
		display: block; 
		margin-bottom: 20px;
		line-height: 1.42857143;
		background-color: #fff;
		border-radius: 2px;
		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
		transition: box-shadow .25s;
		margin-left: -.5rem!important;
	}
	.card-pricing:hover {
		box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
	}
/*.img-card-pricing {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
    }*/
    .img-card-pricing{
    	width: 300px;
    	height: 30vh;
    	object-fit:cover!important; 
    	transition: all .25s ease;
    } 
    .card-content-pricing {
    	padding:15px;
    	text-align:left;
    }
    .card-title-pricing {
    	margin-top:0px;
    	font-weight: 700;
    	font-size: 1.65em;
    }
    .card-title-pricing a {
    	color: #000;
    	text-decoration: none !important;
    }
    .card-read-more-pricing {
    	border-top: 1px solid #D4D4D4;
    }
    .card-read-more-pricing a {
    	text-decoration: none !important;
    	padding:10px;
    	font-weight:600;
    	text-transform: uppercase
    }
    /*end panel;*/
    @media only screen and (max-device-width: 812px) {
    	#result-list{
    		width: 100%!important;
    		margin-top: -1rem;
    	}
    }
    /* DESKTOP VERSION */
    @media (min-width: 992px) { 
    	#result-list{
    		width: 100%!important;
    	}
    	/*panel*/
    	.panel-focus{
    		box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
    		border-radius: 12px;
    		margin-top: -2rem;
    		padding: 12px;
    		background-color: white;
    		margin-left: 3.5rem;
    		width: 90%;
    		/*height: 50vh;*/
    	}
    	.panel-body-focus {
    		margin-top: .1rem;
    		padding: 15px;
    	}
    	.panel-body-focus img{
    		height: 300px;
    		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);
    	}

    	.panel-body-focus p{
    		font-size: 18px;
    		font-weight: 400;
    		text-align: justify;
    	}

    	.panel-body-focus .anim{
    		width: 550px;
    	}
    	/*end panel;*/
    	.card-pricing {
    		display: block; 
    		margin-bottom: 20px;
    		line-height: 1.42857143;
    		background-color: #fff;
    		border-radius: 2px;
    		box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    		transition: box-shadow .25s; 
    	}

    	.img-card-pricing{
    		width: 100%;
    		height: 70vh;
    		object-fit:cover!important; 
    		transition: all .25s ease;
    	} 
    }
</style>