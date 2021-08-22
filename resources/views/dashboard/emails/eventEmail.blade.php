{{-- @component('mail::message')
# {{ $details['title'] }}  
- No Peserta : *{{$details['no_peserta']}}*  
- Nama Lengkap : *{{$details['name']}}*  
- Phone : *{{$details['phone']}}*  
- Username : *{{$details['username']}}*  
- Category : *{{$details['category']}}*  
- Kota : *{{$details['city']}}*


@component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}
<h1>{{$details['title']}}</h1>
<ul>
	<li>- No Peserta : <strong>{{$details['no_peserta']}}</strong> </li>
	<li>- Nama Lengkap : <strong>{{$details['name']}}</strong> </li>
	<li>- Phone : <strong>{{$details['phone']}}</strong></li>
	<li>- Username : <strong>{{$details['username']}}</strong></li>
	<li>- Category : <strong>{{$details['category']}}</strong></li>
	<li>- Kota : <strong>{{$details['city']}}</strong></li>
</ul>
  
  
