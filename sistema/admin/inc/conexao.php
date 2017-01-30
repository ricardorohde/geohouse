<?php

class Conexao {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=geohouse', 'root', 'thithithi', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }

}


function SobeImagem($nomeimg, $nomeimg_temp, $pasta){
    $imagem         = $nomeimg;         //$_FILES['txtimagem']['name'];
    $imgtemp        = $nomeimg_temp;    //$_FILES['txtimagem']['tmp_name'];

    $file_info = pathinfo($imagem);
    $novonome = md5($imagem . date('G:i:s')) .'.'. $file_info['extension'];
    $destino = $pasta . $novonome;

    if(move_uploaded_file($imgtemp, $destino)){
        chmod($destino, 0755);
        return $novonome;
    }else{
        return null;
    }

}

function RemoveImagem($imagem, $pasta){
    if(file_exists($pasta.$imagem)){
        $remove = unlink($pasta.$imagem);
        if($remove>0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

// classes
define("ROOT_URL", "/geohouse/sistema");
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/imovel.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/imovel_foto.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/categoria.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/cidade.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/finalidade.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/tipo_imovel.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/usuario.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/config.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/prospecto.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/interesse.php";
require_once $_SERVER["DOCUMENT_ROOT"].ROOT_URL."/admin/dao/pagina.php";

$acao = (isset($_GET['acao']))?$_GET['acao']:'';

?>
