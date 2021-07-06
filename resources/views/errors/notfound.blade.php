@extends('layouts.homepage.webpage')

{{-- @section('title'){{'Evoush::Official | Error Page'}}@endsection
@section('canonical'){{ 'https://evoush.com/' }}@endsection
@section('meta_desc'){{'Error Page - Evoush::official'}}@endsection
@section('meta_key'){{'Error Page - Evoush::official'}}@endsection
@section('meta_author'){{'codesyariah122.github.io'}}@endsection
@section('og_title'){{'Evoush::Official | Error Page'}}@endsection
@section('og_site_name'){{'https://evoush.com/'}}@endsection
@section('og_desc'){{'Error Page - Evoush::Official'}}@endsection
@section('og_image'){{'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/funny_error_page.gif'}}@endsection
@section('og_url'){{'https://evoush.com/'}}@endsection --}}

@section('content')
<section id="error-404">
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/funny_error_page.gif" class="img-responsive">
          <blockquote class="blockquote-footer">
            {{session('status')}}
          </blockquote>

          <a @click="historyBack()" class="btn btn-success btn-block">Kembali</a> 

          <a href="{{route('evoush.contact')}}" class="btn btn-info btn-block text-white mb-5">Admin Contact</a>
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
@endsection
