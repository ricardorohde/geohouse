<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/prospecto.php";

class ModelProspecto {

    public static $instance;
    public static $table = "prospectos";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelProspecto();

        return self::$instance;
    }

    public static function inserir(Prospecto $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                  nome,
                  email,
                  telefone,
                  cidade,
                  acesso
                ) VALUES (
                  :nome,
                  :email,
                  :telefone,
                  :cidade,
                  :acesso
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":nome", $objeto->getnome());
            $sql->bindValue(":email", $objeto->getemail());
            $sql->bindValue(":telefone", $objeto->gettelefone());
            $sql->bindValue(":cidade", $objeto->getcidade());
            $sql->bindValue(":acesso", $objeto->getacesso());

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
        $objeto = new Prospecto;
        $objeto->setid($row['id']);
        $objeto->setnome($row['nome']);
        $objeto->setemail($row['email']);
        $objeto->settelefone($row['telefone']);
        $objeto->setcidade($row['cidade']);
        $objeto->setacesso($row['acesso']);

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

    public static function update(Prospecto $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                nome = :nome,
                email = :email,
                telefone = :telefone,
                cidade = :cidade,
                acesso = :acesso
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":nome", $classe->getnome());
            $p_sql->bindValue(":email", $classe->getemail());
            $p_sql->bindValue(":telefone", $classe->gettelefone());
            $p_sql->bindValue(":cidade", $classe->getcidade());
            $p_sql->bindValue(":acesso", $classe->getacesso());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>
