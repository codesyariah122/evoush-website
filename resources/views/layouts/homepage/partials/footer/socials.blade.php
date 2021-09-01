<div id="social-link-footer">
	<div class="widget no-box">
		<h5 class="widget-title">Kontak Kami<span></span></h5>
		
		@if(Auth::user())
			<p><span v-html="contact.icon"></span> : <a :href="contact.href" title="glorythemes" v-html="contact.label"></a></p>
		@endif

		<p><span v-html="email.icon"></span> : <a :href="email.href" title="glorythemes" v-html="email.label"></a></p>
		<p><span v-html="wa.icon"></span> : <a :href="wa.href" title="glorythemes" v-html="wa.label"></a></p>
		
		{{-- <ul class="social-footer2">

			<li v-for="social in socials" class="">
				<a :title="social.name" target="_blank" :href="social.link"><img alt="youtube" width="30" height="30" :src="social.icon"></a>
			</li>
			
		</ul> --}}
		<div class="d-inline-flex p-2 bd-highlight">
			<div class="row">
				<div v-for="social in socials" class="col-2">
					<a :title="social.name" target="_blank" :href="social.link"><img alt="youtube" width="30" height="30" :src="social.icon"></a>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
ul.social-footer2 { margin: 0;padding: 0; width: auto;}
ul.social-footer2 li {display: inline-block;padding: 0;}
ul.social-footer2 li a:hover {background-color:#ff8d1e;}
ul.social-footer2 li a {display: block; height:30px;width: 30px;text-align: center;}
.btn-social{background-color: #ff8d1e; color:#fff;}
.btn-social:hover, .btn-social:focus, .btn-social.active {background: #4b92dc;color: #fff;
-webkit-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-moz-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-ms-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-o-box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
-webkit-transition: all 250ms ease-in-out 0s;
-moz-transition: all 250ms ease-in-out 0s;
-ms-transition: all 250ms ease-in-out 0s;
-o-transition: all 250ms ease-in-out 0s;
transition: all 250ms ease-in-out 0s;
}
</style>