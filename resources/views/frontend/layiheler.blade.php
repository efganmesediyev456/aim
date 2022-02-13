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
                <h1>{{$page->name}}</h1>
              </div>
              <div class="in-page__cover mb-24"><img src="{{asset('storage/setting/'.$setting->layihe_image_page)}}"></div>
              <div class="links">

                @foreach($layiheler as $layihe)
                <a class="link-card" href="{{route('frond.page.child',[

                      'locale'=>app()->getLocale(),
                      'parent'=>$page->parent->slug,
                      'dynamic'=>$page->slug,
                      'child'=>$layihe->slug,

                    ])}}">
                  <div class="top">
                    <p class="link-card__title">{{$layihe->name}}</p>
                  </div>
                  <span class="link-card__time">{{$layihe->getDateMonth()}}</span>
                </a>
                @endforeach


            </div>
          </div>
        </div>
      </div>
       
    </section>

@endsection



@section('js')





<script>
</script>

@endsection