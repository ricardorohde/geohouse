<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/pagina.php";

class ModelPagina {

    public static $instance;
    public static $table = "pagina";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelPagina();

        return self::$instance;
    }

    public static function inserir(Pagina $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                titulo,
                texto
                ) VALUES (
                :titulo,
                :texto
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":titulo", $objeto->gettitulo());
            $sql->bindValue(":texto", $objeto->gettexto());

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
        $objeto = new Pagina;
        $objeto->setid($row['id']);
        $objeto->settitulo($row['titulo']);
        $objeto->settexto($row['texto']);

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

    public static function update(Pagina $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                titulo = :titulo,
                texto = :texto
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":titulo", $classe->gettitulo());
            $p_sql->bindValue(":texto", $classe->gettexto());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>
