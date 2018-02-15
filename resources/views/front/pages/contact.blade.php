@extends('layouts.frontend.main')


@section('content')
   
   <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div class=" mt-4">
                {{--  <h1 class="h6 text-dark font-weight-bold "> History</h1>  --}}

            </div>
          {{--  @foreach($history as $hty)  --}}
            <div class="text-dark mt-4">
                    {{--  <h1 class="h6 text-center font-weight-bold text-uppercase">{{ $hty->title }}</h1>  --}}

                    {{--  <div> {!! $hty->body !!}</div>  --}}
                    
            </div>
          {{--  @endforeach    --}}
        </div>
      </div>
   </div>

@endsection