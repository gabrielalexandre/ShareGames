<?php
  //controla o cadastro das solicitações de troca
session_start();
/* Informa o nível dos erros que serão exibidos */
error_reporting(E_ALL);

/* Habilita a exibição de erros */
ini_set("display_errors", 1);

date_default_timezone_set('America/Manaus');

require_once '../models/Troca.php';
require_once '../models/TrocaDAO.php';
require_once '../models/jogoDAO.php';

$valido = false;

  //verifica se tudo foi preenchido, se sim $valido recebe true
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $valido = isset($_POST['idJogoDesejado'], $_POST['idJogoProposta']);
}
if($valido){ 
  $idUsuarioA = $_SESSION['idUsuario'];
  $idJogoA = $_POST['idJogoProposta']; 
  $idJogoB = $_POST['idJogoDesejado'];
  $idUsuarioB = NULL;
  echo 'cheguei aqui';

  $jogoDAO = new JogoDAO();

  $dados = array();
  $dados = $jogoDAO->readByIdJogo($idJogoB);
  foreach($dados as $item){
    $idUsuarioB = $item['idUsuario'];
  }

  $novaTroca = new Troca($idUsuarioA, $idUsuarioB, $idJogoA, $idJogoB);

  $trocaDAO = new TrocaDAO();
  $trocaDAO->create($novaTroca);

  header('Location: ../views/usuarioInicio.php');

}

?>