@extends('layouts.frond')



@section("content")


 <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
          <li>{{__('sites.axtnetice')}}</li>
        </ul>
      </div>
    </section>
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-lg-none">
            <div class="sidebar">
              <ul>
                <li class="active"><a> {{__('sites.netice')}}</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 p-mobile">


          

            <div class="in-page__content">
              <div class="in-page__title mb-24">
                <h1>“{{request()->search}} ” {{strtolower(__('sites.axtnetice'))}}</h1>


              </div>
              <form class="mb-24 search" action="">
                <input class="form-input" type="text" placeholder="Axtarış edin">
                <button class="form-submit mt-16">Yenidən axtarış edin</button>
              </form>

              <ul class="search-result">



             @foreach($data as $key=>$dat)

          	@if(count($dat)>0)


              		@foreach($dat as $d)

              		@php

              		$slug=optional(optional(\App\Models\Menu::whereSlug($key)->first())->parent)->slug;
              		$url=implode('/',array_filter([$slug,$key,$d->slug]));
              		

              		@endphp

              		 <li>
                    	<a href="{{'/'.app()->getLocale().'/'.$url}}"><span></span> {{$d->name}}</a>
                    </li>

              		@endforeach

              		@endif

            @endforeach

              </ul>

            </div>

            








          </div>
        </div>
      </div>
    </section>


@endsection



@section('js')


<script type="text/javascript">

	var l=0;
	
	$(".search-result li a").each(function(){

		l++;

		$(this).find("span").text(l);


	})
	$(".sidebar li a").text(l+" {{__('sites.netice')}}");



	


</script>


@endsection