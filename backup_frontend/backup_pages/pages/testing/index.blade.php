@extends('layouts.homepage.global')
{{-- meta head --}}
@section('title'){{$title}}@endsection
@section('canonical'){{ $canonical }}@endsection
@section('meta_desc'){{$meta_desc}}@endsection
@section('meta_key'){{$meta_key}}@endsection
@section('meta_author'){{$meta_author}}@endsection
@section('og_title'){{$og_title}}@endsection
@section('og_site_name'){{$og_site_name}}@endsection
@section('og_desc'){{$og_desc}}@endsection
@section('og_image'){{$og_image}}@endsection
@section('og_url'){{$og_url}}@endsection


{{-- content --}}
@section('content')
<div id="api">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				
				<h2>Welcome Di Selamat Datang</h2>

				<blockquote>
					{{'__Halaman testing Api Data'}}
				</blockquote>

				<div v-if="message">
					<div class="alert alert-success">
						@{{message}}
					</div>
				</div>

				

				<a class="btn btn-success btn-sm" @click="tambahData">Tambah Data</a>

				@include('pages.testing.components.form')

			</div>

			<div class="col-md-12 col-xs-12 col-sm-12 mt-5">
				<h3>List Table Data</h3>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th>Title</th>
							<th>Content</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="result in results" :key="result.id">
							<td>@{{result.title}}</td>
							<td>@{{result.content}}</td>
							<td>
								<button class="btn btn-info btn-sm">Edit</button>
								<button class="btn btn-danger btn-sm" @click="deleteData(result.id)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script>
	new Vue({
		el:'#api',
		data(){
			return {
				results: [],
				testData:{},
				message: '',
				loading: true
			}
		},


		created(){
			this.showData()
		},

		methods: {
			tambahData(){
				$('#formData').modal({
					'show': true
				})
			},

			kirimData(){
				axios.post('/api/test/data/store', {title:this.testData.title, content:this.testData.content})
				.then(res => {
					// console.log(res.data)
					$('#formData').modal('hide')
					this.message = res.data.message
					this.showData()
				})
				.catch(err => console.log(err.message))
				.finally(() => this.loading = false)
			},

			showData(){
				axios.get('/api/test/data/show-all')
				.then(res => {
					this.results = res.data
				})
			},

			deleteData(id){
				const ask = confirm("Yakin mau hapus ? ")
				if(ask){
					alert(`Ok Data dengan id : ${id} akan di hapus permanen`)
				}else{
					alert("Ok Gak Masalah sih")
				}
			}
		}
	})
</script>

@endsection