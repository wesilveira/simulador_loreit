<?php
session_start();
  $user_id = false;
  if(!isset($_SESSION["user_id"]) or $_SESSION["user_id"] == "")
  {
    header('Location: login.php');
    exit;
  }else{
    if(isset($_GET["logout"]))
    {
      session_destroy();
      header('Location: login.php');
    }else{
      $user_id = $_SESSION["user_id"];
      //get dados usuários
      include "config/db_connect.php";
      $dadosUsuario = false;
      $dadosProposta = false;
      $propostasUsuario = false;

      $buscaDadosUsuario = mysqli_query($conexao,"select * from consultores where id = $user_id");
      if(mysqli_num_rows($buscaDadosUsuario) == 0)
      {
        session_destroy();
        header('Location: login.php');
      }else{
        $dadosUsuario = mysqli_fetch_array($buscaDadosUsuario);
        $responsavel_id= $dadosUsuario["responsavel_id"];
        $operacao_id= $dadosUsuario["operacao_id"];
        $consultor_id= $dadosUsuario["id"];
        echo '<script>localStorage.setItem("responsavel_id",'.$responsavel_id.');</script>';
        echo '<script>localStorage.setItem("consultor_id",'.$consultor_id.');</script>';
        echo '<script>localStorage.setItem("operacao_id",'.$operacao_id.');</script>';

      }

    }
}

?>
