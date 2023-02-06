<?php
require_once("topo.php");
?>
<br><br>
    <h2>Sistema de Cadastros</h2>
    <br>
    <?php
    if (isset($_SESSION['nomeUsuario'])) {
        //tipo = 1 - administrador (pode acessar tudo)
        //tipo = 2 - vendedor (acessa produtos, mas não exclui)
        //tipo = 3 - cliente (apenas lista produtos)
        echo "<p>Você está logado como " .
            $_SESSION['nomeUsuario'] . "</p><br>";
        if ($_SESSION['tipoUsuario'] == 1) {
            echo " <a href='pessoas/listarpessoas.php'>Pessoas</a>";
            echo " <a href='produtos/listarprodutos.php'>Produtos</a>";
            echo " <a href='categorias/listarcategorias.php'>Categorias</a>";
        }
        
        if ($_SESSION['tipoUsuario'] == 2) {
            echo " <a href='produtos/listarprodutos.php'>Produtos</a>";
        }
        if ($_SESSION['tipoUsuario'] == 3) {
            echo " <a href='produtos/listarprodutos.php'>Produtos</a>";
        }
    } 
    echo " <a href='login.php'>Login</a>";
    
    ?>

    <br>
    
</body>

</html>