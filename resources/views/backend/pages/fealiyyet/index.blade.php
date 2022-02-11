@extends("layouts.admin")

@section("content")


<style type="text/css">
    .table td, .table th {
    white-space: normal;
    vertical-align: middle;
}

</style>


<div class="card">




    <h6 class="card-header" ></h6> 

    <a  href="{{route('fealiyyet.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

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
                    <th>Content</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($fealiyyets as $fealiyyet)
               <tr class="odd gradeX">


                
                    <td>{{$fealiyyet->id}}</td>
                   <td><img style="width: 120px;" src='{{asset("/storage")."/fealiyyet/".$fealiyyet->image}}' alt="">  </td>
                  
                    
                  
                    
                 </td>

                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: none;">{{$fealiyyet->translate($locale)->name}}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: none;">{{mb_substr($fealiyyet->translate($locale)->content,0,50)}}{{mb_strlen($fealiyyet->translate($locale)->content)>50 ? '...':null}}</span>
                        @endforeach
                    </td>


                    <td style="display: flex;">
                       <a class="btn btn-success" href="{{route('fealiyyet.edit',$fealiyyet->id)}}" style="margin-right: 5px">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>

                       <form action="{{route('fealiyyet.destroy',$fealiyyet->id)}}" method="POST">
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
    })
</script>

@endsection