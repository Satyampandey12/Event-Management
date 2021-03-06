@extends('template.admin.layouts.default')

@section('content')
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Events
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Events</li>
      </ol>
    </section>

      <!-- Main content -->
    <section class="content">
	    <form action="{{route('event-update')}}" method="post" id="locationForm">
	        <div class="row">
	            <div class="col-sm-6">
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Edit event</h3>
	                    </div>
	                    <div class="panel-body">

	                        {{csrf_field()}}
	                        <div class="form-group">
	                            <label for="title">Event title</label>
	                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the event" value="{{ $event->title }}">
	                            <span class="error">{{$errors->first('title')}}</span>
	                        </div>

	                        <div class="form-group">
	                            <label for="title">Address</label>
	                            <input type="text" name="address" id="address" class="form-control"
	                                   placeholder="Enter the event address" value="{{ $event->address }}">
	                            <span class="error">{{$errors->first('address')}}</span>
	                        </div>

	                        <div class="form-group">
	                            <label for="title">Start date</label>
	                            <input type="date" name="start_date" id="start_date" class="form-control"
	                                   placeholder="Enter the event start date" value="{{ $event->start_date }}">
	                            <span class="error">{{$errors->first('start_date')}}</span>
	                        </div>

	                        <div class="form-group">
	                            <label for="title">End date</label>
	                            <input type="date" name="end_date" id="end_date" class="form-control"
	                                   placeholder="Enter the event end date" value="{{ $event->end_date }}">
	                            <span class="error">{{$errors->first('end_date')}}</span>
	                        </div>

	                        <div class="form-group">
	                            <label for="description">Description</label>
	                            <textarea
	                                    id="description"
	                                    name="description" class="form-control"
	                                    placeholder="Enter the description">{{$event->description}}</textarea>
	                            <span class="error">{{$errors->first('description')}}</span>
	                        </div>

	                         <input type="hidden" name="lat" value="0.0000" />
                             <input type="hidden" name="long" value="0.0000" />
                             <input type="hidden" name="event_id" value="{{$event->id}}" />

	                        <button class="btn btn-primary" type="submit">
	                            <i class="fa fa-save"></i> Save
	                        </button>
	                    </div>
	                </div>
	            </div>
	             @if($other_users->count() > 0 )  
		            <div class="col-sm-6">
		             	 <div class="box">
		             	 	 <div class="box-header with-border">
					              <center><h3 class="box-title ">Invite Other Peoples</h3></center>

					              <div class="box-tools pull-right"></div>
	           				 </div>
	           				 <div class="box-body">
		           				 <div class="form-group">
			           				  @foreach($other_users as $key => $user)
			           				  	<div class="checkbox">
						                    <label>
						                      <input type="checkbox" name="invited_user[]" value="{{$user->id}}">
						              
						                      {{$user->name}},  {{$user->email}}
						                    </label>
                						</div>
			           				  @endforeach
		           				  </div>
	           				 </div>
		             	 </div>
		            </div>
		        @endif
	        </div>
	    </form>
	    <div id='app'></div>
	</section>

  
    <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description', {
        })
    </script>

@stop

