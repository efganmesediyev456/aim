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

        <form class="my-4" action="{{route('multimedia.update',$multimedia->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
            <div class="tab-content">




                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" value="{{$multimedia->slug}}">
                            @error('slug')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>





                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Images</label>
                        <div class="col-sm-8" style="text-align: left;">


                        @foreach($multimedia->onlyImage as $image)

                        <img src="{{asset('storage/multimedia/'.$image->image)}}" style="width: 100px">


                        @endforeach

                        <input multiple type="file" name="file[]" class="form-control @error('file') is-invalid @enderror">
                         @error('file')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                  </div>


                   @if($multimedia->videos->count()>0)

                   <div class="form-group row">


                        <label class="col-form-label col-sm-2 text-sm-right"></label>

                        <div class="col-sm-8" style="text-align: left;">

                        @foreach($multimedia->videos as $video)

                        <iframe width="200" height="100" src="{{$video->image}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @endforeach

                        </div>



                        

                    </div>

                    @endif

                   <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Video</label>

                        <div class="col-sm-8" style="text-align: left;">




                     @forelse( $multimedia->videos as $key=>$video)

                     <input id="video{{$key}}" type="text" value="{{$video->image}}"  name="video[]" class="form-control @error('video') is-invalid @enderror">
                        @error('video')
                            <small class="invalid-feedback">{{$message}}</small>
                        @enderror

                        <input type="button" class="btn btn-danger btn-sm" value="sil" onclick="$('#video'+'{{$key}}').remove(); $(this).remove()"  name="">

                     @empty


                     <input type="text"  name="video[]" class="form-control @error('video') is-invalid @enderror">
                         @error('video')
                            <small class="invalid-feedback">{{$message}}</small>
                    @enderror


                     @endforelse




                       



                        
                        </div>
                        
                   </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right"></label>

                        <div class="col-sm-8" style="text-align: left;">
                            <input id="adding" type="button" style=""  class="btn btn-success btn-sm" value="Artir" name="">
                        </div>
                    </div>
                   




                  


                <div class="tab-pane fade show active" id="navs-wc-home">


                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" value="{{$multimedia->translate('az')->name}}" placeholder="Name az">
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
                            <input placeholder="name en"  name="name[en]" class="form-control" value="{{$multimedia->translate('en')->name}}">
                            
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
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="name ru" name="name[ru]" value="{{$multimedia->translate('ru')->name}}">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
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



    $("#adding").click(function(){
        $(this).parent().parent().before(`




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


