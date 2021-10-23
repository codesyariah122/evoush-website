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
               placeholder="Filter berdasarkan nama"/>
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
                               <th><b>Name</b></th>
                               <th><b>Message</b></th>
                               {{-- <th><b>Pencapian</b></th> --}}
                               <th><b>Action</b></th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($consults as $consult)
                           <tr>
                               <td>{{$consult->fullname}}</td>
                               <td>
                                  {!! $consult->message !!}
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
                                 {{-- <a class="btn btn-info text-white btn-sm" href="{{route('consults.edit',
                                 [$consult->id])}}">Edit</a>
 --}}


                                @if($consult->status === "INACTIVE")
                                <a
                                href="{{route('consults.show', [$consult->id])}}"
                                class="btn btn-danger btn-block">Sending</a>
                                @else
                                 {{-- <form
                                       onsubmit="return confirm('Delete consultation permanently?')"
                                       class="d-inline"
                                       action="{{route('consults.destroy', [$consult->id])}}"
                                       method="POST">
                                       @csrf
                                       <input
                                       type="hidden"
                                       name="_method"
                                       value="DELETE">
                                       <input
                                       type="submit"
                                       value="Delete"
                                       class="btn btn-danger btn-block">
                                  </form> --}}
                                  <a
                                  href="{{route('delivers.show', [$consult->id])}}"
                                  class="btn btn-primary btn-block">Check Jawaban</a>
                                @endif

                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                       <tfoot>
                         <td colspan="10">
                          {{$consults->appends(Request::all())->links()}}
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