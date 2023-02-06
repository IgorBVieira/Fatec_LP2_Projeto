<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
?>
<div class="content">
<h3 id="titulo">Cadastro de Produtos</h3>
<fieldset class="form">
<form name="form1" action="inserirproduto.php"
method="post">
<label for="descricao">Descrição</label>
<input type="text" name="descricao" required><br>
<label for="quantidade">Quantidade</label>
<input type="text" name="quantidade" required><br>
<label for="precocusto">Preço de custo</label>
<input type="text" name="precocusto" required><br>
<label for="Preço de venda">Preço de venda</label>
<input type="text" name="precovenda" required><br>
<label for="unidade">Unidade</label>
<input type="text" name="unidade" required><br>
<label for="idcategoria">Categoria</label><br>
<select name="idcategoria">
<?php
    require_once "../conexao.php";
    $sql = "SELECT * from categorias order by descricao";
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) { //pega cada registro do array para mostrar na tela
        echo "<option value='$linha[id]'> 
            $linha[descricao]</option>";
    }
?>
</select>
</fieldset>
<input class="botao" type="submit" value="Cadastrar">
</form>
</div>
<?php
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
require_once "../rodape.php";
?>