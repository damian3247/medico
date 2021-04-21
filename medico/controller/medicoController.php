<?php
require "../model/medicoModel.php";

$medicoModel=new medicoModel();
switch ($_POST['transacao']) {
    case 'insert':
        echo $medicoModel->insertMedico($_POST['nome'],$_POST['crm'],$_POST['telefone'],$_POST['especialidade1'],$_POST['especialidade2']);
        break;
    case 'update':
        echo $medicoModel->updateMedico($_POST['idMedicoUpdate'],$_POST['nomeUpdate'],$_POST['crmUpdate'],$_POST['telefoneUpdate'],$_POST['especialidade1'],$_POST['especialidade2']);
        break;
    case 'delete':
        echo $medicoModel->deleteMedico($_POST['id_medico']);
        break;
    default:
        # code...
        break;
}




