<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/imovel_foto.php";

class ModelImovelFoto {

    public static $instance;
    public static $table = "imovel_foto";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelImovelFoto();

        return self::$instance;
    }

    public static function inserir(ImovelFoto $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (		
                id_imovel,
                imagem,
                titulo,
                destaque,
                data_gerado
                ) VALUES (
                :id_imovel,
                :imagem,
                :titulo,
                :destaque,
                :data_gerado
                )";

            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":id_imovel", $objeto->getid_imovel());
            $sql->bindValue(":imagem", $objeto->getimagem());
            $sql->bindValue(":titulo", $objeto->gettitulo());
            $sql->bindValue(":destaque", $objeto->getdestaque());
            $sql->bindValue(":data_gerado", date("Y-m-d H:i:s"));

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
        $objeto = new ImovelFoto;
        $objeto->setid($row['id']);
        $objeto->setid_imovel($row['id_imovel']);
        $objeto->setimagem($row['imagem']);
        $objeto->settitulo($row['titulo']);
        $objeto->setdestaque($row['destaque']);
        $objeto->setdata_gerado($row['data_gerado']);

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

}
?>