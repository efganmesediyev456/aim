<!DOCTYPE html>
<html lang="az" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-status-bar-style" content="#3D3C7A">
    <meta name="msapplication-navbutton-color" content="#3D3C7A">
    <meta name="theme-color" content="#3D3C7A">
    <link rel="icon" type="image/svg+xml" href="{{url('/')}}/assets/images/logo-single.svg">
    <link rel="alternate icon" href="{{url('/')}}/assets/images/logo-single.svg">
    <link rel="mask-icon" href="{{url('/')}}/assets/images/logo-single.svg">
    @yield('css')
    <title>Aqrar İnnovasiya Mərkəzi</title>
  <link href="{{url('/')}}/assets/css/80.css" rel="stylesheet"><link href="{{url('/')}}/assets/css/main.css" rel="stylesheet"></head>
  <body @if(!in_array(\Request::route()->getName(),['frond.index'])) class="inpage" @endif>
    <nav>
      <div class="container">
        <div class="navbar"><a class="logo" href="/"><img class="mr-12" src="{{url('/')}}/assets/images/logo.svg"></a>
          <div class="right">
            <div class="tools">
              <div class="aim-platform mr-8 d-lg-none">
                <p>AİM Platforması<i class="aim-enter size20 ml-8"></i></p>
                <div class="switch-languages"><a target="_blank" href="https://aim-farmer.saffman.uk">Fermer</a><a target="_blank" href="https://aim-organization.saffman.uk">Qurum</a></div>
              </div>
              <div class="language mr-8 d-lg-none">
                <a>AZ<i class="aim-angle-down size12 ml-4"></i></a>
                <div class="switch-languages"><a>RU</a><a>EN</a></div>
              </div>
              <!--button(type="button").btn40.mr-8.d-xl-none.br4.open-glassesi.aim-glasses-alt.size20
              -->
              <button class="btn40 mr-8 d-lg-none br4 open-search" type="button"><i class="aim-search size20"></i></button>
              <button  class="btn40 br4 open-hamburger" type="button"><i class="aim-bars size16"></i></button>
            </div>
            <form class="header-searchbar mr-8" action="">
              <div class="form-container" ><i id="demo" class="aim-search size20 mr-8"></i>
                <input type="text" placeholder="Axtarış edin" id="input">
              </div>
            </form>
            <button class="btn40 br4 close-btn" type="button"><i class="aim-close size20"></i></button>
          </div>
        </div>
      </div>
    </nav>
    <div class="main-nav d-xl-none">
      <div class="container">
            <ul class="main-nav__list">



             @foreach($menus->get() as $menu)

            


              <li class="main-nav__three"><a href="{{ count($menu->childs)>0 ? '#' :  '/'.app()->getLocale().'/'.$menu->slug }}"> {{$menu->name}}</a>
                <div class="main-nav-three__body">

                  @if(count($menu->childs)>0)
                  <ul class="main-nav-three__list">

                        @foreach($menu->childs as $child)

                        <li><a href="{{route('frond.page.show',[$menu->slug,$child->slug])}}">{{$child->name}}</a></li>
                        @endforeach
                  </ul>
                  @endif
                </div>
              </li>

             @endforeach
            </ul>
      </div>
    </div>
    <div class="hamburger-menu head">
      <div class="container">
        <div class="tools mb-xs-24 mb-md-36">
          <div class="left">
            <div class="aim-platform mr-8">
              <p>AİM Platforması<i class="aim-enter size20 ml-8"></i></p>
              <div class="switch-languages"><a target="_blank" href="https://aim-farmer.saffman.uk">Fermer</a><a target="_blank" href="https://aim-organization.saffman.uk">Qurum</a></div>
            </div>
            <div class="language mr-8"><a>AZ<i class="aim-angle-down size12 ml-4"></i></a>
              <div class="switch-languages"><a>RU</a><a>EN</a></div>
            </div>
            <button class="btn40 br4 open-search-mobile" type="button"><i class="aim-search size20"></i></button>
          </div>
          <div class="mobile-search">
            <form class="header-searchbar mr-8" action="">
              <div class="form-container"><i class="aim-search size20 mr-8"></i>
                <input type="text" placeholder="Axtarış edin">
              </div>
            </form>
            <button class="btn40 br4 close-btn" type="button"><i class="aim-close size20"></i></button>
          </div>
        </div>


        <div class="row gy-md-36 gy-xs-24 hamburger-menu">




            @foreach($menus->has('childs','>',0)->get() as $menu)
              <div class="col-lg-4 col-md-4">
                <div class="hamburger-menu__box"><a class="hamburger-menu__title"> {{$menu->name}}</a>
                   @if(count($menu->childs)>0)
                  <ul class="hamburger-menu__list">
                     @foreach($menu->childs as $child)
                         <li class="hamburger-menu__item"><a href="{{route('frond.page.show',[$menu->slug,$child->slug])}}">{{$child->name}}</a></li>
                        @endforeach
                
                  </ul>
                   @endif
                </div>
              </div>
            @endforeach


            <div class="col-lg-4 col-md-4">
                <div class="hamburger-menu__box"><a class="hamburger-menu__title">Digər</a>
                  <ul class="hamburger-menu__list">
                    <li class="hamburger-menu__item bold"><a href="/platforma.html">Aqrar İnnovasiya Platforması</a></li>
                    <li class="hamburger-menu__item bold"><a href="/{{app()->getLocale().'/innovasiya-teqvimi'}}">İnnovasiya təqvimi</a></li>
                    <li class="hamburger-menu__item bold"><a href="{{app()->getLocale().'/elaqe'}}">Əlaqə</a></li>
                  </ul>
                </div>
              </div>

            


           
        </div>
      </div>
    </div>
















@yield('content')
  









    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 d-lg-none">
              <div class="footer-top__logo"><img src="/assets/images/logo-white.svg"></div>
            </div>
            <div class="col-lg-9">
              <div class="row gy-md-36 gy-xs-24 hamburger-menu">
                      @foreach($menus->has('childs','>',0)->get() as $menu)
                        <div class="col-lg-4 col-md-4">
                          <div class="hamburger-menu__box"><a class="hamburger-menu__title"> {{$menu->name}}</a>
                             @if(count($menu->childs)>0)
                            <ul class="hamburger-menu__list">
                               @foreach($menu->childs as $child)
                                   <li class="hamburger-menu__item"><a href="{{route('frond.page.show',[$menu->slug,$child->slug])}}">{{$child->name}}</a></li>
                                  @endforeach
                          
                            </ul>
                             @endif
                          </div>
                        </div>
                      @endforeach
                   
                  
                    <div class="col-lg-4 col-md-4">
                      <div class="hamburger-menu__box"><a class="hamburger-menu__title">Digər</a>
                        <ul class="hamburger-menu__list">
                          <li class="hamburger-menu__item bold"><a href="/platforma.html">Aqrar İnnovasiya Platforması</a></li>
                          <li class="hamburger-menu__item bold"><a href="/{{app()->getLocale().'/innovasiya-teqvimi'}}">İnnovasiya təqvimi</a></li>
                          <li class="hamburger-menu__item bold"><a href="/{{app()->getLocale()}}/elaqe">Əlaqə</a></li>
                        </ul>
                      </div>
                    </div>

                    
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="footer-bottom">
          <p>Bütün hüquqlar qorunur © 2021</p>
          <div class="social-media"><a class="social-media__item" href="/"><i class="aim-facebook size20"></i></a>
            <!--a.social-media__item(href="/")i.aim-instagram.size20
            -->
            <!--a.social-media__item(href="/")i.aim-telegram.size20
            -->
            <!--a.social-media__item(href="/")i.aim-youtube.size20
            -->
            <!--a.social-media__item(href="/")i.aim-linkedin.size20
            -->
            <!--a.social-media__item(href="/")
            i.aim-twitter.size20
            
            -->
          </div>
          <p>Sayt <b>Safaroff Agentliyi</b> tərəfindən hazırlanılmışdır</p>
        </div>
      </div>
    </footer>
  <script defer src="{{url('/')}}/assets/js/80.js"></script><script defer src="{{url('/')}}/assets/js/main.js"></script></body><script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "eyYhlKz49t");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
      $(function(){

          $(".language > a").html(`
              ${'{{app()->getLocale()}}'.toUpperCase()}
              <i class="aim-angle-down size12 ml-4"></i>
            `)

          var languages=["AZ","RU","EN"];

          $(".language a:not(:first):contains('"+'{{app()->getLocale()}}'.toUpperCase()+"')").hide()

          if('{{app()->getLocale()}}'=='RU'.toLowerCase()){
            $('.switch-languages').append("<a>AZ</a>")
          }else if('{{app()->getLocale()}}'=='EN'.toLowerCase()){
            $('.switch-languages').append("<a>AZ</a>")
          }


          $("body").on('click','.language a:not(:first)',function(){
           

              var url = new URL(window.location.href);
              url=url.pathname; 
              url=url.split('/')
              url[1]=$.trim($(this).text().toLowerCase())
              window.location.href=url.join('/')
          })

          $("#demo").click(function(e){


              var search=$(this).next("input").val();

              const encoded = '{{urlencode('+search+')}}'
              window.location.href="/{{app()->getLocale()}}/search/"+search;


          });


          $("#input").on('keyup', function (e) {
              e.preventDefault();
              if (e.key === 'Enter' || e.keyCode === 13) {
                  $("#demo").trigger('click')
              }
          });



      })
    </script>

    @yield('js')


</html>