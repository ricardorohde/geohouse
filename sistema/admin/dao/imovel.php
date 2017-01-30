<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/imovel.php";

class ModelImovel {

    public static $instance;
    public static $table = "imovel";

    private function  __construct() {

    }

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelImovel();

        return self::$instance;
    }

    public static function inserir(Imovel $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                hash,
                id_categoria,
                id_usuario,
                nome,
                descricao,
                video,
                mapa,
                valor,
                destaque,
                ativo,
                data_gerado,
                id_tipo_imovel,
                id_finalidade,
                id_cidade,
                dormitorios,
                suites,
                cond_fechado,
                area_util,
                area_total,
                vagas
                ) VALUES (
                :hash,
                :id_categoria,
                :id_usuario,
                :nome,
                :descricao,
                :video,
                :mapa,
                :valor,
                :destaque,
                :ativo,
                :data_gerado,
                :id_tipo_imovel,
                :id_finalidade,
                :id_cidade,
                :dormitorios,
                :suites,
                :cond_fechado,
                :area_util,
                :area_total,
                :vagas
                )";


            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":hash", $objeto->gethash());
            $sql->bindValue(":id_categoria", $objeto->getid_categoria());
            $sql->bindValue(":id_usuario", $objeto->getid_usuario());
            $sql->bindValue(":nome", $objeto->getnome());
            $sql->bindValue(":descricao", $objeto->getdescricao());
            $sql->bindValue(":video", $objeto->getvideo());
            $sql->bindValue(":mapa", $objeto->getmapa());
            $sql->bindValue(":valor", $objeto->getvalor());
            $sql->bindValue(":destaque", $objeto->getdestaque());
            $sql->bindValue(":ativo", 1);
            $sql->bindValue(":data_gerado", date('Y-m-d H:i:s'));
            $sql->bindValue(":id_tipo_imovel", $objeto->getid_tipo_imovel());
            $sql->bindValue(":id_finalidade", $objeto->getid_finalidade());
            $sql->bindValue(":id_cidade", $objeto->getid_cidade());
            $sql->bindValue(":dormitorios", $objeto->getdormitorios());
            $sql->bindValue(":suites", $objeto->getsuites());
            $sql->bindValue(":cond_fechado", $objeto->getcond_fechado());
            $sql->bindValue(":area_util", $objeto->getarea_util());
            $sql->bindValue(":area_total", $objeto->getarea_total());
            $sql->bindValue(":vagas", $objeto->getvagas());

            return $sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde. |".$e->getMessage();
        }
    }

    public static function remover($id) {
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
        $objeto = new Imovel;
        $objeto->setid($row['id']);
        $objeto->sethash($row['hash']);
        $objeto->setid_categoria($row['id_categoria']);
        $objeto->setid_usuario($row['id_usuario']);
        $objeto->setnome($row['nome']);
        $objeto->setdescricao($row['descricao']);
        $objeto->setvideo($row['video']);
        $objeto->setmapa($row['mapa']);
        $objeto->setvalor($row['valor']);
        $objeto->setdestaque($row['destaque']);
        $objeto->setativo($row['ativo']);
        $objeto->setdata_gerado($row['data_gerado']);
        $objeto->setid_tipo_imovel($row['id_tipo_imovel']);
        $objeto->setid_finalidade($row['id_finalidade']);
        $objeto->setid_cidade($row['id_cidade']);
        $objeto->setdormitorios($row['dormitorios']);
        $objeto->setsuites($row['suites']);
        $objeto->setcond_fechado($row['cond_fechado']);
        $objeto->setarea_util($row['area_util']);
        $objeto->setarea_total($row['area_total']);
        $objeto->setvagas($row['vagas']);

        return $objeto;
    }

    public static function  where($query) {
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

    public static function update(Imovel $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                hash = :hash,
                id_categoria = :id_categoria,
                id_usuario = :id_usuario,
                nome = :nome,
                descricao = :descricao,
                video = :video,
                mapa = :mapa,
                valor = :valor,
                destaque = :destaque,
                ativo = :ativo,
                data_gerado = :data_gerado,
                id_tipo_imovel = :id_tipo_imovel,
                id_finalidade = :id_finalidade,
                id_cidade = :id_cidade,
                dormitorios = :dormitorios,
                suites = :suites,
                cond_fechado = :cond_fechado,
                area_util = :area_util,
                area_total = :area_total,
                vagas = :vagas
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":hash", $classe->gethash());
            $p_sql->bindValue(":id_categoria", $classe->getid_categoria());
            $p_sql->bindValue(":id_usuario", $classe->getid_usuario());
            $p_sql->bindValue(":nome", $classe->getnome());
            $p_sql->bindValue(":descricao", $classe->getdescricao());
            $p_sql->bindValue(":video", $classe->getvideo());
            $p_sql->bindValue(":mapa", $classe->getmapa());
            $p_sql->bindValue(":valor", $classe->getvalor());
            $p_sql->bindValue(":destaque", $classe->getdestaque());
            $p_sql->bindValue(":ativo", $classe->getativo());
            $p_sql->bindValue(":data_gerado", $classe->getdata_gerado());
            $p_sql->bindValue(":id_tipo_imovel", $classe->getid_tipo_imovel());
            $p_sql->bindValue(":id_finalidade", $classe->getid_finalidade());
            $p_sql->bindValue(":id_cidade", $classe->getid_cidade());
            $p_sql->bindValue(":dormitorios", $classe->getdormitorios());
            $p_sql->bindValue(":suites", $classe->getsuites());
            $p_sql->bindValue(":cond_fechado", $classe->getcond_fechado());
            $p_sql->bindValue(":area_util", $classe->getarea_util());
            $p_sql->bindValue(":area_total", $classe->getarea_total());
            $p_sql->bindValue(":vagas", $classe->getvagas());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }
}
?>
