document.getElementById('customCodeCheckboxEdit').addEventListener('click', function() {
    console.log('custom code')
    const modeadminInput = document.querySelector('input[name="modeadmin"]');
    
    const invoiceInput = document.querySelector('input[name="invoice_no_name"]');
    const contractInput = document.querySelector('input[name="contract_no_name"]');
    const packingInput = document.querySelector('input[name="packing_no_name"]');

    if (this.checked) {
        
        modeadminInput.value = 1;
        invoiceInput.disabled = false;
        contractInput.disabled = false;
        packingInput.disabled = false;
    } else {
        modeadminInput.value = 0;
        invoiceInput.disabled = true;
        contractInput.disabled = true;
        packingInput.disabled = true;
    }
});
$(document).ready(function() {
   
 flatpickr("#tgl_request", {
    dateFormat: "Y-m-d",
    
    disableMobile: true
});

});

 //untuk berpindah ke tab
 $(document).ready(function(){
    console.log('tab');
    var packingLists = ['#packing_list', '#packing_list2', '#packing_list3'];
    // Fungsi untuk beralih tab
 
   
    function changeTab(tab) {

        if(tab === 'comercial_invoice') {
           console.log('tab commercialinvoice');
            $("#comercial_invoice").show();
            //  packingLists.forEach(function(list) {
            //     $(list).removeClass('show active').css('display', 'none');
            //     // Clear all elements inside each packing list tab
            //     $(list).html('');
            // });
            $("#form_input_add").hide();
            $("#button_save_add").hide();
            $("#form_input_add2").hide();
            $("#button_save_add2").hide();
            $("#packing_list").addClass('show active').css('display', 'none');
                // Hide all elements within the packing list form and div
                $(".packing-group .btn-danger").hide();
                $(".packing-group label[for='kodePacking']").hide();
                $(".packing-group input[name='name_packing_edit[]']").hide();
                $(".packing-group2 select[name='itempacking_edit[]']").hide();
                $(".packing-group2 input[name^='qtyitempacking']").hide();
                $(".packing-group2 .btn-danger").hide();
                $("#newInputContainer2 .btn-primary").hide();

            // $("#newInputContainer2").addClass('show active').css('display', 'none');
            $("#newInputContainer2").hide();
            $("#comercial_invoice_tab").addClass('active');
            $("#packing_list_tab").removeClass('active');

        } else if(tab === 'packing_list') {
            $("#form_input_add").show();
            $("#button_save_add").show();
            $("#form_input_add2").show();
            $("#button_save_add2").show();
            $("#newInputContainer2").show();
            $("#packing_list").addClass('show active').css('display', 'block');
            $("#packing_list2").addClass('show active').css('display', 'block');
            $("#packing_list3").addClass('show active').css('display', 'block');
            
            $("#comercial_invoice").hide();
            $("#packing_list_tab").addClass('active');
            $("#comercial_invoice_tab").removeClass('active');
        }
        
    }

    // Event handler saat tab diubah
    $("#comercial_invoice_tab").click(function(){
        changeTab('comercial_invoice');

    });

    $("#packing_list_tab").click(function(){
        changeTab('packing_list');
        
    });
});

