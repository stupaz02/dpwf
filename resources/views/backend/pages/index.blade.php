@extends('layouts.backend.main')

@section('Title','Deped Palawan | Posts')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       ABOUT US
        {{--  <small>Display All slides</small>  --}}
      </h1>
      <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="active"><a href="{{ route('pages.index')}}">About Us</a></li>
          {{--  <li class="active">All slides</li>  --}}
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-left">
                        <a href="{{ route('pages.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>   
              <div class="box-body ">
               @include('backend.partials.message')

                @if(! $history->count())
                   <div class="alert alert-danger">
                       <strong>No record found</strong>
                   </div>
                @else
                  @include('backend.pages.table')           
                @endif
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <div class="pull-left">
                    {{--  {{ $history->appends( Request::query() )->render() }}  --}}
                </div>
                
                <div class="pull-right">
                        <small>{{$historyCount}} {{ str_plural('Item', $historyCount)}}</small>
                </div>
              </div>
                  
            </div>
            <!-- /.box -->
          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('script')
  <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
  </script>
@endsection
