<?php


class especialidadeModel
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;


    function __construct()
    {
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

    function getDadosEspecialidade()
    {
        $query = "SELECT * FROM especialidade";

        $resultado = $this->conn->query($query);

        $this->conn->close();

        return $resultado;
    }

    function insertEspecialidade($nomeEspecialidade)
    {
        $query = " INSERT INTO `especialidade`
                (
                `nomeEspecialidade`
                )
                VALUES
                (
                    '{$nomeEspecialidade}'
                )
                ";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }

    function updateEspecialidade($idEspecialidade, $nomeEspecialidade)
    {
        $query = " UPDATE `especialidade`
                    SET
                    `nomeEspecialidade` = '{$nomeEspecialidade}'
                    WHERE 
                    `idEspecialidade` = {$idEspecialidade};
        
                ";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }

    function deleteEspecialidade($idEspecialidade)
    {
        $query = " DELETE FROM especialidade where idEspecialidade={$idEspecialidade}";

        if ($this->conn->query($query)) {
            header("location:../index.php");
        } else {
            return "problema com a query: " . $query;
        }
        $this->conn->close();
    }
}
