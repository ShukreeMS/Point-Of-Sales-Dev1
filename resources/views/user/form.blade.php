<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_validation" method="POST" data-toggle="validator" role="form" class="needs-validation" novalidate>
					{{csrf_field()}} {{method_field('POST')}}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"></h4>
            </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group form-float">
                        <div class="form-line">
                        	
                        	<label class="form-label">Username</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">
                                Please provide a valid username.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"  required>
                            <div class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Please provide a valid password.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                            
                            <label class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" id="loop_password" data-match="#password" data-match-error="Sorry password does not match" name="loop_password" required>
                            <div class="invalid-feedback">
                                Please provide reenter password.
                            </div>
                        </div>
                        
                    </div>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
	            </div>
            </form>
        </div>
    </div>
</div>
