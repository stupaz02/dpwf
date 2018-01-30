@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Add new post')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Website Posts
        <small>Add new post</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('post.index')}}">Posts</a></li>
          <li class="active">Add new</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($post, [
                    'method' => 'POST',
                    'route'  => 'post.store',
                    'files'  => TRUE,
                    'id'     => 'post-form'
                   
                 ]) !!}
         
          @include('backend.post.form')
          {!! Form::close() !!}

          {{--  @include('backend.post.file-attach')  --}}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.post.script')
