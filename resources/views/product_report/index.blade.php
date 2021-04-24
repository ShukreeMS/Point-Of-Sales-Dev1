@extends('layouts.app')

@section('content-header')
    Product Sales Report for {{ $begin ?? '' }} - {{ $end ?? '' }}
@endsection

@section('content')
<!-- Body Copy -->
<div class="card">
  <div class="card-body">
    <div class="dropdown d-inline">
      <button class="btn btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></button>
      <div class="dropdown-menu">
      <a class="dropdown-item has-icon" onclick="periodForm()"><i class="fas fa-calendar-alt"></i>Change Period</a>
      <a href="product-report/pdf/{{$begin}}/{{$end}}" target="_blank" class="dropdown-item has-icon"><i class="fas fa-file-pdf"></i>Export PDF</a>
    </div>
    {{-- <div class="mb-2 col-xs-12" style="padding-left: 928px">
      <form method="POST" id="form-product" class="form-inline" action="{{route('productreport.data')}}">
        {{csrf_field()}}
        <div class="input-group">
          <input type="search" class="form-control rounded" placeholder="Search" name="searchid" aria-label="Search">
          <button type="submit" value="number" class="btn btn-outline-primary" name="search">search</button>
        </div>       
      </form>
    </div> --}}
  </div>


  
  <div class="card-body">
    <div class="table-responsive">
      
      <table class="table table-striped table-report">
            <thead>
            <tr>
              <th>No</th>
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
                    <td>{{$loop->iteration}}</td>
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
@include('product_report.form')
<script>
  function periodForm(){
   $('#modal-form').modal('show');        
}
</script>

@endsection