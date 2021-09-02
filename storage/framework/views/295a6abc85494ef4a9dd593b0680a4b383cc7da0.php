



<?php $__env->startSection('content'); ?>
<section id="error-404">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/funny_error_page.gif" class="img-responsive">
          <blockquote class="blockquote-footer">
            Maaf request anda ke halaman ini terkendala. 
            <details>
              <summary>Detail Error</summary>
              <b class="text-danger"><?php echo e($exception->getMessage()); ?></b>
              <p class="text-danger">
                Sepertinya terjadi kesalahan teknis atau mungkin halaman situs sedang dalam proses update content atau proses development yang bersangkutan dengan content situs
              </p>
            </details>
          </blockquote>

          <a @click="historyBack()" class="btn btn-success btn-block">Kembali</a> 

          <a href="#" class="btn btn-info btn-block text-white mb-5">Admin Contact</a>
        </div>
      </div>
    </div>

  </section>

  <script type="text/javascript">
    new Vue({
      el: '#error-404',
      methods: {
        historyBack(){
          window.history.back()
        },
      }
    })
  </script>
<style type="text/css">
  /*section {
    width: 100%;
  }*/
  #error-404{
    width: 100%;
  }
  #error-404 img{
    width:100%;
  }
  #error-404 a {
    cursor: pointer;
  }
  /* DESKTOP VERSION */
  @media (min-width: 992px) { 
    #error-404{
      width: 100%;
      margin-top: -5rem!important;
    }
    #error-404 img{
      width: 100%;
    }
    #error-404 a {
      cursor: pointer;
    }
    
    .content{
      margin-left: 13rem!important;
    }

    #error-404 blockquote{
      font-size: 25px;
      font-family: 'Walkway';
    }
  }
  </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/errors/404.blade.php ENDPATH**/ ?>