<template>
	<div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>        
						<!-- 16:9 aspect ratio -->
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" :src="video" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
						</div>

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
				date: new Date().getDate(),
				show: false,
				video: ''
			}
		},

		mounted(){
			
		},

		methods: {
			getComingSoon(){
				const location = window.location.href
				if(location === 'http://localhost:8000/' || location === 'https://evoush.com/'){
					if(this.date < 15){
						this.getAlert('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/popup2.jpg', 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/videos/teaser/new_product.gif')
					}else{
						this.$swal({
							title: 'Product has been publish'
						})
					}
					
				}
			},

			getAlert(bg, gif){
				this.$swal({
					title: `<span style="color: #fff;font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Coming Soon</span>`,
					html:
					'<span style="color: salmon; font-size: 21px;">dont miss it </span><br/><br/><br/>' +
					'<a class="btn btn-success btn-sm" href="https://evoush.com/product">Check this link</a> <br/>' +
					'<span style="font-size: 14px; color:salmon;">Release at 15 July now</span>',
					width: 600,
					padding: '3em',
					background: `#fff url(${bg})`,
					backdrop: `
					rgba(0,0,123,0.4)
					url("${gif}")
					left top
					no-repeat
					`
				})
			},

			getTopIncome(){
				if(this.date < 31){
					$('#myModal').modal({
						show: true
					})
					this.video = 'https://www.youtube.com/embed/2EGfDiGcK-E'
				}else{
					$('#myModal').modal({
						show: false
					})
				}
			}
		}
	}
</script>


<style scoped>

.modal-dialog {
	max-width: 800px;
	margin: 30px auto;
}



.modal-body {
	position:relative;
	padding:0px;
}
.close {
	position:absolute;
	right:-30px;
	top:0;
	z-index:999;
	font-size:2rem;
	font-weight: normal;
	color:#fff;
	opacity:1;
}
</style>