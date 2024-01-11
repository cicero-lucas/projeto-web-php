<?php 
// O modelo faz a interação com o banco de dados e jogar no Controlador

namespace sistema\Modelo;

use Exception;
use sistema\Nucleo\Conexao;

class PostModelo {

    public function ler($id=null):array{
        // query são os comando sql coloque sempre em aspa duplas
        try {
            $where= $id? "where id = $id": "";

            $query="select * from posts $where";

            $stmt=Conexao::getInstancia()->query($query);

            // retorno da query
            $resultado=$stmt->fetchAll();
            echo '<hr>';
            return $resultado;
        } catch (Exception $e) {
            echo "erro   " .$e;
        }
    }
   

    public function buscarBucador($buscar):array{
        try {
            

            $query="SELECT * FROM posts WHERE titulo LIKE '%$buscar%';";

            $stmt=Conexao::getInstancia()->query($query);

            // retorno da query
            $resultado=$stmt->fetchAll();
           
            return $resultado;
            
        } catch (Exception $e) {
            echo "erro   " .$e;
        }
    }

    public function verCometario():array{
        try {
            
            $query="SELECT cometario.cometario, usuario.nome_usuario FROM tb_cometario as cometario, tb_cadastro_us usuario WHERE usuario.id_usuario=cometario.fk_usuario;";

            $stmt=Conexao::getInstancia()->query($query);

            // retorno da query
            $resultado=$stmt->fetchAll();
           
            return $resultado;
            
        } catch (Exception $e) {
            echo "erro   " .$e;
        }
    }

    public function cadastraUsuarios($nome,$emeil,$senha):string{
        try {
            

            $query="INSERT INTO tb_cadastro_us (nome_usuario,emeil_usuario,senha_usuario) VALUES ('$nome','$emeil','$senha');";

            $stmt=Conexao::getInstancia()->query($query);
          

            // retorno da query
            return 'deu certo';
        } catch (Exception $e) {
            echo "erro   " .$e;
        }
    }
}

?>