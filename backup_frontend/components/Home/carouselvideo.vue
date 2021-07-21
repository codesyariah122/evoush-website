<template>
	<div>
		<!-- Top content -->
		<div class="top-content">
			
			<!-- Carousel -->
			<div id="carousel-example" class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example" data-slide-to="1"></li>
					<li data-target="#carousel-example" data-slide-to="2"></li>
					<li data-target="#carousel-example" data-slide-to="3"></li>
					<li data-target="#carousel-example" data-slide-to="4"></li>
					<li data-target="#carousel-example" data-slide-to="5"></li>
					<li data-target="#carousel-example" data-slide-to="6"></li>
					<li data-target="#carousel-example" data-slide-to="7"></li>
					<li data-target="#carousel-example" data-slide-to="8"></li>
					<li data-target="#carousel-example" data-slide-to="9"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Wq-RLfRgImI" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4elO4N6kFIg" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/QsRIambepjA" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7ZBaoyh2hQM" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YhSqZe90KOY" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/HTpVkRGSPys" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q-1TqhvbQqE" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/86Q77q3CnHo" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/86Q77q3CnHo" allowfullscreen></iframe>
						</div>
					</div>
					<div class="carousel-item">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ackuAlQlun4" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- End carousel -->

		</div>
	</div>
</template>


<style scoped>
@media (max-width: 767px) {

	/* ... */

	.top-content .carousel-control-prev, 
	.top-content .carousel-control-next { display: none; }
	.top-content .carousel-indicators li { margin-left: 10px; margin-right: 10px; }

	/* ... */

}
</style>