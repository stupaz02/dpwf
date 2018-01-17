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

            <div class="form-group {{ $errors->has('caption') ? 'has-error' : '' }}">
                {!! Form::label('caption') !!}
                {!! Form::text('caption', null,['class' =>'form-control']) !!}

                @if($errors->has('caption'))
                   <span class="help-block">{{ $errors->first('caption') }}</span>
               @endif
            </div>

            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{{ ($slide->image) ? $slide->image_thumb_url: 'http://placehold.it/200x150&text=No+Image'}}" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span> {!! Form::file('image') !!}</span>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                 </div>
               

                @if($errors->has('image'))
                   <span class="help-block">{{ $errors->first('image') }}</span>
                @endif
            
            </div>

           
                  
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{ $slide->exists ? 'Update' : 'Save'}}</button>
            <a href="{{route('slides.index')}}" class="btn btn-default">Cancel</a>
        </div>
   
      
    </div>
    <!-- /.box -->
  </div>

