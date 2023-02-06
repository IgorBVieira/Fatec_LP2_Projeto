<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="content">
<h3 id="titulo">Cadastro de Pessoas</h3>
<fieldset class="form">
    <form name="form1" action="inserirpessoa.php"
    method="post">
    <label for="id">id</label>
    <input type="text" name="id"><br>
    <label for="nome">Nome</label>
    <input type="text" name="nome" required><br>
    <label for="E-mail">E-mail</label>
    <input type="email" name="email" required><br>
    <label for="senha">Senha</label>
    <input type="password" name="senha" required><br>
    <label for="tipo">Tipo de usuário</label><br>
    <select name="tipo">
        <option value="1">Administrador</option>
        <option value="2">Cliente</option>
        <option value="3">Outros</option>
    </select><br>
    </fieldset>
    <input class="botao" type="submit" value="Cadastrar">
    </form>
</div>
<?php
} else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
require_once "../rodape.php";
?>