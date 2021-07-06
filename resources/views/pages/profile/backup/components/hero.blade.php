<div id="hero-profile">
	<div class="page-header header-filter" data-parallax="true" :style="hero"></div>
</div>



<script type="text/javascript">
	new Vue({
		el: '#hero-profile',
		data(){
			return {
				hero: {
					'background-image': 'url({{asset('assets/img/city-profile.jpg')}})'
				}
			}
		}
	})
</script>