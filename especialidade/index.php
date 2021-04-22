<?php

require "./model/especialidadeModel.php";
$especialidadeModel = new especialidadeModel();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "../includes/css.php"; ?>
    <base href="../">
    <title>Painel especialidade</title>
</head>

<body class="bg-light">
    <?php include "../navbar.php"; ?>
    <div class="container">
        <div class="row">
            <h2 class="mx-auto my-1">Especialidade</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2 border">
                <form action="especialidade/controller/especialidadeController.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome especialidade</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>
                    <input type="hidden" name="transacao" value="insert" >
                    <button type="submit" class="btn btn-warning d-flex justify-content-center">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1 border">
                <table class="table table-striped table-hover table-light">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Especialidade</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result=$especialidadeModel->getDadosEspecialidade();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $row["idEspecialidade"]; ?></td>
                                    <td><?= $row["nomeEspecialidade"]; ?></td>
                                    <td>


                                        <button data-id-especialidade="<?= $row["idEspecialidade"]; ?>" data-nome-especialidade="<?= $row["nomeEspecialidade"]; ?>" class="btn btn-warning btnAlterar" data-toggle="modal" data-target="#modalAlterar">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>

                                    </td>
                                    <td>
                                        <form action="especialidade/controller/especialidadeController.php" method="post">
                                            <input type="hidden" name="id_especialidade" value="<?php echo $row["idEspecialidade"]; ?>">
                                            <input type="hidden" name="transacao" value="delete" >
                                            <button class="btn btn-danger">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalAlterar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alterar Especialidade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="especialidade/controller/especialidadeController.php" method="post">
                        <div class="form-group">
                            <label for="idEspecialidadeUpdate">id especialidade</label>
                            <input type="text" class="form-control" id="idEspecialidadeUpdate" disabled>
                            <input type="hidden" class="form-control" name="idEspecialidadeUpdate" id="idEspecialidadeUpdateHidden">
                        </div>
                        <div class="form-group">
                            <label for="nomeUpdate">Nome especialidade</label>
                            <input type="text" class="form-control" name="nomeUpdate" id="nomeUpdate">
                        </div>
                        <input type="hidden" name="transacao" value="update" >
                        <button type="submit" class="btn btn-warning d-flex justify-content-center">Guardar</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php include "../Includes/script.php"; ?>

    <script>
        $(".btnAlterar").click(function() {
            console.log("Valor especialidade: " + $(this).attr("data-id-especialidade"));
            $("#idEspecialidadeUpdate").val($(this).attr("data-id-especialidade"));
            $("#idEspecialidadeUpdateHidden").val($(this).attr("data-id-especialidade"));
            $("#nomeUpdate").val($(this).attr("data-nome-especialidade"));
        })
    </script>
</body>

</html>