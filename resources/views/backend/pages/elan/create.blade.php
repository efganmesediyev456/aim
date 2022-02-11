@extends("layouts.admin")


@section('css')

<link rel="stylesheet" href="{{asset('back/asset/libs/select2/select2.css')}}">







  <link rel="stylesheet" href="{{asset('back/asset')}}/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css">
  <link rel="stylesheet" href="{{asset('back/asset')}}/libs/timepicker/timepicker.css">



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

        <form class="my-4" action="{{route('elan.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
            <div class="tab-content">




                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">from Hour</label>


                       
                          
                        <div class="col-md-8">
                                 <input name="from" type="text" id="" class="form-control b-m-dtp-time @error('from') is-invalid @enderror" placeholder="Time">
                                 @error('from')
                                        <small class="invalid-feedback">{{$message}}</small>
                                 @enderror
                        </div>





                    </div>


                     <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">to Hour</label>


                       
                          
                        <div class="col-md-8">
                                 <input name="to" type="text" id="" class="form-control b-m-dtp-time @error('to') is-invalid @enderror" placeholder="Time">
                                  @error('to')
                                        <small class="invalid-feedback">{{$message}}</small>
                                 @enderror
                        </div>





                    </div>




                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Slug</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{old('slug')}}" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" name="slug">
                            @error('slug')
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>


               

                <div class="tab-pane fade show active" id="navs-wc-home">


                    

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" value="{{old('name.az')}}" placeholder="Name az">
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

                                {{old('content.az')}}
                
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
                            <input placeholder="name en"  name="name[en]" class="form-control">
                            
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
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="name ru" name="name[ru]">
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
                
                            </textarea>

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
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
$(".ckeditor2").each(function () {
         CKEDITOR.replace( $(this).attr("name"),{
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
         } );
         
});






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



            $('.b-m-dtp-date').bootstrapMaterialDatePicker({
                weekStart: 0,
                time: false,
                clearButton: true
              });


</script>


 <script src="{{asset('/back/')}}/asset/libs/moment/moment.js"></script>

    <script src="{{asset('/back/')}}/asset/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="{{asset('/back/')}}/asset/libs/timepicker/timepicker.js"></script>
    <script src="{{asset('/back/')}}/asset/js/pages/forms_pickers.js"></script>

@endsection


