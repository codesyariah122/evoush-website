<template>
	<div class="container mt-3">
		<div class="row justify-content-center">
			<div class="col-lg-12 col-xs-12 col-sm-12">
				<div class="jumbotron jumbotron-fluid">
					<div class="container">
						<h1 class="display-4">{{ title }}</h1>
						<!-- <p class="lead">{{desc}}.</p> -->
						<center>
							<img :src="desc" class="img-fluid logo" width="100">
						</center>
						<div class="row justify-content-center mt-5">
							<a href="/login" class="btn btn-primary btn-login">Login Administrator</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['title', 'desc']
	}
</script>


<style>
.jumbotron{
	background: linear-gradient(to right, #6495Ef, #ccccfc);
	filter: drop-shadow(15px 10px #c7bdb8);
}

.jumbotron, .display-4, .lead{
	color: #fff;
	text-shadow: 2px 2px grey;
}
.jumbotron .display-4{
	text-align: center;
	filter: drop-shadow(5px 5px #44546c);
}
.jumbotron .lead{
	font-family: 'Lobster', cursive;
	font-size: 31px;
	text-align: center;
}

.btn-login {
	background-color: indianred;
	border: 2px solid #ffe;
}

.btn-login:hover{
	background: linear-gradient(to left, indianred, firebrick)!important;
	border: 2px solid #ffc;
}

.logo{
	filter: drop-shadow(5px 5px grey);
}

.logo:hover{
	transform: translateX(7%);
	transform: rotate(45deg);
}

</style>