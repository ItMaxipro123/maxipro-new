$('#table-atas-response').hide(); //tidak menampilkan tabel import

function importData(event) {
        event.preventDefault();
        
        $('#importModal').modal('show'); // Tampilkan modal
}


$(document).ready(function() {

    
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