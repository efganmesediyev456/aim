@extends("layouts.admin")


@section('css')

<link rel="stylesheet" href="{{asset('back/asset/libs/select2/select2.css')}}">


@endsection



@section("content")





<style>
    @error('text.az')
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

        <form class="my-4" action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
            <div class="tab-content">





           
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug" value="{{$blog->slug}}">
                            @error('slug')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>



                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Type</label>
                        <div class="col-sm-8" style="text-align: left;">
                           


                           <select id="typeMenu" name="type" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                   <option @if($blog->type=='xeberler') selected @endif value="xeberler">Xeberler</option>
                                   <option @if($blog->type=='musabiqeler') selected @endif value="musabiqeler">Musabiqeler</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                  </div>



                <div class="tab-pane fade show active" id="navs-wc-home">


              

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$blog->translate('az')->name}}" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" placeholder="Name az">
                            @error("name.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Text Az</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="ckeditor2 @error('text.az') is-invalid @enderror" name="text[az]">
                                {!!$blog->translate('az')->text!!}
                            </textarea>

                            @error("text.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror

                           
                        </div>
                    </div>
                   


                   


                </div>
               
                <div class="tab-pane fade" id="navs-wc-profile">
                
                
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name En</label>
                        <div class="col-sm-8">
                            <input  name="name[en]" class="form-control" value="{{$blog->translate('en')->name}}">
                            
                            <div class="clearfix"></div>
                            
                            @error("name.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Text En</label>
                        <div class="col-sm-8">
                           
                           
                            <div class="clearfix"></div>

                            <textarea name="text[en]" class="ckeditor2" id="" cols="30" rows="10" >{{$blog->translate('en')->text}}</textarea>
                         

                            @error("text.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>


                </div>


                <div class="tab-pane fade" id="navs-wc-ru">
                
                
                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Ru</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$blog->translate('ru')->name}}" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="Email" name="name[ru]">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Text Ru</label>
                        <div class="col-sm-8">
                           

                            <textarea name="text[ru]" class="ckeditor2" id="" cols="30" rows="10">{!!$blog->translate('ru')->text!!}</textarea>
                           
                            <div class="clearfix"></div>
                            @error("text.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                          
                        </div>
                    </div>


                </div>

                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Image</label>
                        <div class="col-sm-8">
                        <img style="width: 200px; float: left;" src="{{asset("/storage")."/blogs/".$blog->image}}" alt="">
                        
                            <input type="file" class="form-control @error('image') is-invalid @enderror" placeholder="Email" name="image">
                            
                            
                            <div class="clearfix"></div>
                        </div>
                </div>

                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Gallery</label>

                       
                        <div class="col-sm-8">
                        @if($blog->gallery)
                            @foreach(explode(',',$blog->gallery) as $gy)
                            <img style="width: 200px; float: left;" src="{{asset("/storage")."/blogs/gallery/".$gy}}" alt="">
                        
                            @endforeach
                            
                        @endif
                            <input multiple type="file" class="form-control" placeholder="Email" name="gallery[]">
                            <div class="clearfix"></div>
                        </div>
                </div>


              
            </div>

            <div class="form-group row">
                        <div class="col-sm-8">
                            <input type="submit" class="btn btn-primary" placeholder="Password" value="Update">
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

$(".ckeditor2").each(function () {
   
         CKEDITOR.replace( $(this).attr("name"),{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
         } );

         
});

</script>

@endsection