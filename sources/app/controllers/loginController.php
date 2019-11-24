<?php
  //controla o login

session_start();

/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);

require_once '../models/Usuario.php';
require_once '../models/UsuarioDAO.php';
require_once '../models/JogoDAO.php';
require_once '../models/TrocaDAO.php';

if((isset($_POST['email_login'])) && (isset($_POST['senha_login']))){
  $email = $_POST['email_login'];
  $senha = MD5($_POST['senha_login']);
  $usuarioDAO = new UsuarioDAO();
  $usuarioDAO->logar($email, $senha);
  if($usuarioDAO->logar($email, $senha)){
    header('Location: ../views/usuarioInicio.php');
    $dados = array();
    $dados = $usuarioDAO->readByEmail($email);
    foreach($dados as $item){
      $_SESSION['nome']= $item['nome'];
      $_SESSION['sobrenome'] = $item['sobrenome'];
      $_SESSION['cpf'] = $item['cpf'];
      $_SESSION['email'] = $item['email'];
      $_SESSION['senha'] = $item['senha'];
      $_SESSION['dataNacimento'] = $item['dataNascimento'];
      $_SESSION['cep'] = $item['cep'];
      $_SESSION['pais'] =$item['pais'];
      $_SESSION['estado'] = $item['estado'];
      $_SESSION['cidade'] = $item['cidade'];
      $_SESSION['bairro'] = $item['bairro'];
      $_SESSION['rua'] =$item['rua'];
      $_SESSION['numero'] = $item['numero'];
      $_SESSION['complemento'] = $item['complemento'];
      $_SESSION['idUsuario'] = $item['idUsuario'];
    }
    $jogoDAO = new JogoDAO();
    $jogosUsuarioLogado = array();
    $_SESSION['jogosUsuarioLogado'] = array();
    $_SESSION['jogosUsuarioLogado'] = $jogoDAO->readByIdUsuario($_SESSION['idUsuario']);
    $_SESSION['jogosLoja'] = array();
    $_SESSION['jogosLoja'] = $jogoDAO->read();
    $trocaDAO = new TrocaDAO();
    $_SESSION['trocas'] = array();
    $_SESSION['trocas'] = $trocaDAO->nomeUsuario($_SESSION['idUsuario']);
    $trocaDAO = new TrocaDAO();
    $_SESSION['accept'] = array();
    $_SESSION['accept'] = $trocaDAO->trocar($_SESSION['idUsuario']);
  }
  else{
    $_SESSION['loginErro'] = "<h1>Acesso Negado</h1>";
    header('Location: ../views/login.php');
  }
}
else{
  header('Location: ../views/login.php');
}
?>
