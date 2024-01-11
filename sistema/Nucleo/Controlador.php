<?php 

namespace sistema\Nucleo;
use sistema\Suporte\Template;

class Controlador{

    protected Template $templete;
    
    public function __construct(string $diretorio)
    {
        $this->templete= new Template($diretorio);
    }
}

?>