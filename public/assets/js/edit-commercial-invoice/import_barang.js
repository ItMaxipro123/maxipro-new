$('#table-atas-response').hide(); //tidak menampilkan tabel import

function importData(event) {
        event.preventDefault();
        console.log('masuk modal import');
        $('#importModal').modal('show'); // Tampilkan modal
}

