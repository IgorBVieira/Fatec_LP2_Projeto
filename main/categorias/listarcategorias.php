<?php
    require_once "../topo.php";
    if ($_SESSION['tipoUsuario'] == 1 || 
    $_SESSION['tipoUsuario'] == 2 ||
    $_SESSION['tipoUsuario']==3) {
    if ($_SESSION['tipoUsuario'] == 1)
        echo "<a href='cadcategorias.php'>Novo</a><br>";
?>
    <h2>Categorias cadastradas</h2>
    <?php
        require_once "../conexao.php";
        $sql = "SELECT * from categorias";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
            echo "<p>id: $linha[id] - 
            $linha[descricao] ";
            if ($_SESSION['tipoUsuario'] == 1) {
                echo " <a href='editarcategoria.php?id=$linha[id]'>Editar</a>";
                echo " <a href='excluircategoria.php?id=$linha[id]'>Excluir</a>";
            }
        echo "</p>";
        }
    }else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
        require_once "../rodape.php";
    ?>
