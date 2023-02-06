<?php
require_once "topo.php";
?>

<?php
require_once "conexao.php";
$sql = "select DISTINCT(categorias.id), categorias.descricao 
from categorias, produtos 
where categorias.id=produtos.idcategoria 
order by categorias.descricao";
$resultado = $conexao->query($sql);
$dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados as $linha) {  //pega cada registro do array para mostrar na tela
    echo "| <a href='indexvendas.php?categoria=$linha[id]'>
    $linha[descricao]</a> ";
}
echo "|<br><br><br>";
if(isset($_GET['categoria'])) {
    $var_categoria = $_GET['categoria'];
    $sql2 = "Select * from produtos where idcategoria=$var_categoria
    order by descricao";
} else {
    $sql2 = "SELECT * from produtos order by id desc limit 2";
}
$resultado2 = $conexao->query($sql2);
$dados2 = $resultado2->fetchAll(PDO::FETCH_ASSOC);
foreach ($dados2 as $linha2) {  //pega cada registro do array para mostrar na tela
    echo "<div class='produto'>$linha2[descricao]<br>
    R$ $linha2[precovenda]<br>
    <a href='vermais.php?id=$linha2[id]'>Veja +</a></div>";
}
require_once "rodape.php";
?>