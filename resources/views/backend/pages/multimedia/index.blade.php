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

    <a  href="{{route('multimedia.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

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
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Images</th>
                    <th>Videos</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($multimedias as $multi)
               <tr class="odd gradeX">
                    <td>{{$multi->id}}</td>
                    <td>{{$multi->slug}}</td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$multi->translate($locale)->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($multi->onlyImage as $image)

                        <img style="width: 100px; margin-bottom: 15px" src="{{asset('storage/multimedia/'.$image->image)}}">

                        @endforeach
                    </td>

                    <td>
                        @if($multi->videos->count()>0)

                        @foreach($multi->videos as $video)

                        <iframe width="200" height="100" src="{{$video->image}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @endforeach

                        @endif
                    </td>
                   
                 

                    <td style="display: flex;">
                       <a class="btn btn-success" href="{{route('multimedia.edit',$multi->id)}}" style="margin-right: 5px">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>

                       <form action="{{route('multimedia.destroy',$multi->id)}}" method="POST">
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