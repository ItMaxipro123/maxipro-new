$('#tab-nav .nav-link').on('click', function(e) {
    e.preventDefault();

    // Check if document.title is not 'Buat LOCAL | PT. Maxipro Group Indonesia'
    if (!document.title.startsWith('Buat LCL')) {
        console.log('document.title ',document.title )
        $('#tab-nav .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();

        var tabId = $(this).attr('id');
        switch(tabId) {
            case 'master-tab':
                $('#master-content').show();
                break;
            case 'pembayaran-tab':
                $('#label-lcl').show()
                $('#pembayaran-content').show();
                break;
            case 'ekspedisi-tab':
                $('#ekspedisi-content').show();
                break;
        }
    }
    else{
        $('#tab-nav .nav-link').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        $('#label-lcl').show();
        var tabId = $(this).attr('id');
        switch(tabId) {
            case 'master-tab':
                $('#master-content').show();
                break;
            case 'pembayaran-tab':
                $('.form-no-lcl').html(`
                    <div id="label-lcl" style="display: block;">
                        <label for="">
                            <h3>Belum Ada LCL</h3>
                        </label>
                    </div>
                  
                `);
                
                $('#pembayaran-content').hide();
                break;
            case 'ekspedisi-tab':
                $('.form-no-lcl').html(`
                    <div id="label-lcl" style="display: block;">
                        <label for="">
                            <h3>Belum Ada LCL</h3>
                        </label>
                    </div>
                  
                `);
                $('#ekspedisi-content').hide();
                break;
        }
    }
});

$(document).ready(function() {
    //untuk berpindah tab di tambah LCL
    window.tambahRestok = function() {
        
            var tambah_lcl2 = 1;
            $('#judulLcl').html('<i class="fas fa-database"></i> &nbsp Buat LCL');
            document.title='Buat LCL   | PT. Maxipro Group Indonesia'
            const choices = new Choices($('#select_db')[0], {
               
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });
            const choices_selectsupplier = new Choices($('#select_supplier')[0], {
              
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });
            const choices_matauang = new Choices($('.pilih-matauang')[0], {
              
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });
            const choices_termincash = new Choices($('.select_termin_cash')[0], {
              
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });

            const choices_terminrekening = new Choices($('.select_termin_rekening')[0], {
              
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });
            const choices_cabang = new Choices($('.pilih-cabang')[0], {
              
                itemSelectText: '',   // Removes "Press to select" text
                shouldSort: false     // Keeps the original order of options
            });
            
            $('.item-barang').each(function() {
                // Initialize Choices.js on the select elements
                const choices = new Choices(this, {
                    searchEnabled: true, // search functionality
                    itemSelectText: '', // Text for item select prompt
                    removeItemButton: true, // Optionally enable remove item button
                    shouldSort: false, // Prevent sorting of options
                    shouldSortItems: false, // Prevent sorting of items within Choices.js
                });
            
                // Handle the change event of the select element
                $(this).on('change', function(event) {
                    const selectedValue = event.target.value;
                    const inputElement = document.getElementById('select_barang'); // Replace with the correct ID
            
                    if (inputElement) {
                        inputElement.value = selectedValue;
                    }
                });
            });


            if (window.dataTableInstance) {
                window.dataTableInstance.destroy();
            }
            $('#openModalBtn').remove();
            $('#tabe-stok').remove();
            $('#radio-button').remove();
            $('#clearFilterBtn').remove();
            $('#tambah_lcl').remove();
            $('#tab-nav').show();
            $('#master-tab').trigger('click'); // Show master content by default
    };


    // Initialize flatpickr on the date input
    flatpickr("#tgl_request", {
        dateFormat: "Y-m-d",
        disableMobile: true
    });

    // Initialize DataTable
    var table = $('#table-tambah-comercial-invoice').DataTable({
        dom: 'lrtip', // Customize the DataTable DOM
        responsive: true, // Enable responsive mode
        columnDefs: [
            { 
                targets: [3], // Example: Hide the Supplier column on small screens
                className: 'none'
            }
        ]
    });

    // Custom search box
    $('#search-box').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Checkbox logic to ensure only one checkbox is selected
    $('.kubik-checkbox-tambah').on('change', function() {
        if (this.checked) {
            // Uncheck all other checkboxes
            $('.kubik-checkbox-tambah').not(this).prop('checked', false);
        }
    });
});

  
$(document).ready(function() {
    // Function to handle the change event
    $('#select_category_convert').on('change', function() {
        var selectedValue = $(this).val(); // Get the selected value

        if (selectedValue === 'default') {
        
            // Disable the input field if "Default" is selected
            $('#input_nominal').prop('disabled', true);
            $('#saveConvert').prop('disabled', true);
        } else {
            var nominal=$('#input_nominal').val()
            // console.log('a',a);
            if(nominal >0){

                $('#saveConvert').prop('disabled', true);
            }
            else{

                // Enable the input field if "Custom" is selected
                $('#input_nominal').prop('disabled', false);
                $('#saveConvert').prop('disabled', false);
            }
        }
    });
});