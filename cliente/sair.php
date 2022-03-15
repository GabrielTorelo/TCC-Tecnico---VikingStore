<?php
include("seguranca.php");
protegePagina();
?>
<!DOCTYPE html>
<HTML lang="pt-br">
<head>
	  <meta charset="utf-8"/>
</head>
<body>
	  <?php
		include "../utilitario/conexao.php";
		session_destroy();
		header("location:../index.php");
	  ?>
</body>
</html>