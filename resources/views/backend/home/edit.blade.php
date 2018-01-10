@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Edit account')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Account
        <small>Edit account</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('users.index')}}">Account</a></li>
          <li class="active">Edit account</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          @include('backend.partials.message')
          
                {!! Form::model($user, [
                    'method' => 'PUT',
                    'url'  => '/edit-account',
                    'id'     => 'user-form'
                 ]) !!}
         
          @include('backend.users.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

