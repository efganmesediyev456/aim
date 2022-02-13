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
              <div class="in-page__cover mb-24"><img src="{{asset('storage/setting/'.$setting->innovasiya_festivali_image_page)}}"></div>
              <div class="row gy-xs-24 innovation">

                @foreach($innovasiyalar as $innovasiya)
                <div class="col-lg-4">
                  <div class="innovation-card">
                    <time>{{$innovasiya->getDateYear()}}</time>
                    <h4>{{$innovasiya->name}}</h4><a class="mt-20" href="{{route('frond.page.child',[

                      'locale'=>app()->getLocale(),
                      'parent'=>$page->parent->slug,
                      'dynamic'=>$page->slug,
                      'child'=>$innovasiya->slug,

                    ])}}">{{__('sites.dahaetrafli')}}<i class="aim-long-arrow-right size16 ml-4"></i></a>
                  </div>
                </div>
                @endforeach
              
              </div>
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