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
          <li class="active"><a href="{{ route('post.index')}}">Deped Palawan</a></li>
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
          <div class="col-xs-9">
            <div class="box">
                
              <div class="box-body ">
                
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('title') !!}
                        {!! Form::text('title', null,['class' =>'form-control']) !!}

                        @if($errors->has('title'))
                            <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                        {!! Form::label('slug') !!}
                        {!! Form::text('slug', null,['class' =>'form-control']) !!}

                        @if($errors->has('slug'))
                           <span class="help-block">{{ $errors->first('slug') }}</span>
                       @endif
                    </div>

                    <div class="form-group excerpt">
                        {!! Form::label('excerpt') !!}
                        {!! Form::textarea('excerpt', null,['class' =>'form-control']) !!}
                    </div>

                    <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body', null,['class' =>'form-control']) !!}

                        @if($errors->has('body'))
                            <span class="help-block">{{ $errors->first('body') }}</span>
                        @endif
                    </div>         

               
                
              </div>
              <!-- /.box-body -->
           
              
            </div>
            <!-- /.box -->
          </div>

          <div class="col-xs-3">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Publish</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('published_at') ? 'has-error' : '' }}">
                            {!! Form::label('published_at','Publish Date') !!}
                            <div class="input-group date" id="datetimepicker1">
                                {!! Form::text('published_at', null,['class' =>'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                           
    
                            @if($errors->has('published_at'))
                              <span class="help-block">{{ $errors->first('published_at') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            <a id="draft-btn" href="" class="btn btn-default">Save Draft</a>
                        </div>
                        <div class="pull-right">
                            {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category</h3>
                    </div>
                    <div class="box-body">
                        
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            {!! Form::label('category_id','Category') !!}
                            {!! Form::select('category_id', App\Category::pluck('title','id'), null,['class' =>'form-control','placeholder'=> 'Choose category']) !!}
                            

                            @if($errors->has('category_id'))
                            <span class="help-block">{{ $errors->first('category_id') }}</span>
                            @endif
                        
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Featured Image</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            {!! Form::label('image','Feature Image') !!}
                            {!! Form::file('image') !!}
                            
    
                            @if($errors->has('image'))
                               <span class="help-block">{{ $errors->first('image') }}</span>
                            @endif
                        
                        </div>
    
                    </div>
                </div>

                

          </div>
          
          {!! Form::close() !!}
        
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('script')
  <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');


        $('#title').on('blur', function(){
            var theTitle  = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug   = theTitle.replace(/$/g, '-and-')
                            .replace(/[^a-z0-9-]+/g,'-')
                            .replace(/\-\-+/g, '-')
                            .replace(/^-+|-+$/g, ' ');
                            

                slugInput.val(theSlug);
        });

        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });


        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $('#draft-btn').click(function(e){
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
           
        });
  </script>
@endsection

