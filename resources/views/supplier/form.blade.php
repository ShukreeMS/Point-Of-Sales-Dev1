<div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_validation" method="POST" data-toggle="validator" class="needs-validation" novalidate>
					{{csrf_field()}} {{method_field('POST')}}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"></h4>
            </div>
				
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group form-float">
                        <div class="form-line">                        	
                        	<label class="form-label" for="validationCustom01">Supplier Name</label>
                            <input type="text" class="form-control" id="supplier_name" id="validationCustom01" name="supplier_name" autofocus required>
                            <div class="invalid-feedback">
                                Please Insert Valid Input
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                         
                            <label class="form-label" for="validationCustom02">Supplier Address</label>
                            <input type="text" class="form-control" id="supplier_address" id="validationCustom02" name="supplier_address" autofocus required>
                            <div class="invalid-feedback">
                                Please Insert Valid Input
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                         
                            <label class="form-label" for="validationCustom03">Telephone Number</label>
                            <input type="text" class="form-control" id="supplier_phone_number" id="validationCustom03" name="supplier_phone_number" autofocus required>
                            <div class="invalid-feedback">
                                Please Insert Valid Input
                            </div>
                        </div>
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
	            </div>
            </form>
        </div>
    </div>
</div>
