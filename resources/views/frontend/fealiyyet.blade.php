@extends('layouts.frond')


@section('content')


  <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">Ana səhifə</a></li>
          <li>Fəaliyyətimiz</li>
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
                    <h1>Fəaliyyətimiz</h1>
                  </div>


                  @foreach($fealiyyetler as $fealiyyet)

                  <div class="activity-accordion">
                    <div class="top"><img src="/assets/images/activity.svg">
                      <h6>{{$fealiyyet->name}}</h6>
                    </div>
                    <div class="bottom">
                      <p>
                      	{{$fealiyyet->content}}
                      </p>
                    </div>
                  </div>

                  @endforeach
                 
                 
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection