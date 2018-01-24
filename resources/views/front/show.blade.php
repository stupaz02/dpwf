@extends('layouts.frontend.main')



@section('content')
   <section id ="show-post">
      <div class="container">
            <div class="row">
                <div class="col-md-10 show-container container">
                     <div class="d-flex align-items-center p-3 my-3 text-white-50 card-active rounded box-shadow">
                      <div class="">
                        <h6 class="mb-0 text-white">{{ $pid->title }}</h6>
                       
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
                        </div>
                    </div>
                   

  
                </div>
                <div class="col-md-2 show-container">
                  <div class="container">
                    <div class="d-flex align-items-center p-2 my-3  rounded box-shadow">
                      <div class="">
                        <h6 class="mb-0 text-white">Download</h6>
                       
                      </div>
                    </div>
                 </div>
                   
                </div>
            </div>
         
      </div>

   </section>



@endsection