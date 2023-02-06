<?php
require_once "../topo.php";
if ($_SESSION['tipoUsuario'] == 1) {
//pegar o id do registro a ser editado
if(isset($_GET['id'])){
    $var_id = $_GET['id'];
    try{
        //selecionar o registro a ser editado
        require_once "../conexao.php";
        $sql = "SELECT * from categorias where id=$var_id";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            //mostrar o formulário com os dados do registro
            ?>
            <!-- html -->
            <div class="content">
            <h3 id="titulo">Cadastro de Produtos</h3>
            <fieldset class="form">
            <form name="form1" action="atualizarcategoria.php"
            method="post">
            <label for="id">id:<?php echo $linha['id']; ?></label>
            <input type="hidden" name="id" 
            value="<?php echo $linha['id']; ?>">
            
            <br>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao"
            value="<?php echo $linha['descricao']; ?>">
           
            <br>
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
