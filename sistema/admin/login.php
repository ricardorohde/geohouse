<?
require_once "inc/conexao.php";

$acao = $_GET['acao'];

if($acao=='autenticar'){
	$busca = ModelUsuario::login($_POST['txtemail'], $_POST['txtsenha']);
	if($busca){
		session_start();
		$_SESSION['usuario_id'] = $busca->getid();
		$_SESSION['usuario_nome'] = $busca->getnome();
		$_SESSION['usuario_email'] = $busca->getemail();
		$_SESSION['usuario_perfil'] = $busca->getperfil();
		header("location: index.php");
		exit();
	}else{
		header("location: entrar.php?erro=1");
		exit();
	}
}

if($acao=='sair'){
	session_start();
	unset($_SESSION['usuario_id']);
	unset($_SESSION['usuario_nome']);
	unset($_SESSION['usuario_email']);
	unset($_SESSION['usuario_perfil']);
	session_destroy();
	header("location: entrar.php?erro=2");
	exit();
}
