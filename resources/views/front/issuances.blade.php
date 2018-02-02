@extends('layouts.frontend.main')





@section('content')
   <section id="issuances">
      <div class="container">
          <div id="accordion ">
            @include('front.issuances.numbered')
            @include('front.issuances.unnumbered')
          </div>  
      </div>
  </section>
  
@endsection