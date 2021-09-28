@extends('layouts.homepage.global')
@section('title'){{ $title }}@endsection
{{-- Meta Seo Tag --}}
@section('canonical'){{ $canonical }}@endsection
@section('meta_desc'){{ $meta_desc }}@endsection
@section('meta_key'){{ $meta_key }}@endsection
@section('meta_author'){{ $meta_author }}@endsection
@section('og_url'){{ $og_url }}@endsection
@section('og_type'){{ $og_type }}@endsection
@section('og_site_name'){{ $og_site_name }}@endsection
@section('og_title'){{ $og_title }}@endsection
@section('og_desc'){{ $og_desc }}@endsection
@section('og_image'){{ $og_image }}@endsection
@section('og_image_width'){{ $og_image_width }}@endsection
@section('og_image_height'){{ $og_image_height }}@endsection

@section('content')
<div id="homes">
	<homes></homes>
</div>
@endsection



