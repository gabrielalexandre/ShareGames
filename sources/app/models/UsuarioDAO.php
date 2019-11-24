    <?php 
    //CRUD da classe Usuario
    require_once 'Conexao.php';
    require_once 'Usuario.php';
    class UsuarioDAO{

        public function create(Usuario $usuario){
            $sql = 'INSERT INTO usuario (nome, sobrenome, dataNascimento, cpf, email, senha, cep, pais, cidade, estado, bairro, rua, numero,
            complemento, imagemPerfil) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getSobrenome());
            $stmt->bindValue(3, $usuario->getDataNascimento());
            $stmt->bindValue(4, $usuario->getCpf());
            $stmt->bindValue(5, $usuario->getEmail());
            $stmt->bindValue(6, $usuario->getSenha());
            $stmt->bindValue(7, $usuario->getCep());
            $stmt->bindValue(8, $usuario->getPais());
            $stmt->bindValue(9, $usuario->getCidade());
            $stmt->bindValue(10, $usuario->getEstado());
            $stmt->bindValue(11, $usuario->getBairro());
            $stmt->bindValue(12, $usuario->getRua());
            $stmt->bindValue(13, $usuario->getNumero());
            $stmt->bindValue(14, $usuario->getComplemento());
            $stmt->bindValue(15, $usuario->getImagemPerfil());

            $stmt->execute();
        }

        public function read(){
            $sql = 'SELECT * FROM usuario';

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

         public function readByCPF($cpf){
            $sql = 'SELECT * FROM usuario WHERE cpf = ?';

            $stmt = Conexao::getConnect()->prepare($sql);
            
            $stmt->bindValue(1, $cpf);
            
            $stmt->execute();

            if($stmt->rowCount()>0){
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC); //retorna um array com todos os registros
                return $resultado;
            }
            else{
                 return []; // retorna um array vazio caso não tenha nenhum item
             }
         }

         public function update(Usuario $usuario){
            $sql = 'UPDATE usuario SET nome = ?, sobrenome = ?, dataNascimento = ?, cpf = ?,
            email = ?, senha = ?, cep = ?, pais = ?, cidade = ?, estado = ?, bairro = ?, rua = ?, numero = ?,
            complemento = ?, imagemPerfil = ?  WHERE id = ?';

            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getSobrenome());
            $stmt->bindValue(3, $usuario->getDataNascimento());
            $stmt->bindValue(4, $usuario->getCpf());
            $stmt->bindValue(5, $usuario->getEmail());
            $stmt->bindValue(6, $usuario->getSenha());
            $stmt->bindValue(7, $usuario->getCep());
            $stmt->bindValue(8, $usuario->getPais());
            $stmt->bindValue(9, $usuario->getCidade());
            $stmt->bindValue(10, $usuario->getEstado());
            $stmt->bindValue(11, $usuario->getBairro());
            $stmt->bindValue(12, $usuario->getRua());
            $stmt->bindValue(13, $usuario->getNumero());
            $stmt->bindValue(14, $usuario->getComplemento());
            $stmt->bindValue(15, $usuario->getImagemPerfil());
            $stmt->bindValue(16, $usuario->getId());

            $stmt->execute();
        }

        public function delete($id){
            $sql = 'DELETE FROM usuario WHERE idUsuario = ?';

            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $id);

            $stmt->execute();
        }

        public function logar($email, $senha){
            $sql = 'SELECT * FROM usuario WHERE email = ? AND senha = ?';

            $stmt = Conexao::getConnect()->prepare($sql);

            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);

            $stmt->execute();

            if($stmt->rowCount()>0){
                return true;
            }
            else{
               return false;
           }
       }

       public function getIdByEmail($email){
        $sql = 'SELECT idUsuario FROM usuario WHERE email = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $email);

        $stmt->execute();

        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        $id = 0;

        foreach($resultado as $item){
            $id = $item["idUsuario"];
        }

        return $id;
    }

    public function readByEmail($email){
        $sql = 'SELECT * FROM usuario WHERE email = ?';
        $stmt = Conexao::getConnect()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultado;
    }
}
?>
