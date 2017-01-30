<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/interesse.php";

class ModelInteresse {

    public static $instance;
    public static $table = "interesse";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelInteresse();

        return self::$instance;
    }

    public static function inserir(Interesse $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                  id_prospecto,
                  chave,
                  valor,
                  datagerado
                ) VALUES (
                  :id_prospecto,
                  :chave,
                  :valor,
                  :datagerado
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":id_prospecto", $objeto->getid_prospecto());
            $sql->bindValue(":chave", $objeto->getchave());
            $sql->bindValue(":valor", $objeto->getvalor());
            $sql->bindValue(":datagerado", $objeto->getdatagerado());

            return $sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public static function delete($id) {
        try {
            $query = "DELETE FROM ".self::$table." WHERE id = :id LIMIT 1";
            $sql = Conexao::getInstance()->prepare($query);
            $sql->bindValue(":id", $id);

            return $sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    private static function popula($row) {
        $objeto = new Interesse;
        $objeto->setid($row['id']);
        $objeto->setid_prospecto($row['id_prospecto']);
        $objeto->setchave($row['chave']);
        $objeto->setvalor($row['valor']);
        $objeto->setdatagerado($row['datagerado']);

        return $objeto;
    }

    public static function where($query) {
        try {
            $sql = "SELECT * FROM ".self::$table." ".$query;
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->execute();
            return self::populaTodos($p_sql->fetchAll(PDO::FETCH_ASSOC));
        } catch (Exception $e) {

        }
    }

    private static function populaTodos($row) {
        $array = array();
        foreach ($row as $key) {
            $array[] = self::popula($key);
        }
        return $array;
    }

    public static function update(Interesse $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                  id_prospecto = :id_prospecto,
                  chave = :chave,
                  valor = :valor,
                  datagerado = :datagerado
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":id_prospecto", $classe->getid_prospecto());
            $p_sql->bindValue(":chave", $classe->getchave());
            $p_sql->bindValue(":valor", $classe->getvalor());
            $p_sql->bindValue(":datagerado", $classe->getdatagerado());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>
