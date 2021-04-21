<?php
//Painel de cadastro, edição, exclução e listado dos medicos
//require '../includes/conexion.php';
require "./model/medicoModel.php";
$medicoModel = new medicoModel();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include "../includes/css.php"; ?>
    <base href="../">
    <title>Painel medico</title>
</head>

<body class="bg-light">
    <?php include "../navbar.php"; ?>
    <div class="container">
        <div class="row">
            <h2 class="mx-auto">Medico</h2>
        </div>
        <div class="row">
            <div class="col-8 offset-2 border">
                <form action="medico/controller/medicoController.php" method="post">
                    <div class="form-group">
                        <label for="nome">Nome medico</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="crm">CRM</label>
                        <input type="text" class="form-control" name="crm" id="crm">
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone">
                    </div>
                    <div class="form-group">
                        <label for="especialidade1">Especialidade 1</label>
                        <select name="especialidade1" id="especialidade1" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="especialidade2">Especialidade 2</label>
                        <select name="especialidade2" id="especialidade2" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
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
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Especialidade 1</th>
                            <th>Especialidade 2</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result=$medicoModel->getDadosMedico();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td><?= $row["idMedico"]; ?></td>
                                    <td><?= $row["nome"]; ?></td>
                                    <td><?= $row["telefone"]; ?></td>
                                    <td><?= $row["especialidade1"]; ?></td>
                                    <td><?= $row["especialidade2"]; ?></td>
                                    <td>


                                        <button data-id-medico="<?= $row["idMedico"]; ?>" data-nome-medico="<?= $row["nome"]; ?>" data-telefone="<?= $row["telefone"]; ?>"  class="btn btn-warning btnAlterar" data-toggle="modal" data-target="#modalAlterar">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>

                                    </td>
                                    <td>
                                        <form action="medico/controller/medicoController.php" method="post">
                                            <input type="hidden" name="id_medico" value="<?php echo $row["idMedico"]; ?>">
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
                    <h5 class="modal-title">Alterar Medico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="medico/controller/medicoController.php" method="post">
                        <div class="form-group">
                            <label for="idMedicoUpdate">id medico</label>
                            <input type="text" class="form-control" id="idMedicoUpdate" disabled>
                            <input type="hidden" class="form-control" name="idMedicoUpdate" id="idMedicoUpdateHidden">
                        </div>
                        <div class="form-group">
                            <label for="nomeUpdate">Nome medico</label>
                            <input type="text" class="form-control" name="nomeUpdate" id="nomeUpdate">
                        </div>
                        <div class="form-group">
                            <label for="crmUpdate">CRM</label>
                            <input type="text" class="form-control" name="crmUpdate" id="crmUpdate">
                        </div>
                        <div class="form-group">
                            <label for="telefoneUpdate">Telefone</label>
                            <input type="number" class="form-control" name="telefoneUpdate" id="telefoneUpdate">
                        </div>
                        <div class="form-group">
                        <label for="especialidade1">Especialidade 1</label>
                        <select name="especialidade1" id="especialidade1" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="especialidade2">Especialidade 2</label>
                        <select name="especialidade2" id="especialidade2" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
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
            console.log("Valor medico: " + $(this).attr("data-id-medico"));
            $("#idMedicoUpdate").val($(this).attr("data-id-medico"));
            $("#idMedicoUpdateHidden").val($(this).attr("data-id-medico"));
            $("#nomeUpdate").val($(this).attr("data-nome-medico"));
            $("#telefoneUpdate").val($(this).attr("data-telefone"));
        })
    </script>
</body>

</html>