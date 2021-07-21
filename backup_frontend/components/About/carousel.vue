<template>
	<div>
		<b-carousel
		id="carousel-1"
		v-model="slide"
		:interval="4000"
		controls
		indicators
		background="#ababab"
		img-width="1024"
		img-height="480"
		style="text-shadow: 1px 1px 2px #333;"
		@sliding-start="onSlideStart"
		@sliding-end="onSlideEnd"
		>
		<!-- Slides with image only -->
		<b-carousel-slide img-src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg"></b-carousel-slide>

		<b-carousel-slide img-src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/kantor/Depan.jpg"></b-carousel-slide>

		<!-- Slides with img slot -->
		<!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
		<!-- <b-carousel-slide>
			<template #img>
				<img
				class="d-block img-fluid w-100"
				width="1024"
				height="480"
				src="https://picsum.photos/1024/480/?image=55"
				alt="image slot"
				>
			</template>
		</b-carousel-slide> -->
	</b-carousel>
	</div>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>