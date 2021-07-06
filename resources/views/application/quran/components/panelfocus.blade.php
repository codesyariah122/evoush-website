 <div id="panel-focus-about">
  <div class="panel panel-default panel-focus">
    <div class="panel-body panel-body-focus">
     
    </div>
  </div>
</div>

<script type="text/javascript">
  new Vue({
    el: '#panel-focus-about',
    data(){
      return {
        
      }
    },

    mounted(){
    },
    methods: {
     
    }
  })
</script>


<style>
/*panel*/
.panel-focus{
  box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
  border-radius: 12px;
  margin-top: -1.7rem;
  padding: 12px;
  background-color: white!important;
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
/*.panel-body-focus img{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);border-radius:0%;
}*/

.panel-body-focus p{
  line-height: 25px;
  font-size: 18px;
  /*text-indent: 21px;*/
  text-align: justify;
  margin-left: .1rem!important;
  width: 100%;
}
.panel-body-focus a {
  margin-left: 5rem;
  margin-bottom: 2rem;
}
/*end panel;*/
/* polaroid */
.polaroid{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
  color: rgba(0, 0, 0, 0.7);
  position: relative;
  text-align: center;
  margin-bottom: 1rem;
  margin-top:2rem;
}

.polaroid img{
  width: 350px;
  height: 300px;
  margin-top: 1rem;
}
.polaroid-body p{
  padding: 15px;
  color:black;
  font-family: 'Poiret One', cursive;font-weight:bold;
  font-size: 25px; 
}

.polaroid-body h2{
  padding: 25px;
  color:black;
  font-family: 'Poiret One', cursive;font-weight:bold;
  font-size: 25px;
}
/* end polaroid */

/*mobile setup*/
@media only screen and (max-device-width: 812px) {
  .panel-focus img{
    width: 290px!important;
    height: 270px!important;
  }
}
/*end mobile*/

/* DESKTOP VERSION */
  @media (min-width: 992px) { 

    /*panel*/
    .panel-focus{
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.5);
      border-radius: 12px;
      margin-top: -5rem;
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
      height: 350px;
      /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important; color: rgb(255,228,181);*/
    }
 
    .panel-body-focus p{
      font-size: 18px;
      font-weight: 400;
      text-align: justify;
    }
    .panel-body-focus a {
      margin-left: 5rem;
    }
    .panel-body-focus .anim{
      width: 550px;
    }

    /*end panel;*/

    .genap h1{
      margin-left: -.1rem!important;
    }
    .genap p{
      margin-left: -.1rem!important;
    }
    .genap a{
      margin-left: -.1rem!important;
    }

    .ganjil h1{
      margin-left: 8.7rem !important;
    }
    .ganjil p{
      margin-left: 8.7rem !important;
    }
    .ganjil a{
      margin-left: 7rem !important;
    }
    /* content */

    /*polaroid*/
    .polaroid{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
      color: rgba(0,0,0,0.7);
      position: relative;
      text-align: center;
      margin-bottom: 3rem;
      margin-top:2rem;
    }

    .polaroid-body h2{
      padding: 15px;
      color:black;
      font-family: 'Poiret One', cursive;font-weight:bold;
      font-size: 25px;
    }

    .polaroid-body p{
      padding: 15px;
      color:black;
      font-family: 'Poiret One', cursive;font-weight:bold;
      font-size: 25px; 
    }

    .polaroid-vector{
      width: 500px;
      height: 500px;
      margin-top: 1rem;
      margin-left: .1rem;
    }
    /*end polaroid*/

  }
</style>
