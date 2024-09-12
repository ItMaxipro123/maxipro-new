 // Initialize Choices.js on the select element
 $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.database-edit').each(function() {
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

 // Initialize Choices.js on the select element
 $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.incoterms-edit').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('incoterms-edit-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
  });
  
  
  
  
  // Initialize Choices.js on the select element
  $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.banksupplier-edit').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('banksupplier-edit-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
  });
  
  // Initialize Choices.js on the select element
  $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.currency-edit').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('currency-edit-id'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
  });
    // Initialize Choices.js on the select element
    $(document).ready(function() {
        // Initialize Choices.js for each select element
        $('.hscode-edit-filter').each(function() {
            const choices = new Choices(this, {
                searchEnabled: true,
                itemSelectText: '',
            });

            // Handle change event of select element
            $(this).on('change', function(event) {
                const selectedValue = event.target.value;
                const inputElement = document.getElementById('hscode-input'); // Ganti dengan ID yang sesuai
                if (inputElement) {
                    inputElement.value = selectedValue;
                }
            });
        });
    });


         // Initialize Choices.js on the select element
        $(document).ready(function() {
                    
            // Initialize Choices.js on the select element
            const element = document.getElementById('supplier-edit-id');
            if (element) {
                const choices = new Choices(element, {
                    searchEnabled: true,
                    itemSelectText: '',
                });
            }
        });