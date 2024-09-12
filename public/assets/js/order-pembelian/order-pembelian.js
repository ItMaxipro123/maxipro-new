 // Menangani peristiwa klik pada tombol "Filter"
 document.getElementById('openModalBtn').addEventListener('click', function() {
    $('#exampleModal').modal('show'); // Menampilkan modal Filter
});

 // Menangani klik pada tombol hitung kubikasi
 function hitungKubikasi(element) {
    event.preventDefault();

    $('#product-restok-tambah-filter').val('');
    console.log($('#product-restok-tambah-filter').val());
    if ($('#product-restok-tambah-filter').val() === null) {
      $('#product-restok-tambah-filter').remove();

      }

    $('#hitungkubikasiModal').modal('show'); // Tampilkan modal


}

$('#hitungkubikasiModal').on('hidden.bs.modal', function () {
     
    // Clear form fields and reset dropdown to default option
    $('#checkdatevaluetambah').prop('checked', false);
    $('#hitungkubikasiForm').find('input[type="text"], input[type="number"], textarea').val('');
    $('#tgl_request').prop('disabled', true);
    $('#new-input-container-gambar').empty();
    $('#new-input-container').empty();
    $('#new-input-container2').empty();
    $('#new-input-container-kosong').empty();
});


document.addEventListener('DOMContentLoaded', function() {
    const checkdatevalue = document.getElementById('checkdatevalue');
    const tgl_awal = document.getElementById('tgl_awal');
    const tgl_akhir = document.getElementById('tgl_akhir');
    console.log(checkdatevalue);
    // Atur event listener untuk perubahan pada checkbox
    checkdatevalue.addEventListener('change', function() {
        // Jika checkbox dicentang, aktifkan kedua datepicker
        if (checkdatevalue.checked) {
            checkdatevalue.value = 'checked';
            tgl_awal.disabled = false;
            tgl_akhir.disabled = false;
            // Inisialisasi Flatpickr
            flatpickr(tgl_awal, {
                dateFormat: 'Y-m-d'
            });
            flatpickr(tgl_akhir, {
                dateFormat: 'Y-m-d'
            });
        } else {
            // Jika tidak, nonaktifkan kedua datepicker
            tgl_awal.disabled = true;
            tgl_akhir.disabled = true;
            // Hapus Flatpickr instance jika sudah ada
            if (tgl_awal._flatpickr) {
                tgl_awal._flatpickr.destroy();
            }
            if (tgl_akhir._flatpickr) {
                tgl_akhir._flatpickr.destroy();
            }
        }
    });
});

//Untuk Menjumlahkan total kubik yang telah dicentang
function calculateTotalKubik() {
    var checkboxes = document.querySelectorAll('.kubik-checkbox');
    var totalKubik = 0;

    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            var kubikValue = parseFloat(checkbox.closest('tr').querySelector('.kubik-value').textContent);
            totalKubik += kubikValue;

        }
    });
    
    document.getElementById('total-kubik').textContent = totalKubik;
}