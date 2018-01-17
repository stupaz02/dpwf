@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Edit category')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Slides
        <small>Edit slide</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('categories.index')}}">Slides</a></li>
          <li class="active">Edit Slide</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($slide, [
                    'method' => 'PUT',
                    'route'  => ['slides.update', $slide->id],
                    'files'  => TRUE,
                    'id'     => 'categories-form'
                 ]) !!}
         
          @include('backend.slides.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.categories.script')
