<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
//pegar o id do registro a ser editado
if(isset($_GET['id'])){
    $var_id = $_GET['id'];
    try{
        //selecionar o registro a ser editado
        require_once "../conexao.php";
        $sql = "SELECT * from produtos where id=$var_id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            //mostrar o formulário com os dados do registro
            ?>
            <!-- html -->
            <div class="content">
            <h3 id="titulo">Cadastro de Produtos</h3>
            <fieldset class="form">
            <form name="form1" action="atualizarproduto.php"
            method="post">
            <label for="id">id:<?php echo $linha['id']; ?></label>
            <input type="hidden" name="id" 
            value="<?php echo $linha['id']; ?>">
            
            <br>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao"
            value="<?php echo $linha['descricao']; ?>">
            
            <br>
            <label for="quantidade">Quantidade</label>
            <input type="text" name="quantidade"
            value="<?php echo $linha['quantidade']; ?>">
            
            <br>
            <label for="precocusto">Preço de custo</label>
            <input type="text" name="precocusto"
            value="<?php echo $linha['precocusto']; ?>">
            
            <br>
            <label for="Preço de venda">Preço de venda</label>
            <input type="text" name="precovenda"
            value="<?php echo $linha['precovenda']; ?>">
            
            <br>
            <label for="unidade">Unidade</label>
            <input type="text" name="unidade"
            value="<?php echo $linha['unidade']; ?>">
            
            <br>
            <label for="idcategoria">Categoria</label><br>
            <select name="idcategoria">
            <?php
                $sql2 = "SELECT * from categorias order by descricao";
                $resultado2 = $conexao->query($sql2);
                $dados2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados2 as $linha2) { //pega cada registro do array para mostrar na tela
                    if($linha['idcategoria']==$linha2['id'])
                        echo "<option value='$linha2[id]' selected> 
                            $linha2[descricao]</option>";
                    else
                        echo "<option value='$linha2[id]'> 
                            $linha2[descricao]</option>";

                }
            ?>
            </select>
            </fieldset>
            <input class="botao" type="submit" value="Cadastrar">
            </form>
            </div>
            <?php
        }
    }catch(Exception $erro){
        die("Erro: <code>" . $erro->getMessage() . "</code>");
    }
}else{
    echo "<p>Selecione um registro,
    clique <a href='listarprodutos.php'>aqui</a></p>";
}
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
require_once "../rodape.php";
?>
