<nav class="navbar navbar-expand-md navbar-dark " id="front-nav">
    <div class="container">
       <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button> -->
       
       <!-- <div class="collapse navbar-collapse" id="navbarsExampleDefault"> -->
               <ul class="navbar-nav">
                   <li class="nav-item mr-4 p-2">
                   <i class="fa fa-phone globe mr-2" aria-hidden="true"></i><span>(048) 433 6392</span>
                   </li>
                   <li class="nav-item p-2">
                   <i class="fa fa-globe globe mr-2 " aria-hidden="true"></i><span>www.depedpalawan.com</span>
                   </li>
               </ul>

               <ul class="navbar-nav ml-auto">
                   <li class="nav-item p-2">
                   <span>Follow Us:</span><a href="#"><i class="fa fa-facebook ml-2" aria-hidden="true"></i></a>
                   </li>
               </ul>
       <!-- </div> -->
    </div><!--/container-->
</nav>


<!-- Front End Header -->

<header class="navbar  navbar-expand-md navbar-dark py-2 sticky-top">
   <div class="container">
      
      <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar2">
          <span class="navbar-toggler-icon"></span>
      </button>

      <a href="/" class="navbar-brand" id="logo">
       <img src="{{ asset('backend/img/DepedLR.png') }}" alt="" width="80" height="80">
      
      </a>
      
      <!--navbar-collapse-->
      <div class="collapse navbar-collapse" id="navbar2">
           <ul class="navbar-nav ml-5 mr-auto ">
               <li class="navbar-item">
                   <a href="/" class=" active nav-link text-uppercase"><i class="fa fa-home  mr-1" aria-hidden="true" id="dropdown"></i> Home</a>
               </li>
               <li class="navbar-item dropdown">
                   <a href="#" class="nav-link text-uppercase dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o  mr-1" aria-hidden="true" id="dropdown"></i> About Us</a>
                   <div class="dropdown-menu">
                       <a class="dropdown-item" href="{{ route('front.history')}}"><i class="fa fa-history mr-1" aria-hidden="true"></i> History</a>
                       <a class="dropdown-item" href="#"><i class="fa fa-eye mr-1" aria-hidden="true"></i> Vision, Mission, Core Values</a>
                       <a class="dropdown-item" href="#"><i class="fa fa-users mr-1" aria-hidden="true"></i> Organizational Structure</a>
                     
                   </div>
               </li>
               <li class="navbar-item dropdown dropdown-submenu" >
                   <a href="" class="nav-link text-uppercase dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder-o mr-1" aria-hidden="true" id="dropdown"></i> Issuances</a>
                   <div class="dropdown-menu">
                       <!-- <a class="dropdown-item" href="#">Issuances</a> -->
                       <a class="dropdown-item" href="{{ route('front.issuances')}}"><i class="fa fa-folder-open mr-1" aria-hidden="true"></i> Divison Memos and Issuances</a>
                       <a class="dropdown-item" href="http://www.deped.gov.ph/orders"><i class="fa fa-folder-open mr-1" aria-hidden="true"></i> DepEd Orders</a>
                       <a class="dropdown-item" href="#"><i class="fa fa-folder-open mr-1" aria-hidden="true"></i> DepEd Memo</a>
                       <a class="dropdown-item" href="#"><i class="fa fa-folder-open mr-1 " aria-hidden="true"></i> DepEd Advisories</a>                     
                   </div>
               </li>
               <li class="navbar-item">
                   <a href="{{ route('front.showdownload')}}" class="nav-link text-uppercase" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-download mr-1" aria-hidden="true" id="dropdown"></i> Downloads</a>
                   {{--  <div class="dropdown-menu">  --}}
                       <!-- <a class="dropdown-item" href="#">Issuances</a> -->
                       {{--  <a class="dropdown-item" href="#"><i class="fa fa-folder-open mr-1" aria-hidden="true"></i> Forms</a>  --}}
                     
                                          
                   {{--  </div>  --}}
               </li>
               <li class="navbar-item">
                   <a href="" class="nav-link text-uppercase"><i class="fa fa-envelope-open-o mr-1" aria-hidden="true" id="dropdown"></i> Contact Us</a>
               </li>
           </ul>

           <form action="{{ route('search')}}" class="form-inline my-2 my-lg-0 ">
              <div class="input-group">
                   <input class="form-control form-control-sm " value="{{ request('term')}}" name ="term" type="text" placeholder="Search" aria-label="Search">
                   <span class="input-group-btn">
                    <button type="submit" class="btn btn btn-outline-secondary btn-sm  my-sm-0" style="
                    margin-left: 2px;" type="submit"><i class="fa fa-search"></i></button>
                   </span>
              </div>

             
           </form>

      </div><!--collapse-->  
   </div><!---container-->
</header>





