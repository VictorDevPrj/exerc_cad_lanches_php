<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
    </head>

    <body>
        <?php 
            require_once("config.php");
        ?>

        <form action="cad_lanches.php" method="POST">
            <p>
            Cadastrar lanches
            <input type="submit" value="Cadastrar">
            </p>
        </form>

        <form action="" method="POST"> 
            
            <?php
                $lanche = Cardapio::search("guer");
                echo json_encode($lanche);
            ?>
        </form>

    </body>

</html>