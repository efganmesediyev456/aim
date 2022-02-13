@extends("layouts.admin")

@section("content")


<style type="text/css">
    .table td, .table th {
    white-space: normal;
    vertical-align: middle;
}
.toast {
    top: 100px;
}

</style>


<div class="card">




    <h6 class="card-header" ></h6> 

    <a  href="{{route('slider.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

    <select class="form-control" name="" id="changeTableLanguage" style=" width:100px; position:absolute;top:0;right:0">
        <option value="az">az</option>
        <option value="en">en</option>
        <option value="ru">ru</option>
    </select>
  
<div class="card-datatable table-responsive">

        @if(session()->has("success"))

        <p class="alert alert-success">
            {{session()->get("success")}}
        </p>

        @endif

        <table class="datatables-demo table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($sliders as $slider)
               <tr class="odd gradeX">
                    <td>{{$slider->id}}</td>
                    <td><img src="{{asset('storage/slider/'.$slider->image)}}" style="width: 200px"></td>
                    
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$slider->translate($locale)->name}}</span>
                        @endforeach
                    </td>

                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$slider->translate($locale)->title}}</span>
                        @endforeach
                    </td>

                    <td style="display: flex;">
                       <a class="btn btn-success" href="{{route('slider.edit',$slider->id)}}" style="margin-right: 5px">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>

                       <form action="{{route('slider.destroy',$slider->id)}}" method="POST">
                           @csrf @method("delete")
                       </form>
                    </td>


                </tr>
             @endforeach
  
            </tbody>
        </table>
    </div>
</div>


@endsection


@section("js")

<script>
    $(function(){
        $(".gradeX span").css("display","none")
        $(".gradeX span."+'{{app()->getLocale()}}').css("display","block")

        $("#changeTableLanguage").on("change",function(){
            $(".gradeX span").css("display","none")
            $("span."+$(this).val()).css("display","block")
        })

       
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

        @if(session()->has("success"))
                toastr.success('{{session()->get("success")}}')
        @endif
        
    })
</script>

@endsection