<?PHP
 
# PHP 7
$conexao = mysqli_connect('mysql.way.digital','way02','Waydigit4l');
$banco = mysqli_select_db($conexao,'way02');
mysqli_set_charset($conexao,'utf8');
 
// $sql = mysqli_query($conexao,"select * from tb_pessoa") or die("Erro");
// while($dados=mysqli_fetch_assoc($sql))
//     {
//         echo $dados['nome'].'<br>';
//     }

?>