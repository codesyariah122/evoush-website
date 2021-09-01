<footer id="footer" class="footer-1">
	<div class="main-footer widgets-dark typo-light">
		<div class="container">
			<div class="row mx-auto">

				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="widget subscribe no-box">
						@include('layouts.homepage.partials.footer.templatebrand')
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="widget no-box">
						<h5 class="widget-title">Tentang Kami<span></span></h5>
						@include('layouts.homepage.partials.footer.sites')
					</div>
				</div>

				{{-- <div class="col-xs-12 col-sm-6 col-md-3">
					<div class="widget no-box">
						<h5 class="widget-title">Evoush Application<span></span></h5>
						@include('layouts.homepage.partials.footer.application')
					</div>
				</div> --}}


				<div class="col-xs-12 col-sm-6 col-md-3">
					<div class="widget no-box">
						<h5 class="widget-title">Produk<span></span></h5>
						@include('layouts.homepage.partials.footer.products')
					</div>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-3">
					@include('layouts.homepage.partials.footer.socials')
				</div>

			</div>
		</div>
	</div>

	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center text-danger">
					@include('layouts.homepage.partials.footer.footercopyright')
				</div>
			</div>
		</div>
	</div>
</footer>


<style>
/* Main Footer */
footer .main-footer{  padding: 20px 0;  background: #252525;}
footer ul{  padding-left: 0;  list-style: none;}

/* Copy Right Footer */
.footer-copyright { background: #222; padding: 5px 0;}
.footer-copyright .logo {    display: inherit;}
.footer-copyright nav {    float: right;    margin-top: 5px;}
.footer-copyright nav ul {  list-style: none; margin: 0;  padding: 0;}
.footer-copyright nav ul li { border-left: 1px solid #505050; display: inline-block;  line-height: 12px;  margin: 0;  padding: 0 8px;}
.footer-copyright nav ul li a{  color: #969696;}
.footer-copyright nav ul li:first-child { border: medium none;  padding-left: 0;}
.footer-copyright p { color: #969696; margin: 2px 0 0;}

/* Footer Top */
.footer-top{  background: #252525;  padding-bottom: 30px; margin-bottom: 30px;  border-bottom: 3px solid #222;}

/* Footer transparent */
footer.transparent .footer-top, footer.transparent .main-footer{  background: transparent;}
footer.transparent .footer-copyright{ background: none repeat scroll 0 0 rgba(0, 0, 0, 0.3) ;}

/* Footer light */
footer.light .footer-top{ background: #f9f9f9;}
footer.light .main-footer{  background: #f9f9f9;}
footer.light .footer-copyright{ background: none repeat scroll 0 0 rgba(255, 255, 255, 0.3) ;}

/* Footer 4 */
.footer- .logo {    display: inline-block;}

/*==================== 
  Widgets 
====================== */
.widget{  padding: 20px;  margin-bottom: 40px;}
.widget.widget-last{  margin-bottom: 0px;}
.widget.no-box{ padding: 0; background-color: transparent;  margin-bottom: 40px;
  box-shadow: none; -webkit-box-shadow: none; -moz-box-shadow: none; -ms-box-shadow: none; -o-box-shadow: none;}
.widget.subscribe p{  margin-bottom: 18px;}
.widget li a{ color: #ff8d1e;}
.widget li a:hover{ color: #4b92dc;}
.widget-title {margin-bottom: 20px;}
.widget-title span {background: #839FAD none repeat scroll 0 0;display: block; height: 1px;margin-top: 25px;position: relative;width: 20%;}
.widget-title span::after {background: inherit;content: "";height: inherit;    position: absolute;top: -4px;width: 50%;}
.widget-title.text-center span,.widget-title.text-center span::after {margin-left: auto;margin-right:auto;left: 0;right: 0;}
.widget .badge{ float: right; background: #7f7f7f;}
/*Kalau gak mamam gimana dong kakak maman anjing*/
.typo-light h1, 
.typo-light h2, 
.typo-light h3, 
.typo-light h4, 
.typo-light h5, 
.typo-light h6,
.typo-light p,
.typo-light div,
.typo-light span,
.typo-light small{  color: #fff;}
@media only screen and (max-device-width: 812px) {
	.footer-copyright {
		margin-bottom: 2rem!important;
	}
}
</style>
