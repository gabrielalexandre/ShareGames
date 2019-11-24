<?php
	//controla os POSTs
	session_start();
	require_once '../models/Usuario.php';
	require_once '../models/UsuarioDAO.php';

	if((isset($_POST['email_login'])) && (isset($_POST['senha_login']))){
		$email = $_POST['email_login'];
		$senha = MD5($_POST['senha_login']);
		$usuarioDAO = new UsuarioDAO();
		$usuarioDAO->logar($email, $senha);

		if($usuarioDAO->logar($email, $senha)){
			header('Location: ../views/usuarioInicio.html');
		}

		else{
			$_SESSION['loginErro'] = "<h1>Acesso Negado</h1>";
			header('Location: ../views/login.php');

		}
	}
    else{
		header('Location: ../views/login.php');
    }

    $valido = false;
    
	//verifica se tudo foi preenchido, se sim $valido recebe true
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$valido = isset($_POST['nome_cadastro'], $_POST['sobrenome_cadastro'], $_POST['dataNascimento'], $_POST['cpf'], $_POST['email_cadastro'], $_POST['senha_cadastro'], $_POST['cep'], $_POST['pais'], $_POST['cidade'], $_POST['estado'], $_POST['bairro'], $_POST['rua'], $_POST['numero'], $_POST['complemento']);
	}

	if($valido){ 
		$nome = $_POST['nome_cadastro'];
		$sobrenome = $_POST['sobrenome_cadastro'];
		$dataNascimento = $_POST['dataNascimento'];
		$cpf = $_POST['cpf'];
		$email = $_POST['email_cadastro'];
		$senha = MD5($_POST['senha_cadastro']);
		$cep = $_POST['cep'];
		$pais = $_POST['pais'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$bairro = $_POST['bairro'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];

		$novoUsuario = new Usuario($nome, $sobrenome, $dataNascimento, $cpf, $email, $senha, $cep, $pais, $cidade, $estado, $bairro, $rua, $numero, $complemento);

		$novoUsuarioDAO = new UsuarioDAO();

		$novoUsuarioDAO->create($novoUsuario);

		echo '<h1> ENTREI </h1>';
	}

?>
