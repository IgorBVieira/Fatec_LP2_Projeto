<?php
require_once("topo.php");
try {
    if(isset($_GET['id'])){
        $var_id = $_GET['id'];
        //selecionar o registro a ser editado
        require_once "conexao.php";
        $sql = "SELECT * from produtos where id=$var_id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        echo "<br><h2>Produto Selecionado</h2>";
        foreach ($dados as $linha) {
            echo "<p>$linha[id]<br>
                $linha[descricao]<br>
                $linha[quantidade] 
                $linha[unidade]<br>
                $linha[precovenda] </p>";
            echo "<a href='adicionarcarrinho.php?id=$linha[id]'>
            Adicionar</a>";
        }
    }
} catch (\Throwable $th) {
    //throw $th;
    die("Erro: <code>" . $th->getMessage() . "</code>");
}

require_once("rodape.php");
?>