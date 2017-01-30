<?
class Prospecto {

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $cidade;
    private $acesso;

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

    public function getemail(){
      return $this->email;
    }
    public function setemail($email){
      $this->email = $email;
    }

    public function gettelefone(){
      return $this->telefone;
    }
    public function settelefone($telefone){
      $this->telefone = $telefone;
    }

    public function getcidade(){
      return $this->cidade;
    }
    public function setcidade($cidade){
      $this->cidade = $cidade;
    }

    public function getacesso(){
      return $this->acesso;
    }
    public function setacesso($acesso){
      $this->acesso = $acesso;
    }



}
?>
