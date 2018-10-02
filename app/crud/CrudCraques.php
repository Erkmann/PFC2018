<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 08/05/18
 * Time: 13:29
 */

require_once __DIR__."/../database/Conexao.php";
require_once __DIR__ . "/../model/Craque.php";


class CrudCraques
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getRandomId(){
        $sql = "SELECT * FROM craques ORDER BY id_craques";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $c = count($resultado);
        $random = rand(0,$c - 1);

        $craque = $resultado[$random]['id_craques'];
        return $craque;
    }

    public function getAtletas(){
        $sql = "SELECT * FROM craques";
        $craquesArray = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $arrayCraquesObj = array();

        foreach ($craquesArray as $craque){
            $craqueObj = new Craque($craque['id_craques'], $craque['nome_craque'], $craque['morte'], $craque['nascimento'], $craque['titulos'], $craque['numero_de_jogos'], $craque['icon_craque']);
            $arrayCraquesObj[] = $craqueObj;
        }

        return $arrayCraquesObj;
    }

    public function getAtleta($id)
    {
        $sql = "SELECT * FROM craques WHERE id_craques ='{$id}'";
        $posicao = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);


        $craque = new Craque($posicao['id_craques'], $posicao['nome_craque'], $posicao['morte'], $posicao['nascimento'], $posicao['titulos'], $posicao['numero_de_jogos'], $posicao['icon_craque']);


        return $craque;
    }

    public function getAtletabyIcon($icone){
        $sql = "SELECT id_craques FROM craques WHERE icon_craque='{$icone}'";
        $a = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        return $a;
    }

    public function getEquipes($id){

        $sql = "SELECT equipes.titulos, equipes.id_equipe, fundacao, nome_equipe, numero_torcedores, icon_equipe FROM `equipes`, craques, equipes_craques WHERE equipes_craques.id_equipe = equipes.id_equipe AND equipes_craques.id_craques = craques.id_craques AND equipes_craques.id_craques = {$id}";
        $equipes = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $equipesObj = array();

        foreach ($equipes as $equipe) {
            $equipeObj = new Equipe($equipe['id_equipe'], $equipe['titulos'], $equipe['fundacao'], $equipe['nome_equipe'], $equipe['numero_torcedores'], $equipe['icon_equipe']);
            $equipesObj[] = $equipeObj;
        }
        return $equipesObj;
    }

    public function insertCraque(Craque $craque){

        $sql = "INSERT INTO craques(id_craques, nome_craque, morte, nascimento, titulos, numero_de_jogos, icon_craque) VALUES (null , '{$craque->getNomeCraque()}','{$craque->getMorte()}','{$craque->getNascimento()}', '{$craque->getTitulos()}','{$craque->getNumeroJogos()}','{$craque->getIconCraque()}')";
        try{$this->conexao->exec($sql);}catch (PDOException $exception){
            echo $exception;
        }

    }



    public function deleteCraque($id){

        $sqll = "DELETE FROM comentar_craques WHERE id_craques = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM curtir_craques WHERE id_craques = '{$id}'";
        $this->conexao->exec($sqll);
        $sqll = "DELETE FROM equipes_craques WHERE id_craques = '{$id}'";
        $this->conexao->exec($sqll);

        $sql = "DELETE FROM `craques` WHERE `id_craques` = {$id}";
        $this->conexao->exec($sql);
    }

    public function updateCraque(Craque $craque){
        $sql = "UPDATE `craques` SET `id_craques`= '{$craque->getIdCraque()}',`nome_craque`='{$craque->getNomeCraque()}',`morte`='{$craque->getMorte()}',`nascimento`='{$craque->getNascimento()}',`titulos`='{$craque->getTitulos()}',`numero_de_jogos`= '{$craque->getNumeroJogos()}',`icon_craque`= '{$craque->getIconCraque()}' WHERE id_craques = '{$craque->getIdCraque()}'";
        $this->conexao->exec($sql);
    }

    public function contadorCurtida(Craque $c){
        $sql = "SELECT COUNT(`id_craques`) AS qtd_curtir FROM `curtir_craques` WHERE id_craques = '{$c->getIdCraque()}'";
        $c = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $c["qtd_curtir"];
        return $qtd_c;
    }

    public function getComentariosPorCraqueLimitado(Craque $c)
    {
        $sql = "SELECT * FROM `comentar_craques` WHERE `id_craques` = '{$c->getIdCraque()}' ORDER BY `comentar_craques`.`dt_comentario` DESC LIMIT 5";
        $comentarios = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $comentariosArrayObj = [];
        foreach ($comentarios as $comentario) {
            $id_comentario = $comentario['id_comentario'];
            $id_craque = $comentario['id_craques'];
            $id_usuario = $comentario['id_usuario'];
            $txt_comentario = $comentario['txt_comentario'];
            $dt_comentario = $comentario['dt_comentario'];

            $comentario = new ComentarCraque($id_craque, $id_usuario, $txt_comentario);
            $comentario->setDtComentario($dt_comentario);
            $comentario->setIdComentario($id_comentario);
            $comentariosArrayObj[] = $comentario;
        }
        return $comentariosArrayObj;
    }

    public function get_ids_craques_curtidas()
    {
        $sql1 = "SELECT DISTINCT curtir_craques.id_craques FROM `curtir_craques`";
        $consulta = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_craques'];
        }
        return $ids;



    }

    public function get_ids_craques_todos()
    {
        $sql = "SELECT craques.id_craques FROM `craques`";

        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $ids = [];
        foreach ($consulta as $a){
            $ids[] = $a['id_craques'];
        }
        return $ids;
    }

    public function ranking()
    {
        $sql = "SELECT craques.id_craques, `nome_craque`, COUNT(curtir_craques.id_craques) AS qtd_curtidas FROM `curtir_craques`, `craques` WHERE craques.id_craques = curtir_craques.id_craques GROUP BY curtir_craques.id_craques";
        $consulta = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $craques = array();
        foreach ($consulta as $item){
            $qtd_curtidas = $item['qtd_curtidas'];
            $nome_craque = $item['nome_craque'];
            $id_craque = $item['id_craques'];


            $craques[] = ["nome_craques" => $nome_craque,
                "qtd_curtidas" => $qtd_curtidas, "id_craque" => $id_craque] ;

        }

        $ids_geral = $this->get_ids_craques_todos();
        $ids_curtidos = $this->get_ids_craques_curtidas();

        foreach ($ids_geral as $idG){

            if(!in_array($idG, $ids_curtidos)){
                $sql = "SELECT * FROM craques WHERE id_craques = {$idG}";
                $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

                foreach ($resultado as $res) {
                    $res['qtd_curtidas'] = 0;
                    $craques[] = [
                        "nome_craques" => $res['nome_craque'], "qtd_curtidas" => $res['qtd_curtidas'], "id_craque" => $res['id_craques']
                    ];
                }
            }

        }


        return $craques;


    }

    public function getEsporteLigaById($id_l){
        $sql = "SELECT `nome_esporte`,esportes.`historia`,`id_esporte`,`num_praticantes`,`regras`,`icon_esporte`
        from ligas, esportes WHERE esporte_id_esporte = id_esporte AND id_liga = {$id_l}";

        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $esporte = new Esporte($resultado['nome_esporte'], $resultado['historia'], $resultado['num_praticantes'], $resultado['regras'], $resultado['id_esporte'], $resultado['icon_esporte']);
        return $esporte;
    }








}

//TESTE getAtletas()
//$c = new CrudCraques();
//$atletas = $c->ranking();
//print_r($atletas);
///
///
/// TESTE getAtleta()
//$c = new CrudCraques();
//$atleta = $c->getAtleta(1);
//print_r($atleta);
//Teste getEquipes()
//$c = new CrudCraques();
//$equipes = $c->getEquipes(1);
//print_r($equipes);

//Teste Insert
//$craque = new Craque(2, "Lindomar", "um dia", "2000/02/28", "3 libertadores", 350, "../../assets/bulls512.png");
//$a = new Equipe("", "2 estaduais", "um dia", "bombas", "2 mil", "../../cavs512.png");
//$b = new CrudCraques();
//$c = $b->contadorCurtida($craque);
//echo $c;
//$b->insertEquipe($a);
//$c = new CrudCraques();
//$c->insertCraque($craque);


//Teste Delete-- Funcionando
//$craque = new Craque("19", "Lindomar", "um dia", "2000/02/28", "3 libertadores", 350, "../../assets/bulls512.png");
//$c = new CrudCraques();
//$c->updateCraque($craque);
//$atleta = $c->getAtleta(19);
//print_r($atleta);
//$c->deleteCraque(4);



