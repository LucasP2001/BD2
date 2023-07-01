$(document).ready(function() {
    $('#form-add-pdf').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        

        $.ajax({
            url: '../backend/controllers/setArquivos.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                alert(response);
                getInfoArquivos();
            },
            error: function() {
                alert('Ocorreu um erro durante o upload do arquivo.');
            }
        });
    });
});