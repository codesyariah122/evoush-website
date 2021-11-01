<h1>{{$details['title']}}</h1>
<h4 class="text-success">
	Hallo, Admin Evoush
</h4>
<blockquote class="blockquote-footer text-info">
	<strong>{{$details['sponsor'][0]->username}}</strong> mempunyai member join baru yang perlu di aktivasi, <br> <strong><b><i>{{$details['username']}}</i></b></strong> telah join menjadi member <strong>{{ $details['sponsor'][0]->username }}</strong>, silahkan aktivasi member baru di link di bawah ini :
</blockquote>

<br><br><br>
<p>
	Aktivasi member baru {{ $details['sponsor'][0]->name }} / {{ $details['sponsor'][0]->username }} di sini <br>

	<br>
	<a href="{{ route('users.show', [$details['id']]) }}" class="btn btn-info btn-block">Aktivasi Member</a>
</p>