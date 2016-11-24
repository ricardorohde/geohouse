<?

function enviarEmail($titulo, $texto){
    require_once("inc/phpmailer/class.phpmailer.php");
    $send_email = new PHPMailer();
    $corpoemail         = '<html><head><title>'.$titulo.'</title><link href="https://fonts.googleapis.com/css?family=Raleway:400,700|Merriweather" rel="stylesheet" type="text/css"><style>h1, h2, h3 {font-family: "Merriweather", serif;margin: 0px;padding: 0px;}body {font-family: "Raleway", sans-serif;color: #333;padding: 0px;margin: 0px;}</style></head><body><table width="100%" border="0" cellspacing="0" cellpadding="0">  <tr align="center"><td bgcolor="#f2f2f2"><table width="500px" border="0" cellpadding="10"><tr align="center"><td style="padding: 40px;"><h1>'.$titulo.'</h1></td></tr><tr align="center" bgcolor="#fff" style="box-shadow: 0 5px 10px rgba(0,0,0,.05)"><td style="padding: 40px;"><p>'.$texto.'</p></td></tr></table><br /><br /><h2>IMOVEIS</h2><br /><br /></td></tr><tr align="center"><td bgcolor="#ccc"><p style="padding: 30px; font-size: 11px;">Esta é uma mensagem automática gerada pelo site. Desconsidere respondê-la.</p></td></tr></table></body></html>';

    $send_email->IsSMTP();
    $send_email->Host        = 'mail.dominio.com.br';
    $send_email->SMTPAuth    = true;
    $send_email->Username    = 'contato@dominio.com.br';
    $send_email->Password    = '*****';
    $send_email->CharSet     = 'utf-8';
    $send_email->From        = 'contato@dominio.com.br';
    $send_email->FromName    = 'NOME';

    $send_email->AddAddress('vendas@dominio.com.br', 'NOME');
    $send_email->WordWrap    = 50;
    $send_email->IsHTML(true);

    $send_email->Subject     = $titulo;
    $send_email->Body        = $corpoemail;

    $enviou             = $send_email->Send();

    return $enviou;

}
