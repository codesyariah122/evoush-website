@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="{{route('member.create')}}" class="btn btn-sm btn-primary mt-2 mb-3">Create New Member</a>

            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            <form action="{{route('member.index')}}">
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

              {{-- <pre>
                {{
                  var_dump($sponsor)
                }}
              </pre> --}}

              {{-- <pre>
                  
                  <ul>
                    <li>delete profile by user_id : {{$members[0]->user_id}}</li>
                    <li>delete joining by member_id : {{$members[0]->member_id}}</li>
                  </ul>

              </pre> --}}

                <div class="card-header">{{ __('List Member') }} <b>{{Auth::user()->username}}</b></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th><b>Action</b></th>
                               <th><b>Status</b></th>
                               <th><b>Name</b></th>
                               <th><b>Username</b></th>
                               <th><b>Email</b></th>
                               <th><b>Avatar</b></th>
                           </tr>
                       </thead>
                       <tbody>
                        @if(count($members) > 0)
                           @foreach($members as $member)
                            <tr>
                              <td>
                                @if($member->status == "INACTIVE")
                                <form action="/dashboard/evoush/member/activated/{{$member->user_id}}"
                                method="POST">
                                  @csrf
                                    <input type="hidden" value="PUT" name="_method">
                                    <input type="hidden" name="status" value="ACTIVE">
                                    <button type="submit" class="btn btn-sm btn-success mb-2">Activation</button>
                                </form>
                                 <form
                                     onsubmit="return confirm('Delete this member permanently?')"
                                     class="d-inline"
                                     action="{{route('member.deleted', [$member->user_id])}}"
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
                                @else
                                    <form
                                       onsubmit="return confirm('Delete this member permanently?')"
                                       class="d-inline"
                                       action="{{route('member.deleted', [$member->user_id])}}"
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
                                  <a href="{{route('member.edit', [$member->user_id])}}" class="btn btn-sm btn-info">Edit</a>
                                @endif
                             </td>
                             <td>
                              @if($member->status === "ACTIVE")
                              <span class="badge badge-success">
                                {{$member->status}}
                              </span>
                              @else
                              <span class="badge badge-danger">
                                {{$member->status}}
                              </span>
                              @endif
                            </td>
                             <td>{{$member->name}}</td>
                             <td>{{$member->username}}</td>
                             <td>{{$member->email}}</td>
                             <td>
                              @if($member->avatar)
                                <img src="{{asset('storage/'.$member->avatar)}}" class="img-responsive" width="100">
                              @else
                                <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" class="img-responsive" width="100">
                              @endif
                             </td>
                            </tr>
                           @endforeach
                        @else
                          <tr>
                            <td colspan="15" class="text-danger text-center"><b>Belum Ada Member Yang Join</b></td>
                          </tr>
                        @endif
                       </tbody>
                       <tfoot>
                         <td colspan="10">
                          {{$members->appends(Request::all())->links()}}
                         </td>
                       </tfoot>
                   </table>
                  </div>
                  {{--  <pre>

                    {{
                      count($sponsors)
                    }}

                     {{
                      var_dump($sponsors)
                     }}
                   </pre> --}}
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