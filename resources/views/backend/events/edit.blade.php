@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Edit category')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Events
        <small>Edit event</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('categories.index')}}">Events</a></li>
          <li class="active">Edit event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($event, [
                    'method' => 'PUT',
                    'route'  => ['events.update', $event->id],
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