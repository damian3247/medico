<?php
require "../model/especialidadeModel.php";

$especialidadeModel = new especialidadeModel();
switch ($_POST['transacao']) {
    case 'insert':
        echo $especialidadeModel->insertEspecialidade($_POST['nome']);
        break;
    case 'update':
        echo $especialidadeModel->updateEspecialidade($_POST['idEspecialidadeUpdate'], $_POST['nomeUpdate']);
        break;
    case 'delete':
        echo $especialidadeModel->deleteEspecialidade($_POST['id_especialidade']);
        break;
    default:
        # code...
        break;
}
