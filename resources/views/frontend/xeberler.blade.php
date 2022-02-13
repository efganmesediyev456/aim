@extends('layouts.frond')


@section('content')




    <section class="breadcrumb">
      <div class="container">
        <ul>
           <li><a href="/">{{__('sites.anasehife')}}</a></li>
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
              <div class="row news-slider gy-xs-24 in">

                @foreach($xeberler as $xeber)



                <div class="col-sm-6 col-md-4 col-lg-4">
                  <a class="news-card in" href="{{route('frond.page.child',['locale'=>app()->getLocale(),'parent'=>$page->parent->slug,'dynamic'=>$page->slug,'child'=>$xeber->slug])}}">
                    <img src="{{asset('storage/blogs/'.$xeber->image)}}">
                    <time> {{$xeber->getDateYearHour()}}</time>
                    <p>{{$xeber->name}}</p>
                  </a>
                </div>

                @endforeach



               
              </div>
            </div>




            <div class="second-block mt-60">
              <div class="col-12">






                              <ul class="pagination">
                              </ul>


               
              </div>
            </div>
          </div>
        </div>
      </div>
       
    </section>

@endsection


@php($paginator=$xeberler)

@section('js')





<script>



  function pagination(c, m) {
    var current = c,
        last = m,
        delta = 1,
        left = current - delta,
        right = current + delta + 1,
        range = [],
        rangeWithDots = [],
        l;

    for (let i = 1; i <= last-1; i++) {
        if (i == 1 || i == last-1 || i >= left && i < right) {
            range.push(i);
        }
    }

    for (let i of range) {
        if (l) {
            if (i - l === 2) {
                rangeWithDots.push(l + 1);
            } else if (i - l !== 1) {
                rangeWithDots.push('...');
            }
        }
        rangeWithDots.push(i);
        l = i;
    }

    return rangeWithDots;
}

let arr=pagination(parseInt('{{request()->page}}'), parseInt('{{$paginator->lastPage()}}')+1);

@if($paginator->currentPage() == 1)

  
   $(".pagination").append(`

    <li class="pagination__item">
        <i class="aim-angle-down size20"></i>
    </li>

    `)

   @else




   $(".pagination").append(`

    <li class="pagination__item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="?page={{request()->page-1}}"><i class="aim-angle-down size20"></i></a>
    </li>

    `)


   @endif


   for (a in arr){
    $('.pagination').append(`
      <li class="pagination__item  ${arr[a]=='{{request()->page}}' ? 'active':null} ">
            <a  ${ arr[a]!='...' && arr[a]!='{{request()->page}}' ? 'href="?page='+arr[a]+'"' : null    }" >${arr[a]}</a>
        </li>
      `)
   }


   @if($paginator->lastPage()==$paginator->currentPage())

    $(".pagination").append(`

    <li class="pagination__item">
        <i class="aim-angle-down size20"></i>
    </li>

    `)

    @else



    $(".pagination").append(`

    <li class="pagination__item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="?page={{ $paginator->currentPage()+1; }}"><i class="aim-angle-down size20"></i></a>
    </li>

    `)


   @endif








  
</script>

@endsection