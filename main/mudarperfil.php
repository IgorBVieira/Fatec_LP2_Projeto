<?php
require_once "topo.php";
    if (isset($_SESSION['idUsuario'])) {
    try {
        //selecionar o registro a ser editado
        require_once "conexao.php";
        $sql = "SELECT * from pessoas where id=$_SESSION[idUsuario]";
        $resultado = $conexao->query($sql);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($dados as $linha) {
            //mostrar o formulário com os dados do registro
?>
            <!-- html -->
            <div class="content">
            <h3 id="titulo">Cadastro de Pessoas</h3>
            <fieldset class="form">
            <form name="form1" action="atualizarperfil.php"
            method="post">
            <label for="id">id:<?php echo $linha['id']; ?></label>
            <input type="hidden" name="id" 
            value="<?php echo $linha['id']; ?>">
            <label for="nome">Nome</label>
            <input type="text" name="nome" required
            value="<?php echo $linha['nome']; ?>"><br>
            <label for="E-mail">E-mail</label>
            <input type="email" name="email" required
            value="<?php echo $linha['email']; ?>"><br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" required
            value="<?php echo $linha['senha']; ?>"><br>
                
        </fieldset>
            <input class="botao" type="submit" value="Cadastrar">
            </form>
            </div>
    <?php
    }//fim do foreach
} catch (Exception $erro) {
    die("Erro: <code>" . $erro->getMessage() . "</code>");
}
}else
    echo "<p>Você não tem permissão 
    para executar esta ação.</p>";
require_once "rodape.php";
?>
