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
			}
		}
	}
</script>