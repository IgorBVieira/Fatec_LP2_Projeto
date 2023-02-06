<?php
require_once("topo.php");
if(isset($_SESSION['nomeUsuario'])){
?>
    <h2>Gerenciamento de conta</h2><br>
    <a href="mudarperfil.php">Meu perfil</a><br>
    <a href="pedidos.php">Meus pedidos</a><br><br>
    <a href="logout.php">Sair</a><br>
<?php
}else{
    echo "<p>Você precisa estar logado para acessar esta função.</p>";
}
require_once("rodape.php");
?>