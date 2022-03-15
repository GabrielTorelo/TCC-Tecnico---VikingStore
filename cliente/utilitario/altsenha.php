<?php
	
	@$atual_senha = $_POST['atual_senha'];
	@$nova_senha = $_POST['nova_senha'];
	@$renova_senha = $_POST['renova_senha'];
	
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
	while($dado = mysql_fetch_array($cliente))
	{
		$Senha_cli = $dado['Senha_cli'];
	}
	if ($nova_senha == '' and $renova_senha == '' and isset($_POST["altsenha"]))
	{
		echo "<br><br><font color='red'>A Nova Senha n&atilde;o pode ser Nula!!</font>"; 
	}
	else
	{
		if ($atual_senha == $Senha_cli AND $nova_senha == $renova_senha)
		{
			$atualiza = "UPDATE cliente SET Senha_cli = '$nova_senha' where Cod_cli = ".$_SESSION['usuarioID'];
			$confirmacao = mysql_query($atualiza);
			echo "<br><br><font color='red'>Senha alterada com Sucesso!</font>";
		}elseif($atual_senha != $Senha_cli and isset($_POST["altsenha"]))
		{
			echo "<br><br><font color='red'>Senhas não conferem!</font>"; 
		}
		elseif ($nova_senha != $renova_senha) 
		{
			echo "<br><br><font color='red'>Senhas não conferem!</font>";
		}
	}
?>