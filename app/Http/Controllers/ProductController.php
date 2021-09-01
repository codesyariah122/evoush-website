<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Traits\ImageUpload;
use Illuminate\Validation\Rule;
use App\Models\User;
use Validator;
use Auth;

class ProductController extends Controller
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

            if(Gate::allows('manage-products')) return $next($request);
           abort(403, 'Anda tidak memiliki cukup hak akses');
       });
    }
    public function index(Request $request)
    {
        //
        $status = $request->get('status');
        $category = $request->get('category');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        if($status){
           $products = \App\Models\Product::with('categories')->where('title', "LIKE", "%$keyword%")->where('status', strtoupper($status))->paginate(3);
        }else {
           $products = \App\Models\Product::with('categories')->where('title', "LIKE", "%$keyword%")->paginate(3);
        }


         $context = [
            'title' => 'Product List',
            'brand' => 'evoush',
            'products' => $products,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.products.index', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $context = [
            'title' => 'Create Product',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.products.create', $context);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // var_dump($request->all()); die;
      $new_product = new \App\Models\Product;

        Validator::make($request->all(), [
           "title" => "required|min:5|max:200",
           "description" => "required|min:20|max:1000",
           "mini_description" => "required|min:20|max:100",
           "price" => "required|digits_between:0,10",
           "stock" => "required|digits_between:0,10",
           "cover" => "required"
       ]);

        $new_product->title = $request->get('title');
        $new_product->description = $request->get('description');
        $new_product->mini_description = $request->get('mini_description');
        $new_product->price = $request->get('price');
        $new_product->stock = $request->get('stock');
        $new_product->status = $request->get('save_action');

        $cover = $request->file('cover');
        if($cover){
           $cover_path = $cover->store('product-covers', 'public');
           $new_product->cover = $cover_path;
        }
        $new_product->slug = \Str::slug($request->get('title'));
        $new_product->created_by = \Auth::user()->id;
        $new_product->save();
        $new_product->categories()->attach($request->get('categories'));


       if($request->hasFile('slider')) {

          foreach($request->file('slider') as $file)
          {
            // $name = time().rand(1,100).'.'.$file->extension();
            $unique_name = md5($file. time());
            $file->move(public_path('storage').'/product-sliders/', $unique_name);
            $files[] = $unique_name;
          }

          $new_product->slider = json_encode($files);

          // var_dump($new_product->slider); die;
        }

        if($request->get('save_action') == 'PUBLISH'){
          $new_product->save();
           return redirect()
           ->route('products.create')
           ->with('status', 'New Product With id : '.$new_product->id.' successfully saved and published');
        }else {
            return redirect()
               ->route('products.create')
               ->with('status', 'Product saved as draft');
        }

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
        //
        $context = [
            'title' => 'Edit Product',
            'brand' => 'evoush',
            'product' => \App\Models\Product::findOrFail($id),
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.products.edit', $context);
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
        $product = \App\Models\Product::findOrFail($id);
        \Validator::make($request->all(), [
           "title" => "required|min:5|max:200",
           "slug" => [
               "required",
               Rule::unique("products")->ignore($product->slug, "slug")
           ],
           "description" => "required|min:20|max:1000",
           "mini_description" => "required|min:20|max:100",
           "price" => "required|digits_between:0,10",
           "stock" => "required|digits_between:0,10",
       ]);


        $product->title = $request->get('title');
        $product->slug = $request->get('slug');
        $product->description = $request->get('description');
        $product->mini_description = $request->get('mini_description');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        $new_cover = $request->file('cover');
        if($new_cover){
            if($product->cover && file_exists(storage_path('app/public/' .
                    $product->cover))){
                     \Storage::delete('public/'. $product->cover);
            }
            $new_cover_path = $new_cover->store('product-covers', 'public');
            $product->cover = $new_cover_path;
        }

        if($request->hasFile('slider')) {
          foreach($request->file('slider') as $file)
          {
            $unique_name = md5($file. time());
            // $name = $file->getClientOriginalName();
            if($product->slider && file_exists(storage_path('app/public/' .
                    $product->slider))){
                     \Storage::delete('public/'. $product->slider);
            }

            $file->move(public_path('storage').'/product-sliders/', $unique_name);
            // $file->store('product-sliders', 'public', $name);
            $imgData[] = $unique_name;
          }

          $product->slider = json_encode($imgData);

        }
        $product->updated_by = \Auth::user()->id;
        $product->status = $request->get('status');
        $product->save();
        $product->categories()->sync($request->get('categories'));
        return redirect()->route('products.edit', [$product->id])->with('status',
          'product successfully updated');
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
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product moved to
            trash');

    }

    public function trash(){
         $context = [
            'title' => 'Product Trash',
            'brand' => 'evoush',
            'products' => \App\Models\Product::onlyTrashed()->paginate(10),
            'user' => User::where('name', Auth::user()->name)
        ];
       return view('dashboard.products.trash', $context);
   }

   public function restore($id){
       $product = \App\Models\Product::withTrashed()->findOrFail($id);
       if($product->trashed()){
           $product->restore();
           return redirect()->route('products.trash')->with('status', 'product
            successfully restored');
       } else {
           return redirect()->route('products.trash')->with('status', 'product is not
            in trash');
       }
   }

   public function deletePermanent($id){
       $product = \App\Models\Product::withTrashed()->findOrFail($id);
       if(!$product->trashed()){
           return redirect()->route('products.trash')->with('status', 'product is not
            in trash!')->with('status_type', 'alert');
       } else {
           $product->categories()->detach();
           $product->forceDelete();
           return redirect()->route('products.trash')->with('status', 'product
            permanently deleted!');
       }
   }


}
