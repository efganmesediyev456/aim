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

        <form class="my-4" action="{{route('fealiyyet.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
            <div class="tab-content">






                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image">
                            @error('image')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>






                <div class="tab-pane fade show active" id="navs-wc-home">


              

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" placeholder="Name az">
                            @error("name.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">content Az</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="form-control @error('content.az') is-invalid @enderror" name="content[az]"></textarea>

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
                            <input  name="name[en]" class="form-control">
                            
                            <div class="clearfix"></div>
                            
                            @error("name.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">content En</label>
                        <div class="col-sm-8">
                           
                           
                            <div class="clearfix"></div>

                            <textarea name="content[en]" class="form-control" id="" ></textarea>
                         

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
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="Email" name="name[ru]">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">content Ru</label>
                        <div class="col-sm-8">
                           

                            <textarea name="content[ru]" class="form-control" id=""  ></textarea>
                           
                            <div class="clearfix"></div>
                            @error("content.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                          
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



$(".ckeditor2").each(function () {
   
         CKEDITOR.replace( $(this).attr("name"),{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
         } );

         
});

</script>

@endsection