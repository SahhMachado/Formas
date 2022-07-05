<!DOCTYPE html>
<?php
    require_once "classes/autoload.php";
    $title = "Cubo";
    $idC = isset($_GET['idC']) ? $_GET['idC'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $idquad = isset($_GET['idquad']) ? $_GET['idquad'] : "";
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
            background-color: #e5ddee;
            margin: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        input{
            background-color: #b4a0cd;
            border-radius: 10px;
            border: none;
        }

        @keyframes rotate {
            from {
                transform: rotateX(-20deg) rotateY(-10deg);
            }

            50% {
                transform: rotateX(20deg) rotateY(320deg);
            }

            to {
                transform: rotateX(-20deg) rotateY(-20deg);
            }
        }

        .div{
            margin-top: 100px;
            background-color:  #b4a0cd;
        }

        a{
            text-decoration: none;
            color: black;
        }

        .seta{
            width: 30px;
        }

        a:hover{
            color: #b4a0cd;
        }
    </style>
</head>
<body>
    <br>
    <div class="div">
        <center>
        <br><br><br>
        <?php  
            if ($acao = "salvar") {
                $cubo = new Cubo($idC, $lado, $cor, $idquad);
                echo $cubo->desenha();
                echo $cubo;
            }
            ?>
            <br>
            <br>
            <a href="showCubo.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
        </center>
    </div>
    </fieldset>
    <br>
</body>
</html>