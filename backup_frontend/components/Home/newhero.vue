<template>
	<div>
		<div id="carousel-example-generic2" class="carousel slide carousel-fade carousel-fullscreen" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic2" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic2" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active" style="background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/1.jpg');">
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="display-2 font-weight-bold">Bootstrap Carousel Guide</h1>
						<p class="h4 font-weight-light">This is a demo for the <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrap Carousel Guide</a> by <a href="https://bootstrapious.com" class="text-white">Bootstrapious.com</a>.</p>
					</div>
				</div>
				<div class="carousel-item" style="background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/2.jpeg');">
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="display-2 font-weight-bold">Lorem ipsum dolor color</h1>
						<p class="h4 font-weight-light">This is a demo for the Bootstrap Carousel Guide.</p>
					</div>
				</div>
				<div class="carousel-item" style="background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/2.jpg');">
					<div class="overlay"></div>
					<div class="carousel-caption">
						<h1 class="display-2 font-weight-bold">Lorem ipsum dolor color</h1>
						<p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
					</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="carousel-control-prev" href="#carousel-example-generic2" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carousel-example-generic2" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</template>


<script>
	export default {
		data(){
			return {
				contents: [
					{id:0, img: `background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/1.jpg')`, title: 'Coming Soon !', prolog: 'Our New Product'},
					{id:1, img: `background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/2.jpeg')`, title: '', prolog: ''},
					{id:2, img: `background-image: url('https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/2.jpg')`, title: '', prolog: ''}
				]
			}
		},

		created(){
			this.getCarousel()
		},

		methods: {
			getCarousel(){
				let touchSensitivity = 5;
				$(".carousel").on("touchstart", function (event) {
					let xClick = event.originalEvent.touches[0].pageX;
					$(this).one("touchmove", function (event) {
						let xMove = event.originalEvent.touches[0].pageX;
						if (Math.floor(xClick - xMove) > touchSensitivity) {
							$(this).carousel('next');
						} else if (Math.floor(xClick - xMove) < -(touchSensitivity)) {
							$(this).carousel('prev');
						}
					});
					$(".carousel").on("touchend", function () {
						$(this).off("touchmove");
					});
				});
			}
		}
	}
</script>

<style scoped>
.carousel-fullscreen .carousel-inner .carousel-item {
    height: 100vh;
    min-height: 600px;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* carousel fullscreen - vertically centered caption*/
.carousel-fullscreen .carousel-caption {
    top: 50%;
    bottom: auto;
    transform: translateY(-50%);
}

/* overlay for better readibility of the caption  */
.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: #000;
    opacity: 0.3;
    transition: all 0.2s ease-out;
}

.carousel .carousel-item {
    transition-duration: 1.5s;
}
@media (max-width: 767.98px) {
    .display-1 {
        font-size: 3.3rem;
    }
    .display-2 {
        font-size: 2.5rem;
    }
    .display-3 {
        font-size: 2rem;
    }
}
</style>