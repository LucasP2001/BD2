



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getInfoArquivos() {

    var dados = {
        collection: 'Arquivos'
    }   

    var dadosJson = JSON.stringify(dados);
    $('#list-pdf').empty();

    $.ajax({
        url: '../backend/controllers/getArquivos.php',
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
<<<<<<< HEAD
                 '<div class="pdf-action">'+
                 '<button onclick="verPdf('+response[i].id+')"><i class="bx bx-book-open"></i></button>'+
                 '<button onclick=""><i class="bx bxs-edit"></i></button>'+
                 '<button><i class="bx bxs-trash-alt"></i></button>'+
                 '</div>'+
=======
                 '<a href="../backend/controllers/visualizar_pdf.php?id='+response[i].id+'">Abrir PDF</a>'+
                 //'<a href="../backend/controllers/removerPDF.php?id='+response[i].id+'">Remover PDF</a>'+
>>>>>>> 7732916ac9652c99c535bfb79e609061ca9605d5
                 ' </div>'+
                '</div>');
           }


        }
    });

}

function verPdf(_id){
    window.location.href= "../backend/controllers/visualizar_pdf.php?id="+_id;
}




//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function updateArquivos(idarquivo,nomenovo) {

    var dados = {
        collection: 'Arquivos',
        id_arquivo: idarquivo,
        nome_novo: nomenovo
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
            console.log(response);
            
            getInfoArquivos();
        }
    });

}



//getInfoArquivos()