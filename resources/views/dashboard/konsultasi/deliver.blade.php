@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('consults.create')}}" class="btn btn-sm btn-primary mt-2 mb-3">Create New Consults</a>

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('users.index')}}">
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
                <div class="card-header">{{ __('List Consults') }}</div>
                <div class="card-body">
                    <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th><b>Consult ID</b></th>
                               <th><b>Message</b></th>
                               <th><b>Jawaban</b></th>
                               <th><b>Action</b></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($delivers as $deliver)
                           <tr>
                               <td>{{$deliver->consult_id}}</td>
                               <td>
                                  {{ $deliver->message }}
                               </td>

                               <td>
                                  @if($deliver->jawaban)
                                    <span class="badge badge-success">{{ 'Terjawab' }}</span>
                                  @else
                                    <span class="badge badge-danger">{{ 'Belum Terjawab' }}</span>
                                  @endif
                               </td>

                               {{-- <td>
                                @if(in_array("MEMBER", json_decode($user->roles)))
                                  @if(in_array("STAR SAPHIRE", json_decode($user->achievements)))
                                    {{"Star Saphire"}}
                                  @elseif(in_array("SAPHIRE", json_decode($user->achievements)))
                                    {{"Saphire"}}
                                  @else
                                    {{"No Achievements"}}
                                  @endif
                                @endif
                               </td> --}}

                               <td>
                                 <a class="btn btn-info text-white btn-sm" href="{{route('delivers.edit',
                                 [$deliver->id])}}">Jawab</a>

                                 <form
                                     onsubmit="return confirm('Delete consultation permanently?')"
                                     class="d-inline"
                                     action="{{route('delivers.destroy', [$deliver->id])}}"
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
                                href="{{route('delivers.show', [$deliver->id])}}"
                                class="btn btn-primary btn-sm">Detail</a>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                       <tfoot>
                         <td colspan="10">
                          {{$delivers->appends(Request::all())->links()}}
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