<?php

require_once __DIR__.'/../database/Conexao.php';
require_once __DIR__.'/../model/Usuario.php';

class CrudUsuario {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }


    public function cadastrarUsuario(Usuario $user){


       $resultado = $this->getUsuarios();

       $u = $user->getEmail();


        foreach ($resultado as $r){

            if ($r->getEmail() == $u){
               header('location: ../controller/UsuarioController.php?rota=errroEmail');
               return false;
            }
        }

        $sql = "INSERT INTO usuario (email, senha, nome_usuario, tipo_usuario_id_tipo_usuario,verificado) VALUES ('{$user->getEmail()}','{$this->criptografarPass($user->getSenhaUsuario())}','{$user->getNomeUsuario()}','{$user->getIdTipoUsuario()}', 0)";

        $this->conexao->exec($sql);

        return true;

    }

    public function getUsuarioByEmail($email){
        $sql = "SELECT * FROM usuario WHERE email= '{$email}'";
        try{$user = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);}catch (PDOException $e){
            include_once '../view/alertaEN.php';
        }

        $id_usuario = $user['id_usuario'];
        $nome_usuario = $user['nome_usuario'];
        $senha = $user['senha'];
        $id_tipo_usuario = $user['tipo_usuario_id_tipo_usuario'];
        $email = $user['email'];
        $usuario = new Usuario($nome_usuario, $senha, $email, $id_tipo_usuario, $id_usuario);
        $usuario->setIdPass($user['id_pass']);
        $usuario->setVerificado($user['verificado']);

        if ($usuario->getIdUsuario() == null){
            include_once '../view/alertaEN.php';
        }

        return $usuario;
    }



    public function getUsuarios(){

        $sql = "SELECT * FROM usuario ORDER BY (id_usuario)DESC";

        $r = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $f = array();
        foreach ($r as $res){
            $u = new Usuario($res['nome_usuario'], $res['senha'], $res['email'], $res['tipo_usuario_id_tipo_usuario'], $res['id_usuario']);
            $f[] = $u;
        }

        return $f;

    }


    public function verificaLogin($email, $senha){
        $users = $this->getUsuarios();

        foreach ($users as $u){
            if (password_verify($senha, $u->getSenhaUsuario()) and $email == $u->getEmail()){
                $resultado = $this->getUsuario($u->getIdUsuario());
                return $resultado;
            }
        }


        return "nao";

    }

    public function getId($email, $senha){
        $users = $this->getUsuarios();
        foreach ($users as $u){
            if (password_verify($senha, $u->getSenhaUsuario()) and $u->getEmail() == $email){
                return $u->getIdUsuario();
            }
        }

    }

    public function getDadosUserLogado($id){
        $sql = "SELECT * FROM usuario WHERE id_usuario = '{$id}'";
        $b = $this->conexao->query($sql);
        $resultado = $b->fetch(PDO::FETCH_ASSOC);

        return $resultado;

    }

    public function getUsuario($id){
        $sql = "SELECT * FROM usuario WHERE id_usuario = '{$id}'";
        $b = $this->conexao->query($sql);
        $resultado = $b->fetchAll(PDO::FETCH_ASSOC);

        foreach($resultado as $user){
            $id_usuario = $user['id_usuario'];
            $nome_usuario = $user['nome_usuario'];
            $senha = $user['senha'];
            $id_tipo_usuario = $user['tipo_usuario_id_tipo_usuario'];
            $email = $user['email'];
            $usuario = new Usuario($nome_usuario, $senha, $email, $id_tipo_usuario, $id_usuario);
        }

        return $usuario;
    }


    public function editar_usuario(Usuario $usuario){


        $sql = "UPDATE usuario SET nome_usuario = '{$usuario->getNomeUsuario()}', email = '{$usuario->getEmail()}', senha = '{$usuario->getSenhaUsuario()}' WHERE id_usuario = '{$usuario->getIdUsuario()}'";
        $this->conexao->exec($sql);

    }


    public function deletarUsuario($id){

        $sql = "delete from curtir_ligas where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from curtir_craques where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from curtir_esportes where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from curtir_equipe where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from comentar_liga where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from comentar_craques where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from comentar_esportes where id_usuario = '{$id}'";
        $this->conexao->exec($sql);
        $sql = "delete from comentar_equipes where id_usuario = '{$id}'";
        $this->conexao->exec($sql);

        $sql = "DELETE FROM `usuario` WHERE `id_usuario` ='{$id}'";
        $this->conexao->exec($sql);
    }

    public function criptografarPass($senha){
        $novaSenha = password_hash($senha, PASSWORD_DEFAULT);
        return $novaSenha;
    }

    public function verificarUserEmail($id){
        $sql = "UPDATE usuario SET verificado = 1 WHERE id_usuario = {$id}";
        $this->conexao->exec($sql);

        return true;

    }

    public function updateIdPass($id){

        $idP = uniqid(rand());
        $sql = "UPDATE usuario SET id_pass = '{$idP}' WHERE id_usuario = {$id}";
        $this->conexao->exec($sql);

        return $idP;
    }

    public function updateSenha($senha, $id){

        $sql = "UPDATE usuario SET senha = '{$this->criptografarPass($senha)}' WHERE id_usuario = {$id}";
        $this->conexao->exec($sql);

        return true;
    }

}
//


//print_r($c->getUsuario(102));
//
///$u = new Usuario('Jac', 'minhasenha', 'meuemail@email', null,'99');
//$a = $c->getUsuario(99);
//print_r($a);
//
//$c= new CrudUsuario();
//echo $c->updateIdPass(115);

