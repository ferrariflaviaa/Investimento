<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Ja tem conta ?</h2>
                <p class="description description-primary">Click aqui para logar</p>
                <button id="signin" class="btn btn-primary">sign in</button>
            </div>    
            <div class="second-column">
                <h2 class="title title-second">Criar Conta</h2>
                <p class="description description-second">Coloque suas informações aqui:</p>
                <form class="form" method="post" action="cadastro.php">
                    <label class="label-input" for="">
                        <input class="placeholder" type="text" name="nome" placeholder="Nome" >
                    </label>
                    <label class="label-input" for="">
                        <input  class="placeholder"type="date" name="idade" placeholder="Idade" >
                    </label>
                    <label class="label-input" for="">
                        <input class="placeholder" type="password" name="senha" placeholder="Senha" >
                    </label>
                    <label class="label-input" for="">
                        <input class="placeholder" type="text" name="saldo" placeholder="Saldo" >
                    </label>
                    <button class="btn btn-second">sign up</button>        
                </form>
            </div><!-- second column -->
        </div><!-- first content -->
        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Não tem conta !!</h2>
                <p class="description description-primary">Click aqui e faça ja seu cadastro</p>
                <button id="signup" class="btn btn-primary">sign up</button>
            </div>
            <div class="second-column">
                <h2 class="title title-second">Faça ja seu investimento</h2>
                <p class="description description-second">Adicione seus dados</p>
                <form class="form" method="post" action="login.php">
                    <label class="label-input" for="">
                        <input class="placeholder" type="text" name="nome" placeholder="nome" >
                    </label>
                    <label class="label-input" for="">
                        <input class="placeholder" type="password" name="senha" placeholder="Password" >
                    </label>
                    <button class="btn btn-second">sign in</button>
                </form>
            </div><!-- second column -->
        </div><!-- second-content -->
    </div>
    <script src="app.js"></script>
</body>
</html>