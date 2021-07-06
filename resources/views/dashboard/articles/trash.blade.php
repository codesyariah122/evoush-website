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
                           Request::path() == 'articles' ? 'active' : ''}}" href="
                           {{route('articles.index')}}">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{Request::get('status') == 'publish' ?
                           'active' : '' }}" href="{{route('articles.index', ['status' =>
                           'publish'])}}">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{Request::get('status') == 'draft' ? 'active'
                           : '' }}" href="{{route('articles.index', ['status' => 'draft'])}}">Draft</a>
                       </li>
                       <li class="nav-item">
                            <a class="nav-link {{Request::path() == 'articles/trash' ? 'active'
                            : ''}}" href="{{route('article.trash')}}">Trash</a>
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
                                    <form
                                      method="POST"
                                      action="{{route('articles.restore', [$article->id])}}"
                                      class="d-inline"
                                      >
                                      @csrf
                                      <input type="submit" value="Restore" class="btn btn-success"/>
                                    </form>

                                    <form
                                    method="POST"
                                    action="{{route('articles.deletepermanent', [$article->id])}}"
                                    class="d-inline"
                                    onsubmit="return confirm('Delete this article permanently?')"
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