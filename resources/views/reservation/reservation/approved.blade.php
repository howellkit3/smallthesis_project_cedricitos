<?php $asset = URL::asset('/'); ?> 
@extends('master2')

@section('title', 'index')

@section('content')

<div class="card">
    <div class="card-header no-bg b-a-0">

        <span class ="pull-right">    
          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#eventCreate">+</button>
        </span>

        <h4>Event Category List </h4>
    </div>

    <div class="card-block">
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Event Name</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($event_data as $ctr => $event)
                        
                            <tr>
                                <td>{{$event->name}}</td>
                                <td>{{($event->status == 1) ? "Active" : "Inactive"}}</td>
                                <td>{{$event->created_at}}</td>
                                <td>
                                  <button type="button" class="btn btn-primary fa fa-edit " data-toggle="modal" data-target=".modalEditevent{{$event->id}}"></button>
                                  <button type="button" class="btn btn-danger fa fa-remove " data-toggle="modal" data-target=".modalDeleteevent{{$event->id}}"></button>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg modalEditevent{{$event->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <form class="form-horizontal form-label-left" method="post" action="{{route('settings.event.update',$event->id)}}" novalidate>

                                   {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="eventCreateLabel">Edit Campaign</h4>
                                        </div>

                                        <div class="modal-body">

                                          <input name="id" type="hidden"  value="{{$event->id}}">
                                          <input name="status" type="hidden"  value="1">

                                          <fieldset class="form-group">
                                            <label for="exampleInputEmail1">Name</label>
                                            <input type="text" class="form-control" placeholder="Name"  name="name" value ='{{$event->name}}' > 
                                          </fieldset>
                                      
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>

                                </form>
                              </div>
                          </div>

                          <div class="modal fade bd-example-modal-lg modalDeleteevent{{$event->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <form class="form-horizontal form-label-left" method="post" action="{{route('settings.event.delete',$event->id)}}" novalidate>

                                   {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                           
                                        </div>

                                        <div class="modal-body">
                                           <h4 class="modal-title" id="eventCreateLabel">Are you sure you want delete '{{$event->name}}'</h4>
                                          <input name="id" type="hidden"  value="{{$event->id}}">
                                          <input name="status" type="hidden"  value="0">
                                      
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                              </div>
                          </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eventCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <form class="form-horizontal" role="form" method="POST" action="{{ route('settings.event.create') }}">
          
            {{ csrf_field() }}

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
                
          
            <input name="status" type="hidden"  value="1" >

            <fieldset class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" > 
            </fieldset>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>

        </form>
    </div>
  </div>
</div>

@endsection 

@section('footer-scripts')


@endsection