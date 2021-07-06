@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('status'))
            <div class="alert alert-success">
               {{session('status')}}
           </div>
           @endif

        	<a href="{{route('orders.index')}}" class="btn btn-success mt-2 mb-3">Order List</a>

            <div class="card">
                <div class="card-header">{{ __($title) }}</div>
                <div class="card-body">
                    <form
                    class="shadow-sm bg-white p-3"
                    action="{{route('orders.update', [$order->id])}}"
                    method="POST"
                    >
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <label for="invoice_number">Invoice number</label><br>
                    <input type="text" class="form-control" value="{{$order->invoice_number}}" disabled>
                        <br>
                        <label for="">Buyer</label><br>
                        <input disabled class="form-control" type="text" value="{{$order->user->name}}">
                            <br>
                            <label for="created_at">Order date</label><br>
                            <input type="text" class="form-control" value="{{$order->created_at}}" disabled >
                                <br>
                                <label for="">Products ({{$order->totalQuantity}}) </label><br>
                                <ul>
                                   @foreach($order->products as $product)
                                   <li>{{$product->title}} <b>({{$product->pivot->quantity}})</b></li>
                                   @endforeach
                               </ul>
                               <label for="">Total price</label><br>
                               <input class="form-control" type="text" value="{{$order->total_price}}" disabled>
                                <br>
                                <label for="status">Status</label><br>
                                <select class="form-control" name="status" id="status">
                                 <option {{$order->status == "SUBMIT" ? "selected" : ""}}
                                    value="SUBMIT">SUBMIT</option>
                                    <option {{$order->status == "PROCESS" ? "selected" : ""}}
                                        value="PROCESS">PROCESS</option>
                                        <option {{$order->status == "FINISH" ? "selected" : ""}}
                                            value="FINISH">FINISH</option>
                                            <option {{$order->status == "CANCEL" ? "selected" : ""}}
                                                value="CANCEL">CANCEL</option>
                                            </select>
                                            <br>
                                            <input type="submit" class="btn btn-primary" value="Update">
                            </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection