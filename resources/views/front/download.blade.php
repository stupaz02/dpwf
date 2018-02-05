@extends('layouts.frontend.main')



@section('content')

  <section id ="download">
    <div class="container">
        <div id="accordion ">
           @include('front.sections.accounting')
           @include('front.sections.admin')
           @include('front.sections.cashier')
           @include('front.sections.cid')
           @include('front.sections.legal')
           @include('front.sections.sgod')
           @include('front.sections.lrmds')
         
        </div>
    </div>
 </section>

@endsection