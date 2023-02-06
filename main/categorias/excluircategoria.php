<?php
    require_once "../topo.php";
    if ($_SESSION['tipoUsuario'] ==1) {
        if(isset($_GET['id'])){
        $var_id = $_GET['id'];
        require_once "../conexao.php";
        try
            {   
                //vamos excluir da tabela
                $sql="delete from categorias 
                where id=$var_id";
                $query=$conexao->prepare($sql);
                $query->execute();
                echo "<p>Excluído com sucesso!</p>";
            }
        catch (PDOException $i)
        {
            //se houver exceção, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    //fim do if
    else {
        echo "<h2>Preencha o <a href='cadprodutos.php'>
        formulário</a></p>";
    }
}else
echo "<p>Você não tem permissão 
para executar esta ação.</p>";
    require_once "../rodape.php";
    ?>
