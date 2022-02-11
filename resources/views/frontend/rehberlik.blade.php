@extends('layouts.frond')


@section('content')




    <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">Ana səhifə</a></li>
          <li><a href="/">{{$page->parent->name}}</a></li>
          <li>{{$page->name}}</li>
        </ul>
      </div>
    </section>
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-lg-none">
            <div class="sidebar">
              <ul>
                

                @foreach($page->parent->childs as $child)
                <li @if($child->slug==$page->slug) class="active" @endif>
                  <a href="{{route('frond.page.show',[$page->parent->slug,$child->slug])}}">{{$child->name}}</a>
                </li>
                @endforeach

              </ul>
            </div>
          </div>
          <div class="col-lg-9 p-mobile">

<div class="in-page__content">
              <div class="in-page__title mb-24">
                <h1>Rəhbərlik</h1>
              </div>
              <div class="row gy-xs-24">


                @foreach($rehberler as $rehber)

                <div class="col-lg-12">
                  <div class="management-card">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="management-card__cover"><img src="{{asset('/storage/rehberler/'.$rehber->image)}}"></div>
                      </div>
                      <div class="col-sm-6">
                        <div class="management-card__info p-xs-16 p-lg-24">
                          <h6 class="management-card__position mb-24">{{$rehber->position}}</h6>
                          <div class="management-card__fullname mb-8"><span>{{$rehber->surname}}</span><span>{{$rehber->name}}</span></div>
                          <p class="management-card__description mb-xs-16 mb-lg-40">{{$rehber->title}}</p><a class="management-card__more" href="{{route('frond.page.child',['locale'=>app()->getLocale(),'parent'=>$page->parent->slug,
                              'dynamic'=>$page->slug,'child'=>$rehber->slug
                            ])}}">Daha çox<i class="aim-long-arrow-right size16 ml-4"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach


                <!--.col-md-4.col-sm-6
                a(href="/haqqimizda/rehberlik-daxili.html").management-card.small
                  .row
                    .col-lg-12
                      .management-card__cover
                        img(src=require('/src/img/management.png'))
                    .col-lg-12
                      .management-card__info.p-xs-16.p-lg-24
                        h6.management-card__position.mb-16 DİREKTOR MÜAVİNİ
                        .management-card__fullname.mb-8
                          span Soyad
                          span Ad
                -->
            </div>
          </div>
            
  
          </div>
        </div>
      </div>
    </section>

@endsection