<!DOCTYPE html>
<html>
<head>  
<title>Product PDF</title>
<style>

#profit {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#profit td, #profit th {
  border: 1px solid #ddd;
  padding: 8px;
}

#profit tr:nth-child(even){background-color: #f2f2f2;}


#profit th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #3c5df0;
  color: white;
}
  </style>
</head>
<body>
 
<h3 style="text-align: center">Product Report</h3>
<h4 class="text-center">Date  {{ en_date($begin) }} s/d {{ en_date($end) }} </h4>

<div>
<table id="profit">
<thead>
   <tr>
    <th>Date</th>
    <th>Selling ID</th>
    <th>Product Code</th>
    <th>Product Name</th>
    <th>Quantity</th>
   </tr>
</thead>
  {{--  <tbody>
    @foreach($data as $row)    
    <tr>
    @foreach($row as $col)
     <td>{{ $col }}</td>
    @endforeach
    </tr>
    @endforeach
   </tbody> --}}

   <tbody>
     @foreach ($data as $data)
     <tr>
        <td>{{ Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</td>
        <td>{{ $data->id }}</td>
        <td>{{ $data->product_code }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->quantity }}</td>
    </tr>
     @endforeach
   </tbody>

</table>
</div>
</body>
</html>