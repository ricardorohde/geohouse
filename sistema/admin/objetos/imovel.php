<?
class Imovel {

    private $id;
    private $hash;
    private $id_categoria;
    private $id_usuario;
    private $nome;
    private $descricao;
    private $video;
    private $mapa;
    private $valor;
    private $destaque;
    private $ativo;
    private $data_gerado;
    private $id_tipo_imovel;
    private $id_finalidade;
    private $id_cidade;
    private $dormitorios;
    private $suites;
    private $cond_fechado;
    private $area_util;
    private $area_total;
    private $vagas;

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }
    public function gethash(){
        return $this->hash;
    }
    public function sethash($hash){
        $this->hash = $hash;
    }
    public function getid_categoria(){
        return $this->id_categoria;
    }
    public function setid_categoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }
    public function getid_usuario(){
        return $this->id_usuario;
    }
    public function setid_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    public function getnome(){
        return $this->nome;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }
    public function getdescricao(){
        return $this->descricao;
    }
    public function setdescricao($descricao){
        $this->descricao = $descricao;
    }
    public function getvideo(){
        return $this->video;
    }
    public function setvideo($video){
        $this->video = $video;
    }
    public function getmapa(){
        return $this->mapa;
    }
    public function setmapa($mapa){
        $this->mapa = $mapa;
    }
    public function getvalor(){
        return $this->valor;
    }
    public function setvalor($valor){
        $this->valor = $valor;
    }
    public function getdestaque(){
        return $this->destaque;
    }
    public function setdestaque($destaque){
        $this->destaque = $destaque;
    }
    public function getativo(){
        return $this->ativo;
    }
    public function setativo($ativo){
        $this->ativo = $ativo;
    }
    public function getdata_gerado(){
        return $this->data_gerado;
    }
    public function setdata_gerado($data_gerado){
        $this->data_gerado = $data_gerado;
    }
    public function getid_tipo_imovel(){
        return $this->id_tipo_imovel;
    }
    public function setid_tipo_imovel($id_tipo_imovel){
        $this->id_tipo_imovel = $id_tipo_imovel;
    }
    public function getid_finalidade(){
        return $this->id_finalidade;
    }
    public function setid_finalidade($id_finalidade){
        $this->id_finalidade = $id_finalidade;
    }
    public function getid_cidade(){
        return $this->id_cidade;
    }
    public function setid_cidade($id_cidade){
        $this->id_cidade = $id_cidade;
    }
    public function getdormitorios(){
        return $this->dormitorios;
    }
    public function setdormitorios($dormitorios){
        $this->dormitorios = $dormitorios;
    }
    public function getsuites(){
        return $this->suites;
    }
    public function setsuites($suites){
        $this->suites = $suites;
    }
    public function getcond_fechado(){
        return $this->cond_fechado;
    }
    public function setcond_fechado($cond_fechado){
        $this->cond_fechado = $cond_fechado;
    }
    public function getarea_util(){
        return $this->area_util;
    }
    public function setarea_util($area_util){
        $this->area_util = $area_util;
    }
    public function getarea_total(){
        return $this->area_total;
    }
    public function setarea_total($area_total){
        $this->area_total = $area_total;
    }
    public function getvagas(){
        return $this->vagas;
    }
    public function setvagas($vagas){
        $this->vagas = $vagas;
    }


}
?>
