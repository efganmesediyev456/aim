@extends("layouts.admin")


@section('css')

<link rel="stylesheet" href="{{asset('back/asset/libs/select2/select2.css')}}">


@endsection



@section("content")





<style>
   

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

        <form class="my-4" action="{{route('struktur.update', $struktur->id)}}" method="POST" enctype="multipart/form-data">

        @csrf @method("put")
            <div class="tab-content">

                <div class="tab-pane fade show active" id="navs-wc-home">


                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" value="{{$struktur->translate('az')->name}}" placeholder="Name az">
                            @error("name.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>



                

                   


                  

                     
                   


                </div>
               
                <div class="tab-pane fade" id="navs-wc-profile">
                
                


                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name En</label>
                        <div class="col-sm-8">
                            <input placeholder="name en"  name="name[en]" class="form-control" value="{{$struktur->translate('en')->name}}" >
                            
                            <div class="clearfix"></div>
                            
                            @error("name.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                </div>



              
               


                 
                   
                  


                </div>


                <div class="tab-pane fade" id="navs-wc-ru">
                
                
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Ru</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="name ru" value="{{$struktur->translate('ru')->name}}"  name="name[ru]">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>






             


                  


                </div>





                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Parent Struktur</label>
                        <div class="col-sm-8" style="text-align: left;">
                           

                           <select name="parent_id" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                    <option value="0">. . .</option>
                                    @foreach($strukturs as $menu)

                                    <option @if(optional($struktur->parent)->id==$menu->id) selected  @endif value="{{$menu->id}}">
                                        {{$menu->translate(app()->getLocale())->name}}</span>

                                    </option>

                                    @endforeach
                            </select>
                            <div class="clearfix"></div>
                        </div>
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
})


</script>

@endsection


