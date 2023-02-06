<?php
    require_once "topo.php";
    if (isset($_SESSION['idUsuario'])) {
        if (isset($_GET['id'])) {
            $var_id = $_GET['id'];
            $var_data = $_GET['data'];
            $var_status = $_GET['status'];

            echo "<h2>Meu Pedido</h2><br><br>";
            echo "<p>Número:$var_id Data:$var_data Status:$var_status</p>";
            require_once "conexao.php";
            $sql = "SELECT it.*,p.descricao 
            from itenspedido it, produtos p, pedidos ped
            where it.idProduto = p.id and
            it.idPedido = ped.id and
            it.idPedido=$var_id and 
            ped.idPessoa=$_SESSION[idUsuario]";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
                echo "<p>id: $linha[id] - 
                    $linha[descricao] ($linha[preco])</p>";
            }
            echo "<a href='pedidos.php'>Voltar</a>";
        }else{
            echo "<p>Selecione um pedido.</p>";
        }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "rodape.php";
?>
