<?php
    require_once "../topo.php";
    if(!isset($_SESSION['usuarioLogado']) ||
        $_SESSION['usuarioLogado']==false){
        echo "<p>Você não tem permissão para
         executar esta página</p>";
    } else {
        if ($_SESSION['tipoUsuario'] == 1) {
            if(isset($_POST['id']) && isset($_POST['nome']) &&
            isset($_POST['email']) && isset($_POST['senha'])){
                $var_id = $_POST['id'];
                $var_nome = $_POST['nome']; 
                $var_email = $_POST['email']; 
                $var_senha = $_POST['senha']; 
                require_once "../conexao.php";
                try
                    {   
                        //vamos atualizar na tabela
                        $sql="update pessoas set nome='$var_nome',
                        email='$var_email',senha='$var_senha' 
                        where id=$var_id";
                        $query=$conexao->prepare($sql);
                        $query->execute();
                        echo "<p>Atualizado com sucesso!</p>";
                    }
                catch (PDOException $i)
                {
                    //se houver exceção, exibe
                    die("Erro: <code>" . $i->getMessage() . "</code>");
                }
            }//fim do if
            else {
                echo "<p>Preencha o <a href='cadpessoas.php'>
                formulário</a></p>";
            }
        }else
        echo "<p>Você não tem permissão 
        para executar esta ação.</p>";
    }//fim do else da SESSION
    require_once "../rodape.php";
?>
