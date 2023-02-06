<?php
require_once("topo.php");
if(isset($_SESSION['carrinho']) && isset($_SESSION['nomeUsuario'])){
    //vamos pegar cada produto e inserir no pedido
    //aqui pega da session e coloca em um vetor chamado $produtos
    $produtos = explode(',',$_SESSION['carrinho']);
    //fazer insert na tabela pai (pedidos)
    $sqlPedido = "insert into pedidos (data,idPessoa,status) 
    values(now(),". $_SESSION['idUsuario'].",0)";
    require_once("conexao.php");
    $pedido = $conexao->prepare($sqlPedido);
    $pedido->execute();
    $idPedido = $conexao->lastInsertId();
    //fazer inserts dos filhos (itenspedido --> produtos)
    for ($i = 0; $i < sizeof($produtos)-1; $i++) {
        echo "<br>". $produtos[$i];
        $sqlItem = "insert into itenspedido 
        (idPedido,idProduto,quantidade,preco)
        values ($idPedido,$produtos[$i],1,
        (SELECT precovenda FROM produtos WHERE id=$produtos[$i]))";
        $itemPedido = $conexao->prepare($sqlItem);
        $itemPedido->execute();
        echo "<p>Gravado...</p>";
    }
    echo "<p>Pedido salvo com sucesso!</p>";
    //limpando o carrinho pois já foi gravado
    unset($_SESSION['carrinho']);
    unset($_SESSION['qtde']);
    //fazer o redirecionamento para uma nova página
} else {
    echo "<p>Você não tem permissão para acessar esta página.</p>";
}
require_once("rodape.php");
?>