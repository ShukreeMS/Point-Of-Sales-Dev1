<!DOCTYPE html>
<html>
<head>
   <title>PDF</title>
   <style type="text/css">
      table td{font: arial 12px;}
      table.data td,
      table.data th{
         border: 1px solid #ccc;
         padding: 5px;
      }
      table.data th{
         text-align: center;
      }
      table.data{ border-collapse: collapse }
   </style>
</head>
<body>

<table width="100%">
  <tr>
     <td rowspan="3" width="60%"><img src="../public/images/{{$setting->company_logo}}" width="150"><br>
     {{ $setting->company_address }}<br><br>
     </td>
     <td>Date</td>
     <td>: {{ en_date(date('Y-m-d')) }}</td>
  </tr>     
  <tr>
     <td>Member Code</td>
     <td>: {{ $selling->member_code }}</td>
  </tr>
</table>
         
<table width="100%" class="data">
<thead>
   <tr>
    <th>No</th>
    <th>Product Code</th>
    <th>Product Name</th>
    <th>Selling Price</th>
    <th>Total</th>
    <th>Discount</th>
    <th>Subtotal</th>
   </tr>

   <tbody>
    @foreach($detail as $data)
      
    <tr>
       <td>{{ ++$no }}</td>
       <td>{{ $data->product_code }}</td>
       <td>{{ $data->product_name }}</td>
       <td align="right">{{ currency_format($data->selling_price) }}</td>
       <td>{{ $data->total }}</td>
       <td align="right">{{ currency_format($data->discount) }}%</td>
       <td align="right">{{ currency_format($data->sub_total) }}</td>
    </tr>
    @endforeach
   
   </tbody>
   <tfoot>
    <tr><td colspan="6" align="right"><b>Total Price</b></td><td align="right"><b>{{ currency_format($selling->total_price) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Discount</b></td><td align="right"><b>{{ currency_format($selling->discount) }}%</b></td></tr>
    <tr><td colspan="6" align="right"><b>Total Purchase</b></td><td align="right"><b>{{ currency_format($selling->pay) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Received</b></td><td align="right"><b>{{ currency_format($selling->received) }}</b></td></tr>
    <tr><td colspan="6" align="right"><b>Return</b></td><td align="right"><b>{{ currency_format($selling->received - $selling->pay) }}</b></td></tr>
   </tfoot>
</table>

<table width="100%">
  <tr>
    <td>
      <b>Thank you for shopping and bye</b>
    </td>
    <td align="center">
      Cashier<br><br><br> {{Auth::user()->name}}
    </td>
  </tr>
</table>
</body>
</html>