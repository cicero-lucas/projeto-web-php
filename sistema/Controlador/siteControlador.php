<?php 
    namespace sistema\Controlador;

use Exception;
use sistema\Nucleo\Controlador;

    //o controlador pegar os dados do banco de dados e colocar na view para fazer isso você deve pergar os class da Model resposalvel por conectar com o banco de dados e na view que voce deseja

    use sistema\Modelo\PostModelo;

    class siteControlador extends Controlador{

        public function __construct()
        {
            parent::__construct('templates//site/views');
        }
        public function index():void{
            // usando os dados do banco de dados na view psso a passo
            try{
                $cometario=(new PostModelo())->verCometario();
               
            }catch(Exception $e){
                
            }

            echo $this->templete->renderizar('index.html',[
                // colocar os posts $posts=(new PostModelo())->ler(); que vem do banco de dados aqui
                'cometario'=>$cometario
            ]);
            
        }

        public function buscar():void{
            // metados de busca no banco de dados
            $busca=filter_input(INPUT_POST,'ibuscar',FILTER_SANITIZE_SPECIAL_CHARS);
            echo $busca;
            if(isset($busca)){
                $posts=(new PostModelo())->buscarBucador($busca);
                var_dump($posts);
            }
            
        }
       
        public function logui():void{

            $emeil=filter_input(INPUT_POST,'emeil',FILTER_SANITIZE_EMAIL);  
            
            $senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);

            echo $this->templete->renderizar('form.html',[
                'teste'=>'formularios'
            ]);
 
        }

        public function cadastro():void{
            echo $this->templete->renderizar('cadastro.html',[
                'teste'=>'formularioe'
            ]);

            $nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);

            $emeil=filter_input(INPUT_POST,'emeil',FILTER_SANITIZE_EMAIL);  
            
            $senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS);

            echo "$nome";
            echo "$emeil";
            echo "$senha";

            if(isset($nome) && isset($emeil) && isset($senha)){
                $cadastroU=(new PostModelo())->cadastraUsuarios($nome,$emeil,$senha);

                echo $cadastroU;
            }
            
        }

        public function erro():void{
            echo $this->templete->renderizar('erro.html',[
              
            ]);
            
        }


       
    }
?>