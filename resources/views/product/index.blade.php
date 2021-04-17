@extends('layouts.app')

@section('content-header')
	Product
@endsection

@section('content')
<!-- Body Copy -->
<div class="card">
  <div class="card-body">
  	<div class="dropdown d-inline">
      <button class="btn btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></button>
      <div class="dropdown-menu">
      	<a class="dropdown-item has-icon" onclick="addForm()"><i class="fas fa-plus"></i>Add Product</a>
	  	<a class="dropdown-item has-icon" onclick="printBarcode()"><i class="fas fa-print"></i>Print Barcode Product</a>
	  	<a class="dropdown-item has-icon" onclick="deleteAll()"><i class="fas fa-trash"></i>Delete all data</a>
      </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">       
    	<form method="POST" id="form-product">
    		{{csrf_field()}}
    	<table class="table table-striped dataTable">
            <thead>
            <tr>
              <th>
                  <input type="checkbox" value="1" id="ig_checkbox">
                  <label for="ig_checkbox">&nbsp;</label>
              </th>
              <th>No</th>
	            <th>Code</th>
	            <th>Name</th>
	            <th>Category</th>
	            <th>Brand</th>
	            <th>Purchase Price</th>
	            <th>Selling Price</th>
	            <th>Discount</th>
	            <th>Stock</th>
	            <th>Manage Data</th>
            </tr>
        </thead>
            <tbody>
            	<tr>
            	</tr>
            </tbody>
          </table>
        
    	</form>
    </div>
  </div>
</div>       
@endsection

@section('script')
@include('product.form')
<script type="text/javascript">
	var table, save_method;
	$(function(){
		table = $('.table').DataTable({
			/* "language": {
				"url" : "{{asset('tables_indo.json')}}",
			}, */
			"processing" : true,
			"serverside" : true,
			"ajax" : {
				"url"  : "{{route('product.data')}}", 
				"type" : "GET"
			},
			"columnDefs" : [{
				'targets' : 0,
				'searchable': false,
				'orderable' : false
			}],
			"order":[1, 'asc']
		});

		$('#ig_checkbox').click(function(){
			$('input[type="checkbox"]').prop('checked', this.checked);
		});

		$('#modal-form form').validator().on('submit', function(e){
			if(!e.isDefaultPrevented()){
				var id = $('#id').val();
				if(save_method == "add") url = "{{route('product.store')}}";
				else url = "product/"+id;

				$.ajax({
					url  	: url,
					type 	: "POST",
					data 	: $('#modal-form form').serialize(),
					dataType : "JSON",
					success : function(data){
						if(data.msg=="error"){
							alert('Product Code is used');
							$('#product_code').focus().select();
						}else{
							$('#modal-form').modal('hide');
							table.ajax.reload();
						}
					},
					error : function(){
						alert("Unable to save data");
					}
				});
				return false;
			}
		});
	});
	function addForm(){
		save_method = "add";
		$('input[name=_method]').val('POST');
		$('#modal-form').modal('show');
		$('#modal-form form')[0].reset();
		$('.modal-title').text('Add Product');
		$('#product_code').attr('readonly', false);
	}
	function editForm(id){
		save_method = "edit";
		$('input[name=_method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url			: "product/"+id+"/edit",
			type 		: "GET",
			dataType	: "JSON",
			success		: function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Product');

				$('#id').val(data.product_id);
				$('#product_code').val(data.product_code).attr('readonly', true);
				$('#product_name').val(data.product_name);
				$('#category').val(data.category_id);
				$('#product_brand').val(data.product_brand);
				$('#purchase_price').val(data.purchase_price);
				$('#discount').val(data.discount);
				$('#selling_price').val(data.selling_price);
				$('#product_stock').val(data.product_stock);
			},
			error		: function(){
				alert("Unable to edit data");
			}
		});
	}

	function deleteData(id){
		if(confirm("Do you want to delete this data")){
			$.ajax({
				url		: "product/"+id,
				type 	: "POST",
				data 	: {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
				success : function(data){
					table.ajax.reload();
					console.log(msg);
    				$("#idv").html(data.response.msg);
				},
				error	: function(){
					alert("Unable to delete this data");
				} 
			});
		}
	}

	function deleteAll(){
		if ($('input:checked').length < 1) {
			alert('Select all data to be deleted');
		}else if(confirm("Are you sure you want to delete all data selected?")){
			$.ajax({
				url		: "product/delete",
				type 	: "POST",
				data 	: $('#form-product').serialize(),
				success	: function(data){
					table.ajax.reload();
				},
				error	: function(){
					alert("Unable to delete data!");
				}
			});
		}
	}

	function printBarcode(){
		if ($('input:checked').length < 1) {
			alert('Please select the data to be print barcode');
		}else{
			$('#form-product').attr('target', '_blank').attr('action', "product/print").submit();
		}
	}
</script>

@endsection