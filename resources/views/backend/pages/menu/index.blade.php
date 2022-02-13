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

    <a  href="{{route('menu.create')}}" class="btn btn-success btn-sm" style="width:100px; position:relative;top:0;right:0">Added</a>

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
                    <th>Content</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            @foreach($menus as $menu)
               <tr class="odd gradeX">
                    <td>{{$menu->id}}</td>
                    <td>{{$menu->slug}}</td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)

                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{$menu->translate($locale)->name}}</span>
                        @endforeach
                    </td>
                     <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{mb_substr($menu->translate($locale)->content,0,100)}}{{mb_strlen($menu->translate($locale)->content)>100 ? "...":null}}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach(["az","en","ru"] as $locale)
                        <span  class="{{$locale}}" style="display: {{app()->getLocale()==$locale ? "block":"none"}} ">{{optional(optional($menu->parent)->translate($locale))->name}}</span>
                        @endforeach
                    </td>
                    <td>
                       {{$menu->status==0 ? "static":"dynamic"}}
                    </td>
                    <td style="display: flex;">
                       <a class="btn btn-success" href="{{route('menu.edit',$menu->id)}}">Edit</a>
                       <a class="btn btn-danger" href="#" onclick="$(this).next('form').submit()">Delete</a>
                       <form action="{{route('menu.destroy',$menu->id)}}" method="POST">
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

       
        

        $("#changeTableLanguage").on("change",function(){
            $(".gradeX span").css("display","none")
            $("span."+$(this).val()).css("display","block")
        })


        @if(session()->has("success"))

            toastr.success('{{session()->get("success")}}')

        @endif


        $('.datatables-demo').on('page.dt', function(){

            $("body .gradeX span").css("display","none")
        $("body .gradeX span."+'{{app()->getLocale()}}').css("display","block")

        


        })

    })
</script>

@endsection