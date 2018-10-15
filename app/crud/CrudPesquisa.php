<?php

require_once __DIR__."/../database/Conexao.php";

class CrudPesquisa
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function pesquisa($termo){
        $sql1 = "SELECT DISTINCT * FROM esportes WHERE nome_esporte like '%{$termo}%' OR historia like '%{$termo}%' OR regras like '%{$termo}%';";
        $sql2 = "SELECT DISTINCT * FROM ligas WHERE nome_liga like '%{$termo}%' OR pais like '%{$termo}%' OR regulamento like '%{$termo}%' OR historia like '%{$termo}%';";
        $sql3 = "SELECT DISTINCT * FROM craques WHERE nome_craque like '%{$termo}%';";
        $sql4 = "SELECT DISTINCT * FROM equipes WHERE nome_equipe like '%{$termo}%';";

        $resEsportes = $this->conexao->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
        $resLigas = $this->conexao->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        $resCraques = $this->conexao->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
        $resEquipes = $this->conexao->query($sql4)->fetchAll(PDO::FETCH_ASSOC);

        $cE = count($resEsportes);
        for ($i = 0; $i < $cE; $i++){
            $resEsportes[$i]['tipo'] = 'Esporte';
            $resEsportes[$i]['id'] = $resEsportes[$i]['id_esporte'];
            $resEsportes[$i]['nome'] = $resEsportes[$i]['nome_esporte'];
        }

        $cC = count($resCraques);
        for ($k = 0; $k < $cC; $k++){
            $resCraques[$k]['tipo'] = 'Craque';
            $resCraques[$k]['id'] = $resCraques[$k]['id_craques'];
            $resCraques[$k]['nome'] = $resCraques[$k]['nome_craque'];
        }

        $cL = count($resLigas);
        for ($j = 0; $j < $cL; $j++){
            $resLigas[$j]['tipo'] = 'Liga';
            $resLigas[$j]['id'] = $resLigas[$j]['id_liga'];
            $resLigas[$j]['nome'] = $resLigas[$j]['nome_liga'];
        }

        $cEq = count($resEquipes);
        for ($f = 0; $f < $cEq; $f++){
            $resEquipes[$f]['tipo'] = 'Time';
            $resEquipes[$f]['id'] = $resEquipes[$f]['id_equipe'];
            $resEquipes[$f]['nome'] = $resEquipes[$f]['nome_equipe'];

        }

        $resultado[] = $resEsportes;
        $resultado[] = $resCraques;
        $resultado[] = $resLigas;
        $resultado[] = $resEquipes;

        return $resultado;

    }


}



//$c = new CrudPesquisa();
//print_r($c->pesquisa('pel'));
