<?
class Pagina {
  private $id;
  private $titulo;
  private $texto;

  public function getid(){
      return $this->id;
  }
  public function setid($id){
      $this->id = $id;
  }

  public function gettitulo(){
    return $this->titulo;
  }
  public function settitulo($titulo){
    $this->titulo = $titulo;
  }
  
  public function gettexto(){
    return $this->texto;
  }
  public function settexto($texto){
    $this->texto = $texto;
  }

}
