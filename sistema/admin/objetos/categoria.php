<?
class Categoria {

    private $id;
    private $nome;
    private $ativo;

    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }
    public function getnome(){
        return $this->nome;
    }
    public function setnome($nome){
        $this->nome = $nome;
    }
    public function getativo(){
        return $this->ativo;
    }
    public function setativo($ativo){
        $this->ativo = $ativo;
    }
   


}
?>