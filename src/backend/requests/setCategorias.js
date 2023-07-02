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
               $('#add_categorias').fadeOut('slow');
               exibirMensagem('Categoria Cadastrada com Sucesso!');
               
     
            },
            error: function() {
                $('#add_categorias').fadeOut('slow');
                alert('Ocorreu um erro durante o upload do arquivo.');
            }
            
        });
       
       
    });
    
});



