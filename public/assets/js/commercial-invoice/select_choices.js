   // Initialize Choices.js on the select element
$(document).ready(function() {
                    
    // Initialize Choices.js on the select element
    const element = document.getElementById('product-supplier-edit-filter');
    if (element) {
        const choices = new Choices(element, {
            searchEnabled: true,
            itemSelectText: '',
        });
    }
});


$(document).ready(function() {
                    

    // Initialize flatpickr on the date input
    flatpickr("#tgl_request_tambah", {
        dateFormat: "Y-m-d",
      
        disableMobile: true
    });
});




    
  $(document).ready(function() {
    // Initialize Choices.js for each select element
    $('.select-supplier-tambah').each(function() {
        const choices = new Choices(this, {
            searchEnabled: true,
            itemSelectText: '',
        });
  
        // Handle change event of select element
        $(this).on('change', function(event) {
            const selectedValue = event.target.value;
            const inputElement = document.getElementById('filter-select'); // Ganti dengan ID yang sesuai
            if (inputElement) {
                inputElement.value = selectedValue;
            }
        });
    });
  });