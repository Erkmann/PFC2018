<?php

require_once "../database/Conexao.php";
require_once "../model/Equipe.php";
require_once "../model/Craque.php";
require_once "../crud/CrudCraqueEquipe.php";
require_once "../crud/CrudComentarEquipe.php";

class CrudEquipe
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getRandomId(){
        $sql = "SELECT * FROM equipes ORDER BY id_equipe";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $c = count($resultado);
        $random = rand(0,$c - 1);

        $equipe = $resultado[$random]['id_equipe'];
        return $equipe;
    }

    public function getEquipes(){
      $sql = "SELECT * FROM equipes";
      $equips = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

      $equipes = array();

      foreach ($equips as $eqip){
          $equipe = new Equipe($eqip['id_equipe'], $eqip['titulos'], $eqip['fundacao'], $eqip['nome_equipe'], $eqip['numero_torcedores'], $eqip['icon_equipe']);
          $equipes[] = $equipe;
      }

      return $equipes;

    }

    public function getEquipe($id){
        $sql = "SELECT * FROM equipes WHERE id_equipe =" . "{$id}";
        $consulta = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $equipe = new Equipe($consulta['id_equipe'], $consulta['titulos'], $consulta['fundacao'], $consulta['nome_equipe'], $consulta['numero_torcedores'], $consulta['icon_equipe']);

        return $equipe;
    }

    public function insertEquipe(Equipe $equipe){
        $sql = "INSERT INTO `equipes`(`titulos`, `id_equipe`, `fundacao`, `nome_equipe`, `numero_torcedores`, `icon_equipe`) VALUES ('{$equipe->getTitulos()}',null,'{$equipe->getFundacao()}','{$equipe->getNomeEquipe()}','{$equipe->getNumeroTorcedores()}', '{$equipe->getIconEquipe()}')";
        $this->conexao->exec($sql);
    }


    public function updateEquipe(Equipe $equipe){
        $sql = "UPDATE `equipes` SET `titulos`= '{$equipe->getTitulos()}',`id_equipe`= '{$equipe->getIdEquipe()}',`fundacao`= '{$equipe->getFundacao()}',`nome_equipe`= '{$equipe->getNomeEquipe()}',`numero_torcedores`= '{$equipe->getNumeroTorcedores()}',`icon_equipe`= '{$equipe->getIconEquipe()}' WHERE id_equipe = '{$equipe->getIdEquipe()}'";
        $this->conexao->exec($sql);
    }

    public function deleteEquipe($id){

        $sqll = "DELETE FROM comentar_equipes WHERE id_equipe = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM curtir_equipe WHERE id_equipe = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM equipes_craques WHERE id_equipe = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM equipes_ligas WHERE id_equipe = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM rivalidade WHERE id_equipe = '{$id}' or possui_id_equipe = '{$id}'";
        $this->conexao->exec($sqll);

        $sql = "DELETE FROM `equipes` WHERE `id_equipe` = '{$id}'";
        $this->conexao->exec($sql);


    }

    public function contadorCurtidas(Equipe $e){
        $sql = "SELECT COUNT(`id_equipe`) as qtd_curtidas FROM `curtir_equipe` WHERE id_equipe = '{$e->getIdEquipe()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c['qtd_curtidas'];
        return $qtd_c;
    }

    public function getComentariosPorEquipeLimitado(Equipe $e)
    {
        $sql = "SELECT * FROM `comentar_equipes` WHERE `id_equipe` = '{$e->getIdEquipe()}' ORDER BY `comentar_equipes`.`dt_comentario` DESC LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {
            $id_comentario = $comentario['id_comentario'];
            $id_equipe = $comentario['id_equipe'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarEquipe($id_equipe, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }

    public function get_ids_equipes_curtidas()
    {
        $sql1 = "SELECT DISTINCT curtir_equipe.id_equipe FROM `curtir_equipe`";
        $consulta = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_equipe'];
        }
        return $ids;



    }

    public function get_ids_equipes_todas()
    {
        $sql = "SELECT equipes.id_equipe FROM `equipes`";

        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_equipe'];
        }
        return $ids;
    }

    public function ranking()
    {
        $sql = "SELECT equipes.id_equipe, `nome_equipe`, COUNT(curtir_equipe.id_equipe) AS qtd_curtidas FROM `curtir_equipe`, `equipes` WHERE equipes.id_equipe = curtir_equipe.id_equipe GROUP BY curtir_equipe.id_equipe";
        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $equipes = array();
        foreach ($consulta as $item){
            $qtd_curtidas = $item['qtd_curtidas'];
            $nome_equipe = $item['nome_equipe'];
            $id_equipe = $item['id_equipe'];


            $equipes[] = ["nome_equipe" => $nome_equipe,
                "qtd_curtidas" => $qtd_curtidas, "id_equipe" => $id_equipe] ;

        }

        $ids_geral = $this->get_ids_equipes_todas();
        $ids_curtidos = $this->get_ids_equipes_curtidas();

        foreach ($ids_geral as $idG){

            if(!in_array($idG, $ids_curtidos)){
                $sql = "SELECT * FROM equipes WHERE id_equipe = {$idG}";
                $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado as $res) {
                    $res['qtd_curtidas'] = 0;
                    $equipes[] = [
                        "nome_equipe" => $res['nome_equipe'], "qtd_curtidas" => $res['qtd_curtidas'], "id_equipe" => $res['id_equipe']
                    ];
                }
            }

        }


        return $equipes;


    }

    public function getCraqueEquipe(Equipe $e){
        $sql = "SELECT craques.`id_craques`,`nome_craque`,`morte`,`nascimento`,`titulos`,`numero_de_jogos`,`icon_craque`,`qtd_curtir` FROM craques, equipes_craques WHERE equipes_craques.id_equipe = {$e->getIdEquipe()} and craques.id_craques = equipes_craques.id_craques";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $craques = array();

        foreach ($resultado as $res){
            $a = new Craque($res['id_craques'], $res['nome_craque'], $res['morte'], $res['nascimento'], $res['titulos'], $res['numero_de_jogos'], $res['icon_craque']);
            $craques[] = $a;
        }

        return $craques;

    }



}



$a = new CrudEquipe();
$cb = new Equipe(18, 3, 24/05, "a", "5mil", "");
$b = $a->getCraqueEquipe($cb);
print_r($b);
//print_r($a->getEquipe(1));

//teste insert
//$c = new CrudEquipe();
//$b = new Equipe(1, 3, 24/05, "a", "5mil", "");
//$d = $b->getIdEquipe();
//$c = $a->contadorCurtidas($b);
//echo $c;
//$c->insertEquipe($a);

//teste insertEquipeLiga
//$c->insertEquipeLiga(8, 1);

//Teste delete--> É necessário excluir o registro da equipe das associativas;
//$c->deleteEquipe(11);