<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/finalidade.php";

class ModelFinalidade {

    public static $instance;
    public static $table = "finalidade";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelFinalidade();

        return self::$instance;
    }

    public static function inserir(Finalidade $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (		
                nome
                ) VALUES (
                :nome
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":nome", $objeto->getnome());

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

    private static function  popula($row) {
        $objeto = new Finalidade;
        $objeto->setid($row['id']);
        $objeto->setnome($row['nome']);

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

    private static function  populaTodos($row) {
        $array = array();
        foreach ($row as $key) {
            $array[] = self::popula($key);
        }
        return $array;
    }

    public static function update(Finalidade $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                nome = :nome
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":nome", $classe->getnome());
            
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>