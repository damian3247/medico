<?php


class medicoModel
{
    private $nome;
    private $CRM;
    private $telefone;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;


    function __construct()
    {
        $this->nome = "";
        $this->CRM = "";
        $this->telefone = "";


        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "medico";

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getDadosMedico()
    {
        $query = "SELECT * FROM medico";

        $resultado = $this->conn->query($query);

        $this->conn->close();

        return $resultado;
    }

    function insertMedico($nome, $CRM, $telefone, $especialidad1, $especialidad2)
    {
        $query = " INSERT INTO `medico`
                (
                `nome`,
                `crm`,
                `telefone`,
                `especialidade1`,
                `especialidade2`)
                VALUES
                (
                    '{$nome}',
                    '{$CRM}',
                    '{$telefone}',
                    {$especialidad1},
                    {$especialidad2}
                )
                ";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }

    function updateMedico($idMedico,$nome, $CRM, $telefone, $especialidad1, $especialidad2)
    {
        $query = " UPDATE `medico`.`medico`
                    SET
                    `nome` = '{$nome }',
                    `crm` = '{$CRM }',
                    `telefone` = '{$telefone }',
                    `especialidade1` = {$especialidad1 },
                    `especialidade2` = {$especialidad2 }
                    WHERE 
                    `idMedico` = {$idMedico};
        
                ";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }

    function deleteMedico($idMedico)
    {
        $query = " DELETE FROM medico where idMedico={$idMedico}";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }
}
