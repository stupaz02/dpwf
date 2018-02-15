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

                <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                        {!! Form::label('start_date','Start date') !!}
                        <div class="input-group date" id="datetimepicker1">
                            {!! Form::text('start_date', null,['class' =>'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                       
    
                        @if($errors->has('start_date'))
                          <span class="help-block">{{ $errors->first('start_date') }}</span>
                        @endif
                    </div>

                <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                        {!! Form::label('end_date','End date') !!}
                        <div class="input-group date" id="datetimepicker1">
                            {!! Form::text('end_date', null,['class' =>'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                       
    
                        @if($errors->has('end_date'))
                          <span class="help-block">{{ $errors->first('end_date') }}</span>
                        @endif
                    </div>
    
              
    
          </div>
          <!-- /.box-body -->
       
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ $event->exists ? 'Update' : 'Save'}}</button>
                {{--  <button type="submit" class="btn btn-primary">Save</button>  --}}
                  <a href="{{route('events.index')}}" class="btn btn-default">Cancel</a>
            </div>
         
        </div>
        <!-- /.box -->
    </div>