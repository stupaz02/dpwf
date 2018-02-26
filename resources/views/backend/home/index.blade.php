@extends('layouts.backend.main')

@section('Title','Deped Palawan Dasbhboard')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dasbhboard
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-success">
              <!-- /.box-header -->
                <div class="box-body ">
                      <h3>Welcome to Deped CMS !</h3>
                      <p class="lead text-muted">Hello <b>{{Auth::user()->name}}</b></p>

                      <h4>Get started</h4>
                      <p><a href="{{route('post.create')}}" class="btn btn-primary">Write your first post</a> </p>
                      
                </div>

                
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          <div class="row">
              <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div class="box box-success">
                      
                          <div class="info-box">
                              <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
                              <div class="info-box-content">
                                  <span class="info-box-text">POSTS</span>
                                  <span class="info-box-number">{{App\Post::count()}}</span>
                              </div><!-- /.info-box-content -->
                          </div><!-- /.info-box -->
                    
                  </div>
              </div> 

              <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div class="box box-success">
                      <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-green"><i class="fa fa-tags"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">CATEGORIES</span>
                            <span class="info-box-number">{{App\Category::count()}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                  </div>
              </div> 

              <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div class="box box-success">
                      <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-green"><i class="fa fa-cloud-upload"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">UPlOADS</span>
                            <span class="info-box-number">{{App\Attachment::count()}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                  </div>
              </div> 

              <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div class="box box-success">
                      <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">EVENTS</span>
                            <span class="info-box-number">{{ App\Event::count()}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                  </div>
              </div> 

              <div class="col-lg-3 col-sm-6 col-xs-12">
                  <div class="box box-success">
                      <div class="info-box">
                          <!-- Apply any bg-* class to to the icon to color it -->
                          <span class="info-box-icon bg-green"><i class="	fa fa-group"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">VISITORS</span>
                            <span class="info-box-number">{{ App\Event::count()}}</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                  </div>
              </div> 
              
             
          </div>

           
           

          </div>
        </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
