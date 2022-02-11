@extends('layouts.frond')



@section('content')

  <header class="mt-xs-16 mt-xl-40">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="header-slider__main owl-carousel relative">


              @foreach($sliders as $slider)

              <div class="header-slider__item">
                <div class="cover"><img src='{{asset("storage/slider/".$slider->image)}}'></div>
                <div class="info">
                  <h5 class="mb-md-4">{{$slider->name}}</h5>
                  <p>{{$slider->title}}</p>
                </div>
              </div>

              @endforeach


            

            </div>
          </div>
          <div class="col-lg-4">
            <div class="header-tabs mt-xs-16 mt-lg-0">
              <div class="header-tabs__list"><a class="header-tabs__item btn green active mr-sm-24 mr-xs-16" data-tab="events-1"> Tədbirlər</a><a class="header-tabs__item btn green" data-tab="events-2">Elanlar</a></div>
              <div class="header-tabs__section active" data-tab-events="1">
                <div class="header-tabs__main">




                  @foreach($tedbirler as $tedbir)
                  

                  @php
                    $arr=explode(',',$tedbir->day);
                    $month_group = collect($arr)->groupBy(function($date) {
                    return \Carbon\Carbon::parse($date)->format('m');
                  })->toArray();  
                  @endphp



                  <a class="header-tab__card">

                    <time>


                       @foreach($month_group as $key=>$month)
                        @php( $days=[])
                       
                        @foreach($month as $m)
                        @php($days[]=\Carbon\Carbon::parse($m)->format('d'))
                        @endforeach
                          {{implode(',',$days)}} {{$tedbir->month((int)$key)}}
                        @endforeach
                      


                    <span>{{$tedbir->from_hour}}-{{$tedbir->to_hour}}</span></time>
                    <h6>{{$tedbir->name}}</h6>
                    <p>{{$tedbir->title}}</p>

                  </a>

                  @endforeach

                </div>
                <div class="header-tabs__footer"><a href="/">Hamısına baxın<i class="aim-long-arrow-right size16 ml-4"></i></a></div>
              </div>
              <div class="header-tabs__section" data-tab-events="2">
                <div class="header-tabs__main">

                  @foreach($elanlar as $elan)



                  <a class="header-tab__card" href="">
                    <time>
                      {{$elan->created_at->format('n')}}  
                      {{$elan->month(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$elan->created_at))}}<span>
                        

                        {{$elan->from}}-{{$elan->to}}
                        

                      </span></time>
                   
                      
                    </a>

                  @endforeach


                 
                </div>
                <div class="header-tabs__footer"><a href="/sds">Hamısına baxın<i class="aim-long-arrow-right size16 ml-4"></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--NEWS-->
    <section class="news">
      <div class="container">
        <div class="row justify-content-between mb-24">
          <div class="col-xs-5">
            <div class="section-title">
              <h5>Xəbərlər</h5>
            </div>
          </div>
          <div class="col-xs-5">
            <div class="section-more"><a>Hamısına baxın<i class="aim-long-arrow-right size16 ml-4"></i></a></div>
          </div>
        </div>
      </div>
      <div class="container mobile">
        <div class="news-slider owl-carousel">

            @foreach($blogs as $blog)

            <a class="news-card" href="{{route('frond.page.child',['locale'=>app()->getLocale(),'parent'=>'media','dynamic'=>'xeberler','child'=>$blog->slug])}}">
            <img src='{{asset("/storage")."/blogs/".$blog->image}}'>

                                                

            <time>{{$blog->getDateYearHour()}}</time>
            <p>{{$blog->name}}</p>
            </a>

            @endforeach
           

        </div>
        <div class="slider-arrows__box mt-28 d-lg-none">
          <button class="prev"><i class="aim-long-arrow-right size32"></i></button>
          <button class="next"><i class="aim-long-arrow-right size32"></i></button>
        </div>
      </div>
    </section>
    <!--ACTIVITY-->
    <section class="activity gray">
      <div class="container">
        <div class="row justify-content-between mb-24">
          <div class="col-lg-5">
            <div class="section-title">
              <h5>Fəaliyyətimiz</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="container mobile">
        <div class="activity-box">
          <div class="row">


            @foreach($fealiyyetler as $fealiyyet)

            <div class="col-lg-3">
              <a class="activity-card" href="/{{app()->getLocale()}}/fealiyyet">
                <div class="activity-card__cover mb-lg-36 md-xs-20">
                  <img src="{{asset('storage/fealiyyet/'.$fealiyyet->image)}}">
                </div>
                <p class="mb-12">{!!trim($fealiyyet->content)!!}</p><span class="activity-card__more">Daha çox<i class="aim-long-arrow-right size16 ml-4"></i></span></a>

              </div>

              @endforeach

             

             
            
          </div>
        </div>
      </div>
    </section>
    <!--PROJECTS-->
    <section class="projects">
      <div class="container">
        <div class="row justify-content-between mb-24">
          <div class="col-xs-5">
            <div class="section-title">
              <h5>Layihələrimiz</h5>
            </div>
          </div>
          <div class="col-xs-5">
            <div class="section-more"><a>Hamısına baxın<i class="aim-long-arrow-right size16 ml-4"></i></a></div>
          </div>
        </div>
      </div>
      <div class="container mobile">
        <div class="projects-slider owl-carousel">

          @foreach($layiheler as $layihe)

          <a class="projects-card" href="{{route('frond.page.child',[

                      'locale'=>app()->getLocale(),
                      'parent'=>'hesabatlar',
                      'dynamic'=>'layiheler',
                      'child'=>$layihe->slug,

                    ])}}">
            <p class="mb-12">{{$layihe->name}}</p>
            <span class="projects-card__more">Daha ətraflı<i class="aim-long-arrow-right size16 ml-4"></i></span>
          </a>

          @endforeach




        </div>
        <div class="slider-arrows__box mt-28 d-lg-none">
          <button class="prev"><i class="aim-long-arrow-right size32"></i></button>
          <button class="next"><i class="aim-long-arrow-right size32"></i></button>
        </div>
      </div>
    </section>
    <!--ABOUT PLATFORM-->
    <section class="platform gray">
      <div class="container">
        <div class="row justify-content-between gy-xs-16">
          <div class="col-md-6">
            <div class="section-title mb-24">
              <h5>Platforma haqqında</h5>
            </div>
            <h6 class="mb-8 section-subtitle">Aqrar İnnovasiya Mərkəzinin fəaliyyəti layihələrinizi reallığa çevirməkdir. İstifadəçilər layihələrini mərkəzə göndərdikdə layihə 3 mərhələdən keçəcək.</h6>
            <p class="mb-28 section-description">Aqrar İnnovasiya Mərkəzinin fəaliyyəti layihələrinizi reallığa çevirməkdir. İstifadəçilər layihələrini mərkəzə göndərdikdə layihə 3 mərhələdən keçəcək.</p><a class="btn-light-green" href="/">Layihə yaradın</a>
          </div>
          <div class="col-md-6">
            <div class="section-cover"><img src="/assets/images/platform.png"></div>
          </div>
        </div>
      </div>
    </section>
    <!--PARTNERS-->
    <section class="partners">
      <div class="container">
        <div class="row justify-content-between mb-24">
          <div class="col-lg-5">
            <div class="section-title">
              <h5>Tərəfdaş qurumlar</h5>
            </div>
          </div>
          <div class="col-lg-2 d-lg-none">
            <div class="slider-arrows__box">
              <button class="prev"><i class="aim-long-arrow-right size32"></i></button>
              <button class="next"><i class="aim-long-arrow-right size32"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="container mobile">
        <div class="partners-slider owl-carousel">



          @foreach($terefdas_qurums->chunk(2) as $terefler)


          <div class="partners-card__box">


           
           @foreach($terefler as $teref)

            

            <a class="partners-card">
              <div class="partners-card__cover mr-16"><img src="{{asset('storage/terefdas/'.$teref->image)}}"></div>
              <p>{{$teref->name}}</p>
            </a>

          @endforeach
          </div>
          @endforeach
        
        </div>
      </div>
    </section>
    <!--USEFUL LINKS-->
    <section class="useful-link p-0">
      <div class="useful-link__slider owl-carousel">

        @foreach($links as $link)

        @php($title = preg_split('/\//', trim(preg_replace('/http(s?):\/\//', '', $link->link),'/')))



        <a class="useful-link__card" href="{{$link->link}}" target="_blank">
          <p>{{$link->name}}</p>
          <span>{{$title[0]}}
          <i class="aim-external-link-alt size20"></i>
          </span>
        </a>

        @endforeach


       </div>
    </section>



@endsection