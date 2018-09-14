<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 20/03/18
 * Time: 16:42
 */

class Conexao
{
    const HOST      = "localhost";
    const NOMEBANCO = "projeto";
    const USUARIO   = "root";
    const SENHA     = "";


    public static function getConexao(){
        $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO.";charset=utf8", self::USUARIO, self::SENHA);
        return $conexao;

    }


}

//Teste de conexao
//$conexao = Conexao::getConexao();