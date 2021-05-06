@extends('layouts.app')

@section('content-header')
	Spending
@endsection

@section('content')
<!-- Body Copy -->
<div class="card">
  <div class="card-body">
  	<div class="dropdown d-inline">
      <button class="btn btn-primary" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></button>
      <div class="dropdown-menu">
      	<a class="dropdown-item has-icon" onclick="addForm()"><i class="fas fa-plus"></i>Add Spending</a>
      </div>
</div>
  <div class="card-body">
    <div class="table-responsive">
         <table class="table table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th width="20">No</th>
                    <th>Date</th>
                    <th>Spending Type</th>
                    <th>Expense</th>
                    <th>Manage Data</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
  </div>
</div>       
@endsection

@section('script')
@include('spending.form')
<script type="text/javascript">
	var table, save_method;
	$(function(){
		table = $('.table').DataTable({
			/* "language": {
            	"url" : "{{asset('tables_indo.json')}}",
         	}, */
			"processing" : true,
			"ajax" : {
				"url"  : "{{route('spending.data')}}",
				"type" : "GET"
			}
		});
		$('#modal-form form').validator().on('submit', function(e){
			if(!e.isDefaultPrevented()){
				var id = $('#id').val();
				if(save_method == "add") url = "{{route('spending.store')}}";
				else url = "spending/"+id;

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
		$('.modal-title').text('Add Expenditure');
	}
	function editForm(id){
		save_method = "edit";
		$('input[name=_method]').val('PATCH');
		$('#modal-form form')[0].reset();
		$.ajax({
			url			: "spending/"+id+"/edit",
			type 		: "GET",
			dataType	: "JSON",
			success		: function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Expenditure');

				$('#id').val(data.spending_id);
				$('#spending_type').val(data.spending_type);
				$('#nominal').val(data.nominal);
			},
			error		: function(){
				alert("Unable to display data!");
			}
		});
	}

	function deleteData(id){
		if(confirm("Do you want to delete data?")){
			$.ajax({
				url		: "spending/"+id,
				type 	: "POST",
				data 	: {'_method' : 'DELETE', '_token' : $('meta[name=csrf-token]').attr('content')},
				success : function(data){
					table.ajax.reload();
				},
				error	: function(){
					alert("Unable to delete data");
				} 
			});
		}
	}
</script>

@endsection