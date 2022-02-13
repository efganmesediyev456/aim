@extends('layouts.frond')


@section('content')


 <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
          <li>{{__('sites.innovasiyateq')}}</li>
        </ul>
      </div>
    </section>
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 p-mobile">
            <div class="in-page__content">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <div class="in-page__title mb-24">
                    <h1>{{__('sites.innovasiyateq')}}</h1>
                  </div>
                  <div class="innovation-calendar">
                    <div class="ic-form">
                      <div class="ic-form__inputs">
                        <div class="ic-form__search ic-form__container">
                          <input name="search" id="searchInput" type="text" placeholder="{{__('sites.search')}}"><i id="search"  class="aim-search size20"></i>
                        </div>
                        <div class="ic-form__select ic-form__container">
                          <select name="select" required id="format_type">
                            <option hidden selected value="">{{__('sites.tedbirformsec')}}</option>
                            <option value="musabiqe">{{__('sites.musabiqe')}}</option>
                            <option value="konfrans">{{__('sites.konfrans')}}</option>
                            <option value="hackhaton">Hackhaton</option>
                            <option value="simpozium">Simpozium</option>
                          </select><i class="aim-angle-down size20"></i>
                        </div>
                      </div>
                      <div class="ic-form__boxes">
                        <label>
                          <input type="checkbox" value="yerli" name="type"><span>{{__('sites.yerli')}}</span>
                        </label>
                        <label>
                          <input type="checkbox" value="beynelxalq" name="type"><span>{{__('sites.beynelxalq')}}</span>
                        </label>
                        <label>
                          <input type="checkbox" value="onlayn" name="type"><span>{{__('sites.onlayn')}}</span>
                        </label>
                        <label>
                          <input type="checkbox" value="offlayn" name="type"><span>{{__('sites.offlayn')}}</span>
                        </label>
                      </div>
                    </div>
                    <div class="ic-result">
                      <div class="row">
                        <div class="col-12" id="teqvim">


                          @foreach($teqvims as $teqvim)
                          <a class="ic-card" href="">
                            <div class="ic-card__details">
                              <div class="left">

                                @php
                                $arr=explode(',',$teqvim->day);
                                 $month_group = collect($arr)->groupBy(function($date) {
                                             return \Carbon\Carbon::parse($date)->format('m');
                                  })->toArray();  
                                @endphp

                                <div class="ic-card__place">

                                  @foreach($month_group as $key=>$month)
                                  @php( $days=[])
                                  <span>
                                    @foreach($month as $m)
                                        @php($days[]=\Carbon\Carbon::parse($m)->format('d'))
                                    @endforeach
                                   {{implode(',',$days)}} {{$teqvim->month((int)$key)}}</span>
                                  @endforeach
                                  <span>{{$teqvim->from_hour}} – {{$teqvim->to_hour}}</span>
                                  <span>{{$teqvim->name}}</span></div>
                                <p class="ic-card__title mt-xs-8">{{$teqvim->title}}</p>
                                <div class="ic-card__accordion">
                                  {!!$teqvim->content!!}
                                </div>
                              </div>
                              <div class="right">
                                @foreach(explode(',',$teqvim->type) as $type)
                                <div class="ic-card__type">{{__('sites.'.$type)}}</div>
                                @endforeach
                              </div>
                            </div>
                          </a>
                          @endforeach




                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



@endsection



@section("js")



<script type="text/javascript">
  

$(function(){


  var selections =[];



  var checkboxElems = document.querySelectorAll("input[type='checkbox']");





  for (var i = 0; i < checkboxElems.length; i++) {
  checkboxElems[i].addEventListener("click", displayCheck);
}



function displayCheck(e) {
  if (e.target.checked) {
    selections.push( e.target.value);
  } 
  else {
    selections=selections.filter(function(f){
      return f!=e.target.value;
    })
  }

  var searchInput=$("#searchInput").val();
  ajaxSend($('#searchInput').val(),selections,$("#format_type").val())
}


 



$("#search").click(function(){


 
  searchInput=$('#searchInput').val()
   format=$("#format_type").val();


  if(searchInput==''){
    alert("Zehmet olmazsa axtaris metni daxil edin")
  }else{
   
      ajaxSend(searchInput,selections,format)
  }


  


})







$("#format_type").on("change",function(){




    ajaxSend($("#searchInput").val(),selections,$(this).val());


})



function ajaxSend(searchInput,selections,format){


   $.ajax({

    'url':"{{route('frond.search')}}",
    type:'post',
    data:{'_token':'{{csrf_token()}}','search':searchInput,'selections':selections,'format_type':format},
    success:function(e){
      

      $('#teqvim').html(e);
      

    }

  })
}



 





  



    

   

    $("body").on('click','.ic-card',function(e){
        e.preventDefault()
        if($('#searchInput').val()!='' || selections.length>0 || $("#format_type").val()!=''){
              $(this).toggleClass('active');
        }
      })

    })

</script>



@endsection