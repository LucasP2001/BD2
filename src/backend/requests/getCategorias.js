



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getCategorias() {
    
    var dados = {
        collection: 'Categorias',
    }   

    var dadosJson = JSON.stringify(dados);
  
            
    $.ajax({
        url: '../backend/controllers/getCategorias.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);

            $('#pdf-categoria').empty();
            $('#pdf-categoria').append(''+
            '<option value="">Nenhuma Categoria</option>'+
            '</div>');

            $('#categorias-label').empty();
            $('#categorias-label').append(''+
            '<label onclick="todos()" class="active">Todos</label>'+
            '</div>');

            var length = response.length;

           for (var i = 0; i < length; i++) {
                
              //lista de categorias inserir pdf
                $('#pdf-categoria').append(''+
                '<option value="'+response[i].id+'">'+response[i].nome+'</option>'+
                '</div>');
                

                //lista de Categorias Topbar
                $('#categorias-label').append(''+
                '<label onclick="MostrarCategoria(\''+response[i].id+'\')" data-id="'+response[i].id+'">'+response[i].nome+'</label>'+
                '</div>');

                

           }
          

        }
    });

   

}
function todos(){
    getCategorias();
    getInfoArquivos();
}



function MostrarCategoria(id_categoria){
    $('#categorias-label label').removeClass('active');
    // Add the active class to the clicked label
    $('#categorias-label label[data-id="' + id_categoria + '"]').addClass('active');


    var dados = {
        collection: 'Arquivos',
        id_categoria: id_categoria
    }   
 
    
    var dadosJson = JSON.stringify(dados);
    $('#list-pdf').empty();
            
    $.ajax({
        url: '../backend/controllers/getArquivosCategorias.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);

           
            var length = response.length;

            for (var i = 0; i < length; i++) {

             $('#list-pdf').append(''+
             '<div class="pdf-card">'+
             '<i class="bx bxs-file-pdf pdf-icon"></i>'+
             '<p class="pdf_title">'+response[i].nome+'</p>'+
             ' <p class="data"><i class="bx bx-calendar"></i>'+response[i].data+'</p>'+
             '<a href="../backend/controllers/visualizar_pdf.php?id='+response[i].id+'">Abrir PDF</a>'+
             ' </div>'+
            '</div>');

            }
    }
    });

                 
}


getCategorias()