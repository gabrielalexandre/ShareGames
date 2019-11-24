<?php 
    //CRUD da classe Troca
require_once 'Conexao.php';
require_once 'Troca.php';
class TrocaDAO{

    public function create(Troca $troca){
        $sql = 'INSERT INTO troca (idUsuarioA, idUsuarioB, idJogoA, idJogoB, estado) VALUES(?, ?, ?, ?, ?)';
        
        $stmt = Conexao::getConnect()->prepare($sql);

        $padrao = 0;

        $stmt->bindValue(1, $troca->getIdUsuarioA());
        $stmt->bindValue(2, $troca->getIdUsuarioB());
        $stmt->bindValue(3, $troca->getIdJogoA());
        $stmt->bindValue(4, $troca->getIdJogoB());
        $stmt->bindValue(5, $padrao);

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM troca';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); //retorna um array com todos os registros
            return $resultado;
        }
        else{
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public function nomeUsuario($idUsuario){
        $sql = 'SELECT idUsuarioA, idUsuarioB, idJogoA, idJogoB, a.nome as nomeUsuarioA, b.nome as nomeUsuarioB, ja.nome_jogo as
         nomeJogoA, jb.nome_jogo as nomeJogoB, t.estado, idtroca FROM
         troca as t JOIN usuario as a ON t.idUsuarioA = a.idUsuario JOIN
         usuario as b ON t.idUsuarioB = b.idUsuario JOIN jogo as ja ON t.idJogoA = ja.idJogo JOIN jogo as jb ON t.idJogoB = jb.idJogo'; //aqui retorna o nome do usuario q esta logado
        $stmt = Conexao::getConnect()->prepare($sql);
        $stmt->bindValue(1, $idUsuarioA);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        else{
            return [];
        }
    }

    public function trocar($idUsuario){
        //jogo do cidadão e o idJogoB
        $sql = 'UPDATE troca SET estado = +1 WHERE idUsuarioA = ?';
        
        $stmt = Conexao::getConnect()->prepare($sql);
        $stmt->bindValue(3, $troca->getEstado());

        $stmt->execute();
    }

    public function update(Troca $troca){
        $sql = 'UPDATE troca SET idUsuarioA = ? , idUsuarioB = ? , idJogoA = ?, idJogoB = ?, estado = ?, dataTroca = ? WHERE idTroca = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $troca->getIdUsuarioA());
        $stmt->bindValue(2, $troca->getIdUsuarioB());
        $stmt->bindValue(3, $troca->getIdJogoA());
        $stmt->bindValue(4, $troca->getIdJogoB());
        $stmt->bindValue(3, $troca->getEstado());
        $stmt->bindValue(4, $troca->getDataTroca());
        $stmt->bindValue(5, $troca->getIdTroca());

        $stmt->execute();
    }

    public function delete($idTroca){
        $sql = 'DELETE FROM troca WHERE idTroca = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $idTroca);

        $stmt->execute();
    }
}
?>
