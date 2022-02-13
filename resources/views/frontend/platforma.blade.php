@extends('layouts.frond')


@section('content')


  <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
        
          <li>{{$page->name}}</li>
        </ul>
      </div>
    </section>
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-mobile">
            <div class="in-page__content">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="in-page__title mb-24">
                    <h1>{{$page->name}}</h1>
                  </div>
                  <article class="in-page__main">
                    {!!$page->content!!}
                  </article>
              
                  <div class="project-steps mt-lg-52 mt-xs-48">
                    <h1 class="project-steps__title">{{__('sites.reallayihe')}}</h1>
                    <div class="project-steps__box mt-lg-52 mt-xs-24">
                      <div class="project-steps__overflow">
                        <div class="project-steps__level"><span>1</span>
                          <p>{{__('sites.layihe1')}}</p>
                        </div>
                        <div class="project-steps__level"><span>2</span>
                           <p>{{__('sites.layihe2')}}</p>
                        </div>
                        <div class="project-steps__level"><span>3</span>
                           <p>{{__('sites.layihe3')}}</p>
                        </div>
                        <div class="project-steps__level"><span>4</span>
                           <p>{{__('sites.layihe4')}}</p>
                        </div>
                        <div class="project-steps__level"><span>5</span>
                           <p>{{__('sites.layihe5')}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <section class="platform p-0 in">
                    <h1 class="platform__title mb-lg-52 mb-xs-24">{{__('sites.platkec')}}</h1>
                    <div class="row justify-content-between gy-xs-16">
                      <div class="col-md-6 col-lg-5">
                        <h6 class="mb-8 section-subtitle">{{__('sites.plattitle')}}</h6>
                        <p class="mb-28 section-description">{{__('sites.platcontent')}}</p>
                        <div class="platform__to"><a class="btn-light-green mu" target="_blank" href="https://aim-farmer.saffman.uk">{{__('sites.fermer')}}</a><a class="btn-light-green mu" target="_blank" href="https://aim-organization.saffman.uk">{{__('sites.qurum')}}</a></div>
                      </div>
                      <div class="col-md-6">
                        <div class="section-cover"><img src="/assets/images/platform.png"></div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection