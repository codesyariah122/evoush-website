<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\CategoryArticles;
use Auth;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $context = [
            'title' => 'Category Lists',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'categories' => CategoryArticles::paginate(10)
        ];
    
        return view('dashboard.articles.category.index', $context);
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
            'title' => 'Category Create',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10)
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
        ];
    
        return view('dashboard.articles.category.create', $context);
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
        \Validator::make($request->all(), [
           "category_name" => "required|min:3|max:20",
           "caption" => "required"
       ])->validate();

       $new_category = new CategoryArticles;
       $new_category->category_name = $request->get('category_name');
       $new_category->caption = $request->get('caption');

       $new_category->save();
        
        return redirect()->route('category-article.create')->with('status',
        'Category '.$new_category->category_name.' successfully created');
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
        $category_to_edit = CategoryArticles::findOrFail($id);
        $context = [
            'title' => "Edit Category Message",
            'brand' => 'evoush',
            'category' => $category_to_edit,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.articles.category.edit', $context);
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
        //
        $category = CategoryArticles::findOrFail($id);

        \Validator::make($request->all(), [
           "category_name" => "required|min:3|max:20",
           "caption" => [
               "required",
               Rule::unique("category_articles")->ignore($category->caption, "caption")
           ]
       ])->validate();
        $name = $request->get('category_name');
        $caption = $request->get('caption');
        $category->category_name = $name;
        $category->caption = $caption;

        $category->save();
        return redirect()->route('category-article.edit', [$id])->with('status', 'Category Article succesfully updated');
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
        $category = CategoryArticles::findOrFail($id);
        $category->delete();
        return redirect()->route('category-article.index')
        ->with('status', 'Category successfully moved to trash');
    }

    public function trash()
    {
        $deleted_category = CategoryArticles::onlyTrashed()->paginate(10);

        $context = [
            'title' => 'Category Article Trash',
            'brand' => 'evoush',
            'categories' => $deleted_category,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.articles.category.trash', $context);
    }

    public function restore($id)
    {
        $category = CategoryArticles::withTrashed()->findOrFail($id);
        if($category->trashed()){
             $category->restore();
         }else {
             return redirect()->route('category-article.index')
             ->with('status', 'Category is not in trash');
         }
         return redirect()->route('category-article.index')
         ->with('status', 'Category successfully restored');
     }

    public function deletePermanent($id)
    {
        $contact = CategoryArticles::withTrashed()->findOrFail($id);
        if(!$contact->trashed()){
             return redirect()->route('category.article.index')
             ->with('status', 'Can not delete permanent active category');
         } else {
             $contact->forceDelete();
             return redirect()->route('category-article.index')
             ->with('status', 'Category permanently deleted');
         }
    }

    public function ajaxSearch(Request $request){
       $keyword = $request->get('q');
       $categories = CategoryArticles::where("category_name", "LIKE", "%$keyword%")->get();
       return json_encode($categories);
    }
}
