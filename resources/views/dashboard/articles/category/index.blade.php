@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <a href="{{route('category-article.create')}}" class="btn btn-sm btn-primary mt-2 mb-3">Create Category</a>
          <div class="row">
            <div class="col-md-6">      
              <form action="{{route('category-article.index')}}" class="mt-2 mb-3">
                <div class="input-group">
                  <input
                  type="text"
                  class="form-control"
                  placeholder="Filter by category name"
                  name="name">
                  <div class="input-group-append">
                    <input
                    type="submit"
                    value="Filter"
                    class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>

            <div class="col-md-6">
              <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="
                  {{route('category-article.index')}}">Published</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="
                  {{route('category-article.trash')}}">Trash</a>
                </li>
              </ul>
            </div>
          </div>


          @if(session('status'))
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-warning">
                {{session('status')}}
              </div>
            </div>
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
             <th><b>Name</b></th>
             <th><b>Caption</b></th>
             <th><b>Actions</b></th>
             </tr>
             </thead>
             <tbody>
              @foreach($categories as $category)
                <tr>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->caption}}</td>
                    <td>
                        <a href="{{route('category-article.edit', [$category->id])}}" class="btn btn-info btn-sm"> Edit </a>
                        <form
                        class="d-inline"
                        action="{{route('category-article.destroy', [$category->id])}}"
                        method="POST"
                        onsubmit="return confirm('Move category to trash?')"
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
                    </td>
                </tr>
                @endforeach
             </tbody>
             <tfoot>
             <tr>
             <td colSpan="10">
             {{-- Pagination --}}
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