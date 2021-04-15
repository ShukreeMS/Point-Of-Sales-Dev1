<!DOCTYPE html>
<html>
<head>  
  <title>Product PDF</title>
  <link rel="stylesheet" href="{{ asset('stisla/css/bootstrap.min.css') }}">
</head>
<body>
 
<h3 class="text-center">Income Report</h3>
<h4 class="text-center">Date  {{ indo_date($date_begin) }} s/d {{ indo_date($date_end) }} </h4>

         
<table class="table table-striped">
<thead>
   <tr>
    <th>No</th>
    <th>Date</th>
    <th>Sales</th>
    <th>Purchase</th>
    <th>Export</th>
    <th>Income</th>
   </tr>
</thead>
   <tbody>
    @foreach($data as $row)    
    <tr>
    @foreach($row as $col)
     <td>{{ $col }}</td>
    @endforeach
    </tr>
    @endforeach
   </tbody>
</table>

</body>
</html>