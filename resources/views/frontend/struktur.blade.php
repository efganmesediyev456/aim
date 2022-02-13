@extends('layouts.frond')


@section('content')


 <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
          <li><a href="/">{{$page->parent->name}}</a></li>
          <li>{{ucfirst($page->name)}}</li>
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

              <div class="structure">
                
                <div class="structure__step1">
                  @foreach($strukturs->where('step',0) as $struktur)

                  <div class="structure__card">
                    <p>{{$struktur->name}}</p>
                  </div>

                  @endforeach
                </div>

                <div class="structure__step2 mt-24">
                  <div class="structure__body">
                     @foreach($strukturs->where('step',1) as $struktur)

                    <div class="structure__card">
                      <p>{{$struktur->name}}</p>
                    </div>

                     @endforeach
                   
                  </div>
                </div>

                <div class="structure__step2 mt-24">
                  <div class="structure__body">

                     @foreach($strukturs->where('step','>=','2') as $struktur)

                    <div class="structure__card">
                      <p>{{$struktur->name}}</p>
                    </div>

                     @endforeach

                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection