<?php
    require_once "topo.php";
    if (isset($_SESSION['idUsuario'])) {
        echo "<h2>Meus Pedidos</h2><br><br>";
        require_once "conexao.php";
        $sql = "SELECT * from pedidos where idPessoa=".$_SESSION['idUsuario'];
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
            echo "<p>id: $linha[id] - 
            $linha[data] ($linha[status])
            <a href='verpedido.php?id=$linha[id]&data=$linha[data]
            &status=$linha[status]'>
            <i class='fas fa-bars'></i>
            </a>
            </p>";
        }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
    require_once "rodape.php";
?>
