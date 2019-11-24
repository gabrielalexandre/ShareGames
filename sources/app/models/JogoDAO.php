<?php 
    //CRUD da classe
require_once 'Conexao.php';
require_once 'Jogo.php';
class JogoDAO{

    public function create(Jogo $jogo){
        $sql = 'INSERT INTO jogo (nome, capa, anosUso, categoria, idUsuario) VALUES(?, ?, ?, ?, ?)';
        
        $stmt = Conexao::getConnect()->prepare($sql);

        $capa = 'capa';

        $stmt->bindValue(1, $jogo->getNome());
        $stmt->bindValue(2, $jogo->getCapa());
        $stmt->bindValue(3, $jogo->getAnosUso());
        $stmt->bindValue(4, $jogo->getCategoria());
        $stmt->bindValue(5, $jogo->getIdUsuario());
        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM jogo';

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

         public function update(Jogo $jogo){
            $sql = 'UPDATE jogo SET nome = ?, capa = ?, anosUso = ?, categoria = ? WHERE idJogo = ?';

            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $jogo->getNome());
            $stmt->bindValue(2, $jogo->getCapa());
            $stmt->bindValue(3, $jogo->getAnosUso());
            $stmt->bindValue(4, $jogo->getCategoria());
            $stmt->bindValue(5, $jogo->getIdUsuario());
            $stmt->bindValue(6, $jogo->getIdJogo());
            $stmt->execute();
        }

        public function delete($idJogo){
            $sql = 'DELETE FROM jogo WHERE idJogo = ?';

            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $idJogo);

            $stmt->execute();
        }

        public function readByIdUsuario($idUsuario){
            $sql = 'SELECT * FROM jogo WHERE idUsuario = ?';
            $stmt = Conexao::getConnect()->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;
        }

        public function readByIdJogo($idJogo){
            $sql = 'SELECT * FROM jogo WHERE idJogo = ?';
            $stmt = Conexao::getConnect()->prepare($sql);
            $stmt->bindValue(1, $idJogo);
            $stmt->execute();
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;
        }

    }
    ?>
