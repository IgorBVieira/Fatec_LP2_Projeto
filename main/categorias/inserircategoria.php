<?php
    require_once "../topo.php";
    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['descricao'])){
        $var_descricao = $_POST['descricao']; 
        require_once "../conexao.php";
        try
            {   
                //vamos inserir na tabela
                $sql="insert into categorias (descricao)
                values ('$var_descricao')";
                $query=$conexao->prepare($sql);
                $query->execute();
                $rs = $conexao->lastInsertId()
                    or die(print_r($query->errorInfo(), true));
                echo "<p>Salvo com sucesso!</p>";
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
