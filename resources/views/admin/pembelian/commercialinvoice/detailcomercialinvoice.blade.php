
<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; ">
            <img src="https://maxipro.id/images/website/logo-pt-maxipro-group-indonesia-20200818104657.png" 
                 alt="Logo" style="max-width: 20%; height: auto; margin-bottom: 20px;"/>   
</div>
<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%;margin-top: 20px; ">
<h5>Download .XLSX</h5>
                    <div class="d-flex flex-wrap justify-content-between">
                        <button type="button" class="btn btn-success mx-1 my-1 flex-fill">PROFORMA INVOICE (采购订单)</button>
                        <button type="button" class="btn btn-success mx-1 my-1 flex-fill">PURCHASE ORDER (采购订单)</button>
                        <button type="button" class="btn btn-success mx-1 my-1 flex-fill">SALES CONTRACT (销货合同)</button>
                        <button type="button" class="btn btn-success mx-1 my-1 flex-fill">COMMERCIAL INVOICE (商业发票)</button>
                        <button type="button" class="btn btn-success mx-1 my-1 flex-fill">PACKING LIST (打包清单)</button>
                    </div>
</div>
<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; margin-top: 20px;">
            
                    <h5 class="margin-top: 20px;">Download .PDF</h5>
                    <div class="d-flex flex-wrap justify-content-between">
                        <button type="button" class="btn custom-primary mx-1 my-1 flex-fill" data-id="{{ $Data['msg']['commercialinvoice']['id'] }}" title="{{ $Data['msg']['commercialinvoice']['id'] }}" onclick="proformaFcl(this)" >PROFORMA INVOICE (采购订单)</button>
                        <button type="button" class="btn custom-primary mx-1 my-1 flex-fill" data-id="{{ $Data['msg']['commercialinvoice']['id'] }}" title="{{ $Data['msg']['commercialinvoice']['id'] }}" onclick="purchaseorderFcl(this)">PURCHASE ORDER (采购订单)</button>
                        <button type="button" class="btn custom-primary mx-1 my-1 flex-fill" data-id="{{ $Data['msg']['commercialinvoice']['id'] }}" title="{{ $Data['msg']['commercialinvoice']['id'] }}" onclick="salesContractFcl(this)">SALES CONTRACT (销货合同)</button>
                        <button type="button" class="btn custom-primary mx-1 my-1 flex-fill" data-id="{{ $Data['msg']['commercialinvoice']['id'] }}" title="{{ $Data['msg']['commercialinvoice']['id'] }}" onclick="comercialInvoiceFcl(this)">COMMERCIAL INVOICE (商业发票)</button>
                        <button type="button" class="btn custom-primary mx-1 my-1 flex-fill" data-id="{{ $Data['msg']['commercialinvoice']['id'] }}" title="{{ $Data['msg']['commercialinvoice']['id'] }}" onclick="packingListFcl(this)">PACKING LIST (打包清单)</button>
                    </div>
            
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    function proformaFcl(element){
        // event.preventDefault();
        var id = $(element).data('id')
        var menu = 'proforma_invoice'
        
        var route_url = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
        $.ajax({
            url:'{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: {
                menu:menu,
                id_product:id
            },
            success: function(response){
                
                window.location.href = route_url+'?menu='+menu+'&id_product='+id;
                
            }
        })
    }

    function purchaseorderFcl(element){
        var invoice = $(element).data('id')
        var menu = 'purchase_order'
        var route_url = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
        $.ajax({
            url:'{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: {
                menu:menu,
                id_product:invoice
            },
            success: function(response){
                
                window.location.href = route_url+'?menu='+menu+'&id_product='+invoice;
                
            }
        })
    }

    function salesContractFcl(element){
        var invoice = $(element).data('id')
        var menu = 'sales_contract'
        var route_url = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
        $.ajax({
            url:'{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: {
                menu:menu,
                id_product:invoice
            },
            success: function(response){
                
                window.location.href = route_url+'?menu='+menu+'&id_product='+invoice;
                
            }
        })
    }

    function comercialInvoiceFcl(element){
        var invoice = $(element).data('id')
        var menu = 'comercial_invoice'
        var route_url = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
        $.ajax({
            url:'{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: {
                menu:menu,
                id_product:invoice
            },
            success: function(response){
                
                window.location.href = route_url+'?menu='+menu+'&id_product='+invoice;
                
            }
        })
    }
    function packingListFcl(element){
        var invoice = $(element).data('id')
        var menu = 'packing_list'
        var route_url = '{{ route('admin.pembelian_editview_comercial_invoice') }}';
        $.ajax({
            url:'{{ route('admin.pembelian_editview_comercial_invoice') }}',
            data: {
                menu:menu,
                id_product:invoice
            },
            success: function(response){
                
                window.location.href = route_url+'?menu='+menu+'&id_product='+invoice;
                
            }
        })
    }

</script>

