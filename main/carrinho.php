<?php
require_once("topo.php");
try {
    echo "<p>Meu Carrinho</p>";
    require_once("conexao.php");
    if (isset($_SESSION['carrinho'])) {
        //echo "Dados da session:" .$_SESSION['carrinho'];
        $produtos = explode(',',$_SESSION['carrinho']);
        //echo "<br>Dados do vetor:" . $produtos[0];
        echo "<br>Quantidade de produtos:" . sizeof($produtos)-1;
        $total = 0;
        for ($i = 0; $i < sizeof($produtos)-1; $i++) {
            echo "<br>". $produtos[$i];
            $sql = "select * from produtos where id=$produtos[$i]";
            $resultado = $conexao->query($sql);
            $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {
                echo " $linha[descricao]
                     ($linha[unidade])  --- R$
                     $linha[precovenda]";
                $total += $linha['precovenda'];
            }
        }
        echo "<p>Total: $total </p><br><br>";
        if(isset($_SESSION['nomeUsuario'])){
            echo "<a href='finalizarpedido.php'>Clique aqui para finalizar</a>";
        } else {
            echo "<a href='login.php'>Clique aqui para realizar o login</a>";
        }
    }
    else
        echo "<p>Você não possui produtos no carrinho.</p>";
 
} catch (\Throwable $th) {
    die("Erro: <code>" . $th->getMessage() . "</code>");
}
require_once("rodape.php");
?>