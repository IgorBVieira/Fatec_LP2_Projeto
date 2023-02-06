<?php
require_once("topo.php");
//verificar se digitou e-mail e senha
if (isset($_POST['email']) && isset($_POST['senha'])) {
    $varEmail = $_POST['email'];
    $varSenha = $_POST['senha'];
    //verificar se existe no banco de dados
    $sql = "SELECT * FROM pessoas
    where email='$varEmail' and senha='$varSenha'";
    require_once("conexao.php");
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach ($dados as $linha) {
        //se existir, mensagem Ok
        echo "Acesso ok.";
        $_SESSION['usuarioLogado'] = true;
        $_SESSION['idUsuario'] = $linha['id'];
        $_SESSION['nomeUsuario'] = $linha['nome'];
        $_SESSION['tipoUsuario'] = $linha['tipo'];
        header("location:index.php");
    }

    //se não existir, mensagem ERRO
}
require_once("rodape.php");

?>