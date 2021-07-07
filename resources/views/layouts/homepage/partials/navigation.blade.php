<div id="nav">
	<nav class="navbar navbar-expand navbar-light sticky-top navbar-evoush">
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item"><a href="/about" class="nav-link nav-link-evoush">About</a></li>
				<li class="nav-item"><a href="/product" class="nav-link nav-link-evoush">Product</a></li>
				<li>
					<a href="/">
						@include('layouts.homepage.partials.brand')
					</a>
				</li>
				<li class="nav-item"><a href="/articles" class="nav-link nav-link-evoush">Articles</a></li>
				{{-- <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li> --}}
				@if(Auth::check() && Auth::user()->username)
				<li class="nav-item">
					{{-- <li class="nav-item"><a href="/{{Auth::user()->username}}" class="btn btn-sm btn-success tombol">Profile</a></li> --}}
					<div class="btn-group">
						<button type="button" class="btn btn-danger dropdown-toggle tombol" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{Auth::user()->username}}
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="/member/{{Auth::user()->username}}">My Profile</a>
							
							<a class="dropdown-item" href="{{route('profile.edit', [Auth::user()->id])}}">Edit Profile</a>

							<div class="dropdown-divider"></div>
							{{-- <a class="dropdown-item" href="#">Logout</a> --}}
							
							<a class="dropdown-item mt-2 mb-2" href="{{route('member.lists')}}"> <i class="fas fa-fw fa-users"></i> Lists Member</a>

							{{-- <a class="dropdown-item cari" href="{{route('member.search')}}">Cari Member <i class="fas fa-fw fa-search text-dark"></i></a> --}}

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
							
							<div class="dropdown-divider"></div>
							
							<a class="dropdown-item" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

						</div>
					</div>
				</li>
					
				@else

				<li class="nav-item">
					{{-- <a href="/login" class="btn btn-sm btn-danger tombol">Login</a> --}}
					<div class="btn-group">
						<button type="button" class="btn btn-danger dropdown-toggle tombol" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Profile
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{route('login')}}">Login</a>
							<div class="dropdown-divider"></div>

							<a class="lists dropdown-item mt-2 mb-2" href="{{route('member.lists')}}"><i class="fas fa-fw fa-users"></i> Lists Member</a>

							{{-- <a class="dropdown-item cari" href="{{route('member.search')}}"><i class="fas fa-fw fa-search text-dark"></i> Cari Member</a> --}}

						</div>
					</div>
				</li>

				@endif
				{{-- <li class="nav-item d-flex ml-auto">
					<div class="collapse fade ml-2" id="searchForm">
						<input v-on:keyup="searchInput" id="search-member" type="search" class="form-control border-0 bg-light" placeholder="Cari Member Evoush Berdasarkan Username" style="width: 100%;"/>
					</div>
					<a class="nav-link ml-auto" href="#searchForm" data-target="#searchForm" data-toggle="collapse">
						<i class="fas fa-fw fa-search text-white" style="font-size: 21px;"></i>
					</a>
				</li> --}}
			</ul>
			{{-- <ul class="navbar-nav mx-auto">
				<li class="nav-item d-flex">
					<div class="collapse fade" id="searchForm">
						<input id="search" type="search" class="form-control border-0 bg-light" placeholder="search" />
					</div>
					<a class="nav-link ml-auto" href="#searchForm" data-target="#searchForm" data-toggle="collapse">
						<i class="mdi mdi-magnify"></i>
					</a>
				</li>
			</ul> --}}
		</div>
	</nav>
</div>	


<style type="text/css">
.dropdown-menu{
	margin-left: -2.3rem!important;
	margin-top: .9rem!important;
}
.tombol {
    text-transform: uppercase;
    border-radius: 40px !important;
    font-family:'Walkway';
    font-weight:normal;
    font-size:11px!important;
    margin-top: .1rem;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7)
}
.mobileNav{
	box-shadow: 0 8px 10px -6px black!important;
}
/*.navbar{
	position: relative;
	z-index:1;
}*/
.transparent-nav{
	background : rgba(255,255,255, 1);
	margin-top: .5rem;
}
.transition{
	transition: background-color 0.5s ease;
	background : rgba(255, 255, 255, 0.5);
	position: fixed;
	margin-top: -.5rem;
	z-index: 1;
	width:100%;
}
.white{
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
 /* navbar */
 .navbar-brand, .nav-link-evoush {
  color: white !important;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
}
.nav-link-evoush{
  text-transform: uppercase;
  margin-right: 3px;
}
.nav-link-evoush:hover::after{
  content:'';
  display: block;
  border-bottom: 3px solid #0B63DC;
  width: 50%;
  margin:auto;
  padding-bottom: 5px;
  margin-bottom: -8px;
}
.transition{
  transition: background-color 0.5s ease;
  background : rgba(0, 0, 0, 0.3);
  position: fixed;
  margin-top: -.5rem;
  width:100%;
}
.transparent-nav{
  background : rgba(0, 0, 0, 0.3);
  margin-top: -.5rem;
}
.white{
  color: #fff;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
}
}
  @media screen and (max-width: 760px) {
   ul.navbar-nav li.nav-item{display: block;}
 }

</style>