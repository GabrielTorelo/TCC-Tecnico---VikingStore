<?php
		@$Endereco_cli = $_POST ["Endereco_cli"];
		@$Bairro_cli = $_POST ["Bairro_cli"];
		@$Numero_end_cli = $_POST ["Numero_end_cli"];
		@$Complemento_cli = $_POST ["Complemento_cli"];
		@$Cidade_cli= $_POST ["Cidade_cli"];
		@$Uf_cli= $_POST ["Uf_cli"];

if (isset($_POST["ddresidencia"]) and $Numero_end_cli == '')
{
	echo "<font color='red'>O N&uacute;mero da Resid&ecirc;ncia n&atilde;o pode ser Nulo!</font>";
}
else
{	
$query =mysql_query("UPDATE cliente SET 
					Endereco_cli = '$Endereco_cli', Bairro_cli = '$Bairro_cli', 
					Numero_end_cli = '$Numero_end_cli', Complemento_cli = '$Complemento_cli', 
					Cidade_cli = '$Cidade_cli', Uf_cli = '$Uf_cli' where Cod_cli = ".$_SESSION['usuarioID']);
if($query == TRUE) {
		echo "<font color='red'>Dados Atualizados!</font>";
}
elseif ($query == TRUE and $Uf_cli == '')
{
	echo "<br><font color='red'>Não foi possível atualizar seus Dados</font>";
}
}
?>