<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="pluguins/jquery-3.6.4.min.js"></script>
</head>

<style>
    .popup{
    width: 300px;
    padding: 1rem;
    background: white;
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    backdrop-filter: blur( 4px );
    -webkit-backdrop-filter: blur( 4px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    position: fixed;
    bottom: 1rem;
    left: 1rem;
    z-index: 4000;
    font-family: 'Inter', sans-serif;
    display: flex;
    align-items: center;
    justify-content: space-between;
    
    }

    .popup-message{
        font-size: 0.8rem;
        width: 80%;
        word-break: break-all;
        color: var(--gray-color);
    }
    .close-popup{
        border: 0;
        background: #e0e0e0;
        padding: 0.2rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        width: 30px;
        height: 30px;
        transition: all 0.5s ease-out;
       
    }

    .close-popup i{
        color: var(--dark-color);
    }
    .close-popup:hover{
        background-color:#bbbbbb;
    }
    .popup .bxs-note{
        color: var(--main-color);
    }
</style>
<div class="popup">
<i class='bx bxs-note'></i>
    <p class="popup-message">
   
    <?php 
        if(isset($_GET['user'])){
            echo 'Seu cadastro foi realizado com sucesso!';
        }
        if(isset($_GET['invalid'])){
            echo 'Usuário ou Senha Incorretos!';
        }
    ?>
    </p>
    <button class="close-popup" onclick="closePopup()"><i class='bx bx-x'></i></button>
</div>

<script>

    
    $('.close-popup').click(function(){
        $('.popup').fadeOut('slow');
    })
    
</script>
