<?php

class Imagem {

    private $nome;
    private $nometemp;
    private $nomenovo;
    private $destino;
    private $tipo;
    private $tamanho;

    public function __construct($nome, $nometemp, $destino){
        $this->nome         = $nome;
        $this->nometemp     = $nometemp;
        $this->destino      = $destino;
        $this->tipo         = ;
        $this->tamanho      = $nome['size'];
    }

    public function upload(){
        $file_info      = pathinfo($imagem);
        $novonome       = md5($imagem . date('G:i:s')) .'.'. $file_info['extension'];
        $destino        = $pasta . $novonome;    
        
        if(move_uploaded_file($imgtemp, $destino)){
            chmod($destino, 0755);
            return $novonome;
        }else{
            return null;
        }          
    }

    public function delete($imagem, $pasta){
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

}
?>