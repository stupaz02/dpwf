@extends('layouts.frontend.main')



@section('content')

  <section id ="search" >
    <div class="container mt-4">
        @if (! $posts->count())
            <div class="text-center alert alert-danger card-active" style="margin-top:150px;">
                <h2 class="text-warning"><i class="fa fa-info-circle" aria-hidden="true"></i> Not found </h2>
                <p class=" text-white"> Sorry, no posts matched your criteria</p>
            </div>
        @elseif ($term = request('term'))
        
            <div class="alert alert-info card-active text-white">
                <p> Search Results for: <span class="text-warning"><strong>{{ $term }}</strong></spa></p>
            </div> 

            @foreach ($posts as $post)
               

                  <div class="card mb-2 box-shadow">
                        <h5 class="card-header">{{ $post->title }}</h5>
                        <div class="card-body">
                          <h5 class="card-title">{{ $post->excerpt}}</h5>
                          <a href="{{ route('front.show', $post->slug)}}" class="btn btn-primary card-active">Read more..</a>
                        </div>
                      </div>

                      

            @endforeach
            
            
        @endif

       
    </div>
</section>
@endsection