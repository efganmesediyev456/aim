@extends("layouts.admin")

@section('css')
<style type="text/css">
    .toast {
    top: 100px;
}
   


.table td, .table th {
    white-space: normal;
    vertical-align: middle;

   
  
  word-wrap: break-word;
}

tr,td {
  /*width: 200px;
  max-width: 200px;*/
  word-wrap: break-word;
}



</style>
@endsection

@section("content")




<div class="card">




    <h6 class="card-header" ></h6> 

    <a  href="{{route('teqvim.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

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
                    <th >#</th>
                    <th style="width: 5%!important">Format type</th>
                    <th style="width: 10%!important">Page type</th>
                    <th style="width: 10%!important">Type</th>
                    <th style="min-width: 200px!important;">Day</th>
                    <th >From</th>
                    <th style="width: 10%!important">To</th>
                    <th style="width: 10%!important">Name</th>
                    <th style="width: 10%!important">Title</th>
                    <th style="width: 10%!important">Content</th>
                    <th >Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($teqvims as $teqvim)
               <tr class="odd gradeX">
                    <td>{{$teqvim->id}}</td>
                    <td>{{$teqvim->format_type}}</td>
                    <td>{{$teqvim->page_type}}</td>
                    <td>{{$teqvim->type}}</td>
                    <td>{{$teqvim->day}}</td>
                    <td>{{$teqvim->from_hour}}</td>
                    <td>{{$teqvim->to_hour}}</td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$teqvim->translate($locale)->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$teqvim->translate($locale)->title}}</span>
                        @endforeach
                    </td>
                     <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{mb_substr($teqvim->translate($locale)->content,0,100)}}{{mb_strlen($teqvim->translate($locale)->content)>100 ? "...":null}}</span>
                        @endforeach
                    </td>

                  
                    <td style="display: flex;">
                       <a style="margin-right: 5px" class="btn btn-success" href="{{route('teqvim.edit',$teqvim->id)}}">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>
                       <form action="{{route('teqvim.destroy',$teqvim->id)}}" method="POST">
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


        @if(session()->has("success"))

            toastr.success('{{session()->get("success")}}')

        @endif




 






    })
</script>

@endsection