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
 
<h3 style="text-align: center">Income Report</h3>
<h4 class="text-center">Date  {{ en_date($date_begin) }} s/d {{ en_date($date_end) }} </h4>

<div>
<table id="profit">
<thead>
   <tr>
    <th>No</th>
    <th>Date</th>
    <th>Sales</th>
    <th>Purchase</th>
    <th>Export</th>
    <th>Sub Total Profit</th>
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
</div>
</body>
</html>