<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="pluguins/jquery-3.6.4.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Login</h1>
            <div class="action">
                <button class="active" id="login-btn">Login</button>
                <button id="cad-btn">Cadastre-se</button>
            </div>
            <form action="" method="post" id="login-form">
                <input type="text" placeholder="Digite seu e-mail" id="login-email">
                <input type="password" placeholder="Digite sua senha" id="login-senha">
                <input type="submit" value="Entrar">
            </form>

            <form action="" method="post" id="cadastro-form">
                <input type="text" placeholder="Digite seu nome" id="cadastro-nome">
                <input type="email" placeholder="Digite seu e-mail" id="cadastro-email">
                <input type="password" placeholder="Digite sua senha" id="cadastro-senha">
                <input type="submit" value="Cadastrar">
            </form>


        </div>
    </div>

    <script>
        $('#cadastro-form').hide();

        $('#cad-btn').click(function(){
            $('#login-form').hide();
            $('#login-btn').removeClass();
            $('#cad-btn').addClass('active');
            $('#cadastro-form').fadeIn('slow');
            $('.content h1').empty();
            $('.content h1').append('Cadastro');
        })

        $('#login-btn').click(function(){
            $('#cadastro-form').hide();
            $('#cad-btn').removeClass();
            $('#login-btn').addClass('active');
            $('#login-form').fadeIn('slow');
            $('.content h1').empty();
            $('.content h1').append('Login');
        })
    </script>
</body>

</html>