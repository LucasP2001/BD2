$(document).ready(function() {
    $('#form-add-categoria').submit(function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        

        $.ajax({
            url: '../backend/controllers/setCategorias.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                
                getCategorias();
    
            },
            error: function() {
                alert('Ocorreu um erro durante o upload do arquivo.');
            }
        });
    });
});