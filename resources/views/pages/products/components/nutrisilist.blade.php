<div id="nutrisi-list">
   <div class="panel panel-default panel-focus">
      <div class="panel-body panel-body-focus">
        <div class="row justify-content-center">
          <div class="col-12 text-center mb-5">
           <h1>
            <a href="/categories/nutrisi">
              Nutrisi
            </a>
          </h1>
{{--           <pre>
            @{{
              nutrisis
            }}
          </pre> --}}
        </div>
      </div>
      <div  class="row">
        <div v-for="nutrisi in nutrisis" :key="nutrisi.slug" class="col-md-4 col-xs-12 col-sm-12">
            <div class="card-pricing">
                <a :href="`/storage/${nutrisi.cover}`" data-toggle="lightbox" data-gallery="product-covers">
                  <img :src="`/storage/${nutrisi.cover}`" :alt="nutrisi.title" class="img-card-pricing img-responsive"/>
                </a>

                <div class="col-12">
                  <center>
                    <div class="fb-share-button btn-lg mt-3 mb-5" 
                    :data-href="`https://evoush.com/product/${nutrisi.categories[0].name}/${nutrisi.title}`" 
                    data-layout="button_count">
                  </div>
                </center>
              </div>

                <div class="card-content-pricing">
                  <h5 class="card-title-pricing mt-2"> @{{nutrisi.title}} </h5>
                  <p class="card-text"><small class="text-muted">
                      Category : @{{nutrisi.categories[0].name}}
                  </small></p>
                  {{-- <h4 class="card-text"><small class="text-muted">
                      IDR @{{nutrisi.price}}.00
                  </small></h4> --}}
                  <blockquote class="blockquote-footer" v-html="nutrisi.mini_description"></blockquote>

                </div>

                <div class="card-read-more-pricing">
                  <a :href="`/product/${nutrisi.categories[0].name}/${nutrisi.slug}`" class="btn btn-link btn-block">Detail Product</a>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  new Vue({
    el: '#nutrisi-list',
    data(){
      return {
        nutrisis: []
      }
    },

    mounted(){
      this.getnutrisi()
    },

    methods: {
      getnutrisi(){
        axios.get('/api/product/nutrisi')
        .then(res => {
          // console.log(res)
          this.nutrisis = res.data
        })
        .catch(err => console.log(err.message))
      },
    }

  })
</script>

<style type="text/css">
/*panel*/

.panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -1.7rem;
  padding: 12px;
  background-color: white;
  display: flex;
  flex-wrap: nowrap;
  align-content: justify-content-center;
  width: 90%;
  margin-left: 1.2rem;
}
.panel-body-focus {
  margin-top: 1rem;
  padding: 5px;
}
.panel-body-focus img{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);border-radius:0%;
}
.panel-body-focus p{
  line-height: 25px;
  font-size: 12px;
  text-indent: 21px;
  text-align: justify;
  margin-left: .1rem!important;
  width: 100%;
}

/*end panel;*/
@media only screen and (max-device-width: 812px) {
  #nutrisi-list{
    width: 100%!important;
    margin-top: -1rem;
  }
}
/* DESKTOP VERSION */
@media (min-width: 992px) { 
  #nutrisi-list{
    width: 100%!important;
  }
  /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -2rem;
      padding: 12px;
      background-color: white;
      margin-left: 3.5rem;
      width: 90%;
      /*height: 50vh;*/
    }
    .panel-body-focus {
      margin-top: .1rem;
      padding: 15px;
    }
    .panel-body-focus img{
      height: 300px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);
    }

    .panel-body-focus p{
      font-size: 18px;
      font-weight: 400;
      text-align: justify;
    }

    .panel-body-focus .anim{
      width: 550px;
    }

    /*end panel;*/
}
</style>