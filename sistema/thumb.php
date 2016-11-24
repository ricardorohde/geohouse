<?

require_once 'vendor/autoload.php';

use abeautifulsite\SimpleImage;

$imagem = $_GET['imagem'];
$largura = (isset($_GET['largura']))?$_GET['largura']:70;
$altura = (isset($_GET['altura']))?$_GET['altura']:70;

try {
	$img = new SimpleImage('img/imoveis/'.$imagem);
	$img->thumbnail($largura,$altura)->output();
    	//$img->flip('x')->best_fit(320, 200)->sepia()->save('result.gif');
}catch(Exception $e){
	echo 'Erro: '.$e->getMessage();
}
