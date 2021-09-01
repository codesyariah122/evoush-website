<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){

         if(Gate::allows('manage-categories')) return $next($request);
         abort(403, 'Anda tidak memiliki cukup hak akses');
        });

    }

    public function index(Request $request)
    {
        $status = $request->get('status');
        $buyer_email = $request->get('buyer_email');
        $orders = Order::with('user')
        ->with('products')
        ->whereHas('user', function($query) use ($buyer_email) {
           $query->where('email', 'LIKE', "%$buyer_email%");
       })
        ->where('status', 'LIKE', "%$status%")
        ->paginate(10);

        $context = [
            'title' => 'Order List',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'orders' => $orders
        ];
    
        return view('dashboard.orders.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $context = [
            'title' => 'Order List',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
                // 'users' => User::where('name', Auth::user()->name)->paginate(10)
            'order' => Order::findOrFail($id)
        ];
        return view('dashboard.orders.edit', $context);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->get('status');
        $order->save();
        return redirect()->route('orders.edit', [$order->id])->with('status',
            'Order status succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
