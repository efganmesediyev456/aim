@extends("layouts.admin")

@section('css')
<style type="text/css">
    .toast {
    top: 100px;
}
   


.table td, .table th {
    white-space: normal;
    vertical-align: middle;
}


</style>
@endsection

@section("content")




<div class="card">




    <h6 class="card-header" ></h6> 

    <a  href="{{route('innovasiya.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

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
                    <th>Type</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Content</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($innovasiyalar as $innovasiya)
               <tr class="odd gradeX">
                    <td>{{$innovasiya->id}}</td>
                    <td>{{$innovasiya->type}}</td>
                    <td>{{$innovasiya->slug}}</td>
                    <td><img style="width: 200px" src="{{asset('storage/innovasiyalar/'.$innovasiya->image)}}"></td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$innovasiya->translate($locale)->name}}</span>
                        @endforeach
                    </td>
                     <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{mb_substr($innovasiya->translate($locale)->content,0,100)}}{{mb_strlen($innovasiya->translate($locale)->content)>100 ? "...":null}}</span>
                        @endforeach
                    </td>

                  
                    <td style="display: flex;">
                       <a style="margin-right: 5px" class="btn btn-success" href="{{route('innovasiya.edit',$innovasiya->id)}}">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>
                       <form action="{{route('innovasiya.destroy',$innovasiya->id)}}" method="POST">
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