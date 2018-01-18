@extends('layouts.frontend.main')



@section('content')
   <section id ="show-post">
      <div class="container">
            <div class="row">
                <div class="col-md-10 show-container">
                     <h1 class="heading-title"> {{ $post->title}}</h1>
                    {{--  {{ $post->body}}  --}}
                    {!! Markdown::convertToHtml( $post->body) !!}
                </div>
                <div class="col-md-2">
                    {{--  {{ $post->category->title}}  --}}


                   
                </div>
            </div>
         
      </div>

   </section>



@endsection