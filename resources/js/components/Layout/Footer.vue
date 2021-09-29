<template>
	<div>
		<hr>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-xs-12 col-sm-12">
					<p>Made With <i class="fas fa-fw fa-heart"></i><br>
					</p>
					<h4>@{{ year }} | {{ company }}</h4>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default{
		data(){
			return {
				year:'',
				company: 'Evoush Official'
			}
		},

		mounted(){
			this.getYear()
		},

		methods:{
			getYear(){
				const y = new Date()
				this.year = y.getFullYear()
			}
		}
	}
</script>