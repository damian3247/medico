<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/css.php"; ?>
    <title>Escolher Cadastro</title>
</head>

<body class="bg-dark">
    <?php include "navbar.php"; ?>
    <div class="container ">
        <div class="row">
            <h1 class="text-light mx-auto">CADASTROS</h1>
        </div>
        <hr class="text-light">
        <div class="row">
            <div class="col-4 offset-2 border p-1 text-center">
                <a class="btn btn-info " href="medico/index.php">Cadastrar Médico</a>
            </div>
            <div class="col-4  border p-1 text-center">
                <a class="btn btn-info " href="especialidade/index.php">Cadastrar Especialidade</a>
            </div>
        </div>
    </div>
</body>
<?php include "includes/script.php"; ?>

</html>