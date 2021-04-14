<div class="modal" id="modal-form" tabindex="-1" role="dialog">
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
                        <label class="form-label" for="validationCustom01">Product Code</label>
                        <div class="form-line">
                            <input type="number" class="form-control" id="product_code" id="validationCustom01" name="product_code" autofocus required>
                            <div class="invalid-feedback">
                                Please Select valid code.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="validationCustom02">Product Name</label>
                            <input type="text" class="form-control" id="product_name" id="validationCustom02" name="product_name" autofocus required>
                            <div class="invalid-feedback">
                                Please provide a valid Product Name.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select id="category" type="text" name="category" class="form-control show-tick" required>
                                <option value="">-- Choose Category --</option>
                                @foreach($category as $list)
                                <option value="{{$list->category_id}}">{{$list->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Product Brand</label>
                            <input type="text" class="form-control" id="product_brand" name="product_brand" autofocus required>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Purchase Price</label>
                            <input type="text" class="form-control" id="purchase_price" name="purchase_price" autofocus required>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount" autofocus required>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label" for="validationCustom03">Selling Price</label>
                            <input type="text" class="form-control" id="selling_price" id="validationCustom03" name="selling_price" autofocus required>
                            <div class="invalid-feedback">
                                Please provide a valid Selling Price.
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Product Stock</label>
                            <input type="text" class="form-control" id="product_stock" name="product_stock" autofocus required>
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
