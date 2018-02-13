
    <section class="latest-post">
      <div class="container">

            <div class="text-center">
                <h2 class="heading-secondary" data-aos="zoom-in-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">Recent Posts</h2>
            </div>

            <div class="row">
                <div class="col-sm-4 col-md-4 mb-2">
                    <div class="latest-post-box" data-aos="zoom-out-down" data-aos-offset="300"data-aos-delay ="100" data-aos-easing="ease-in-sine">
                        
                          <i class="fa fa-microphone mb-4" aria-hidden="true"></i>
                          <h3>Announcements</h3>
                          <ul class="announcements-con">
                            @foreach($announcements as $a)
                                <li class="advisories-con-list">
                                    <div class="latest-post-date float-left">
                                            <span class="latest-post-day">{{ $a->published_at->day }}</span>
                                            <span class="latest-post-month">{{ $a->published_at->format('F') }}</span>
                                            <span class="latest-post-month">{{ $a->published_at->year }}</span>
                                    </div>
                                    <div class="latest-post-title  clearfix ">
                                        <div id="post-descript" >
                                        <a href="{{ route('front.show', $a->slug)}}">
                                            <h1 class="h6 text-justify font-weight-bold  pxy">{{ str_limit($a->title, 50) }}</h1>
                                            <p class="h6  text-justify pxy"> {{ str_limit($a->excerpt, 50) }}</p>
                                        </a>
                                        </div>
                                    </div>
                                </li>
                           @endforeach
                         
                      </ul>
                         
                      
                         
                    </div>

                   
                </div><!--/col-md-4-->

                <div class="col-sm-4 col-md-4 mb-4">
                    <div class="latest-post-box" data-aos="zoom-out-down" data-aos-offset="300" data-aos-delay ="150" data-aos-delay="200"  data-aos-easing="ease-in-sine">
                        <i class="fa fa-bullhorn mb-4" aria-hidden="true"></i>
                        <h3 class="mb-2">Advisories</h3>             
                           <ul class="memos-con">
                          @foreach($advisories as $adv)     
                           <li class="advisories-con-list">
                               <div class="latest-post-date float-left">
                                   <span class="latest-post-day">{{ $adv->published_at->day }}</span>
                                   <span class="latest-post-month">{{ $adv->published_at->format('F') }}</span>
                                   <span class="latest-post-month">{{ $adv->published_at->year }}</span>
                               </div>
                               <div class="latest-post-title  clearfix ">
                                 <div id="post-descript" >
                                <a href="{{ route('front.show', $adv->slug)}}">
                                    <h1  class="h6 text-justify font-weight-bold  pxy">{{ str_limit($adv->title, 50) }}</h1>
                                    <p class="h6 text-justify pxy"> {{ str_limit($adv->excerpt, 50) }}</p>
                                </a>
                                </div>
                               </div>
                           </li>
                           @endforeach
                         
                       </ul>
                          
                    </div>

                   
                </div><!--/col-md-4-->

                <div class="col-sm-4 col-md-4 mb-4">
                    <div class="latest-post-box" data-aos="zoom-out-down" data-aos-offset="300" data-aos-delay="300" data-aos-easing="ease-in-sine">
                        <i class="fa fa-book mb-4" aria-hidden="true"></i>
                        <h3>Memoranda</h3>

                        <ul class="advisories-con">
                            @foreach($memoranda as $memo)
                            <li class="advisories-con-list">
                                <div class="latest-post-date float-left">
                                        <span class="latest-post-day">{{ $memo->published_at->day }}</span>
                                        <span class="latest-post-month">{{ $memo->published_at->format('F') }}</span>
                                        <span class="latest-post-month">{{ $memo->published_at->year }}</span>
                                </div>
                                <div class="latest-post-title  clearfix ">
                                <div id="post-descript" >
                                    <a href="{{ route('front.show', $memo->slug )}}">
                                        <h1 class="h6  text-justify font-weight-bold  pxy">{{ str_limit($memo->title, 50) }}</h1>
                                        <p class="h6  text-justify pxy"> {{ str_limit($memo->excerpt, 50) }}</p>
                                    </a>
                                </div>
                                </div>
                            </li>
                            @endforeach
                         
                        </ul>
                       
                    </div><!--latest-post-box-->
                   
                   
                </div><!--/col-md-4-->
            </div><!--/row-->           
            
      </div> <!--/container--> 
    </section>  


   
    
