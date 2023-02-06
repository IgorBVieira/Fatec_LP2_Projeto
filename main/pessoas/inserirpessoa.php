<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
} else {
    if ($_SESSION['tipoUsuario'] == 1) {
        if (
            isset($_POST['id']) && isset($_POST['nome']) &&
            isset($_POST['email']) && isset($_POST['senha'])
        ) {
            $var_id = $_POST['id'];
            $var_nome = $_POST['nome'];
            $var_email = $_POST['email'];
            $var_senha = $_POST['senha'];
            $var_tipo = $_POST['tipo'];
            require_once "../conexao.php";
            try {
                //vamos inserir na tabela
                $sql = "insert into pessoas (nome,email,senha,tipo)
                values ('$var_nome','$var_email',
                    '$var_senha',$var_tipo)";
                $query = $conexao->prepare($sql);
                $query->execute();
                $rs = $conexao->lastInsertId()
                    or die(print_r($query->errorInfo(), true));
                echo "<p>Salvo com sucesso!</p>";
            } catch (PDOException $i) {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
        } //fim do if
        else {
            echo "<h2>Preencha o <a href='cadpessoas.php'>
        formulário</a></p>";
        }
    }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
}//fim do else da SESSION
    require_once "../rodape.php";
    ?>
