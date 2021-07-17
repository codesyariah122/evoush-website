<template>
	<div>
		<div v-for="detail in details">
			<!-- <b-card no-body class="overflow-hidden" style="max-width: 540px;">
				<b-row no-gutters>
					<b-col md="6">
						<b-card-img :src="`../../../storage/${detail.cover}`" class="rounded-0"></b-card-img>
					</b-col>
					<b-col md="6">
						
						<b-card-body>
							<h3>{{detail.title}}</h3>
							<blockquote class="text-secondary">
								{{detail.mini_description}}
							</blockquote>

							<b-card-text>
								{{detail.description}}
							</b-card-text>
						</b-card-body>

					</b-col>
				</b-row>
			</b-card> -->

			<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalProduct" role="dialog" tabindex="-1">
				<div class="modal-dialog modal-lg" role="document">
					<div v-if="loading">
						<center>
							<img src="https://img.pikbest.com/58pic/35/39/61/62K58PICb88i68HEwVnm5_PIC2018.gif!bw700" width="200" class="img-responsive">
						</center>
					</div>
					<div v-else>
						<div class="modal-content">
							<div class="modal-body mb-0 p-0">
								<img :src="`../../../storage/${detail.cover}`" alt="" style="width:100%">
							</div>
							<div class="modal-footer">
								<br>
								<div class="col-12 col-xs-12 col-sm-12">
									<h3>{{detail.title}}</h3>
									<blockquote class="text-secondary">
										{{detail.mini_description}}
									</blockquote>
									<br>
									<p v-html="detail.description"></p>
								</div>
								<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'DetailProduct',
		props: {
			details: Object
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