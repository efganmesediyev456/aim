@extends('layouts.frond')


@section('content')


 <section class="breadcrumb">
      <div class="container">
        <ul>
          <li><a href="/">{{__('sites.anasehife')}}</a></li>
          <li>{{$page->name}}</li>
        </ul>
      </div>
    </section>
    
    <section class="in-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="in-page__content">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <div class="in-page__title mb-24">
                    <h1>{{$page->name}}</h1>
                  </div>
                  <div class="in-page__main">
                    <h3>{{__('sites.faq')}}</h3>

                    @foreach($faqs as $faq)
                    <div class="accordion">
                      <div class="top">
                        <p>{{$faq->name}}</p>
                      </div>
                      <div class="bottom">
                        <p>{{$faq->content}}</p>
                      </div>
                    </div>

                    @endforeach

                   
                    <h3>{{__('sites.mektyaz')}}</h3>
                    <div class="accordion">
                      <div class="top">
                        <p>{{__('sites.sendaqrar')}}</p>
                      </div>
                      <div class="bottom">
                        <form class="form" action="{{route('frond.contact')}}" method="post">
                        	@csrf
                          <div class="row gy-lg-24 gy-xs-20">
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.name')}}</label>
                                <div class="input-control">
                                  <input class="form-control" type="text" placeholder="Name" name="name">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.soyad')}}</label>
                                <div class="input-control ">
                                  <input class="form-control" type="text" placeholder="Surname" name="surname">
                                </div>
                                
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.unvan')}}</label>
                                <div class="input-control">
                                  <input class="form-control" type="text" placeholder="Address" name="address">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.topic')}}</label>
                                <div class="input-control">
                                  <select class="form-control" name="topic">
                                    <option value="">{{__('sites.selecttopic')}}</option>
                                    <option value="sikayet">Sikayet</option>
                                    <option value="teklif">Teklif</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.fin')}}
                                  <div class="info"><i></i><img src="/assets/images/fin.png"></div>
                                </label>
                                <div class="input-control">
                                  <input class="form-control" type="text" placeholder="Fin Code" name="fin_code" data-inputmask="'mask': '*******'">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.poct')}}</label>
                                <div class="input-control">
                                  <input class="form-control" type="email" placeholder="Email" name="email">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="group">
                                <label>{{__('sites.telnom')}}</label>
                                <div class="input-control">
                                  <input class="form-control" type="text" placeholder="Mobile" name="mobile" data-inputmask="'mask': '(099) 999 99 99'">
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="group">
                                <label>{{__('sites.mrcmetni')}}</label>
                                <div class="input-control">
                                  <textarea class="form-control" placeholder="Message" name="message"></textarea>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="group">
                                <button>{{__('sites.gonder')}}</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="contact mt-12">
                      <h4>{{__('sites.bizimleelaqe')}}</h4>
                      <div class="row gy-xs-32">
                        <div class="col-lg-6">
                          <div class="contact-box">
                            <h6 class="contact-box__title">{{__('sites.unvan')}}:</h6>
                            <p class="contact-box__description">{{$setting->address}}</p><a target="_blank" href="{{$setting->map}}" class="contact-box__link" ><i class="aim-location size16 mr-8"></i>{{__('sites.findmap')}}</a>
                          </div>
                        </div>
                        <div class="col-lg-5">
                          <div class="contact-box">
                            <h6 class="contact-box__title">{{__('sites.telefon')}}:</h6>
                            <p class="context-box__description">{{$setting->number}}</p>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="contact-box">
                            <h6 class="contact-box__title">{{__('sites.epoct')}}:</h6>
                            <p class="context-box__description">{{$setting->email}}</p>
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
      </div>
    </section>


@endsection


@section("js")

<script type="text/javascript">
	
	$(function(){

		$('form').on("submit",function(e){
			e.preventDefault();

			formData=new FormData(this);
			formData.append("_token","{{csrf_token()}}");
			$.ajax({
				url:"{{route('frond.contact')}}",
				data:formData,
				type:"post",
				cache: false,
    			processData: false,
    			contentType: false,
				success:function(e){

					$("form div").removeClass('error')
					$(".errors").remove()
					$('.form').before(`
							<div style="padding: 15px;background: #6ebe47;border-radius: 4px;color: white;" class="alert alert-success">Mesajiniz ugurla gonderildi</div>
						`)

					$('.form')[0].reset()

				},
				error:function(e){

					$("form div").removeClass('error')
					$(".errors").remove()

					for(a in e.responseJSON){
						$("[name='"+a+"']").parent().addClass('error')
						$("[name='"+a+"']").parent().after(`
								<div class="errors"><span>${e.responseJSON[a]}</span></div>
							`)
						
					}

				}
			})
		})

	})
</script>


@endsection