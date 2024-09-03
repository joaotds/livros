<?php

class Conexao {

    private $conn = null;

    public function getConexao() {
        if($this->conn == null) {
            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

            $endereco = "mysql:host=localhost;dbname=db_livros";
            $usuario = "root";
            $senha = "bancodedados";

            self:$conn = new PDO($endereco, $usuario, $senha, $opcoes);
        }
        return $this->conn = new PDO($endereco, $usuario, $senha, $opcoes);
    }

    
}
