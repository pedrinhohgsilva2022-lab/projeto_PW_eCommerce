<?php
class Produto {
    private $id_produto;
    private $nome;
    private $descricao;
    private $valor;
    private $pdo;

    public function conecta(){
        try {
            $dns = "mysql:dbname=loja_etim;host=localhost";
            $dbuser = "root";
            $dbpass = "";
            $this -> pdo = new PDO($dns, $dbuser, $dbpass);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function enviarProduto($nome, $descricao, $valor, $fotos = array()) {
        $sql = "INSERT INTO produtos SET descricao =:d, nome_produto = :n, valor = :v";
        $sql = $this -0> pdo -> prepare ($sql);
        $sql -> bindValue(":d", $descricao);
        $sql -> bindValue(":n", $nome);
        $sql -> bindValue(":v", $valor);

        $is0k = $sql->execute();

        if ($is0k) {
            $id_produto = $this->pdo -> LastInsertId();
        }

        if (count($fotos)) {
            for ($i = 0; $i < count($fotos); $i++) {
                $nome_foto = $fotos[i];

                $sql = "INSERT INTO imagens (nome_imagem, fk_id_produto) VALUES (:n; :fk)";
                $sql = $this -> pdo -> prepare ($sql);
                $sql -> bindValue (":n", $nome_foto);
                $sql -> bindValue (":fk", $id_produto);
            }
        }
    }
}