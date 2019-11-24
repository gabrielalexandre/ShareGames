<?php 
class Usuario{

    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpf;
    private $email;
    private $senha;
    private $cep;
    private $pais;
    private $cidade;
    private $estado;
    private $bairro;
    private $rua;
    private $numero;
    private $complemento;
    private $imagemPerfil;
    private $id;

    public function __construct($nome, $sobrenome, $dataNascimento, $cpf, $email, $senha, $cep, $pais, $cidade, $estado, $bairro, $rua, $numero,
        $complemento, $imagemPerfil){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->dataNascimento = $dataNascimento;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->cep = $cep;
        $this->pais = $pais;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->imagemPerfil = $imagemPerfil;
        $this->id = NULL;    
    }


    public function getNome(){
        return $this -> nome;
    }

    public function setNome($nome){
        $this -> nome = $nome;
    }

    public function getSobrenome(){
        return $this -> sobrenome;
    }

    public function setSobrenome($sobrenome){
        $this -> sobrenome = $sobrenome;
    }

    public function getDataNascimento(){
        return $this -> dataNascimento;
    }

    public function setDataNascimento($dataNascimento){
        $this -> dataNascimento = $dataNascimento;
    }

    public function getCpf(){
        return $this -> cpf;
    }

    public function setCpf($cpf){
        $this -> cpf = $cpf;
    }

    public function getEmail(){
        return $this -> email;
    }

    public function setEmail($email){
        $this -> email = $email;
    }

    public function getSenha(){
        return $this -> senha;
    }

    public function setSenha($senha){
        $this -> email = $senha;
    }

    public function getCep(){
        return $this -> cep;
    }

    public function setCep($cep){
        $this -> cep = $cep;
    }

    public function getPais(){
        return $this -> pais;
    }

    public function setPais($pais){
        $this -> pais = $pais;
    }

    public function getCidade(){
        return $this -> cidade;
    }

    public function setCidade($cidade){
        $this -> cidade = $cidade;
    }

    public function getEstado(){
        return $this -> estado;
    }

    public function setEstado($estado){
        $this -> estado = $estado;
    }

    public function getBairro(){
        return $this -> bairro;
    }

    public function setBairro($bairro){
        $this -> bairro = $bairro;
    }

    public function getRua(){
        return $this -> rua;
    }

    public function setRua($rua){
        $this -> rua = $rua;
    }

    public function getNumero(){
        return $this -> numero;
    }

    public function setNumero($numero){
        $this -> numero = $numero;
    }

    public function getComplemento(){
        return $this -> complemento;
    }

    public function setComplemento($complemento){
        $this -> complemento = $complemento;
    }
    
    public function getImagemPerfil(){
        return $this -> imagemPerfil;
    }

    public function setImagemPerfil($imagemPerfil){
        $this -> imagemPerfil = $imagemPerfil;
    }

    public function getId(){
        $usuarioDAO.readByEmail($this->email);
    }

    public function setId($id){
        $this -> id = $id;
    }   

}
?>
