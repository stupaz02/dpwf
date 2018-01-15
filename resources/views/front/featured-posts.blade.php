<section id="featured-post">

    
    <div class="container">
        {{--  <div class="col-md-12">
            <h2 class="heading-featured" data-aos="zoom-in-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine" >Featured Post</h2>
           <div class="align-content-center">
                <ul class="list-unstyled">
                    @foreach($features as $f)
                    <li class="media mb-4" data-aos="flip-right" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">
                        <img class="align-self-center mr-3" src="http://placehold.it/200x150&text=No+Image" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="text-justify ml-4">{{ $f->title }}</h5>
                        <p class="text-justify ml-4">{{ $f->excerpt }}</p>
                        </div>
                        </li>
                    @endforeach
                
                </ul>
            </div>
        </div>   --}}
   <div class="col-md-12 col-sm-6">   
        <h2 class="heading-featured" data-aos="zoom-in-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine" >Featured Post</h2>
   @foreach($features as $f)
        <div  class="media mb-4" data-aos="flip-right" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">
            <div class="img-box">
            <figure><img class=" img-fluid align-self-center mr-3" style="width:300px; height:200px;" src="{{$f->image_url}}" alt="Generic placeholder image"></figure>
            </div>
            <div class="media-body">
                <h5 class="mt-0 ml-3 mb-3 text-justify font-weight-bold">{{ $f->title }}</h5>
                <p class="mb-2 ml-3 text-justify">{{ str_limit($f->excerpt, 300) }}</p>
            </div>
        </div>
   @endforeach
        </div>
     </div><!--/container-->

    

</section>

