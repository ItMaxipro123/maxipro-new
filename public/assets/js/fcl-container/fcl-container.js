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
    // Initialize Choices.js for each select element
    $('.database-tambah').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('database_id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
});

$(document).ready(function() {
                    
    // Initialize flatpickr on the date input
    flatpickr("#tgl_request_tambah", {
        dateFormat: "Y-m-d",
      
        disableMobile: true
    });
});

$(document).ready(function() {
                    
    // Initialize Choices.js on the select element
    const element = document.getElementById('supplier-tambah');
    if (element) {
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });
    }
});

$(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.incoterms-tambah').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('incoterms-tambah-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
});

 // Initialize Choices.js on the select element
 $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.banksupplier-tambah').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('banksupplier-tambah-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
});

  // Initialize Choices.js on the select element
  $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.currency-tambah').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('currency-tambah-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
  });
      
