<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
    //incluir o menu
    include 'menu.php';
    echo "<div class='menu'>";
    $pk_aluno = $_POST['pk_aluno'];
    $nome = $_POST['nome'];
    $datanascimento = $_POST['datanascimento'];

    //echo "<p>".$pk_aluno."</p>";
    //echo "<p>".$nome."</p>";
    //echo "<p>".$datanascimento."</p>";

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
        //echo "<p> Conexão realizada com sucesso!</p>";
        //Criar a query
        //sintaxa do update: UPDATE `aluno` SET `pk_aluno`=[value-1],`nome`=[value-2],`datanascimento`=[value-3] WHERE 1
        $consulta = "UPDATE aluno SET nome='".$nome."', datanascimento='".$datanascimento."' WHERE pk_aluno =".$pk_aluno;

        //echo "<p>Consulta: ".$consulta."</p>";

        // Executar a consulta
        $reposta = mysqli_query($conn, $consulta);

        //verificar se a consulta foi realizada
        if($consulta){
            echo "<p>Consulta realizadas com sucesso.</p>";
            echo "<p>Linhas afetadas: ".mysqli_affected_rows($conn)."</p>";
        }else{
            echo "<p>Ocorreu um erro na consulta: ".mysqli_error($conn)."</p>";
        }
        
    }
    echo "</div>";
    ?>
</body>
</html>