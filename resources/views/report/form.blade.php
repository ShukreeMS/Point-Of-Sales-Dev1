<div class="modal" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <form class="form-horizontal needs-validation" data-toggle="validator" method="POST" action="report" novalidate>
   {{ csrf_field() }}
   
   <div class="modal-header">
      <h4 class="modal-title">Report Period</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
   </div>
            
<div class="modal-body">
   
   <div class="form-group">
      <label for="begin">Start Date</label>
      <div class="col-md-6">
         <input id="begin" type="date" class="form-control" name="begin" autofocus required>
         <div class="invalid-feedback">
            Please Select Valid Start Date
        </div>
      </div>
   </div>

   <div class="form-group">
      <label for="end">End Date</label>
      <div class="col-md-6">
         <input id="end" type="date" class="form-control" name="end" autofocus required>
         <div class="invalid-feedback">
            Please Select Valid End Date
        </div>
      </div>
   </div>
   
</div>
   
   <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary btn-save">Save</button>
   </div>
      
   </form>

         </div>
      </div>
   </div>
