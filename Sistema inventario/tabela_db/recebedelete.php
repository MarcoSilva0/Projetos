<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe delete</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    //Incluir menu
    include 'menu.php';

    //pegar o ID e enviar
    echo "<div class='menu'>";
    $id = $_GET['id'];
    //echo "<p>Id enviado: ".$id." </p>";

    //realizar a conexão com DB
    //fazer a conexão com o banco de dados
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'escola';

    $conn = mysqli_connect($server, $user, $password, $bd);

    //Testar conexão
    if (mysqli_connect_errno()) {
        echo "<p> Ocorreu um erro na conexão: " . mysqli_connect($conn) . "</p><br>";
    } else {
        //echo "<p> Conexão realizada com sucesso!</p>";
        //fazer a consulta
        $consulta = "SELECT * FROM aluno WHERE pk_aluno = " . $id;
        //echo "<p> Consulta: " . $consulta . "</p><br>";
        $resposta = mysqli_query($conn, $consulta);

        //verificar se a consulta foi verificada
        if ($consulta) {
            //Consulta feita com sucesso
            //echo "<p>Consulta feita com sucesso.</P><br>";
            $linha = mysqli_fetch_array($resposta);
           
            echo "<p>ID: ".$linha['pk_aluno'].", ";
            echo "Nome: ".$linha['nome'].", ";
            echo "Data de nascimento: ".$linha['datanascimento']."</p>";
            
    ?>
    
            <form action='update.php' method='post'>
                <input type='hidden' name='pk_aluno' value='<?php echo $linha['pk_aluno'] ?>'>
                <div class="botoes">
                    <input type='submit' value='Enviar dados'>
                    <input type='reset' value='Limpar dados'>
                </div>
                </div>
            </form>
    <?php
        } else {
            echo "<p>Ocorreu um erro na consulta" . mysqli_error($conn) . "</p>";
        }
    }
    echo "</div>";

    ?>
</body>

</html>