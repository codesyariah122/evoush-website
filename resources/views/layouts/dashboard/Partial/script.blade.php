{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('dashboard/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('dashboard/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('dashboard/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('dashboard/js/demo/chart-pie-demo.js')}}"></script>

<script type="text/javascript">
    $('#categories').select2({
    	ajax: {
    		url: '/ajax/categories/search',
    		processResults: function(data){
    			return {
    				results: data.map(function(item){return {id: item.id, text: item.name} })
    			}
    		}
    	}
	});

	
</script>