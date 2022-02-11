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

  

    
  
    <div class="card-datatable table-responsive">

      

        <table class="datatables-demo table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Address</th>
                    <th>Topic</th>
                    <th>Fin Code</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>

            @foreach($contacts as $contact)
               <tr class="odd gradeX">
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->surname}}</td>
                    <td>{{$contact->address}}</td>
                    <td>{{$contact->topic}}</td>
                    <td>{{$contact->fin_code}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->mobile}}</td>
                    <td>{{$contact->message}}</td>
                </tr>
             @endforeach
  
            </tbody>
        </table>
    </div>
</div>


@endsection


