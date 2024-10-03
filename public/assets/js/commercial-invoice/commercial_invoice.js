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

 // Initialize Choices.js on the select element
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
    var table = $('#table-tambah-comercial-invoice').DataTable({
        dom: 'lrtip', // Customize the DataTable DOM
        responsive: true, // Enable responsive mode
    });

    // Custom search box
    $('#search-box').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Checkbox filter
    $('#filterChecked').on('change', function() {
        if (this.checked) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table.row(dataIndex).node()).find('.kubik-checkbox-tambah').is(':checked');
            });
        } else {
            $.fn.dataTable.ext.search.pop();
        }
        table.draw();
    });

    // Supplier filter
    $('#filter-select').on('change', function() {
        var selectedSupplier = this.value;
        $.fn.dataTable.ext.search.pop(); // Remove previous filter

        if (selectedSupplier) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                return $(table.row(dataIndex).node()).find('td:eq(5)').text() === selectedSupplier;
            });
        }

        table.draw();
    });
});