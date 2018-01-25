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
                        
                        {!!$pid->body !!}
                        </div>
                        <div class="card-footer">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $pid->created_at->diffForHumans() }}
                            @if (Auth::user()->id == $pid->author_id)
                            <a class="btn btn-primary btn-sm card-active pull-right" href="{{ route('post.edit', $pid->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            @endif
                          
                          </div>

                      
                    </div>
                   

  
                </div>
                <div class="col-md-2  show-container">
                  <div class="container">
                    {{--  <div class="d-flex align-items-center p-2 my-3  rounded box-shadow">
                      <div class="">
                        <h6 class="mb-0 text-white">Download</h6>
                     
                      </div>
                    </div>  --}}

                    <div class="card my-3" style="width: 10rem;">
                      <div class="card-header card-active text-warning">
                        DOWNLOAD
                      </div>
                      <ul class="list-group list-group-flush p-2">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                      </ul>
                    </div>
                 </div>
                   
                </div>
            </div>
         
      </div>

   </section>



@endsection