<!DOCTYPE html>
<?php
    $title = "Cubo";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $idquad = isset($_POST['idquad']) ? $_POST['idquad'] : 0;

    include_once "acaoCubo.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $dados;
    if ($acao == 'editar'){
        $idC = isset($_GET['idC']) ? $_GET['idC'] : "";
    if ($idC > 0)
        $dados = buscarDados($idC);
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
        <h3>Insira os dados do Cubo</h3><hr>
            <form method="post" action="acaoCubo.php">

            <input readonly type="hidden" name="idC" id="idC" value="<?php if ($acao == "editar") echo $dados['idC']; 
            else echo 0; ?>">
                
            <p>Cor:</p>
                <input required="true" name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" 
                value="<?php if ($acao == "editar") echo $dados['cor'];?>" ><br>    
            

            <p>Quadrado: </p>
            <select name="idquad"  id="idquad">
                <?php
                require_once "utils.php";
                echo lista_quadrado(0, $dados['idquad']);
                ?>
            </select>
            <hr>
            <br>
                <button name="acao" value="salvar" id="acao" type="submit">Salvar</button>
            </form>
            <br>
    </center>
</body>
</html>