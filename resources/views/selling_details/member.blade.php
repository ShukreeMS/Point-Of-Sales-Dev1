<div class="modal" id="modal-member" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
   <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span> </button>
      <h3 class="modal-title">Search Member</h3>
   </div>
            
<div class="modal-body">
   <table class="table table-striped tabel-Product">
      <thead>
         <tr>
            <th>Member Code</th>
            <th>Member Name</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>action</th>
         </tr>
      </thead>
      <tbody>
         @foreach($member as $data)
         <tr>
            <th>{{ $data->member_code }}</th>
            <th>{{ $data->member_name }}</th>
            <th>{{ $data->member_address }}</th>
            <th>{{ $data->member_phone_number }}</th>
            <th><a onclick="selectMember({{ $data->member_code }})" class="btn btn-primary"><i class="fa fa-check-circle"></i> Choose</a></th>
          </tr>
         @endforeach
      </tbody>
   </table>

</div>
      
         </div>
      </div>
   </div>
