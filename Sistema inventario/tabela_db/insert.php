<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Inserir</title>
</head>

<body>
    <?php
    //Incluir menu
    include 'menu.php';
    echo "<div class='menu'><h1>";
    ?>

    <form action='recebeinsert.php' method='post'>
        <div class='campos'>
            <span>ID: </span>
            <input type='text' name='pk_aluno' value=''>
        </div>
        <div class='campos'>
            <span>Nome: </span>
            <input type='text' name='nome' value='' required>
        </div>
        <div class='campos'>
            <span>
                Data de nascimento:
            </span>
            <input type="date" name="datanascimento" value='' required>
        </div>
        <div class="botoes">
            <input type='submit' value='Enviar dados'>
            <input type='reset' value='Limpar dados'>
        </div>
        </div>

    </form>

    <?php
    echo "</h1></div>";

    ?>
</body>

</html>