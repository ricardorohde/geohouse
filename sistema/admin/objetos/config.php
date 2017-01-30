<?
class Config {

    private $id;
    private $nome_loja;
    private $cor_primaria;
    private $cor_secundaria;
    private $logo;

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }

    public function getnome_loja(){
      return $this->nome_loja;
    }
    public function setnome_loja($nome_loja){
      $this->nome_loja = $nome_loja;
    }

    public function getcor_primaria(){
      return $this->cor_primaria;
    }
    public function setcor_primaria($cor_primaria){
      $this->cor_primaria = $cor_primaria;
    }

    public function getcor_secundaria(){
      return $this->cor_secundaria;
    }
    public function setcor_secundaria($cor_secundaria){
      $this->cor_secundaria = $cor_secundaria;
    }

    public function getlogo(){
      return $this->logo;
    }
    public function setlogo($logo){
      $this->logo = $logo;
    }


}
?>
