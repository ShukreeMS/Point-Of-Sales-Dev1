@extends('layouts.app')

@section('content-header')
    Product Sales Report
@endsection

@section('content')
<!-- Body Copy -->
<div class="card">
  <div class="card-body">
    <div class="dropdown d-inline">
      <button class="btn btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></button>
      <div class="dropdown-menu">
      {{-- <a class="dropdown-item has-icon" onclick="periodForm()"><i class="fas fa-calendar-alt"></i>Change Period</a>
      <a href="report/pdf/{{$begin}}/{{$end}}" target="_blank" class="dropdown-item has-icon"><i class="fas fa-file-pdf"></i>Export PDF</a> --}}
      </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">       
      <form method="POST" id="form-product">
        {{csrf_field()}}
      <table class="table table-striped table-report">
            <thead>
            <tr>
              <th>Date</th>
              <th>Selling ID</th>
              <th>Product Code</th>
              <th>Product Name</th>
              <th>Quantity</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ Carbon\Carbon::parse($product->created_at)->format('Y-m-d') }}</td>
                    <td>{{$product->id}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                </tr>
                @endforeach
              
            </tbody>
          </table>
        
      </form>
    </div>
  </div>
</div>       
@endsection

@section('script')
{{-- @include('report.form')
<script type="text/javascript">
var table, begin, end;
$(function(){
   table = $('.table-report').DataTable({
     /* "language": {
        "url" : "{{asset('tables_indo.json')}}",
     }, */
     "dom" : 'Brt',
     "bSort" : false,
     "bPaginate" : false,
     "processing" : true,
     "serverside" : true,
     "ajax" : {
       "url" : "report/data/{{ $begin }}/{{ $end }}",
       "type" : "GET"
     }
   }); 

});

function periodForm(){
   $('#modal-form').modal('show');        
} --}}

</script>
@endsection