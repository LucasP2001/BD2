



//FUNÇÃO PARA MOSTRAS OS PEDIDOS EM ENTREGA
function getInfoArquivos() {

    var dados = {
        collection: 'Arquivos'
    }   

    var dadosJson = JSON.stringify(dados);

    $.ajax({
        url: '../backend/controllers/find.php',
        method: 'post',
        data: {
            data: dadosJson
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);


            var length = response.length;

           for (var i = 0; i < length; i++) {
                

                $('#ind').append(''+
                '<p>Nome do PDF: '+response[i].nome+'</p>' +
                '<a href="../backend/controllers/visualizar_pdf.php?id='+response[i].id+'">Abrir PDF</a>'+
                '</div>');
           }


        }
    });

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



getInfoArquivos()