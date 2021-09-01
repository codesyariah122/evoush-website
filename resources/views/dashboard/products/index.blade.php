@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
               <div class="col-md-6 mt-2"></div>
               <div class="col-md-6">
                   <ul class="nav nav-pills">
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('products.index')}}">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('products.index', ['status' =>
                           'publish'])}}">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('products.index', ['status' =>
                           'draft'])}}">Draft</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('products.trash')}}">Trash</a>
                       </li>
                   </ul>
               </div>
           </div>
           <hr class="my-3">

        	<a href="{{route('products.create')}}" class="btn btn-success mt-2 mb-3">Add Product</a>

            @if(session('status'))
                <div class="alert alert-success">
                   {{session('status')}}
               </div>
            @endif

            <form
                action="{{route('products.index')}}" class="mt-2 mb-2"
                >
                <div class="input-group">
                    <input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
                    <div class="input-group-append">
                       <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
               {{--  <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Nutrisi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Kosmetik</a>
                  </li>
                </ul> --}}
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                           <table class="table table-bordered table-stripped">
                             <thead>
                                 <tr>
                                     <th><b>Cover</b></th>
                                     <th><b>Title</b></th>
                                     <th><b>Status</b></th>
                                     <th><b>Categories</b></th>
                                     <th><b>Stock</b></th>
                                     <th><b>Price</b></th>
                                     <th><b>Action</b></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($products as $product)
                                 <tr>
                                     <td>
                                         @if($product->cover)
                                         <img src="{{asset('storage/'.$product->cover)}}" width="100px" class="img-responsive">
                                         @else
                                         No Product Cover
                                         @endif
                                     </td>
                                     <td>{{$product->title}}</td>
                                     <td>
                                         @if($product->status == "DRAFT")
                                         <span class="badge badge-dark text-white">{{$product->status}}</span>
                                         @else
                                         <span class="badge badge-success">{{$product->status}}</span>
                                         @endif
                                     </td>
                                     <td>
                                         <ul>
                                             @foreach($product->categories as $category)
                                             <li>{{$category->name}}</li>
                                             @endforeach
                                         </ul>
                                     </td>
                                     <td>{{$product->stock}}</td>
                                     <td>Rp. {{number_format($product->price, 2)}}</td>
                                     <td>
                                       <a
                                       href="{{route('products.edit', [$product->id])}}"
                                       class="btn btn-info btn-sm"
                                       > Edit </a>

                                       <form
                                       method="POST"
                                       class="d-inline"
                                       onsubmit="return confirm('Move product to trash?')"
                                       action="{{route('products.destroy', [$product->id])}}"
                                       >
                                        @csrf
                                           <input
                                           type="hidden"
                                           value="DELETE"
                                           name="_method">
                                           <input
                                           type="submit"
                                           value="Trash"
                                           class="btn btn-danger btn-sm">
                                        </form>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                             <tfoot>
                                 <td colspan="10">
                                     {{$products->appends(Request::all())->links()}}
                                 </td>
                             </tfoot>
                         </table>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection