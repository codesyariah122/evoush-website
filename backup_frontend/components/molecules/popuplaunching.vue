<template>
	<div>
		<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body mb-0 p-0">
						<!-- <img :src="image" alt="" style="width:100%"> -->
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/launching/218050188_502795057461619_218298230162061135_n.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/launching/217711924_174178588078201_3771039694507694584_n.jpg" class="d-block w-100" alt="...">
								</div>
								<div class="carousel-item">
									<img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/launching/218012969_928668027709404_8447689711024861574_n.jpg" class="d-block w-100" alt="...">
								</div>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="modal-footer">
						<div><a href="/product/#nutrisi-list" target="_blank">Selengkapnya</a></div>
						<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>


<script>
	export default {
		data(){
			return {
				image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/launching/218050188_502795057461619_218298230162061135_n.jpg'
			}
		},
		mounted(){
			this.getLaunching()
		},

		methods: {
			getLaunching(){
				$('#modalIMG').modal({
					show: true
				})
			}
		}
	}
</script>

<style scoped>
.modal,body.modal-open {
	padding-right: 0!important
}

body.modal-open {
	overflow: auto
}

body.scrollable {
	overflow-y: auto
}

.modal-footer {
	display: flex;
	justify-content: flex-start;
	.btn {
		position: absolute;
		right: 10px;
	}
}

</style>