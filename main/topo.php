<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cadastros</title>
    <link href="/lp2noite/projetocadastro/estilos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- barra de navegação -->
<ul>
  <li><a href="indexvendas.php">Início</a></li>
  <li><a href="indexvendas.php">Produtos</a></li>
  
<?php
session_start();
if (isset($_SESSION['carrinho']))
    echo "<li><a href='carrinho.php'>Carrinho (".
    $_SESSION['qtde'].")</a></li>";
        //$_SESSION['carrinho'] . ")</a></li>";
else
    echo "<li><a href='carrinho.php'>Carrinho</a></li>";        
echo "<li style='float:right'>";
if(isset( $_SESSION['nomeUsuario']))
    echo "<a class='active' href='login.php'>".
    $_SESSION['nomeUsuario']."</a></li>";
else
    echo "<a class='active' href='login.php'>Login</a></li>";

?>
</ul>
<br><br>