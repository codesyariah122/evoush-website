<template>
	<div>

	</div>
</template>


<script>
	export default {
		data(){
			return {
				date: new Date().getDate(),
				show: false
			}
		},

		mounted(){
			this.getComingSoon()
		},

		methods: {
			getComingSoon(){
				if(this.date < 15){
					this.getAlert('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/popup2.jpg', 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/videos/teaser/teaser_product.gif')
				}else{
					this.$swal({
						title: 'Product has been publish'
					})
				}
			},

			getAlert(bg, gif){
				this.$swal({
					title: `<span style="color: #fff; margin-top: -7rem;" class="mt-5">Coming Soon</span>`,
					html:
					'<span style="color: firebrick;">Coming Soon<br/> release at 15 July now <br/>' +
					'<a class="btn btn-success btn-sm" href="https://evoush.com/product">links</a> <br/>' +
					'dont miss it</span>',
					width: 600,
					padding: '3em',
					background: `#fff url(${bg})`,
					backdrop: `
					rgba(0,0,123,0.4)
					url("${gif}")
					right top
					no-repeat
					`
				})
			}
		}
	}
</script>