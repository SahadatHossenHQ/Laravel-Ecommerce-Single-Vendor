<div class="modal" id="cart-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h2 class="modal-title">Add To Cart</h2>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div id="cart-img"></div>
                </div>
                <div class="col-md-6">
                    <div class="row ml-1" >
                        <div class="col-12 pl-0 mb-2" id="nhide">
                            <p><strong>Regular Price:</strong><span id="item_price"></span>tk</p>
                        </div>
                        <div class="col-12 pl-0 mb-2" >
                            <p><strong id="nprice">Discount Price:</strong><span id="del_price"></span>tk</p>
                        </div>
                    </div>
                    <div class="row ml-1">
                        <div class="col-12 pl-0 mb-2">
                            <p><strong>Select Color:</strong></p>
                        </div>
                        
                        <div class="btn-group btn-group-toggle btn-color-group d-block mt-n2 ml-n2" data-toggle="buttons" id="colors">
                            
                        </div>
                    </div>
                    <div class="row ml-1 mb-2" id="attributes_all">
                        
                    </div>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <input type="text" class="entry value" value="1">
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                </div>
            </div>
            
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <form action="{{route('add.cart')}}" method="post" id="addToCart">
                @csrf
                <fieldset>
                    <input required type="hidden" name="id" id="id">
                    <input required type="hidden" name="qty" id="qty" value="1">
                    <input required type="hidden" value="blank" name="color" id="color">
                    <div id="attr_values"></div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </fieldset>
            </form>
        </div>
  
      </div>
    </div>
</div>