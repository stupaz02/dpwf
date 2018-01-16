@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Add new post')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Website Events
        <small>Add new event</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('events.index')}}">Events</a></li>
          <li class="active">Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($event, [
                    'method' => 'POST',
                    'route'  => 'events.store',
                    'files'  => TRUE,
                    'id'     => 'post-form'
                 ]) !!}
         
          @include('backend.events.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.events.script')
