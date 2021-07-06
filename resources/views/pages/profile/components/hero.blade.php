<div id="hero-about">
  @if($user->cover)
	<div class="jumbotron jumbotron-fluid jumbotron-content" :style="image">
    @else
    <div class="jumbotron jumbotron-fluid jumbotron-content" :style="cover">
		@endif
    <div class="container">
			<div class="row no-gutters justify-content-center">
				<div class="col-md-6 col-xs-12 col-sm-12">
					<a href="/">
            <h1 class="display-4 text-center" style="font-family:'Walkway'; text-transform: lowercase!important; color: #ff3b40;">
              @include('layouts.homepage.partials.brand')<span style="font-size: 4rem;font-weight: 900;" v-html="brand"></span> 
              <span style="font-family: 'Walkway'; text-transform: capitalize; color: #fff;" v-html="country"></span>
            </h1>
          </a>
      
          <p class="blockquote-text text-center"> 
            <!-- <span style="font-family: SpringSakura;color:#ffcccc;">]</span> -->
            <span style="font-family:'Walkway'; color: white;"> {{$user->username}} </span>
            <!-- <span style="font-family: SpringSakura;color:#ffcccc;">[</span> -->
          </p>


				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	new Vue({
		el: '#hero-about',
		data(){
			return {
				image: {
					backgroundImage: `url({{asset('storage/'.$user->cover)}})`
				},
        cover: {
          backgroundImage: 'url(https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/banner_profile.jpg)'
        },
				brand: "voush",
        country: "Member"
			}
		}
	})
</script>


<style scoped>
/* jumbotron */
.jumbotron-content {
  text-align: center;
  position: relative;
  background-color: #17234E;
  min-height: 70vh;
  width: 100%;
  -webkit-background-size: cover;
  background-size: cover;
  position: relative;
  clip-path: polygon(50% 0%, 100% 0, 100% 89%, 92% 92%, 84% 94%, 50% 100%, 0 100%, 0 59%, 0 0);
  z-index: -1!important;
}

.jumbotron-content .container {
  z-index: 1;
  position: relative;
}

.jumbotron-content::after {
  content: "";
  display: block;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
  position: absolute;
  bottom: 0;
  /*margin-left: -0.7rem;*/
}

.jumbotron-content .display-4 {
  color: white;
  text-align: center;
  font-weight: 200;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
  margin-bottom: 30px;
  font-family: "Poppins", sans-serif;
}

.jumbotron-content .display-4 span {
  font-weight: 500;
  color: tomato;
}

.jumbotron-content p {
  font-weight: 500;
  font-size: 35px;
  color: #FFFFF0;
  font-family: "Poiret One", cursive;
  font-weight: bold;
}

/* DESKTOP VERSION */
@media (min-width: 992px) { 
  /* jumbotron */
  .jumbotron-content{
    min-height: 50vh;
    margin-top: -100px;
    height: 500px;
    z-index: -1!important;
  }
  .jumbotron-content .display-4{
    text-transform: capitalize;
    margin-top: 7rem;
  }
  .jumbotron-content p{
    font-size: 31px!important;
  }
}
</style>