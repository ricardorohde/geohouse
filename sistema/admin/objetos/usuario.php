<?
class Usuario {

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $site;
    private $biografia;
    private $telefone;
    private $foto;
    private $perfil;
    private $data_gerado;

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

    public function getsenha(){
        return $this->senha;
    }
    public function setsenha($senha){
        $this->senha = $senha;
    }

    public function getsite(){
      return $this->site;
    }
    public function setsite($site){
      $this->site = $site;
    }

    public function getbiografia(){
      return $this->biografia;
    }
    public function setbiografia($biografia){
      $this->biografia = $biografia;
    }

    public function gettelefone(){
      return $this->telefone;
    }
    public function settelefone($telefone){
      $this->telefone = $telefone;
    }

    public function getfoto(){
      return $this->foto;
    }
    public function setfoto($foto){
      $this->foto = $foto;
    }


    public function getperfil(){
        return $this->perfil;
    }
    public function setperfil($perfil){
        $this->perfil = $perfil;
    }

    public function getdata_gerado(){
        return $this->data_gerado;
    }
    public function setdata_gerado($data_gerado){
        $this->data_gerado = $data_gerado;
    }



}
?>
