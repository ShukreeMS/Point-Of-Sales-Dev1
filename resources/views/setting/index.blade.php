@extends('layouts.app')

@section('content-header')
  Settings
@endsection

@section('content')     
 <form class="form" id="setting-form" data-toggle="validator" method="post" enctype="multipart/form-data">
  {{ csrf_field() }} {{ method_field('PATCH') }}
  <div class="alert alert-info alert-dismissible" style="display:none">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="icon fa fa-check"></i>
    Changed need to be saved.
  </div>
  <div class="card" id="settings-card">
    <div class="card-body">
      <div class="form-group row align-items-center">
        <label for="company_name" class="form-control-label col-sm-3">Company Name</label>
        <div class="col-sm-6 col-md-9">
          <input type="text" name="company_name" class="form-control" id="company_name">
          <span class="help-block with-errors"></span>
        </div>
      </div>
      <div class="form-group row align-items-center">
        <label for="company_address" class="form-control-label col-sm-3">Company Address</label>
        <div class="col-sm-6 col-md-9">
          <textarea class="form-control" name="company_address" id="company_address"></textarea>
          <span class="help-block with-errors"></span>
        </div>
      </div>
      <div class="form-group row align-items-center">
        <label for="company_phone_number" class="form-control-label col-sm-3">Company Telephone</label>
        <div class="col-sm-6 col-md-9">
          <input type="text" name="company_phone_number" class="form-control" id="company_phone_number">
          <span class="help-block with-errors"></span>
        </div>
      </div>
      <div class="form-group row align-items-center">
        <label class="form-control-label col-sm-3">Company Logo</label>
        <div class="col-sm-6 col-md-9">
          <div class="show-logo"></div>
          <div class="custom-file">
            <input type="file" name="company_logo" class="custom-file-input" id="company_logo">
            <label for="company_logo" class="custom-file-label">Choose File</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
        </div>
      </div>
      <div class="form-group row align-items-center">
        <label class="form-control-label col-sm-3">Member Card Design</label>
        <div class="col-sm-6 col-md-9">
          <div class="show-card"></div>
          <div class="custom-file">
            <input type="file" name="member_card" class="custom-file-input" id="member_card">
            <label for="member_card" class="custom-file-label">Choose File</label>
            <span class="help-block with-errors"></span>
          </div>
          <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
        </div>
      </div>
      <div class="form-group row align-items-center">
        <label for="member_discount" class="form-control-label col-sm-3">Discount Member (%)</label>
        <div class="col-sm-6 col-md-9">
          <input type="number" name="member_discount" class="form-control" id="member_discount">
          <span class="help-block with-errors"></span>
        </div>
      </div>
    
    <div class="form-group row align-items-center">
     <label for="note_type" class="form-control-label col-sm-3">Note type</label>
    <div class="col-sm-6 col-md-9">
      <select id="note_type" class="form-control" name="note_type">
        <option value="0">Small Note</option>
        <option value="1">Big Note (PDF)</option>
      </select>
      <span class="help-block with-errors"></span>
    </div>
  </div>
  </div>
    <div class="card-footer bg-whitesmoke text-md-right">
      <button type="submit" class="btn btn-primary" id="save-btn">Save Changes</button>
    </div>
  </div>
</form>
@endsection

@section('script')
<script type="text/javascript">
$(function(){
    showData();
   $('.form').validator().on('submit', function(e){
      if(!e.isDefaultPrevented()){ 

         $.ajax({
           url : "setting/1",
           type : "POST",
           data : new FormData($(".form")[0]),
           async: false,
           processData: false,
           contentType: false,
           success : function(data){
             showData();
             $('.alert').css('display', 'block').delay(2000).fadeOut();
           },
           error : function(){
             alert("Tidak dapat menyimpan data!");
           }   
         });
         return false;
     }
   });

});

function showData(){
  $.ajax({
    url : "setting/1/edit",
    type : "GET",
    dataType : "JSON",
    success : function(data){
      $('#company_name').val(data.company_name);
      $('#company_address').val(data.company_address);
      $('#company_phone_number').val(data.company_phone_number);
      $('#member_discount').val(data.member_discount);
      $('#note_type').val(data.note_type);

      d= new Date();
      $('.show-logo').html('<img src="/images/'+data.company_logo+'?'+d.getTime()+')" width="200">');
      $('.show-card').html('<img src="/images/'+data.member_card+'?'+d.getTime()+'" width="300">');
    },
    error : function(){
      alert("Tidak dapat menyimpan data!");
    }   
  });
}

// function showData(){
//   $(document).ready(function (e) {
//  $("#form").on('submit',(function(e) {
//   e.preventDefault();
//   $.ajax({
//   url: "ajaxupload.php",
//    type: "POST",
//    data:  new FormData(this),
//    contentType: false,
//          cache: false,
//    processData:false,
//    beforeSend : function()
//    {
//     //$("#preview").fadeOut();
//     $("#err").fadeOut();
//    },
//    success: function(data)
//       {
//     if(data=='invalid')
//     {
//      // invalid file format.
//      $("#err").html("Invalid File !").fadeIn();
//     }
//     else
//     {
//      // view uploaded file.
//      $("#preview").html(data).fadeIn();
//      $("#form")[0].reset(); 
//     }
//       },
//      error: function(e) 
//       {
//     $("#err").html(e).fadeIn();
//       }          
//     });
//  }));
// });
// }
</script>
@endsection