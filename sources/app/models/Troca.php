<?php 

class Troca{
    private $idUsuarioA;
    private $idUsuarioB;
    private $idJogoA;
    private $idJogoB;
    private $estadoTroca;
    private $dataTroca;
    private $idTroca;
    private $nomeUsuario;

    public function __construct($idUsuarioA, $idUsuarioB, $idJogoA, $idJogoB){
        $this->idUsuarioA = $idUsuarioA;
        $this->idUsuarioB = $idUsuarioB;
        $this->idJogoA = $idJogoA;
        $this->idJogoB = $idJogoB;
        $this->estadoTroca = NULL;
        $this->dataTroca = NULL;
        $this->idTroca = NULL;
        $this->nomeUsuario = $nomeUsuario;    
    }

    public function getIdUsuarioA(){
        return $this -> idUsuarioA;
    }

    public function setIdUsuarioA($idUsuarioA){
        $this -> idUsuarioA = $idUsuarioA;
    }

    public function getIdUsuarioB(){
        return $this -> idUsuarioB;
    }

    public function setIdUsuarioB($idUsuarioB){
        $this -> idUsuarioB = $idUsuarioB;
    }

    public function getIdJogoA(){
        return $this -> idJogoA;
    }

    public function setIdJogoA($idJogoA){
        $this -> idJogoA = $idJogoA;
    }

    public function getIdJogoB(){
        return $this -> idJogoB;
    }

    public function setIdJogoB($idJogoB){
        $this -> idJogoB = $idJogoB;
    }

    public function getDataTroca(){
        return $this -> dataTroca;
    }

    public function setDataTroca($dataTroca){
        $this -> dataTroca = $dataTroca;
    }

    public function getIdTroca(){
        return $this -> idTroca;
    }

    public function setIdTroca($idTroca){
        $this -> idTroca = $idTroca;
    }
}
?>