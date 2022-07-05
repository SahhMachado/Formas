<!DOCTYPE html>
<?php
    $title = "Triângulo";
    $altura = isset($_POST['altu$altura']) ? $_POST['altu$altura'] : 0;
    $base = isset($_POST['base']) ? $_POST['base'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";

    include_once "acaoRet.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <style>
        body{
            background-image:  linear-gradient( to bottom, #e5ddee, #b4a0cd, #e5ddee);
            margin: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        button{
            background-color: #9178af;
            border-radius: 10px;
            border: none;
            font-weight: bold;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        a{
            text-decoration: none;
            color: black;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>

<body>
    <br>
    <center>
        <h3>Insira os dados do Retângulo</h3><hr>
            <form method="post" action="acaoRet.php">

            <input readonly type="hidden" name="id" id="id" value="<?php if ($acao == "editar") echo $dados['id']; 
            else echo 0; ?>">
            
            <p>Altura:</p>
                <input require="true" type="text" name="altura" id="altura" placeholder="Digite o tamanho da altura" 
                value="<?php if ($acao == "editar") echo $dados['altura'];?>"><br>
                
            <p>Base:</p>
                <input require="true" type="text" name="base" id="base" placeholder="Digite o tamanho da base" 
                value="<?php if ($acao == "editar") echo $dados['base'];?>"><br>

            <p>Cor:</p>
                <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" 
                value="<?php if ($acao == "editar") echo $dados['cor'];?>" ><br>    

            <p>Tabuleiro: </p>
            <select name="ret_idtab"  id="ret_idtab">
                <?php
                require_once "utils.php";
                echo lista_tabuleiro(0, $dados['ret_idtab']);
                ?>
            </select>
            <br>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br> 
    </center>
</body>
</html>