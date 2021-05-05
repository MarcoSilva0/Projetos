<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    //Incluir menu
    include 'menu.php';

    echo "<div class='menu'><h1>";
    //Fazer conexão
    $conn = mysqli_connect($HOST = '127.0.0.1', $USER = 'root', $PASSWORD = '', $BD = 'escola');

    //Teste de conexão
    if(mysqli_connect_errno()){
        echo "<p>Ocorreu um erro na conexão: ".mysqli_connect($conn)."</P>";
    }else{
        echo "<p> Conexão realizada com sucesso!</p>";
    };

    ?>
    <form action='alter.php' method='post'>
        <div class='campos'>
            <span>ID: </span>
            <input type='text' name='pk_aluno' value=''>
        </div>
        <div class="botoes">
            <input type='submit' value='Enviar dados'>
            <input type='reset' value='Limpar dados'>
        </div>
    </form>
    <?php

    //Fecha a conexão
    mysqli_close($conn);

    echo "</h1></div>";

    ?>
</body>
</html>