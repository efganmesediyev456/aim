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
              <div class="in-page__title mb-16">
                <h1>{{$blog->name}}</h1>
              </div>
              <time class="in-page__time mb-16">{{$blog->getDateYear()}}</time>
              <article class="in-page__main">
                <p>{!!$blog->content!!}</p>
              </article>
              <div class="gallery mt-24">
                <div class="gallery-image__box owl-carousel mb-8">

                	 @foreach(explode(',',$blog->gallery) as $key=>$gy)
                      
                    <img  src='{{asset("/storage")."/blogs/gallery/".$gy}}' alt="">
                     

                     @endforeach

                </div>
                <div class="row align-items-center">
                  <div class="col-xl-10">
                    <div class="gallery-image__smallbox owl-carousel">


                      @foreach(explode(',',$blog->gallery) as $key=>$gy)
                      <div class="cover @if($key==0) active @endif" data-order="{{$key}}">
                    <img  src='{{asset("/storage")."/blogs/gallery/".$gy}}' alt="">
                      </div>

                      @endforeach
                     
                    </div>
                  </div>
                  <div class="col-lg-2 d-xl-none">
                    <div class="slider-arrows__box">
                      <button class="prev"><i class="aim-long-arrow-right size32"></i></button>
                      <button class="next"><i class="aim-long-arrow-right size32"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="sharer">
                <div class="left">
                  <p>Göstərilən platformalarda paylaş:</p>
                </div>
                <div class="right">
                  <button type="button" data-sharer="facebook" data-url="{{url()->full()}}" data-title="{{$blog->name}}"><i class="size20">
                      <svg width="14" height="17" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path  d="M13.7812 7.75C13.7812 4.00391 10.7461 0.96875 7 0.96875C3.25391 0.96875 0.21875 4.00391 0.21875 7.75C0.21875 11.1406 2.67969 13.957 5.93359 14.4492V9.71875H4.21094V7.75H5.93359V6.27344C5.93359 4.57812 6.94531 3.62109 8.47656 3.62109C9.24219 3.62109 10.0078 3.75781 10.0078 3.75781V5.42578H9.16016C8.3125 5.42578 8.03906 5.94531 8.03906 6.49219V7.75H9.92578L9.625 9.71875H8.03906V14.4492C11.293 13.957 13.7812 11.1406 13.7812 7.75Z"/>
</svg></i></button>
                  <button type="button" data-sharer="twitter" data-url="{{url()->full()}}" data-title="{{$blog->name}}"><i class="size20">
                      <svg width="14" height="17" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z"/>
</svg></i></button>
                  <button type="button" data-sharer="telegram" data-url="{{url()->full()}}" data-title="{{$blog->name}}"><i class="size20">
                      <svg width="14" height="17" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.0703 1.45703C13.2344 0.691406 12.7969 0.390625 12.3047 0.582031L1.42188 4.76562C0.683594 5.06641 0.710938 5.47656 1.3125 5.66797L4.07422 6.51562L10.5273 2.46875C10.8281 2.25 11.1289 2.38672 10.8828 2.57812L5.66016 7.28125L5.46875 10.1523C5.76953 10.1523 5.87891 10.043 6.04297 9.87891L7.38281 8.56641L10.1992 10.6445C10.7188 10.9453 11.1016 10.7812 11.2383 10.1797L13.0703 1.45703Z"/>
</svg></i></button>
                  <button type="button" data-sharer="whatsapp" data-url="{{url()->full()}}" data-title="{{$blog->name}}"><i class="size20">
                      <svg width="14" height="17" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.2656 2.42969C10.1445 1.28125 8.61328 0.625 6.97266 0.625C3.63672 0.625 0.902344 3.35938 0.902344 6.69531C0.902344 7.78906 1.20312 8.82812 1.72266 9.73047L0.875 12.875L4.07422 12.0547C4.97656 12.5195 5.96094 12.793 6.97266 12.793C10.3359 12.793 13.125 10.0586 13.125 6.72266C13.125 5.08203 12.4141 3.57812 11.2656 2.42969ZM6.97266 11.7539C6.07031 11.7539 5.19531 11.5078 4.40234 11.043L4.23828 10.9336L2.32422 11.4531L2.84375 9.59375L2.70703 9.40234C2.21484 8.58203 1.94141 7.65234 1.94141 6.69531C1.94141 3.93359 4.21094 1.66406 7 1.66406C8.33984 1.66406 9.59766 2.18359 10.5547 3.14062C11.5117 4.09766 12.0859 5.35547 12.0859 6.72266C12.0859 9.48438 9.76172 11.7539 6.97266 11.7539ZM9.76172 7.98047C9.59766 7.89844 8.85938 7.54297 8.72266 7.48828C8.58594 7.43359 8.47656 7.40625 8.36719 7.57031C8.28516 7.70703 7.98438 8.0625 7.90234 8.17188C7.79297 8.25391 7.71094 8.28125 7.57422 8.19922C6.67188 7.76172 6.09766 7.40625 5.49609 6.39453C5.33203 6.12109 5.66016 6.14844 5.93359 5.57422C5.98828 5.46484 5.96094 5.38281 5.93359 5.30078C5.90625 5.21875 5.57812 4.48047 5.46875 4.17969C5.33203 3.87891 5.22266 3.90625 5.11328 3.90625C5.03125 3.90625 4.92188 3.90625 4.83984 3.90625C4.73047 3.90625 4.56641 3.93359 4.42969 4.09766C4.29297 4.26172 3.91016 4.61719 3.91016 5.35547C3.91016 6.12109 4.42969 6.83203 4.51172 6.94141C4.59375 7.02344 5.57812 8.55469 7.10938 9.21094C8.06641 9.64844 8.44922 9.67578 8.94141 9.59375C9.21484 9.56641 9.81641 9.23828 9.95312 8.88281C10.0898 8.52734 10.0898 8.22656 10.0352 8.17188C10.0078 8.08984 9.89844 8.0625 9.76172 7.98047Z"/>
</svg></i></button>
                  <button type="button" data-sharer="linkedin" data-url="{{url()->full()}}" data-title="{{$blog->name}}"><i class="size20">
                      <svg width="14" height="17" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.25 0.625H1.72266C1.25781 0.625 0.875 1.03516 0.875 1.52734V12C0.875 12.4922 1.25781 12.875 1.72266 12.875H12.25C12.7148 12.875 13.125 12.4922 13.125 12V1.52734C13.125 1.03516 12.7148 0.625 12.25 0.625ZM4.56641 11.125H2.76172V5.30078H4.56641V11.125ZM3.66406 4.48047C3.0625 4.48047 2.59766 4.01562 2.59766 3.44141C2.59766 2.86719 3.0625 2.375 3.66406 2.375C4.23828 2.375 4.70312 2.86719 4.70312 3.44141C4.70312 4.01562 4.23828 4.48047 3.66406 4.48047ZM11.375 11.125H9.54297V8.28125C9.54297 7.625 9.54297 6.75 8.61328 6.75C7.65625 6.75 7.51953 7.48828 7.51953 8.25391V11.125H5.71484V5.30078H7.4375V6.09375H7.46484C7.71094 5.62891 8.3125 5.13672 9.1875 5.13672C11.0195 5.13672 11.375 6.36719 11.375 7.92578V11.125Z" />
</svg></i></button>
                </div>
              </div>
            </div>
            <div class="second-block mt-60">
              <div class="in-page__content mobile">
                <div class="second-block-head mb-24">
                  <h1 class="second-block-head__title">Digər</h1>
                  <div class="slider-arrows-inpage__box">
                    <button class="prev"><i class="aim-long-arrow-right size32"></i></button>
                    <button class="next"><i class="aim-long-arrow-right size32"></i></button>
                  </div>
                </div>
                <div class="news-slider owl-carousel">


 @foreach($other_blogs as $blog)

            <a class="news-card" 


            href="{{route('frond.page.child',[

                      'locale'=>app()->getLocale(),
                      'parent'=>$page->parent->slug,
                      'dynamic'=>$page->slug,
                      'child'=>$blog->slug,

                    ])}}"
            >
            <img src='{{asset("/storage")."/blogs/".$blog->image}}'>

                                                

            <time>{{$blog->getDateYearHour()}}</time>
            <p>{{$blog->name}}</p>
            </a>

            @endforeach


                

                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection