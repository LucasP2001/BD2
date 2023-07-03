



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getInfoArquivos() {

    var dados = {
        collection: 'Arquivos'
    }   

    var dadosJson = JSON.stringify(dados);
    

    $.ajax({
        url: '../backend/controllers/getArquivos.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);
           $('#list-pdf').empty();
    

            var length = response.length;
            

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
                 ' </div>'+
                '</div>');
           }

          

        }
        
    });

}


function arquivoPesquisar(nome){

    getCategorias();
    var dados = {
        collection: 'Arquivos',
        nome_pdf: nome 
    }   

    var dadosJson = JSON.stringify(dados);
    $('#list-pdf').empty();

    $.ajax({
        url: '../backend/controllers/getArquivosBusca.php',
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


function verPdf(_id){
    window.location.href= "../backend/controllers/visualizar_pdf.php?id="+_id;
}


function editarPdf(id, nome, categoria){
  
    
       var campoNome = document.getElementById('nome-pdff');   
       campoNome.value = nome;  
      

       var dadosC = {
        collection: 'Categorias',
      }   

    var dadosJsonC = JSON.stringify(dadosC);
  
            
    $.ajax({
        url: '../backend/controllers/getCategorias.php',
        method: 'post',
        data: {
            data: dadosJsonC
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);

        var length = response.length;
        for (var i = 0; i < length; i++) {
            if(response[i].id == categoria ){
            

                var selectElement = document.getElementById('pdf-categoria-editar'); 
                var opcaoSelecionada = selectElement.options[0]; 
                opcaoSelecionada.textContent = response[i].nome;
                opcaoSelecionada.value = response[i].id;
                
            }
        }

        }});

        $('.edit-container').fadeIn('slow');
  
        var formulario = document.getElementById('form-edit-pdf');
        formulario.addEventListener('submit', function(event) {
       
      event.preventDefault(); 
    
        var nome_novo = formulario.elements.nome.value;
        var categoria_nova = formulario.elements.categoria.value;

        var dados = {
            _id: id,
            nome: nome_novo,
            categoria: categoria_nova
        }   
    
        var dadosJson = JSON.stringify(dados);
    
        $.ajax({
            url: '../backend/controllers/updateArquivos.php',
            method: 'post',
            data: {
                data: dadosJson
            },
            dataType: 'json',
            success: function (response) {
               
              
        
            }
        });

        $('.edit-container').fadeOut('slow');
        $('#add_categorias').fadeOut('slow');
        window.location.href= "../views/workspace.php";
        
       
  });
    
}



getInfoArquivos()