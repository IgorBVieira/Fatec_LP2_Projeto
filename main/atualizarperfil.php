<?php
    require_once "topo.php";
    if (isset($_SESSION['idUsuario'])) {
        if(isset($_POST['id']) && isset($_POST['nome']) &&
        isset($_POST['email']) && isset($_POST['senha'])){
            $var_id = $_POST['id'];
            $var_nome = $_POST['nome']; 
            $var_email = $_POST['email']; 
            $var_senha = $_POST['senha']; 
            require_once "conexao.php";
            try
            {   
                //vamos atualizar na tabela
                $sql="update pessoas set nome='$var_nome',
                email='$var_email',senha='$var_senha' 
                where id=$_SESSION[idUsuario]";
                $query=$conexao->prepare($sql);
                $query->execute();
                $_SESSION['nomeUsuario'] = $var_nome;
                header("location:gerenciamento.php");
            }
            catch (PDOException $i)
            {
                //se houver exceção, exibe
                die("Erro: <code>" . $i->getMessage() . "</code>");
            }
        }//fim do if
        else {
                echo "<p>Preencha os dados.</p>";
            }
    }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    require_once "rodape.php";
?>
