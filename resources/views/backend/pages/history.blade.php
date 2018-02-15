@extends('layouts.backend.main')

@section('Title','Depedd Palawan | History')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         History
     
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('categories.index')}}">History</a></li>
          {{--  <li class="active">Edit event</li>  --}}
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($history, [
                    'method' => 'PUT',
                    'route'  => ['history.update', $history->id],
                    'files'  => TRUE,
                    'id'     => 'post-form'
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