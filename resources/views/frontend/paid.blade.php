<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hotstar &mdash; Watch TV's show and Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
    <style type="text/css">
      .zoom:hover {
        -ms-transform: scale(1.6); /* IE 9 */
        -webkit-transform: scale(1.6); /* Safari 3-8 */
        transform: scale(1.6); 
      }
    </style>
    
    <div class="site-wrap">
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
        </div> <!-- .site-mobile-menu -->
        
        
        <div class="site-navbar-wrap js-site-navbar bg-white">
          
          <div class="container">
            <div class="site-navbar">
              <div class="py-1">
                <div class="row align-items-center">
                  <div class="col-2">
                    <h2 class="mb-0"><a href="">Hotstar</a></h2>
                  </div>
                  <div class="col-10">
                    <nav class="site-navigation text-right" role="navigation">
                      <div class="container">
                        <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
                        <ul class="site-menu js-clone-nav d-none d-lg-block">
                          @foreach($categories as $category)
                          <li class="active has-children">
                            <a href="/">{{$category->name}}</a>
                            <ul class="dropdown arrow-down">
                              @foreach($category->subcategories as $subcategory)
                              <li><a href="{{'/channels/'.Str::slug($subcategory->name).'/'.$subcategory->id}}">{{$subcategory->name}}</a></li>
                              @endforeach
                            </ul>
                          </li>
                          @endforeach
                          <li><a href="">News</a></li>
                          <li><a href="/premium">Premium</a></li>
                          @if(Auth::check())
                          <li><a href="{{url('/logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout

                          </a>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </li>
                          @else
                          <li><a href="/home">Login</a></li>
                          @endif
                        </ul>
                        
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div style="height: 113px;"></div>


        <div class="slide-one-item home-slider owl-carousel">  
        @php  $PopularVideo = \App\Video::find(19); @endphp
        @if($PopularVideo)
        <a href="{{'/watch/'.str::slug($PopularVideo->name).'/'.$PopularVideo->id}}">        
          <div class="site-blocks-cover" style="background-image: url(/storage/images/<?php echo $PopularVideo->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.1">

              <div class="container float-left">
                <div class="col-md-6 text-left" data-aos="fade" >
                  <h2 style="color: black; margin-left: 50px;"><strong>{{$PopularVideo->name}}</strong></h2><br>
                  <h4 class="font-weight-bold" style="color: black; margin-left: 50px; ">{{ucwords($PopularVideo->tag)}}. {{$PopularVideo->updated_at->year}}</h4>
                  <h4 class="font-weight-bold" style="color: black; margin-left: 50px;">{{ucwords($PopularVideo->details)}}</h4>
                </div>
              </div>
              <div class="container">
                <div class="text-right">
                  <h1 class="font-weight-bold">{{$PopularVideo->name}}</h1>
                </div>
              </div>

          </div>
          </a>
          @endif
          @php  $PopularVideo = \App\Video::find(12); @endphp
          @if($PopularVideo)
          <a href="{{'/watch/'.str::slug($PopularVideo->name).'/'.$PopularVideo->id}}">
          <div class="site-blocks-cover" style="background-image: url(/storage/images/<?php echo $PopularVideo->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

              <div class="container float-left">
                <div class=" col-md-6 text-left" data-aos="fade">
                  <h2 style="color: white;margin-left: 50px;"><strong>{{$PopularVideo->name}}</strong></h2><br>
                  <h4 class="font-weight-bold" style="color: white; margin-left: 50px;">{{ucwords($PopularVideo->tag)}}. {{$PopularVideo->updated_at->year}}</h4>
                  <h4 class="font-weight-bold" style="color: white; margin-left: 50px;">{{ucwords($PopularVideo->details)}}</h4>
                </div>
              </div>
              <div class="container">
                <div class="text-right">
                  <h1 class="font-weight-bold">{{$PopularVideo->name}}</h1>
                </div>
              </div>

          </div>
          </a>
          @endif
          @php  $PopularVideo = \App\Video::find(20); @endphp
          @if($PopularVideo)
          <a href="{{'/watch/'.str::slug($PopularVideo->name).'/'.$PopularVideo->id}}">
          <div class="site-blocks-cover" style="background-image: url(/storage/images/<?php echo $PopularVideo->image; ?>);" data-aos="fade" data-stellar-background-ratio="0.5">

              <div class="container float-left">
                <div class=" col-md-6 text-left" data-aos="fade">
                  <h2 style="color: white;margin-left: 0px;"><strong>{{$PopularVideo->name}}</strong></h2><br>
                  <h4 class="font-weight-bold" style="color: white; margin-left: 0px;">{{ucwords($PopularVideo->tag)}}. {{$PopularVideo->updated_at->year}}</h4>
                  <h4 class="font-weight-bold" style="color: white; margin-left: 0px;">{{ucwords($PopularVideo->details)}}</h4>
                </div>
              </div>
              <div class="container">
                <div class="text-right">
                  <h1 class="font-weight-bold">{{$PopularVideo->name}}</h1>
                </div>
              </div>

          </div>
          </a>
         @endif
        </div>
        <div class="site-section block-15">
          <div class="container">
            <div class="row">
              <div class="col-md-6  text-left section-heading">
                <h4>Special & Latest Movies</h4>
              </div>
            </div>
            
              @foreach($categories as $category)
            <div class="row mt-2">

              @foreach($category->videos->where('category_id',1) as $video)
              <div class="slider-container" style="position: relative;">
                <div class="col">
                  <div class="">
                    <a href="{{'/watch/'.str::slug($video->name).'/'.$video->id}}" class="">
                      <img src="{{'storage/images/'.$video->image}}" alt="" class="zoom"  width="120px" height="100px">
                    </a><br>
                   {{$video->name}}

                  </div>
                  
                </div>
                
                
              </div>
              @endforeach
            </div>
              @endforeach
            <div class="row">
              <div class="col-md-6  text-left mt-3 section-heading">
                <h4> Latest Sports</h4>
              </div>
            </div>

              @foreach($categories as $category)
            <div class="row mt-2">

              @foreach($category->videos->where('category_id',2) as $video)
              <div class="slider-container" style="position: relative;">
                
                <div class="col">
                  <div class="">
                    <a href="{{'/watch/'.str::slug($video->name).'/'.$video->id}}" >
                      <img src="{{'storage/images/'.$video->image}}" alt="" class="zoom" width="130px" height="100px">
                    </a><br>
                    {{$video->name}}


                  </div>
                  
                </div>
                
                
              </div>
              @endforeach
            </div>
              @endforeach

              <div class="row ">
                <div class="col-md-6 mt-3 text-left section-heading">
                  <h4>Tv Show</h4>
                </div>
              </div>

                @foreach($categories as $category)
              <div class="row mt-1">

                @foreach($category->videos->where('category_id',3) as $video)
                <div class="slider-container" style="position: relative;">
                  
                  <div class="col">
                    <div class="">
                      <a href="{{'/watch/'.str::slug($video->name).'/'.$video->id}}" >
                        <img src="{{'storage/images/'.$video->image}}" alt="" class="zoom" width="130px" height="100px">
                      </a>
                     <br>
                     {{$video->name}}

                    </div>
                    
                  </div>
                  
                  
                </div>
                @endforeach
              </div>
                @endforeach

          </div>
        </div>
        <footer class="">
          <div class="py-5 quick-contact-info site-footer">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div>
                    <h2><span class="icon-room"></span> Location</h2>
                    <p class="mb-0">New York - 2398 <br>  10 Hadson Carl Street</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <div>
                    <h2><span class="icon-clock-o"></span> Service Times</h2>
                    <p class="mb-0">Wednesdays at 6:30PM - 7:30PM <br>
                      Fridays at Sunset - 7:30PM <br>
                    Saturdays at 8:00AM - Sunset</p>
                  </div>
                </div>
                <div class="col-md-4">
                  <h2><span class="icon-comments"></span> Get In Touch</h2>
                  <p class="mb-0">Email: info@yoursite.com <br>
                  Phone: (123) 3240-345-9348 </p>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/jquery-ui.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>
      <script src="js/jquery.countdown.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/aos.js"></script>
      
      <script src="js/mediaelement-and-player.min.js"></script>
      <script src="js/main.js"></script>
      <script>
          document.addEventListener('DOMContentLoaded', function() {
                    var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                    for (var i = 0; i < total; i++) {
                        new MediaElementPlayer(mediaElements[i], {
                            pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                            shimScriptAccess: 'always',
                            success: function () {
                                var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                                for (var j = 0; j < targetTotal; j++) {
                                    target[j].style.visibility = 'visible';
                                }
                      }
                    });
                    }
                });
        </script>
      
    </body>
  </html>