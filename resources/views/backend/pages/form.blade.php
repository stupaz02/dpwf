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
            
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('body') !!}
                    {!! Form::textarea('body', null,['class' =>'form-control']) !!}
    
                    @if($errors->has('body'))
                        <span class="help-block">{{ $errors->first('body') }}</span>
                    @endif
                </div>

                
    
              
    
          </div>
          <!-- /.box-body -->
       
            <div class="box-footer">
                     <button type="submit" class="btn btn-primary">{{ $history->exists ? 'Update' : 'Save'}}</button>
                     {{--  <button type="submit" class="btn btn-primary">Save</button>   --}}
                     <a href="{{ route('pages.index')}}" class="btn btn-default">Cancel</a> 
              </div>
         
        </div>
        <!-- /.box -->
    </div>