<?php
  //controla o cadastro de usuarios
session_start();
require_once '../models/Usuario.php';
require_once '../models/UsuarioDAO.php';

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
  $imagemCapa = "teste";
  $novoUsuario = new Usuario($nome, $sobrenome, $dataNascimento, $cpf, $email, $senha, $cep, $pais, $cidade, $estado, $bairro, $rua, $numero, $complemento, $imagemCapa);
  $novoUsuarioDAO = new UsuarioDAO();
  $novoUsuarioDAO->create($novoUsuario);
  header('Location: ../views/login.php');
}
?>
