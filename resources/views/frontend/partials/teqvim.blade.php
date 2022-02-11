 @foreach($teqvims as $teqvim)
 <a class="ic-card" href="#">
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
        <div class="ic-card__type">{{$type}}</div>
        @endforeach
      </div>
    </div>
  </a>
  @endforeach
