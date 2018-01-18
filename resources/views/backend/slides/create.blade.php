@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Add new slide')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Slides
        <small>Add new slide</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('slides.index')}}">Slides</a></li>
          <li class="active">Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($slide, [
                    'method' => 'POST',
                    'route'  => 'slides.store',
                    'files'  => TRUE,
                    'id'     => 'events-form'
                 ]) !!}
         
          @include('backend.slides.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.slides.script')
