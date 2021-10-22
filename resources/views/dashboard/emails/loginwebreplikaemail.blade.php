<h1>{{$details['title']}}</h1> <br>
<br>
<img src="{{ $details['logo'] }}"> <br>

<blockquote>
	" Hallo {{ ucfirst($details['name']) }}, web replika anda sudah bisa diakses dengan username <b>{{ $details['username'] }}</b>. Klik tautan dibawah untuk melihat tampilan web replika anda <br> <br> <br>
	<a href="{{ 'https://www.evoush.com/member/'.$details['username'] }}">Profile {{ $details['username'] }}</a>
	"
</blockquote>
<br>
<br>

<p>
	Untuk melakukan editing profile seperti menambahkan success story ataupun quotes dan mengganti foto profile dan cover web replika anda anda perlu melakukan login. Untuk informasi penggunaan web replika bisa di simak dari uraian berikut :
</p>

<p>
	Login Web Replika :
	<ul>
		<li>
			Klik icon menu di bagian <b><font color="green">Pojok Atas</font></b> Website Official Evoush <br>
			<img src="{{ asset('/images/helpdesk/login_web_replika/Klik_tombol_icon_menu.png') }}">
		</li>
		<li>
			Selanjutnya klik tombol <b><font color="red">Login Profile</font></b> <br>
			<img src="{{ asset('/images/helpdesk/login_web_replika/Klik_tombol_login_profile.png') }}">
		</li>
		<li>
			Kemudian anda akan di arahkan menuju halaman <b>Login Web Replika</b> Evoush <br>
			<img src="{{ asset('/images/helpdesk/login_web_replika/login_page.png') }}"> <br><br>
			Disana anda bisa login menggunakan <b>username</b> dan <b>password</b>, yang terdapat di bagian <b>Detail Lengkap Profile Web Replika Evoush</b>
		</li>
	</ul>
</p>

<br>

<p>
	Detail Lengkap Profile Web Replika Evoush :
	<ul>
		<li>
			<b>username : {{ $details['username'] }}</b>
		</li>
		<li>
			<b>password : {{ $details['password'] }}</b>
		</li>
		<li>
			<b>email : {{ $details['email'] }}</b>
		</li>
		<li>
			<b>phone : {{ $details['phone'] }}</b>
		</li>
		<li>
			<b>province : {{ $details['province'] }}</b>
		</li>
		<li>
			<b>city : {{ $details['city'] }}</b>
		</li>
	</ul>
</p>

<br>
<br>

<blockquote>
	Jika ada pertanyaan bisa di sampaikan melalui admin, ataupun melalui kontak email Admin Evoush :
	<br><br>
	<a href="https://evoush.com/#contact">Contact Message</a>
</blockquote>
<br>
<br>

