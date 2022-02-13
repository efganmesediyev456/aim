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

        <form class="my-4" action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">

        @csrf @method('put')
            <div class="tab-content">




                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$menu->slug}}" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug">
                            @error('slug')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>


                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Status</label>
                        <div class="col-sm-8" style="text-align: left;">
                           


                           <select id="typeMenu" name="status" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                   <option @if($menu->status==0) selected @endif value="0">Static</option>
                                   <option @if($menu->status==1) selected @endif value="1">Dynamic</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                  </div>


                <div class="tab-pane fade show active" id="navs-wc-home">


              

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" value="{{$menu->translate('az')->name}}" placeholder="Name az">
                            @error("name.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>



                      <div class="form-group row ckeditor-parent">
                        <label class="col-form-label col-sm-2 text-sm-right">Content Az</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="ckeditor2 @error('content.az') is-invalid @enderror" name="content[az]">
                                {!!$menu->translate('az')->content!!}
                            </textarea>

                            @error("content.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                           
                        </div>
                    </div>
                   
                   


                   


                </div>
               
                <div class="tab-pane fade" id="navs-wc-profile">
                
                
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name En</label>
                        <div class="col-sm-8">
                            <input placeholder="name en"  name="name[en]" class="form-control" value="{{$menu->translate('en')->name}}">
                            
                            <div class="clearfix"></div>
                            
                            @error("name.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                </div>


                  <div class="form-group row ckeditor-parent">
                        <label class="col-form-label col-sm-2 text-sm-right">Content En</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="ckeditor2 @error('content.en') is-invalid @enderror" name="content[en]">
                                {!!$menu->translate('en')->content!!}
                            </textarea>

                            @error("content.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                           
                        </div>
                    </div>
                   
                   


                  


                </div>


                <div class="tab-pane fade" id="navs-wc-ru">
                
                
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Ru</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="name ru" name="name[ru]" value="{{$menu->translate('ru')->name}}">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>

                 <div class="form-group row ckeditor-parent">
                        <label class="col-form-label col-sm-2 text-sm-right">Content Ru</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="ckeditor2 @error('content.ru') is-invalid @enderror" name="content[ru]">
                                {!!$menu->translate('ru')->content!!}
                            </textarea>

                            @error("content.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                           
                        </div>
                    </div>
                   
                  


                </div>




                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Parent Menu</label>
                        <div class="col-sm-8" style="text-align: left;">
                           

                           <select name="parent_id" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                    <option value="0">. . .</option>
                                    @foreach($menus as $men)

                                    <option @if($men->id==$menu->parent_id) selected @endif value="{{$men->id}}">
                                        {{$men->translate(app()->getLocale())->name}}</span>

                                    </option>

                                    @endforeach
                            </select>
                            <div class="clearfix"></div>
                        </div>
                  </div>




                  <div class="form-group row ckeditor-parent">
                      <label class="col-form-label col-sm-2 text-sm-right"></label>
                        <div class="col-sm-8" style="text-align: left;">
                            @if($menu->file)
                     <a href="{{asset('storage/menu/'.$menu->file)}}">{{$menu->file}}</a>
                     @endif
                 </div>
                  </div>



                    

                   <div class="form-group row ckeditor-parent">

                        <label class="col-form-label col-sm-2 text-sm-right">File(Eger yuklenecek fayl varsa)</label>




                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <input type="file" name="file" class="form-control @error('file') 

                            is-invalid

                            @enderror">


                            @error("file")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                           
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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
$(".ckeditor2").each(function () {
         CKEDITOR.replace( $(this).attr("name"),{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
         } );
         
});





@if($menu->status==0)

$(".ckeditor-parent").hide("fast");



@else

$(".ckeditor-parent").show("fast");

@endif

$("#typeMenu").on("change",function(){
    if($(this).val()==0){
        $(".ckeditor-parent").hide("fast");
    }else{
        $(".ckeditor-parent").show("fast");
    }
})


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


