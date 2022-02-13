@extends('layouts.frond')


@section('content')




    <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
          @if( optional($page->parent)->name)
          <li><a href="/">{{ optional($page->parent)->name}}</a></li>
          
          @endif
          <li>{{$page->name}}</li>
        </ul>
      </div>
    </section>
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-lg-none">
            <div class="sidebar">
              @if(optional(optional($page->parent)->childs)->count()>0)
              <ul>

            
                

                @foreach($page->parent->childs as $child)
                <li @if($child->slug==$page->slug) class="active" @endif>
                  <a href="{{route('frond.page.show',[$page->parent->slug,$child->slug])}}">{{$child->name}}</a>
                </li>
                @endforeach

              </ul>
              @endif
            </div>
          </div>



          		<div class="col-lg-9 p-mobile">
            <div class="in-page__content">
              <div class="in-page__title mb-24">
                <h1>{{$page->name}}</h1>

              </div>
              <article class="in-page__main">
 							{!!$page->content!!}
              </article>
              @if($page->file)
              <a class="btn-light-green mt-60" target="_blank" href="{{asset('storage/menu/'.$menu->file)}}" data-uw-styling-context="true">{{__('sites.yukleyin')}}</a>
              @endif
            </div>
          </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection