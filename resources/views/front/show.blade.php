@extends('layouts.frontend.main')



@section('content')
   <section id ="show-post">
      <div class="container">
            <div class="row">
                <div class="col-md-10 show-container container">
                     <div class="d-flex align-items-center p-3 my-3 text-white-50 card-active rounded box-shadow">
                      <div class="">
                        <h6 class="mb-0 text-white text-warning text-uppercase font-weight-bold">{{ $pid->title }}</h6>
                       
                      </div>
                    </div>

                     <div class="card box-shadow" style="max-width: 65rem;">   
                       @if($pid->image_url)
                        <img class="card-img-top img-fluid" src="{{ $pid->image_url}}" style="height:300px;" alt="Card image cap">         
                       @endif
                        <div class="card-body">
                        
                        {!! $pid->body !!}
                        </div>
                        <div class="card-footer">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $pid->created_at->diffForHumans() }}
                            @if(!Auth::guest())
                                @if (Auth::user()->id == $pid->author_id)
                                <a class="btn btn-primary btn-sm card-active pull-right" href="{{ route('post.edit', $pid->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                @endif
                            @endif
                          
                          </div>

                      
                    </div>
                   

  
                </div>
                <div class="col-md-2  show-container">
                  <div class="container">
                   
                @if($pid->attachments->count() > 0)
                    <div class="card my-3" style="width: 10rem;">
                      <div class="card-header card-active text-warning">
                        DOWNLOAD
                      </div>
                      <div class="card-body">
                     
                        <ul class="list-group list-group-flush">
                      
                            @foreach($pid->attachments as $attachment)
                                {{--  <li class="list-group-item text-warning">{{ $attachment->file_name }}</li>  --}}
                               
                                  {{--  {{ $attachment->file_name }}  --}}
                                  <li class="list-group-item">
                                      <a href="{{route('downloadFile', $attachment->file_name)}}" download="{{ $attachment->file_name }}" data-toggle="tooltip" data-placement="top" title="{{substr($attachment->file_name, 10) }}"  class="btn btn-secondary btn-sm btn-block card-active">  <i aria-hidden="true" id="dropdown" class="fa fa-download"></i></a> 
                                  </li>
                                 
                                 
                                
                            @endforeach
                        </ul>

                        @else
              
                       

                        @endif
                        
                      </div>
                    </div>
                 </div>
                   
                </div>
            </div>
         
      </div>

   </section>



@endsection





