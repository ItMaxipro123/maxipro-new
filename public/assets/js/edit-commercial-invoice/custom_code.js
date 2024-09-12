$(document).ready(function() {
   
  // Memeriksa status awal radio button
 var modeAdminValue = $('input[name="modeadmin"]:checked').val();
console.log()
 // Inisialisasi input berdasarkan status radio button saat halaman dimuat
 if (modeAdminValue === '1') {
     enableInputs(); // Panggil fungsi untuk mengaktifkan input
 } else {
     disableInputs(); // Panggil fungsi untuk menonaktifkan input
 }

 // Event listener untuk perubahan pada radio button
 $('input[name="modeadmin"]').on('change', function() {
     var selectedValue = $(this).val();

     // Lakukan sesuatu berdasarkan nilai radio button yang dipilih
     if (selectedValue === '1') {
         
         enableInputs(); // Panggil fungsi untuk mengaktifkan input
     } else {
         
         disableInputs(); // Panggil fungsi untuk menonaktifkan input
     }
 });

 // Fungsi untuk mengaktifkan input
 function enableInputs() {
     $('#invoice_no, #contract_no, #packing_no').prop('disabled', false);
 }

 // Fungsi untuk menonaktifkan input
 function disableInputs() {
     $('#invoice_no, #contract_no, #packing_no').prop('disabled', true);
 }
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

