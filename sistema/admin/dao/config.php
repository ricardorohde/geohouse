<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/config.php";

class ModelConfig {

    public static $instance;
    public static $table = "config";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelConfig();

        return self::$instance;
    }

    public static function inserir(Config $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                  nome_loja,
                  cor_primaria,
                  cor_secundaria,
                  logo
                ) VALUES (
                  :nome_loja,
                  :cor_primaria,
                  :cor_secundaria,
                  :logo
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":nome_loja", $objeto->getnome_loja());
            $sql->bindValue(":cor_primaria", $objeto->getcor_primaria());
            $sql->bindValue(":cor_secundaria", $objeto->getcor_secundaria());
            $sql->bindValue(":logo", $objeto->getlogo());

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
        $objeto = new Config;
        $objeto->setid($row['id']);
        $objeto->setnome_loja($row['nome_loja']);
        $objeto->setcor_primaria($row['cor_primaria']);
        $objeto->setcor_secundaria($row['cor_secundaria']);
        $objeto->setlogo($row['logo']);

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

    public static function update(Config $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                nome_loja = :nome_loja,
                cor_primaria = :cor_primaria,
                cor_secundaria = :cor_secundaria,
                logo = :logo
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":nome_loja", $classe->getnome_loja());
            $p_sql->bindValue(":cor_primaria", $classe->getcor_primaria());
            $p_sql->bindValue(":cor_secundaria", $classe->getcor_secundaria());
            $p_sql->bindValue(":logo", $classe->getlogo());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>
