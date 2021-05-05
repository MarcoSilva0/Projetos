<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Recebe Insert</title>
</head>
<body>
<?php    
    //Incluir o menu
    include 'menu.php';
    echo "<div class='menu'>";
    $pk_aluno = $_POST['pk_aluno'];
    $nome = $_POST['nome'];
    $datanascimento = $_POST['datanascimento'];

    echo "<p>".$pk_aluno."</p>";
    echo "<p>".$nome."</p>";
    echo "<p>".$datanascimento."</p>";

    //fazer a conexão com o banco de dados
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'escola';

    $conn = mysqli_connect($server, $user, $password, $bd);

    //Testar conexão
    if(mysqli_connect_errno()){
        echo "<p>Ocorreu um erro na conexão: ".mysqli_connect($conn)."</p>";
    }else{
        echo "<p> Conexão realizada com sucesso!</p>";

        //Criar a query de insert
        //insert into nome-da-tabela values (valor1, valor2 valor3)
        $consulta = "INSERT INTO aluno VALUE ($pk_aluno,'$nome','$datanascimento')";
        // o .= é uma concatenação pq se nn iria ficar muito grande a de cima então dividi em partes
        //$consulta .= $pk_aluno.",";
        //$consulta .= "'".$nome."',";
        //$consulta .= $datanascimento."')";

        

        //executar query
        $resposta = mysqli_query($conn, $consulta);

        //conferir se a consulta (query) deu certo
        if($resposta){
            echo "<p>A consulta foi realizada com sucesso</p>";
            echo "<p>Consulta: ".$consulta."</p>";
        }else{
            echo "<p>Ocorreu um erro na consulta: ".mysqli_error($conn)."</p>";
        };
        
    };


    echo "</div>"
?>
</body>
</html>