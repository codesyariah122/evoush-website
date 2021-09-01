@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
               <div class="col-md-6"></div>
               <div class="col-md-6">
                   <ul class="nav nav-pills card-header-pills">
                       <li class="nav-item">
                           <a class="nav-link {{Request::get('status') == NULL &&
                           Request::path() == 'products' ? 'active' : ''}}" href="
                           {{route('products.index')}}">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{Request::get('status') == 'publish' ?
                           'active' : '' }}" href="{{route('products.index', ['status' =>
                           'publish'])}}">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{Request::get('status') == 'draft' ? 'active'
                           : '' }}" href="{{route('products.index', ['status' => 'draft'])}}">Draft</a>
                       </li>
                       <li class="nav-item">
                            <a class="nav-link {{Request::path() == 'products/trash' ? 'active'
                            : ''}}" href="{{route('products.trash')}}">Trash</a>
                        </li>
                    </ul>
                </div>
            </div>

            @if(session('status'))
                <div class="alert alert-success">
                   {{session('status')}}
               </div>
            @endif

        	<div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-12">
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>Cover</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            @if($product->cover)
                                            <img src="{{asset('storage/' . $product->cover)}}"
                                            width="96px"/>
                                            @endif
                                        </td>
                                        <td>{{$product->title}}</td>
                                        <td>
                                            <ul class="pl-3">
                                               @foreach($product->categories as $category)
                                               <li>{{$category->name}}</li>
                                               @endforeach
                                           </ul>
                                        </td>
                                        <td>{{$product->stock}}</td>
                                        <td>Rp. {{number_format($product->price, 2)}}</td>
                                        <td>
                                            <form
                                            method="POST"
                                            action="{{route('products.restore', [$product->id])}}"
                                            class="d-inline"
                                            >
                                                @csrf
                                                <input type="submit" value="Restore" class="btn btn-success"/>
                                            </form>

                                            <form
                                            method="POST"
                                            action="{{route('products.deletepermanent', [$product->id])}}"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this product permanently?')"
                                            >
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="10">
                                            {{$products->appends(Request::all())->links()}}
                                        </td>
                                    </tr>
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