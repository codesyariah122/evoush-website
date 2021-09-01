<template>
	<div>
		<div class="panel panel-default panel-focus">
			<div class="panel-body panel-body-focus">
				<div id="panel-focus-search">
					<div class="row justify-content-center">
						<div class="col-8 mb-5 mt-5">
							<h4 class="text-center text-secondary">Gunakan Pencarian Member</h4>
							<small class="text-danger mb-2">
								<b>Gunakan </b> pencarian member untuk mempercepat proses mencari member evoush, ketik nama member yang ingin di cari di kolom pencarian member dibawah ini : 
							</small>
							<br>
							<!-- Another variation with a button -->
							<div class="input-group">
								<input type="text" id="keyword" class="form-control" placeholder="cari berdasarkan nama member" autofocus="on" autocomplete="off" v-on:keyup.13="enterMember($event)" v-model="keyword">
								<div class="input-group-append">
									<button class="btn btn-danger" id="cari" type="button" v-on:click="getMemberUsername">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-xs-6 col-sm-6">


							<div v-if="notActive">
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Oopps ! </strong> member yang anda cari, belum <span class="text-danger">di aktivasi</span> oleh member sponsor.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>

							<div v-if="error">
								<div class="alert alert-warning alert-dismissible fade show" role="alert">
									<strong>Silahkan input ! </strong> nama member yang ingin di cari, <span class="text-danger">terlebih dahulu</span>.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>

							<div v-else>
								<div v-if="show">

									<div v-if="loading">
										<center>
											<img src="https://img.pikbest.com/58pic/35/39/61/62K58PICb88i68HEwVnm5_PIC2018.gif!bw700" width="200" class="img-responsive">
										</center>
									</div>
									<div v-else>
										<div v-if="empty">
											<div class="alert alert-warning alert-dismissible fade show" role="alert">
												<strong>Ooops ! </strong> Member yang anda cari belum <span class="text-danger">Terdaftar</span> atau belum masuk di database kami.
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
										</div>

										<div v-else>
											<div class="col-md-8 col-xs-12 col-sm-12">
												<div class="card mb-3">
													<div class="row no-gutters">
														<div class="col-md-4">
															<div v-if="result.avatar">
																<a :href="`../../../storage/${result.avatar}`" class="popup col-sm-4">
																	<img class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2" :src="`../../../storage/${result.avatar}`" alt="Card image cap">
																</a>        
															</div>
															<div v-else>
																<a href="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" class="popup col-sm-4">
																	<img class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2" src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" alt="Card image cap">
																</a>
															</div>
														</div>
														<div class="col-md-8">
															<div class="card-body">
																<h5 class="card-title">{{result.username}}</h5>
																<div v-if="result.quotes">
																	<blockquote class="blockquote-footer">
																		{{result.quotes}} <br>
																		<small class="text-info">Quotes By : {{result.name}}</small>  
																	</blockquote>
																</div>
																<div v-else>
																	<blockquote class="blockquote-footer">
																		{{result.name}} belum menambahkan quotes <br>
																	</blockquote>
																</div>



																<div class="col-12 mt-3">
																	<a :href="`/member/${result.username}`" class="btn btn-info btn-sm text-white">Lihat Profile</a>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div v-else> <!-- else show -->
								<h4 class="text-success">Hasil pencarian akan muncul disini ...</h4>
							</div>

						</div> <!-- else error -->

					</div>       


				</div>       
			</div>

			<h1 class="underline" style="margin-top: 5rem;"></h1>

			<!-- member list -->

			<div v-if="loading">
				<center>
					<img src="https://img.pikbest.com/58pic/35/39/61/62K58PICb88i68HEwVnm5_PIC2018.gif!bw700" width="200" class="img-responsive">
				</center>
			</div>
			<div v-else>
				<!-- row member-list -->
				<div class="row justify-content-center mb-5">
					<div class="col-md-12">
						<h1 class="text-center mb-3">Lists member evoush : </h1>
					</div>

					<div v-for="(member, imageIndex) in members.data" class="col-md-4 col-xs-12 col-sm-12">
						<div class="card mb-3">
							<div class="row no-gutters">
								<div class="col-md-4">

									<div v-if="member.avatar">
										<a :href="`../../../storage/${member.avatar}`" class="popup col-sm-4">
											<img :src="`../../../storage/${member.avatar}`" :alt="member.name" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
										</a>
									</div>

									<div v-else>
										<a href="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" class="profile-popup col-sm-4">
											<img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" :alt="member.name" class="image--profile-member img-responsive rounded-circle center-block d-block mx-auto mt-2">
										</a>
									</div>

								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title">
											{{member.name}} | {{member.username}}
										</h5>
										<blockquote class="blockquote-footer">
											{{member.quotes}} <br>
											<small class="text-info">Quotes By : {{member.name}}</small>  
										</blockquote>

										<h5 class="card-title text-secondary">Social Links {{member.name}}</h5>
										<ul class="socials">
											<li>
												<a :href="`https://wa.me/${member.phone}?text=Hallo%20${member.name}%20saya%20tertarik%20untuk%20join%20Evoush, %20apa%20anda%20bisa%20bantu%20saya`" target="_blank">
													<i class="fab fa-fw fa-2x fa-whatsapp text-success"></i>
												</a>
											</li>
											<li>
												<a :href="`https://www.facebook.com/${member.facebook}`" target="_blank">
													<i class="fab fa-fw fa-2x fa-facebook text-primary"></i>
												</a>
											</li>
											<li>
												<a :href="`https://www.instagram.com/${member.instagram}`" target="_blank">
													<i class="fab fa-fw fa-2x fa-instagram-square"></i>
												</a>
											</li>
											<li>
												<a :href="`${member.youtube}`" target="_blank">
													<i class="fab fa-fw fa-2x fa-youtube text-danger"></i>
												</a>
											</li>
											<li>
												<a :href="`mailto:${member.email}`" target="_blank">
													<i class="fas fa-fw fa-2x fa-envelope-open-text text-warning"></i>
												</a>
											</li>
										</ul>

										<div class="col-12 mt-3">
											<a :href="`/member/${member.username}`" class="btn btn-info btn-sm text-white">Lihat Profile</a>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div> 	

				</div> <!-- end row member-list -->
				
				<!-- row pagination -->
				<div class="row justify-content-center">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<br>
						<ul style="list-style: none;">
							<li><b>Page :{{members.from}}</b></li>
							<li><b>Per Page : {{members.per_page}}</b></li>
							<li><b>Total Page : {{members.total}}</b></li>
						</ul>
						<br>
						<blockquote class="blockquote-footer text-danger">
							Gunakan link halaman di bawah untuk melihat list member selanjutnya.
						</blockquote>
						<pagination align="center" :data="members" @pagination-change-page="listMembers"></pagination>

					</div>
				</div> <!-- end row pagination -->

			</div>
			

		</div>

	</div>
</template>

<script>
	export default {
		data(){
			return {
				loading: true,
				members: {},
				index:null,
				result: {},
				show: false,
				empty:false,
				error: false,
				notActive: false,
				Keyword:'',
				status: '',
				keycode: '',
				prolog: {
					content: `Ketikan nama <span class="text-danger"><b>member</b></span> yang ingin dicari di bagian kolom input pencarian diatas <small class="text-info">(Diharapkan member telah terdaftar sebagai member evoush dan telah mengirimkan data pada team kreatif evoush tentang informasi member evoush tersebut)</small>`,
					vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/search_member_anim1.gif"
				},
				items: [
				'https://cosmos-images2.imgix.net/file/spina/photo/20565/191010_nature.jpg?ixlib=rails-2.1.4&auto=format&ch=Width%2CDPR&fit=max&w=835',
				'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/nature-quotes-1557340276.jpg?crop=0.666xw:1.00xh;0.168xw,0&resize=640:*',
				],
			}
		},

		mounted(){
			this.listMembers()
		},

		methods: {

			listMembers(page){

				this.axios
				.get(`/api/evoush/member-list?page=${page}`)
				.then(res => {
					console.log(res)
					return res.data
				})
				.then(data => {
					console.log(data)
					this.members = data
				})
				.catch(err => console.log(err.response))
				.finally(() => this.loading = false)
			},


			getMemberUsername(){
				const keyword = document.querySelector('#keyword').value

				if(keyword == '' || keyword == 'undefined'){
					this.empty = false
					this.error = true
					this.resetInput()
					this.emptyAlert('Ooops !! Sory Sepertinya anda belum mengisi kolom input pencarian', 'https://1.bp.blogspot.com/-WgZXdPd5JwI/XaqDfFjBzBI/AAAAAAAAAOg/9cdjzRQ6o3059FvzG6JuttbEvIykYHtnwCLcBGAsYHQ/s1600/Nyan-Cat-GIF-source.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
				}else{
					this.axios
					.get(`/api/member/search/${this.keyword}`)
					.then(res=>{
						if(res.data.length > 0){
							this.resetInput()

							if(res.data[0].status == "INACTIVE"){
								this.Keyword = this.keyword
								this.empty = true
								this.show = false
								this.notActive = true
								this.resetInput()
								this.emptyAlert(`Ooops !! Username <b>${res.data[0].username}</b> belum di aktivasi`, 'https://media.tenor.com/images/f5cb4fb6a45ea2a469fd3ef5b1ad06f8/tenor.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
							}else{
								this.empty = false
								this.show = true
								this.result = res.data[0]
								this.status = res.data[0].status
								this.emptyAlert(`Okay !! Username <b>${res.data[0].username}</b> ditemukan`, 'https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
							}

						}else{
							this.empty = true
							this.show = true
							this.resetInput()
							this.emptyAlert('Ooops !! Sory Username yang anda cari nampaknya tidak terdaftar', 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
						}

					})
					.catch(err => console.log(err.response))
					.finally(() => this.loading = false)
				}
			},

			enterMember(event){
				const keyword = event.target.value
				if(keyword == ''){
					this.error = true
					this.resetInput()
					this.emptyAlert('Ooops !! Sory Sepertinya anda belum mengisi kolom input pencarian', 'https://1.bp.blogspot.com/-WgZXdPd5JwI/XaqDfFjBzBI/AAAAAAAAAOg/9cdjzRQ6o3059FvzG6JuttbEvIykYHtnwCLcBGAsYHQ/s1600/Nyan-Cat-GIF-source.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
				}else{
					this.error = false
					this.axios.get(`/api/member/search/${keyword}`)
					.then(res => {
						if(res.data.length > 0){
							this.empty = false
							this.show = true
							this.result = res.data[0]
							this.resetInput()
							if(res.data[0].status == "INACTIVE"){
								this.Keyword = keyword
								this.empty = true
								this.show = false
								this.notActive = true
								this.resetInput()
								this.emptyAlert(`Ooops !! Username <b>${res.data[0].username}</b> belum di aktivasi`, 'https://media.tenor.com/images/f5cb4fb6a45ea2a469fd3ef5b1ad06f8/tenor.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
							}else{
								this.emptyAlert(`Okay !! Username <b>${res.data[0].username}</b> ditemukan`, 'https://media1.tenor.com/images/808f60557342d540771c340e0a387247/tenor.gif?itemid=9727038', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
							}
						}else{
							this.empty = true
							this.show = true
							this.resetInput()
							this.emptyAlert('Ooops !! Sory Username yang anda cari nampaknya tidak terdaftar', 'https://media0.giphy.com/media/utmZFnsMhUHqU/200.gif', 'https://img.freepik.com/free-vector/abstract-simple-background_53876-99863.jpg?size=626&ext=jpg')
						}
					})
				}
			},

			emptyAlert(message, gif, bg){
				this.$swal({
					title: message,
					width: 600,
					padding: '3em',
					background: `#fff url(${bg})`,
					backdrop: `
					rgba(0,0,123,0.4)
					url("${gif}")
					left top
					no-repeat
					`
				})
			},

			resetInput(){
				this.keyword = ''
			}

		}
	}
</script>

<style scoped>
/*panel*/

.panel-focus{
	box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
	border-radius: 12px;
	margin-top: -5rem;
	padding: 12px;
	background-color: white!important;
/*  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;*/
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
	margin-top: -1rem;
	/*padding: 5px;*/
}

input:focus{
	background-color: salmon;
	color: #fff!important;
}
ul li{
	list-style: none;
}

.image--profile {
	width: 155px;
	height: 160px;
	margin-top: 5rem!important;
	display: flex;
	justify-content: center;
}

.image--profile-member {
	width: 100px;
	height: 100px;
	display: flex;
	justify-content: center;
}

.quotes{
	font-size: 16px!important;
	font-family: 'Walkway';
	/*color: firebrick;*/
}
.socials{
	display: flex;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	list-style: none;
	font-size: 11px!important;
	margin-left:-2rem!important;
}
.fa-instagram-square {
	color: transparent;
	background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
	background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
	background-clip: text;
	-webkit-background-clip: text;
}
/*end mobile*/

/* DESKTOP VERSION */
@media (min-width: 992px) { 
	input:focus{
		background-color: salmon;
		color: #fff!important;
	}
	ul li{
		list-style: none;
	}


	/*panel*/
	.panel-focus{
		box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
		border-radius: 12px;
		margin-top: -5.5rem;
		/*padding: 12px;*/
		background-color: white;
		margin-left: 3.5rem;
		width: 90%;
		/*height: 50vh;*/
	}
	.panel-body-focus {
		margin-top: 5rem;
		/*padding: 15px;*/
	}

	.image--profile {
		width: 155px;
		height: 160px;
		margin-top: -10rem!important;
		display: flex;
		justify-content: center;
	}
	.image--profile-member {
		width: 100px;
		height: 100px;
		display: flex;
		justify-content: center;
	}

	.quotes{
		width: 40%!important;
		font-size: 18px!important;
		font-family: 'Walkway';
		/*color: firebrick;*/
	}
	.socials{
		display: flex;
		flex-wrap: nowrap;
		justify-content: center;
		align-items: center;
		list-style: none;
	}
	.fa-instagram-square {
		color: transparent;
		background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
		background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
		background-clip: text;
		-webkit-background-clip: text;
	}


}
</style>