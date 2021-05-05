<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alter Individual</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    //Incluir menu
    include 'menu.php';

    //recebe o ID individual
    //verificar se a variavel pk_aluno la em cima foi definida se veio do alter individual ou nn
    if(isset($_POST['pk_aluno'])){
    $pk_aluno = $_POST['pk_aluno'];
    }else{
        //$_POST não está definido, siginifica que veio direto da home
    }

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
    if(isset($_POST['pk_aluno'])){
        $pk_aluno = $_POST['pk_aluno'];
        $consulta = 'SELECT * FROM aluno WHERE pk_aluno = ' . $pk_aluno;
        }else{
            //$_POST não está definido, siginifica que veio direto da home
            $consulta = 'SELECT * FROM aluno';
        }

    $resposta = mysqli_query($conn, $consulta);

    //verificar se tem algum erro na consulta
    if($resposta){
        echo "<p>Consulta: ".$consulta."</p>";
        echo "<p>Quantidade de linhas retornadas:".mysqli_num_rows($resposta)."</p>";
        if(mysqli_num_rows($resposta) == 0){
            echo "<p>Não existe registo com ID =".$pk_aluno;
        }
        
        //Exibindo o resultado da consulta
        while($linha = mysqli_fetch_array($resposta)){
        echo "<p>ID: ".$linha['pk_aluno'].", ";
        echo "Nome: ".$linha['nome'].", ";
        echo "Data de nascimento: ".$linha['datanascimento'].", ";
        echo "<a href='recebealter.php?id=".$linha['pk_aluno']."'>Editar</a></p>";
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