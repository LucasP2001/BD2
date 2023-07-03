


//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getCategorias() {
    $('#add_categorias').fadeOut('slow');
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

            //lista de categorias inserir pdf
            $('#pdf-categoria').empty();
            $('#pdf-categoria').append(''+
            '<option value="">Nenhuma Categoria</option>'+
            '</div>');

               //lista de Categorias editar
            $('#pdf-categoria-editar').empty();
            $('#pdf-categoria-editar').append(''+
            '<option value="">Nenhuma Categoria</option>'+
            '</div>');

               //lista de Categorias Topbar
            $('#categorias-label').empty();
            $('#categorias-label').append(''+
            '<label onclick="todos()" class="active">Todos</label>'+
            '</div>');
            
             //lista cetegorias gerenciador de categorias
            $('#categoria-editar').empty();
            $('#categoria-editar').append(''+
            '<option value="">Nenhuma Categoria</option>'+
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

                //lista de Categorias editar
                $('#pdf-categoria-editar').append(''+
                '<option value="'+response[i].id+'">'+response[i].nome+'</option>'+
                '</div>');

                 //lista cetegorias gerenciador de categorias
                $('#categoria-editar').append(''+
                '<option value="'+response[i].id+'">'+response[i].nome+'</option>'+
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
            $('#list-pdf').empty();
            for (var i = 0; i < length; i++) {

             $('#list-pdf').append(''+
             '<div class="pdf-card">'+
             '<i onclick="verPdf(\''+response[i].id+'\')" class="bx bxs-file-pdf pdf-icon"></i>'+
             '<p onclick="verPdf(\''+response[i].id+'\')" class="pdf_title">'+response[i].nome+'</p>'+
             '<p  onclick="verPdf(\''+response[i].id+'\')"class="data"><i class="bx bx-calendar"></i>'+response[i].data+'</p>'+
             
             '<div  id="pdfaction">'+
                 '<button onclick="verPdf(\''+response[i].id+'\')"><i class="bx bx-book-open"></i></button>'+
                 '<button id="edits" onclick="editarPdf(\'' + response[i].id + '\', \'' + response[i].nome + '\', \'' + response[i].categoria + '\')"><i class="bx bxs-edit"></i></button>'+
                 '<button onclick="exibirConfirmacaoRemocao(\''+response[i].id+'\', \'' + response[i].nome + '\')"><i class="bx bxs-trash-alt"></i></button>'+
                 '</div>'+
            '</div>');



            }
    }
    });


    

                 
}


getCategorias()