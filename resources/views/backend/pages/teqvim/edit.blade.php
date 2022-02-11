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

        <form class="my-4" action="{{route('teqvim.update',$teqvim->id)}}" method="POST" enctype="multipart/form-data">

        @csrf @method('put')
            <div class="tab-content">






              <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Page Type</label>
                        <div class="col-sm-8" style="text-align: left;">
                           


                           <select  id="" name="page_type" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                   <option @if($teqvim->page_type=='teqvim') selected @endif value="teqvim">teqvim</option>
                                   <option @if($teqvim->page_type=='tedbir') selected @endif value="tedbir">tedbir</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                  </div>




                <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Format Type</label>
                        <div class="col-sm-8" style="text-align: left;">
                           


                           <select  id="typeMenu" name="format" class="select2-demo form-control" style="width: 100%" data-allow-clear="true">
                                   <option @if($teqvim->format_type=='musabiqe') selected @endif value="musabiqe">Musabiqe</option>
                                   <option @if($teqvim->format_type=='konfrans') selected @endif value="konfrans">Konfrans</option>
                                   <option @if($teqvim->format_type=='hackhaton') selected @endif value="hackhaton">Hackhaton</option>
                                   <option @if($teqvim->format_type=='simpozium') selected @endif value="simpozium">Simpozium</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                  </div>


                   <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Type</label>
                        <div class="col-sm-8" style="text-align: left;">
                           


                           <select multiple=""  name="type[]" class="select2-demo form-control @error('type') is-invalid @enderror" style="width: 100%" data-allow-clear="true">
                                   <option @if(in_array('yerli',explode(',',$teqvim->type))) selected @endif value="yerli">Yerli</option>
                                   <option @if(in_array('beynelxalq',explode(',',$teqvim->type))) selected @endif value="beynelxalq">Beynelxalq</option>
                                   <option @if(in_array('onlayn',explode(',',$teqvim->type))) selected @endif value="onlayn">Onlayn</option>
                                   <option @if(in_array('offlayn',explode(',',$teqvim->type))) selected @endif value="offlayn">Offlayn</option>
                            </select>

                            <div class="clearfix"></div>

                             @error('type')

                              <small class="invalid-feedback">{{$message}}</small>

                            @enderror
                        </div>

                  </div>

 @foreach(explode(',',$teqvim->day) as $key=>$day)

                   <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Day</label>


                      
                          
                        <div class="col-md-8">
                                <input value="{{$day}}" name="day[]" type="text" id="" class="form-control b-m-dtp-date @error('day') is-invalid @enderror @error('day.*') is-invalid @enderror placeholder="Date">

                        </div>


                          @if($key==0)
                       

                          <a id="add" class="btn btn-sm btn-success text-center d-flex align-items-center" href="#" type="button">Add Day</a>


                          @endif


                        @error('day')

                              <small class="invalid-feedback">{{$message}}</small>

                        @enderror


                        @error('day.*')

                              <small class="invalid-feedback">{{$message}}</small>

                        @enderror


                      





                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right"></label>

                      <div class="col-md-8">
                          <a href="#" onclick="$(this).parent().parent().prev('div.row').remove();$(this).parent().parent().remove()" class="btn btn-danger btn-sm d-flex" style="width: 38px">sil</a>
                       </div>
                    </div>
                    
                  @endforeach


                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">from Hour</label>


                       
                          
                        <div class="col-md-8">
                                 <input value="{{$teqvim->from_hour}}" name="from" type="text" id="" class="form-control b-m-dtp-time @error('from') is-invalid @enderror" placeholder="Time">
                                 @error('from')
                                        <small class="invalid-feedback">{{$message}}</small>
                                 @enderror
                        </div>





                    </div>


                     <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">to Hour</label>


                       
                          
                        <div class="col-md-8">
                                 <input value="{{$teqvim->to_hour}}" name="to" type="text" id="" class="form-control b-m-dtp-time @error('to') is-invalid @enderror" placeholder="Time">
                                  @error('to')
                                        <small class="invalid-feedback">{{$message}}</small>
                                 @enderror
                        </div>





                    </div>





                   
                            




                 



               

                <div class="tab-pane fade show active" id="navs-wc-home">


                    

                    <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Name Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('name.az') is-invalid @enderror " name="name[az]" value="{{$teqvim->translate('az')->name}}" placeholder="Name az">
                            @error("name.az")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>



                      <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Title Az</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  @error('title.az') is-invalid @enderror " name="title[az]" value="{{$teqvim->translate('az')->title}}" placeholder="Title az">
                            @error("title.az")
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

                               {!!$teqvim->translate('az')->content!!}
                
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
                            <input value="{{$teqvim->translate('en')->name}}" placeholder="name en"  name="name[en]" class="form-control">
                            
                            <div class="clearfix"></div>
                            
                            @error("name.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                </div>


                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Title En</label>
                        <div class="col-sm-8">
                            <input placeholder="title en" value="{{$teqvim->translate('en')->title}}"  name="title[en]" class="form-control">
                            
                            <div class="clearfix"></div>
                            
                            @error("title.en")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                        </div>
                </div>


             
              


                  <div class="form-group row ckeditor-parent">
                        <label class="col-form-label col-sm-2 text-sm-right">Content En</label>
                        <div class="col-sm-8">
                            
                          
                            <div class="clearfix"></div>
                            
                            <textarea class="ckeditor2 @error('content.en') is-invalid @enderror" name="content[en]">
                                {!!$teqvim->translate('en')->content!!}
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
                            <input type="text" class="form-control  @error('name.ru') is-invalid @enderror" placeholder="name ru" name="name[ru]" value="{{$teqvim->translate('ru')->name}}">
                            @error("name.ru")
                            <small class="invalid-feedback">{{$message}}</small>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                </div>


                  <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Title Ru</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$teqvim->translate('ru')->title}}" class="form-control  @error('title.ru') is-invalid @enderror" placeholder="title ru" name="title[ru]">
                            @error("title.ru")
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
                                {!!$teqvim->translate('ru')->content!!}
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

$(".invalid-feedback").css("display","block").css('text-align','center')






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

    $("#add").click(function(){
        $(this).parent().after(`

                     <div class="form-group row">
                        <label class="col-form-label col-sm-2 text-sm-right">Day</label>
                          
                        <div class="col-md-8">
                                <input name="day[]" type="text" id="" class="form-control b-m-dtp-date" placeholder="Date">
                        </div>

                    </div>


            `)


         $('.b-m-dtp-date').bootstrapMaterialDatePicker({
                weekStart: 0,
                time: false,
                clearButton: true
              });
    })
})


</script>

    <script src="{{asset('/back/')}}/asset/libs/moment/moment.js"></script>

    <script src="{{asset('/back/')}}/asset/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="{{asset('/back/')}}/asset/libs/timepicker/timepicker.js"></script>
    <script src="{{asset('/back/')}}/asset/js/pages/forms_pickers.js"></script>

@endsection


