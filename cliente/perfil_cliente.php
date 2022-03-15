<!DOCTYPE HTML>
<?php
include("seguranca.php");
protegePagina();
?>
<?php include 'modelos/header-sair.php' ?>

	<h6>Seja bem-vindo</h6><br>
	<?php 
	
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
	while($dado = mysql_fetch_array($cliente))
	{
		$Nome_cli = $dado['Nome_cli'];
?>
	<h1><b><?php echo $Nome_cli ?></b></h1><br><br><br>
<center>
	<table align="center" border="1" bgcolor="white" width="50%" height="100%">
		<tr>
			<th><a href="dados_entrega.php" style="color: #222222; font-family: 'arial'; font-weight: bold;">Dados de Entrega</a></th>
			<th><a href="pedidos.php" style="color: #222222; font-family: 'arial'; font-weight: bold;">Meus Pedidos</a></th>
			<th><a href="alterar_senha.php" style="color: #222222; font-family: 'arial'; font-weight: bold;">Alterar de Senha&nbsp;&nbsp;</a></th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		<tr>
		<tr>
			<th><a href="dados_entrega.php"><img src="imagens/ico_ddentrega.png" width="60" height="60"></a></th>
			<th><a href="pedidos.php"><img src="imagens/ico_pedidos.png" width="60" height="60"></a></th>
			<th><a href="alterar_senha.php"><img src="imagens/ico_altsenha.png" width="60" height="60"></a></th>
		</tr>
	</table>
	<br><br><br><br>
	<a href="../buscar.php"><button style="background-color:#FFF; font-size: 20px; border-radius: 25px; border: 2px solid #7b7c7c; color: #7b7c7c; padding: 5px 15px 5px 15px; cursor:pointer;">Começar a Comprar</button></a>
</center>
		</div>	
<?php } ?>
<?php include 'modelos/copyright-sair.php' ?>