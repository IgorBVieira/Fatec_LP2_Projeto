<?php
require_once("topo.php");
if(isset($_SESSION['nomeUsuario'])){
    //redirecionar para a página de gerenciamento de conta
    header("location:gerenciamento.php");
} else {
    ?>
    <form name="form1" action="validarlogin.php"
    method="post">
        <label for="email">Digite seu e-mail</label>
        <input type="email" name="email"><br>
        <label for="senha">Digite a senha</label>
        <input type="password" name="senha"><br>
        <input type="submit" value="Acessar">
    </form>
<?php
}
require_once("rodape.php");
?>