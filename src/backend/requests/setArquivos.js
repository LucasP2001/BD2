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
               
                exibirMensagem('Arquivo Adicionado com Sucesso!');
                getInfoArquivos();
            },
            error: function() {
                exibirMensagem('Erro ao adicionar arquivo!');
            }
        });
        $('#pfdadd').fadeOut('slow');
    });
});