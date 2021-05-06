@extends('layouts.app')

@section('content-header')
	Supplier
@endsection

@section('content')
<!-- Body Copy -->
<div class="card">
  <div class="card-body">
  	<div class="dropdown d-inline">
      <button class="btn btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></button>
      <div class="dropdown-menu">
      	<a class="dropdown-item has-icon" onclick="addForm()"><i class="fas fa-plus"></i>Add Supplier</a>
      </div>
</div>
  <div class="card-body">
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table table-striped table-hover js-basic-example dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Supplier Name</th>
                        <th>Address</th>
                        <th>Telephone Number</th>
                        <th width="100">Manage Data</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>       
@endsection

@section('script')
@include('supplier.form')
<script type="text/javascript">
	var table, save_method;
	$(function(){
		table = $('.table').DataTable({
			/* "language": {
            	"url" : "{{asset('tables_indo.json')}}",
         	}, */
			"processing" : true,
			"ajax" : {
				"url"  : "{{route('supplier.data')}}",
				"type" : "GET"
			}
		});
		$('#modal-form form').validator().on('submit', function(e){
			if(!e.isDefaultPrevented()){
				var id = $('#id').val();
				if(save_method == "add") url = "{{route('supplier.store')}}";
				else url = "supplier/"+id;

				$.ajax({
					url  	: url,
					type 	: "POST",
					data 	: $('#modal-form form').serialize(),
					success : function(data){
						$('#modal-form').modal('hide');
						table.ajax.reload();
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
		$('.modal-title').text('Add Supplier');
	}
	function editForm(id){
		save_method = "edit";
		$('input[name=_method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url			: "supplier/"+id+"/edit",
			type 		: "GET",
			dataType	: "JSON",
			success		: function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Supplier');

				$('#id').val(data.supplier_id);
				$('#supplier_name').val(data.supplier_name);
				$('#supplier_address').val(data.supplier_address);
				$('#supplier_phone_number').val(data.supplier_phone_number);
			},
			error		: function(){
				alert("Unabel to edit data!");
			}
		});
	}

	function deleteData(id){
		if(confirm("Are you sure to delete this data?")){
			$.ajax({
				url		: "supplier/"+id,
				type 	: "POST",
				data 	: {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
				success : function(data){
					table.ajax.reload();
				},
				error	: function(){
					alert("Unable to delete this data");
				} 
			});
		}
	}
</script>

@endsection