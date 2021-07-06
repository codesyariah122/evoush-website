<div v-for="kosmetik in kosmetiks" :key="kosmetik.slug" class="col-md-4 col-xs-12 col-sm-12">
            <div class="card-pricing">
                <a :href="`/storage/${kosmetik.cover}`" data-toggle="lightbox" data-gallery="product-covers">
                  <img :src="`/storage/${kosmetik.cover}`" :alt="kosmetik.title" class="img-card-pricing img-responsive"/>
                </a>

                <div class="card-content-pricing">
                  <h5 class="card-title-pricing mt-2"> @{{kosmetik.title}} </h5>
                  <p class="card-text"><small class="text-muted">
                      Category : @{{kosmetik.categories[0].name}}
                  </small></p>
                  <h4 class="card-text"><small class="text-muted">
                      Rp. @{{kosmetik.price}}
                  </small></h4>
                  <blockquote class="blockquote-footer" v-html="kosmetik.mini_description"></blockquote>

                  <a :href="`/product/${kosmetik.categories[0].name}/${kosmetik.slug}`" class="btn btn-success btn-sm"> 
                    View Product 
                  </a>
                </div>

                <div class="card-read-more-pricing">
                  <a :href="kosmetik.slug" class="btn btn-link btn-block">Checkout</a>
                </div>
            </div>

        </div>




  <script type="text/javascript">
  new Vue({
    el: '#kosmetik-list',
    data(){
      return {
        kosmetiks: []
      }
    },

    mounted(){
      this.getKosmetik()
    },

    methods: {
      getKosmetik(){
        axios.get('/api/product/kosmetik')
        .then(res => {
          console.log(res)
          this.kosmetiks = res.data
        })
        .catch(err => console.log(err.message))
      },
    }

  })
</script>





 @foreach($kosmetiks as $kosmetik)
            <div class="col-md-4 col-xs-12 col-sm-12">
                <div class="card-pricing">
                    <a href="/storage/{{$kosmetik->cover}}" data-toggle="lightbox" data-gallery="product-covers">
                      <img src="/storage/{{$kosmetik->cover}}" alt="{{$kosmetik->title}}" class="img-card-pricing img-responsive"/>
                    </a>

                    <div class="card-content-pricing">
                      <h5 class="card-title-pricing mt-2"> {{$kosmetik->title}} </h5>
                      <p class="card-text"><small class="text-muted">
                          Category : {{$kosmetik->categories[0]->name}}
                      </small></p>
                      <h4 class="card-text"><small class="text-muted">
                          Rp. {{$kosmetik->price}}
                      </small></h4>
                      <blockquote class="blockquote-footer" v-html="kosmetik.mini_description"></blockquote>

                      <a href="/product/{{$kosmetik->categories[0]->name}}/{{$kosmetik->slug}}" class="btn btn-success btn-sm"> 
                        View Product 
                      </a>
                    </div>

                    <div class="card-read-more-pricing">
                      <a href="{{$kosmetik->slug}}" class="btn btn-link btn-block">Checkout</a>
                    </div>
                </div>
            </div>
          @endforeach