@extends("layouts.admin")


@section('css')

<link rel="stylesheet" href="{{asset('back/asset/libs/select2/select2.css')}}">


@endsection



@section("content")





<style>
    @error('content.az')
    .cke_chrome{
    border-radius: 10px;
    border: 1px solid red;
    border-width: thin;        
}
@enderror

.cke_top{
    border-radius: 10px 10px 0px 0px
}

.cke_bottom{
    border-radius: 0px 0px 10px 10px
}
   

.toast {
    top: 100px;
}
   
</style>

<div class="col-md">
    <div class="card text-center mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs nav-responsive-md">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#navs-wc-home">Az</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#navs-wc-profile">En</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#navs-wc-ru">Ru</a>
                </li>

            </ul>
        </div>

        @if(session()->has('success'))

        <p class="alert alert-success">
            {{session()->get("success")}}
        </p>

        @endif

        <form class="my-4" action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
            <div class="tab-content">




                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Address</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$setting ? $setting->address : null}}" class="form-control @error('address') is-invalid @enderror" placeholder="address" name="address">
                            @error('address')address
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Mobile</label>
                        <div class="col-sm-8">
                            <input value="{{$setting ? $setting->number : null}}"  type="text" class="form-control @error('mobile') is-invalid @enderror" placeholder="mobile" name="mobile">
                            @error('mobile')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>



                   <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Map</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('map') is-invalid @enderror" placeholder="map" name="map" value="{{$setting ? $setting->map : null}}">
                            @error('map')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>





                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">layihe sehifesinin background sekli</label>
                        <div class="col-sm-8" style="text-align: left;">

                        <img style="width: 600px" src="{{$setting ? asset('storage/setting/'.$setting->layihe_image_page) : null}}">

                        <input multiple type="file" name="layihe_image_page" class="form-control @error('layihe_image_page') is-invalid @enderror">
                         @error('layihe_image_page')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                  </div>


                     <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Innovasiya Festivali Sehifesinin ana sekli</label>
                        <div class="col-sm-8" style="text-align: left;">

                             <img style="width: 600px" src="{{$setting ? asset('storage/setting/'.$setting->innovasiya_festivali_image_page) : null}}">

                        <input multiple type="file" name="innovasiya_festivali_image_page" class="form-control @error('innovasiya_festivali_image_page') is-invalid @enderror">
                         @error('innovasiya_festivali_image_page')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                  </div>



                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Facebook</label>
                        <div class="col-sm-8" style="text-align: left;">

                        <input multiple type="text" name="facebook" value="{{$setting ? $setting->facebook : null}}" class="form-control @error('facebook') is-invalid @enderror">
                         @error('facebook')

                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                  </div>


                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                        <div class="col-sm-8" style="text-align: left;">

                        <input  type="text" name="email" value="{{$setting ? $setting->email : null}}" class="form-control @error('email') is-invalid @enderror">
                         @error('email')

                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                  </div>




                 



                  


              
                


              


              
               


                 
                   
                  


                </div>


                <div class="tab-pane fade" id="navs-wc-ru">
                
            


             


                  


                </div>




                 
                 








               


              
            </div>

            <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="submit" class="btn btn-primary" placeholder="Password" value="Share">
                            <div class="clearfix"></div>
                        </div>
            </div>
          

        </form>
    </div>
</div>
</div>








@endsection



@section("js")


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('back/asset/libs/select2/select2.js')}}"></script>
<script src="{{asset('back/asset/js/pages/forms_selects.js')}}"></script>
<script>







$(function(){
    toastr.options = {
      "debug": false,
      "onclick": null,
      "fadeIn": 300,
      "fadeOut": 1000,
      "timeOut": 5000,
      "extendedTimeOut": 1000
    }

    @foreach($errors->all() as $err)
    toastr.error('{{$err}}')
    @endforeach



    $("#adding").click(function(){
        $(this).parent().after(`




                     <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Video</label>
                        <div class="col-sm-8" style="text-align: left;">

                        <input type="text"  name="video[]" class="form-control @error('video') is-invalid @enderror">
                         @error('video')
                            <small class="invalid-feedback">{{$message}}</small>
                         @enderror
                        </div>
                   </div>
                 



            `)
    })
})


</script>

@endsection


