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
                <h1>Multimedia</h1>
              </div>
              <div class="links">


                @foreach($multimedias as $multi)



                <a class="link-card" 


                  href="{{route('frond.page.child',[

                      'locale'=>app()->getLocale(),
                      'parent'=>$page->parent->slug,
                      'dynamic'=>$page->slug,
                      'child'=>$multi->slug,

                    ])}}"


                ><span class="link-card__count">{{$multi->countImageAndVideo()}}</span>
                  <div class="top">
                    <p class="link-card__title">{{$multi->name}}</p>
                  </div><span class="link-card__time">{{$multi->getDateYearHour()}}</span>
                </a>

                @endforeach



                </div>
            </div>
          </div>






        </div>
      </div>
       
    </section>

@endsection




@section('js')


@endsection