@extends('layouts.dashboard.global')
@section('title') {{$title}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <hr class="my-3">

        	<a href="{{route('event.create')}}" class="btn btn-success mt-2 mb-3">Add Event</a>

            @if(session('status'))
                <div class="alert alert-success">
                   {{session('status')}}
               </div>
            @endif

            <form
                action="{{route('event.index')}}" class="mt-2 mb-2"
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
                       <div class="col-md-12 table-responsive">
                           <table class="table table-bordered table-stripped">
                             <thead>
                                 <tr>
                                     <th><b>Title</b></th>
                                     <th><b>Quotes</b></th>
                                     <th><b>Cover</b></th>
                                     <th><b>File</b></th>
                                     <th><b>Content</b></th>
                                     <th><b>Link</b></th>
                                     <th><b>Action</b></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($events as $event)
                                 <tr>
                                     <td>{{$event->title}}</td>
                                     <td>{{$event->quotes}}</td>
                                     <td>
                                         @if($event->cover)
                                         {{-- <img src="{{asset('storage/'.$event->cover)}}" width="100px" class="img-responsive"> --}}
                                         <img src="https://raw.githubusercontent.com/evoush-products/bahan_evoush/main/migration_db/{{ $event->cover }}">
                                         @endif
                                     </td>
                                     <td width="600">
                                      @if($event->file)
                                      <ul>
                                        @foreach(json_decode($event->file, true) as $file)
                                          <li>
                                            <img src="{{asset('storage/event-files/' . $file)}}" width="96px" style="margin-bottom: 15px;"/> <br>
                                          </li>
                                        @endforeach
                                      </ul>
                                      @endif
                                     </td>
                                     <td>{{$event->content}}</td>
                                     <td>{{$event->link}}</td>
                                     <td>
                                       <a
                                       href="{{route('event.edit', [$event->id])}}"
                                       class="btn btn-info btn-sm"
                                       > Edit </a>

                                       <form
                                       method="POST"
                                       class="d-inline"
                                       onsubmit="return confirm('Move product to trash?')"
                                       action="{{route('event.destroy', [$event->id])}}"
                                       >
                                        @csrf
                                           <input
                                           type="hidden"
                                           value="DELETE"
                                           name="_method">
                                           <input
                                           type="submit"
                                           value="Destroy"
                                           class="btn btn-danger btn-sm">
                                        </form>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                             <tfoot>
                                 <td colspan="10">
                                     {{$events->appends(Request::all())->links()}}
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