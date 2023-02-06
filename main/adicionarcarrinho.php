<?php
require_once("topo.php");
try {
    if(isset($_GET['id'])){
        $var_id = $_GET['id'];
        $_SESSION['carrinho'] = $_SESSION['carrinho'].$var_id .",";
        $_SESSION['qtde'] = $_SESSION['qtde'] + 1;
    }  
} catch (\Throwable $th) {
    die("Erro: <code>" . $th->getMessage() . "</code>");
}
header("location:indexvendas.php");
require_once("rodape.php");
?>