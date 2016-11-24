<?php
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/objetos/usuario.php";

class ModelUsuario {

    public static $instance;
    public static $table = "usuario";

    public static function  getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ModelUsuario();

        return self::$instance;
    }

    public static function inserir(Usuario $objeto) {
        try {
            $query = "INSERT INTO ".self::$table." (
                nome,
                email,
                senha,
                perfil,
                site,
                biografia,
                telefone,
                foto,
                data_gerado
                ) VALUES (
                :nome,
                :email,
                :senha,
                :perfil,
                :site,
                :biografia,
                :telefone,
                :foto,
                :data_gerado
                )";


            $sql = Conexao::getInstance()->prepare($query);

            $sql->bindValue(":nome", $objeto->getnome());
            $sql->bindValue(":email", $objeto->getemail());
            $sql->bindValue(":senha", md5($objeto->getsenha()));
            $sql->bindValue(":perfil", $objeto->getperfil());
            $sql->bindValue(":site", $objeto->getsite());
            $sql->bindValue(":biografia", $objeto->getbiografia());
            $sql->bindValue(":telefone", $objeto->gettelefone());
            $sql->bindValue(":foto", $objeto->getfoto());
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
        $objeto = new Usuario;
        $objeto->setid($row['id']);
        $objeto->setnome($row['nome']);
        $objeto->setemail($row['email']);
        $objeto->setsenha($row['senha']);
        $objeto->setperfil($row['perfil']);
        $objeto->setsite($row['site']);
        $objeto->setbiografia($row['biografia']);
        $objeto->settelefone($row['telefone']);
        $objeto->setfoto($row['foto']);
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

    public static function update(Usuario $classe) {
        try {
            $sql = "UPDATE ".self::$table." set
                nome = :nome,
                email = :email,
                perfil = :perfil,
                site = :site,
                biografia = :biografia,
                telefone = :telefone,
                foto = :foto
                WHERE id = :id";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":id", $classe->getid());
            $p_sql->bindValue(":nome", $classe->getnome());
            $p_sql->bindValue(":email", $classe->getemail());
            $p_sql->bindValue(":perfil", $classe->getperfil());
            $p_sql->bindValue(":site", $classe->getsite());
            $p_sql->bindValue(":biografia", $classe->getbiografia());
            $p_sql->bindValue(":telefone", $classe->gettelefone());
            $p_sql->bindValue(":foto", $classe->getfoto());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
    }

    public static function login($email, $senha){
        $senha = md5($senha);
        $sql = self::where("WHERE email = '$email' AND senha = '$senha' LIMIT 1");
        if(count($sql)>0){
            return $sql[0];
        }else{
            return false;
        }
    }
}
?>
