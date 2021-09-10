@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('menus.create')}}" class="btn btn-sm btn-primary mt-2 mb-3">Create New Menu</a>

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('menus.index')}}">
             <div class="input-group mb-3">
               <input
               value="{{Request::get('keyword')}}"
               name="keyword"
               class="form-control col-md-10"
               type="text"
               placeholder="Filter berdasarkan email"/>
               <div class="input-group-append">
                 <input
                 type="submit"
                 value="Filter"
                 class="btn btn-primary">
               </div>
             </div>
           </form>

            <div class="card">
                <div class="card-header">{{ __('List User') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th><b>Name</b></th>
                               <th><b>Link</b></th>
                               <th><b>Icon</b></th>
                               <th><b>Submenu</b></th>
                               <th><b>Action</b></th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($menus as $menu)
                        <tr>
                          <td>{{ $menu->name }}</td>
                          <td>{{ $menu->link }}</td>
                          <td>{{ $menu->icon }}</td>
                          <td>
                            <font color="{{ $menu->submenu ? 'black' : 'red' }}">
                              {{ $menu->submenu ? $menu->submenu : '__No Submenu' }}
                            </font>
                            </td>
                          <td>
                            <a class="btn btn-info text-white btn-sm" href="{{route('menus.edit',
                                 [$menu->id])}}">
                               Edit
                             </a>

                                 <form
                                     onsubmit="return confirm('Delete this user permanently?')"
                                     class="d-inline"
                                     action="{{route('menus.destroy', [$menu->id])}}"
                                     method="POST">
                                     @csrf
                                     <input
                                     type="hidden"
                                     name="_method"
                                     value="DELETE">
                                     <input
                                     type="submit"
                                     value="Delete"
                                     class="btn btn-danger btn-sm">
                                </form>

                                <a
                                href="{{route('menus.show', [$menu->id])}}"
                                class="btn btn-primary btn-sm">Detail</a>
                          </td>
                        </tr>
                        @endforeach

                       </tbody>
                       <tfoot>
                         <td colspan="10">
                         </td>
                       </tfoot>
                   </table>

                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    ul li{
        list-style: none;
    }
</style>
@endsection