<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Articles;
use App\Models\CategoryArticles;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(Auth::check() && Auth::user()->name){
            $user = User::where('name', Auth::user()->name)->paginate(10);
            $status = $request->get('status');
            $article = $request->get('category');
            $keyword = $request->get('keyword') ? $request->get('keyword') : '';

            if($status){
                $articles = CategoryArticles::join('articles', 'category_articles.id', '=', 'articles.category_id')
                    ->where('title', "LIKE", "%$keyword%")
                    ->where('status', strtoupper($status))
                    ->paginate(5);
            }else{
                $articles = CategoryArticles::join('articles', 'category_articles.id', '=', 'articles.category_id')
                    ->where('title', "LIKE", "%$keyword%")
                    ->paginate(5);
            }


            $context = [
                'title' => 'Article Lists',
                'brand' => 'evoush',
                'user' => $user,
                'articles' => $articles
            ];

            return view('dashboard.articles.index', $context);
        }else{
            return redirect()->route('login')->with('status', 'Sesi anda telah habis, silahkan login ulang');
        }
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
            'title' => 'Article Create',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'categories' => CategoryArticles::get(),
            'authors' => User::where('roles', '=', Auth::user()->roles)->get()
        ];
    
        return view('dashboard.articles.create', $context);
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
        // var_dump($request->all()); die;


        $new_article = new Articles;
        
        \Validator::make($request->all(), [
           "author" => "required",
           "title" => "required|min:5|max:100",
           "category_id" => "required",
           "cover" => "required",
           "content" => "required"
       ])->validate(); 

        $new_article->author = $request->get('author');
        $new_article->category_id = $request->get('category_id');
        $new_article->title = $request->get('title');
        $new_article->slug = \Str::slug($request->get('title'));
        $new_article->headline = $request->get('headline');

        $cover = $request->file('cover');
        if($cover){
           $cover_path = $cover->store('article-covers', 'public');
           $new_article->cover = $cover_path;
        }
        $new_article->content = $request->get('content');       
        $new_article->status = $request->get('save_action');

        $new_article->save();
        if($request->get('save_action') == 'PUBLISH'){
           return redirect()
           ->route('articles.create')
           ->with('status', 'New Article : '.$new_article->title.' successfully saved and published');
        }else {
            return redirect()
               ->route('articles.create')
               ->with('status', 'Article '.$new_article->title.' saved as draft');
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
        $context = [
            'title' => 'Article detail',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'categories' => CategoryArticles::get(),
            'authors' => User::where('roles', '=', Auth::user()->roles)->get(),
            'article' => Articles::join('category_articles', 'articles.category_id', '=', 'category_articles.id')->findOrFail($id)
            // 'users' => User::where('name', Auth::user()->name)->paginate(10)
        ];
    
        return view('dashboard.articles.detail', $context);
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
            'title' => 'Article Edit',
            'brand' => 'evoush',
            'user' => User::where('name', Auth::user()->name)->paginate(10),
            'categories' => CategoryArticles::get(),
            'authors' => User::where('roles', '=', Auth::user()->roles)->get(),
            'article' => Articles::join('category_articles', 'articles.category_id', '=', 'category_articles.id')->findOrFail($id)
        ];
    
        return view('dashboard.articles.edit', $context);
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
       //  \Validator::make($request->all(), [
       //     "author" => "required",
       //     "title" => "required|min:5|max:100",
       //     "cover" => "required",
       //     "content" => "required"
       // ])->validate(); 

        $new_article = Articles::findOrFail($id);

        $new_article->author = $request->get('author');
        $new_article->category_id = $request->get('category_id');
        $new_article->title = $request->get('title');
        $new_article->slug = \Str::slug($request->get('title'));
        $new_article->headline = $request->get('headline');

        $cover = $request->file('cover');
        if($cover){
           $cover_path = $cover->store('article-covers', 'public');
           $new_article->cover = $cover_path;
        }
        $new_article->content = $request->get('content');       
        $new_article->status = $request->get('save_action');

        $new_article->save();

        return redirect()
        ->route('articles.edit', [$new_article->id])
        ->with('status', 'Article : '.$new_article->title.' successfully updated and published');
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
        $article = Articles::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')
        ->with('status', 'Article successfully moved to trash');
    }

    public function trash($id)
    {
        $deleted_article = Articles::onlyTrashed()->paginate(10);

        $context = [
            'title' => 'Article Trash',
            'brand' => 'evoush',
            'categories' => $deleted_article,
            'user' => User::where('name', Auth::user()->name)
        ];
        return view('dashboard.articles.trash', $context);
    }

    public function restore($id)
    {

    }

    public function deletePermanent($id)
    {

    }

}
