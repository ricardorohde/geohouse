<?
require_once 'vendor/autoload.php';

use Endroid\QrCode\QrCode;

//
$hash = $_GET['hash'];

$qrCode = new QrCode();
$qrCode
	->setText("geohouse.com.br/imovelx")
	->setSize(300)
	->setPadding(10)
	->setErrorCorrection('high')
	->setForegroundColor(array('r'=>0,'g'=>0,'b'=>0,'a'=>0))
	->setBackgroundColor(array('r'=>255,'g'=>255,'b'=>255,'a'=>0))
	->setLabel('geohouse.com.br')
	->setLabelFontSize(16)
	->setImageType(QrCode::IMAGE_TYPE_PNG);
;

header("Content-Type: ".$qrCode->getContentType());
//$response = new Response($qrCode->get(), 200, array('Content-Type'=>$qrCode->getContentType()));
$qrCode->render();
//print_r($response);
// ou
//$response = new Response($qrCode->get(), 200, array('Content-Type'=>$qrCode->getContentType()));
