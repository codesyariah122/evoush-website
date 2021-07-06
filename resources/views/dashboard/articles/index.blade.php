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
                           <a class="nav-link" href="{{route('articles.index')}}">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.index', ['status' =>
                           'publish'])}}">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.index', ['status' =>
                           'draft'])}}">Draft</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{route('articles.trash')}}">Trash</a>
                       </li>
                   </ul>
               </div>
           </div>
           <hr class="my-3">

        	<a href="{{route('articles.create')}}" class="btn btn-success mt-2 mb-3">
        		Add articles
        	</a>

            @if(session('status'))
                <div class="alert alert-success">
                   {{session('status')}}
               </div>
            @endif

            <form
                action="{{route('articles.index')}}" class="mt-2 mb-2"
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

                {{-- <pre>
                  {{
                    dd($articles)
                  }}
                </pre> --}}

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
                                  <th><b>ID</b></th>
                                     <th><b>Title</b></th>
                                     <th><b>Cover</b></th>
                                     <th><b>Categories</b></th>
                                     <th><b>Status</b></th>
                                     <th><b>Action</b></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($articles as $article)
                                 <tr>
                                  <td>{{$article->id}}</td>
                                   <td>{{$article->title}}</td>
                                   <td>
                                     <img src="{{asset('storage/'.$article->cover)}}" class="img-responsive" width="150">
                                   </td>
                                   <td>{{$article->category_name}}</td>
                                   <td>
                                     @if($article->status == "DRAFT")
                                     <span class="badge bg-dark text-white">{{$article->status}}</span>
                                      @else
                                      <span class="badge badge-success">{{$article->status}}
                                      </span>
                                      @endif
                                    </td>
                                   <td>
                                    <a href="{{route('articles.show', [$article->id])}}" class="btn btn-primary btn-sm">Details</a>
                                      <a
                                         href="{{route('articles.edit', [$article->id])}}"
                                         class="btn btn-info btn-sm"
                                         > Edit </a>

                                         <form
                                         method="POST"
                                         class="d-inline"
                                         onsubmit="return confirm('Move article to trash?')"
                                         action="{{route('articles.destroy', [$article->id])}}"
                                         >
                                         @csrf
                                         <input
                                         type="hidden"
                                         value="DELETE"
                                         name="_method">
                                         <input
                                         type="submit"
                                         class="btn btn-danger btn-sm"
                                         value="Trash">
                                       </form>
                                       </form>
                                   </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                             <tfoot>
                                 <td colspan="10">
                                     {{-- Ini pagination --}}
                                     {{$articles->appends(Request::all())->links()}}
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