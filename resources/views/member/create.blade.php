@extends('layouts.app')

@section('content')
    

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form_validation" method="POST" data-toggle="validator">
					{{csrf_field()}} {{method_field('POST')}}
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel"></h4>
            </div>
				
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group form-float">
                        <div class="form-line">                        	
                        	<label class="form-label">Member Name</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" value="{{old("member_name")}}" >
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                        	
                        	<label class="form-label">Member Code</label>
                            <input type="text" class="form-control" id="member_code" name="member_code" value="{{old("member_code")}}" >
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                         
                            <label class="form-label">Member Address</label>
                            <input type="text" class="form-control" id="member_address" name="member_address" value="{{old("member_address")}}" >
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">                         
                            <label class="form-label">Telephone</label>
                            <input type="text" class="form-control" id="member_phone_number" name="member_phone_number" value="{{old("member_phone_number")}}" >
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
@endsection