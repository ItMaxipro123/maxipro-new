document.getElementById('customCodeCheckbox').addEventListener('click', function() {
    const modeadminInput = document.querySelector('input[name="modeadmin_tambah"]');
    
    const invoiceInput = document.querySelector('input[name="invoice_no_tambah"]');
    const contractInput = document.querySelector('input[name="contract_no_tambah"]');
    const packingInput = document.querySelector('input[name="packing_no_tambah"]');

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
    $('#importData').on('click', function() {
        console.log('modal impor data');
        $('#importDataModal').modal('show');
    });
    
});

$(document).ready(function() {
                    
    // Initialize flatpickr on the date input
    flatpickr("#tgl_request_tambah", {
        dateFormat: "Y-m-d",
      
        disableMobile: true
    });
});

