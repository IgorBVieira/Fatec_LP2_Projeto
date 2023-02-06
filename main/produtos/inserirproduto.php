<?php
    require_once "../topo.php";

    if ($_SESSION['tipoUsuario'] == 1) {
        if(isset($_POST['descricao']) &&
        isset( $_POST['quantidade']) &&
        isset($_POST['precocusto'] ) &&
        isset($_POST['precovenda'] ) &&
        isset($_POST['unidade'])){

        $var_descricao = $_POST['descricao']; 
        $var_quantidade = $_POST['quantidade']; 
        $var_precocusto = $_POST['precocusto']; 
        $var_precovenda = $_POST['precovenda']; 
        $var_unidade = $_POST['unidade'];
        $var_idcategoria = $_POST['idcategoria'];

        require_once "../conexao.php";
        try
            {   
                //vamos inserir na tabela
                $sql="insert into produtos (descricao,quantidade,precocusto,
                precovenda,unidade,idcategoria)
                values ('$var_descricao',$var_quantidade,$var_precocusto,
                $var_precovenda,'$var_unidade',$var_idcategoria)";
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
