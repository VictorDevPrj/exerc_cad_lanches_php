<?php

    require_once("config.php");
              
    $codigo = 0;
    $desc_produto = "";
    $preco = 0;

    $codigo = $_POST['codigo'];
    $desc_produto = $_POST['nome'];
    $preco = $_POST['preco'];

    
                    
    $novo_lanche = new Cardapio($codigo, $desc_produto, $preco);

    $novo_lanche->insert();
    $exibir = $novo_lanche->exibir();
    echo $novo_lanche;
    echo "<br><br>";

    $html = "<table>";
    foreach($exibir as $key => $value){
        $html .= " <td> " . $value . " </td> ";
    }
    foreach($exibir as $key => $value){
        $html .= " <tr> " . $key . " </tr> ";    
    }

    $html .= "</table>"; 

    echo $html;
?>
