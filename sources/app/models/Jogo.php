<?php
class Jogo{
    private $nome;
    private $capa;
    private $anosUso;
    private $categoria;
    private $idUsuario;
    private $idJogo;

    public function __construct($nome, $capa, $anosUso, $categoria, $idUsuario){
        $this->nome = $nome;
        $this->capa = $capa;
        $this->anosUso = $anosUso;
        $this->categoria = $categoria;
        $this->idUsuario = $idUsuario;
        $this->idJogo = NULL;    
    }

    public function getNome(){
        return $this -> nome;
    }

    public function setNome($nome){
        $this -> nome = $nome;
    }

    public function getCapa(){
        return $this -> capa;
    }

    public function setCapa($capa){
        $this -> capa = $capa;
    }

    public function getAnosUso(){
        return $this -> anosUso;
    }

    public function setAnosUso($anosUso){
        $this -> anosUso = $anosUso;
    }

    public function getCategoria(){
        return $this -> categoria;
    }

    public function setCategoria($categoria){
        $this -> categoria = $categoria;
    }

    public function getIdJogo(){
        return $this -> idJogo;
    }

    public function setIdJogo($idJogo){
        $this -> idJogo = $idJogo;
    }

    public function getIdUsuario(){
        return $this -> idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this -> idUsuario = $idUsuario;
    }
}
?>
