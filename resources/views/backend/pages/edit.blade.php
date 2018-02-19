@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Edit category')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         History
        <small>Edit History</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('pages.index')}}">History</a></li>
          <li class="active">Edit history</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($history, [
                    'method' => 'PUT',
                    'route'  => ['pages.update', $history->id],
                    'files'  => TRUE,
                    'id'     => 'pages-form'
                 ]) !!}
         
          @include('backend.pages.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@include('backend.pages.script')