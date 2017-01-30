<?
class Interesse {

    private $id;
    private $id_prospecto;
    private $chave;
    private $valor;
    private $datagerado;

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }

    public function getid_prospecto(){
      return $this->id_prospecto;
    }
    public function setid_prospecto($id_prospecto){
      $this->id_prospecto = $id_prospecto;
    }

    public function getchave(){
      return $this->chave;
    }
    public function setchave($chave){
      $this->chave = $chave;
    }

    public function getvalor(){
      return $this->valor;
    }
    public function setvalor($valor){
      $this->valor = $valor;
    }

    public function getdatagerado(){
      return $this->datagerado;
    }
    public function setdatagerado($datagerado){
      $this->datagerado = $datagerado;
    }

}
