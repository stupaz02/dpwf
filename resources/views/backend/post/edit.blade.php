@extends('layouts.backend.main')

@section('Title','Depedd Palawan | Edit Post')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Website Posts
        <small>Edit post</small>
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('post.index')}}">Deped Palawan</a></li>
          <li class="active">Edit post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
                {!! Form::model($post, [
                    'method' => 'PUT',
                    'route'  => ['post.update', $post->id],
                    'files'  => TRUE,
                    'id'     => 'post-form'
                 ]) !!}
         
          @include('backend.post.form')
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@include('backend.post.script')
