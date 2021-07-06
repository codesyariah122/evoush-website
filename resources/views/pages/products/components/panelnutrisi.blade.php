<div id="panel-nutrisi">
	<div class="container mt-5">
		<div v-for="panel in panels" >
			<div v-if="panel.id % 2 == 1">
				<div class="row">
					<div class="col-md-4">
						<div data-aos="zoom-out-right" data-aos-easing="ease-out-sine" data-aos-duration="1500">
							<h1 v-html="panel.header"></h1>
							<p v-html="panel.paragraph"></p>
						</div>
					</div>
					<div class="col-md-8 col-xs-8 col-sm-8">
						<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
							<div v-if="panel.iframe" class="embed-responsive embed-responsive-1by1">
								<iframe v-if="panel.iframe" :src="panel.iframe"  width="560" height="397" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
							</div>
							<div v-else>
								<img :src="panel.vector" class="img-responsive intents-nutrisi-img">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div v-else>
				<div class="row genap-nutrisi">
					<div class="col-md-6 col-xs-6 col-sm-6">
						<div data-aos="zoom-out-left" data-aos-easing="ease-in-sine" data-aos-duration="1500">
							<img :src="panel.vector" class="img-responsive intents-nutrisi-img">
						</div>
					</div>
					<div class="col-md-6 col-xs-6 col-sm-6">
						<div data-aos="zoom-out-right" data-aos-easing="ease-in-sine" data-aos-duration="1500">
							<h1 v-html="panel.header"></h1>
							<p class="mt-5" v-html="panel.paragraph"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	new Vue({
		el: '#panel-nutrisi',
		data(){
			return {
				panels: [
					{
						id:1,
						header: `Healthy evoush`,
						paragraph: `<b><u>Product Nutrisi</u></b> <span style="font-family: Walkway; color:#ff3b40; font-weight: 900;"><b>evoush</b></span> merupakan hasil karya dari bahan pilihan di proses dengan kualitas terbaik, tidak hanya, akan menjadi sebuah faktor unggul bagi bisnis Anda di <span style="font-family: Walkway; color:#ff3b40; font-weight: 900;"><b>evoush</b></span>, namun produk nutrisi <span style="font-family: Walkway; color:#ff3b40; font-weight: 900;"><b>evoush</span></b> kaya akan manfaat.`,
						vector: '',
						iframe: "https://www.youtube.com/embed/Wq-RLfRgImI"
					},
					{
						id:2,
						header: `Nikmat Tuhan Manalagi Yang Kau Dustakan ! `,
						paragraph: `<b>Penggalan prolog diatas</b> bukan sekedar kalimat normatif belaka. Adakalanya kerja keras kita menemui titik jemu dikala sisi manusiawi itu terabaikan, bahkan mungkin banyak segi dari kepentingan kita yang selalu kita utamakan. Betapa semua kerja keras tidak akan pernah berharga jika diri kita tidak menyadari begitu pentingnya kesehatan raga itu... <details><summary>Baca Selanjutnya</summary> Betapa akan ada banyak langkah yang tersendat jika kesehatan kita terganggu, berbisnis yah mesti membawa raga kita untuk ikut serta bergelut dalam perjuangan menanam bibit, betapa semua letih akan terbayar jika kesehatan kita selalu di puncak performa.</details>`,
						iframe: '',
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/product/nutrisi/vector/nutrisi3.jpg",
					},
					{
						id: 3,
						header: `Bisnis yang menyehatkan, Sehat Untuk Berbisnis`,
						paragraph: `Harga diri seorang pebisnis adalah <b>Amanah &amp; Kejujuran</b>, amanah itu adalah sebuah kepercayaan yang tidak boleh kita abaikan, apa amanah terbesar kita ? ada berbagai macam jawaban dan pandangan, tapi dalam hal ini, hal terkecil dari amanah kita adalah merawat alam semesta ... <details><summary>Baca Selanjutnya</summary> wah terlalu besar itu, yah tentu !!! karena yang menunggu kita adalah sebuah rezeki yang besar dari penghasilan yang besar, oleh karena itu kita persiapkan dari sekecilnya yaitu merawat kesehatan jasmani kita, karena selain itu adalah nikmat yang paling berharga itu pun menjadi sebuah tolak ukur bagi kepercayaan alam semesta untuk memberi kita peluang peruntungan yang lebih layak di hari ini dan masa mendatang.</details>`,
						iframe: 'https://www.youtube.com/embed/QsRIambepjA',
						vector: "https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/product/nutrisi/anim/nutrisi_anim3.gif",
					}
				]
			}
		}
	})
</script>



<style>
@media only screen and (max-device-width: 812px) {
	#intents-nutrisi{
		width: 100%!important;
		margin-top: -1rem;
	}
	#intents-nutrisi h1{
		margin-left: 1rem;
		text-align: center;
	}
	#intents-nutrisi p{
		text-indent: 21px;
		text-align: justify;
		margin-top: 1rem;
		margin-left: 1rem;
	}
	.intents-nutrisi-img{
		width: 320px !important;
		margin-left: -.1rem;
	}

}
/* DESKTOP VERSION */
  @media (min-width: 992px) { 
  	#intents-nutrisi{
  		width: 100%!important;
  		margin-top: 10rem;
  	}
	#panel-nutrisi p{
		font-family: 'Poiret One';
		font-size: 21px!important;
		margin-top: 1rem!important;
		margin-left: 1.3rem;
		text-align: justify;
		text-indent: 18px;
	}
	.intents-nutrisi-img{
		width: 800px !important;
		margin-left: 1rem;
	}
	.genap-nutrisi {
		margin-top: 1rem;
		margin-bottom: 3rem;
	}
	.genap-nutrisi h1,p {
		margin-top: 5rem;
		margin-left: 2rem;
	}
	.genap-nutrisi img{
		width: 500px !important;
		margin-left: -1rem;
	}
}
</style>