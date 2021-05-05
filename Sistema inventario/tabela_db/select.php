<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select</title>
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

    //Realizar consulta(select * from 'alunos')
    $consulta = 'SELECT * FROM aluno';
    $resposta = mysqli_query($conn, $consulta);

    //verificar se tem algum erro na consulta
    if($resposta){
        echo "<p>Consulta: ".$consulta."</p>";
        echo "<p>Quantidade de linhas retornadas:".mysqli_num_rows($resposta)."</p>";
        
        //Exibindo o resultado da consulta
        while($linha = mysqli_fetch_array($resposta)){
        echo "<p>ID: ".$linha['pk_aluno'].", ";
        echo "Nome: ".$linha['nome'].", ";
        echo "Data de nascimento: ".$linha['datanascimento']."</p>";
        echo "<hr>";
        }
    }else{
        echo "<p>Ocorreu um erro na consulta: ".mysqli_error($conn)."</p>";
    }
    //Fecha a conexão
    mysqli_close($conn);

    echo "</h1></div>";

    ?>
</body>
</html>