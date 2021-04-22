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
                        	<label class="form-label" for="validationcustom1">Spending Type</label>
                            <input type="text" class="form-control" id="spending_type" id="validationcustom1" name="spending_type" autofocus required>
                            <div class="invalid-feedback">
                                Please provide a valid spending type.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Expense</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" autofocus required>
                            <div class="invalid-feedback">
                                Please provide a valid Expense Amount.
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
