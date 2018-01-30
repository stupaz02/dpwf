

{!! Form::open(['route' =>['post.fileupload'],'files' => true,'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="col-xs-3">
 <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">File</h3>
        </div>

        <div class="box-body">

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                    <div class="form-group">
                            {!! Form::text('name', null,['class' =>'form-control']) !!}         
                    </div>
                    <div class="form-group">
                        {!! Form::file('files[]', null,['class' =>'form-control']) !!} 
                    </div>   
                    <div class="form-group">
                     
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                      </div>

            <br /><br />
          
    <input type="submit" value="Upload" />
        </div>       
  </div> 
</div>         

{!! Form::close() !!}