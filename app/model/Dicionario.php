<?php

class Dicionario
{

    private $input;
    private $dicionario= array("'",'"','=','>','<','*','/','$','&',';');


    public function verificaInput($input){
        foreach ($this->getDicionario() as $d){

            for ($i = 0; $i < strlen($input); $i++){
                    if ($input[$i] == $d){
                    return false;
                }
            }
        }
        return $input;
    }


    public function getDicionario(): array
    {
        return $this->dicionario;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function setInput($input)
    {
        $this->input = $input;
    }


}

//$c = new Dicionario();
//echo $c->verificaInput("'OR 1=1;");