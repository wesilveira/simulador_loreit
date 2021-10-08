<?PHP
 
# PHP 7
$conexao = mysqli_connect('mysql.loreit.com.br','loreit','Lor3i7');
$banco = mysqli_select_db($conexao,'loreit');
mysqli_set_charset($conexao,'utf8');
 
// $sql = mysqli_query($conexao,"select * from tb_pessoa") or die("Erro");
// while($dados=mysqli_fetch_assoc($sql))
//     {
//         echo $dados['nome'].'<br>';
//     }

?>