<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hotstar &mdash; Watch TV's show and Movies</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    
    <link rel="stylesheet" href="{{asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
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
            <div class="site-navbar bg-light">
              <div class="py-1">
                <div class="row align-items-center">
                  <div class="col-2">
                    <h2 class="mb-0 site-logo"><a href="/">Hotstar</a></h2>
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
                          <li><a href="events.html">News</a></li>
                          <li><a href="about.html">Premium</a></li>
                          <li><a href="contact.html">Login</a></li>
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
        
        <div class="container mt-5">
          <div class="row">
            <div class="section-heading" style="margin-left: 100px">
              <h2 style="font-size: 22px; ">{{$Subcat->name}}</h2>
            </div>
          </div>
          
          <div class="row justify-content-center">
            @foreach($Subcat->videos as $video)
            <div class="row p-2 d-flex justify-content-center flex-wrap ">
              <div class="p-3">
                <div class="border: 1px solid lightgrey; padding: 5px;">
                  <a href="{{'/watch/'.str::slug($video->name).'/'.$video->id}}">
                    <img src="{{'/storage/images/'.$video->image}}" width="220px" height="120px" style="border-radius: 15px;" class="zoom">
                  </a>
                  <div class="text-center"><strong >{{$video->name}}</strong></div>
                </div>
              </div>
            </div>
            
            @endforeach
          </div>
        </div>


        <footer class="mt-5 pt-5">
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
      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
      <script src="{{asset('js/jquery-ui.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/jquery.stellar.min.js')}}"></script>
      <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
      <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
      <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('js/aos.js')}}"></script>
      
      <script src="{{asset('js/mediaelement-and-player.min.js')}}"></script>
      <script src="{{asset('js/main.js')}}"></script>
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