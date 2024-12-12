$('#tab-nav .nav-link').on('click', function(e) {
    e.preventDefault();
    $('#tab-nav .nav-link').removeClass('active');
    $(this).addClass('active');
    $('.tab-content').hide();

    var tabId = $(this).attr('id');
    switch(tabId) {
        case 'master-tab':
            $('#master-content').show();
            break;
        case 'pembayaran-tab':
            $('#pembayaran-content').show();
            break;
        case 'ekspedisi-tab':
            $('#ekspedisi-content').show();
            break;
    }
});
// Initialize Choices.js on the select element
$(document).ready(function() {
    $('#database_tambah_id').select2({
        placeholder: "Pilih Database", // Optional placeholder
        allowClear: true // Optional, allows clearing the selection
    });
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


$('#table-atas-response').hide(); //tidak menampilkan tabel import

function importData(event) {
        event.preventDefault();
        
        $('#importModal').modal('show'); // Tampilkan modal
}


$(document).ready(function() {

    // initialize flatpickr di tanggal transaksi
    flatpickr("#tgl_request", {
        dateFormat: "Y-m-d",
        disableMobile: true
    });
    
    // Initialize DataTable
    var table2 = $('#table-tambah-comercial-invoice').DataTable({
        dom: 'lrtip', // Customize the DataTable DOM
        responsive: false, // Enable responsive mode
        columnDefs: [
            { 
                targets: [3], // Example: Hide the Supplier column on small screens
                className: 'none'
            }
        ]
    });

   // Custom search box
   $('#search-box').on('keyup', function() {
        table2.search(this.value).draw();
    });

    // Checkbox logic to ensure only one checkbox is selected
    $('.kubik-checkbox-tambah').on('change', function() {
        if (this.checked) {
            // Uncheck all other checkboxes
            $('.kubik-checkbox-tambah').not(this).prop('checked', false);
        }
    });

    // Checkbox filter
    $('#filterChecked').on('change', function() {
        if (this.checked) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table2.row(dataIndex).node()).find('.kubik-checkbox-tambah').is(':checked');
            });
        } else {
            $.fn.dataTable.ext.search.pop();
        }
        table2.draw();
    });

    // Supplier filter
    $('#filter-select').on('change', function() {
        var selectedSupplier = this.value;
        $.fn.dataTable.ext.search.pop(); // Remove previous filter

        if (selectedSupplier) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table2.row(dataIndex).node()).find('td:eq(5)').text() === selectedSupplier;
            });
        }

        table2.draw();
    });
});