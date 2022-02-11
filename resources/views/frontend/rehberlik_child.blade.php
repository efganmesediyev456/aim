@extends('layouts.frond')


@section('content')




    <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">Ana səhifə</a></li>
          <li><a href="/">{{$page->parent->name}}</a></li>
          <li><a href="/">{{$page->name}}</a></li>
          <li>{{$rehber->surname}} {{$rehber->name}}</li>
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
          <div class="col-lg-9">



             <div class="in-page__content">
              <div class="in-page__title mb-24">
                <h1>{{$rehber->surname}}&nbsp;{{$rehber->name}}</h1>
              </div>
              <article class="in-page__main">
                <div class="management-page__cover mb-24"><img src="{{asset('storage/rehberler/'.$rehber->image)}}"></div>
                {!!$rehber->content!!}
              </article>
            </div>





          </div>
            
  
          
        </div>
      </div>
    </section>

@endsection