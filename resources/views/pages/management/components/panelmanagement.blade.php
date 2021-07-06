 <div id="panel-focus-about">
  <div class="panel panel-focus">
    <div class="panel-body panel-body-focus">
      <div class="row">
        
        <div v-for="content in contents" :key="content.id" class="col-12 col-xs-12 col-sm-12">
          <img :src="content.image" class="img-responsive">
        </div>

      </div>
    </div>
  </div>
</div>



 <script type="text/javascript">
    new Vue({
      el: '#panel-focus-about',
      data(){
        return {
          title: 'Management Evoush',
          contents: [
            {id: 1, image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/management/1QQ.jpg'},
            {id: 2, image: 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/management/1QQQ.jpg'}
          ]
        }
      }
    })
  </script>
<style>
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
  margin-top: -11rem;
  /*padding: 5px;*/
}
/*end panel;*/

/* DESKTOP VERSION */
  @media (min-width: 992px) {

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -8rem;
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
 
    .panel-body-focus p{
      font-size: 18px;
      font-weight: 400;
      text-align: justify;
    }

    .panel-body-focus img{
      width: 100%;
      height: 100vh;
    }

  }
</style>
