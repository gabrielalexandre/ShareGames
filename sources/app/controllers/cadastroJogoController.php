<?php
date_default_timezone_set('America/Manaus');

  //controla o cadastro dos jogos
session_start();

require_once '../models/Jogo.php';
require_once '../models/JogoDAO.php';

$valido = false;

  //verifica se tudo foi preenchido, se sim $valido recebe true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $valido = isset($_POST['nome-jogo'], $_POST['anosUso-jogo'], $_POST['categoria-jogo'], $_FILES['capa-jogo']['name']);
}
if($valido){ 

  $nome = $_POST['nome-jogo'];
  $anosUso = $_POST['anosUso-jogo'];
  $categoria = $_POST['categoria-jogo'];
  $id = $_SESSION['idUsuario'];

  $extensao = strtolower(substr($_FILES['capa-jogo']['name'], -3));
  $data = date('d-m-Y-H-i-s');
  $novo_nome = $data.".".$extensao;
  $diretorio = "../../public/upload/";
  move_uploaded_file($_FILES['capa-jogo']['tmp_name'], $diretorio.$novo_nome);

  $capa = $novo_nome;
  $novoJogo = new Jogo($nome, $capa, $anosUso, $categoria, $id);
  $novoJogoDAO = new JogoDAO();
  $novoJogoDAO->create($novoJogo);

  $_SESSION['jogosUsuarioLogado'] = $novoJogoDAO->readByIdUsuario($_SESSION['idUsuario']);
  header('Location: ../views/usuarioInicio.php');

}

?>