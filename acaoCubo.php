<?php 
require_once("classes/autoload.php"); 
include_once "conf/default.inc.php";
require_once "conf/Conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($acao == "excluir"){
        $idC = isset($_GET['idC']) ? $_GET['idC'] : 0;
        $cubo = new Cubo($idC, $lado, $_POST['cor'], $_POST['idquad']);     
        $cubo->excluir();
        header("location:showCubo.php");
    }

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['idC']) ? $_POST['idC'] : "";

        try{
        if ($id == 0){
            $cubo = new Cubo("", $lado, $_POST['cor'], $_POST['idquad']);     
            $cubo->insere();
            header("location:showCubo.php");
        }else {
            $cubo = new Cubo($_POST['idC'], $lado, $_POST['cor'], $_POST['idquad']);
            $cubo->editar();
        }    
        header("location:showCubo.php");    
    }catch(Exception $e){
        echo "<h1>Erro ao cadastrar o Cubo.<h1>
        <br> Erro: <br>".$e->getMessage();
    }     
}

$pdo = Database::iniciaConexao();
$consulta = $pdo->query("SELECT lado FROM quadrado,cubo WHERE cubo.idquad = quadrado.id;");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { $lado = $linha['lado']; }; 

function buscarDados($idC){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM cubo WHERE idC = $idC");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['idC'] = $linha['idC'];
        $dados['cor'] = $linha['cor'];
        $dados['idquad'] = $linha['idquad'];
    }
    return $dados;
}
?>