<?
class ImovelFoto {

    private $id;
    private $id_imovel;
    private $imagem;
    private $titulo;
    private $destaque;
    private $data_gerado;

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }
    public function getid_imovel(){
        return $this->id_imovel;
    }
    public function setid_imovel($id_imovel){
        $this->id_imovel = $id_imovel;
    }
    public function getimagem(){
        return $this->imagem;
    }
    public function setimagem($imagem){
        $this->imagem = $imagem;
    }
    public function gettitulo(){
        return $this->titulo;
    }
    public function settitulo($titulo){
        $this->titulo = $titulo;
    }
    public function getdestaque(){
        return $this->destaque;
    }
    public function setdestaque($destaque){
        $this->destaque = $destaque;
    }
    public function getdata_gerado(){
        return $this->data_gerado;
    }
    public function setdata_gerado($data_gerado){
        $this->data_gerado = $data_gerado;
    }

}
?>