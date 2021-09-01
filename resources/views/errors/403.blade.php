@extends('layouts.errors.app')
@section('content')
<div id="err-403">
	<div class="d-flex flex-row justify-content-center">
		<div class="col-md-12 col-xs-12 col-sm-12 text-center">
			<div class="caption">
				<h1 v-html="err" class="text-danger mt-2 mb-5"></h1>
				<p v-html="paragraph" class="mt-5 text-center"></p>
				<h2 v-html="title"></h2>
				<br>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	new Vue({
		el: '#err-403',
		data(){
			return {
				title: `<span style="font-family: Walkway; color: red;">Evoush</span> <span style="font-family:'Reey Regular'; color: #fff">Indonesia</span>`,
				paragraph: '<span style="font-family: Walkway;">Your Eternal</span> <span style="font-family: Reey Regular; color: red;">Future</span>.',
				err: `Halaman ini tidak bisa di akses {{$exception->getMessage()}}`
			}
		}
	})
</script>

<style type="text/css">
  .caption {
    background:rgba(255,255,255,0.3);
    /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
    position: absolute;
    margin-top: 21rem;
    width: 50%;
    text-align: center;
    color: #fff;
    width: 100%;
    margin-left: -1rem;
  }
  .caption h2 {
    font-family: 'Walkway', cursive;font-weight:bold;
    text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
    margin-bottom: .9rem;
    font-size: 18px;
  }
  .caption p{
    text-shadow: 0 3px 20px rgba(0, 0, 0, 0.9);
    font-weight: 700;
    width: 90%;
    font-size: 14px;
    text-align: justify;
  }
  .caption a{
    font-size: 18px;
  }

   /*DESKTOP VERSION*/
@media (min-width: 992px) { 
  .caption {
      background:rgba(255,255,255,0.3);
      /* clip-path: polygon(25% 0%, 100% 0%, 75% 100%, 0% 100%); */
      position: absolute;
      margin-top: 15rem;
      width: 100%;
      text-align: center;
      color: #fff;
      margin-left: -1rem;
    }
    .caption h2 {
      font-family:Walkway !important;
      font-weight:600;
      text-shadow: 0 3px 20px rgba(0, 0, 0, 1.7);
      margin-bottom: .9rem;
      font-size: 50px;
    }
    .caption p{
      text-shadow: 0 3px 20px rgba(0, 0, 0, 7);
      font-weight: 700;
      width: 90%;
      font-size: 35px;
    }
    .caption a{
      font-size: 18px;
    }
}
</style>
@endsection
