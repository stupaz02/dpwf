<div id="show"> 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      {{--  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>  --}}
      @foreach( $photos as $photo )
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
     @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach ($photos as $photo)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <div class="container">
                    {{--  <img class="d-block w-100" src="http://www.deped.gov.ph/sites/default/files/styles/slideshow/public/slideshow/Web%20banner%20final%20a-01_2.png?itok=nFXbPscF" alt="Third slide">  --}}
                    <img class="d-block w-100 img-fluid" src="{{ $photo->image_url }}" alt="{{ $photo->title }}">
                <div class="carousel-caption d-none d-md-block" data-aos="zoom-in-up">
                    <h3>{{ $photo->title }}</h3>
                    <p>{{ $photo->caption }}</p>
                </div>  
                </div><!--/container-->
            </div>   
       @endforeach  
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
   </div>
   
   </div><!--/show-->