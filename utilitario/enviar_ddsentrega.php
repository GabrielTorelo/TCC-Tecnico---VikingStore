<?php
		@$Endereco_cli = $_POST ["Endereco_cli"];
		@$Bairro_cli = $_POST ["Bairro_cli"];
		@$Numero_end_cli = $_POST ["Numero_end_cli"];
		@$Complemento_cli = $_POST ["Complemento_cli"];
		@$Cidade_cli= $_POST ["Cidade_cli"];
		@$Uf_cli= $_POST ["Uf_cli"];
		@$Cep_cli= $_POST ["Cep_cli"];

if ($Numero_end_cli == '' and isset($_POST["Conf_ddresidencia"]))
{
	echo '<br><br><h4><b>N&uacute;mero da resid&ecirc;ncia n&atilde;o pode ser nulo!</b></h4><br>
		  <input style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 150px; border: 0px; cursor: pointer;" type="submit" name="tnt_novament" value="Tentar Novamente"/><br><br></section>';
}
else
{	
$query = mysql_query("UPDATE cliente SET 
					Endereco_cli = '$Endereco_cli', Bairro_cli = '$Bairro_cli', 
					Numero_end_cli = '$Numero_end_cli', Complemento_cli = '$Complemento_cli', 
					Cidade_cli = '$Cidade_cli', Uf_cli = '$Uf_cli', Cep_cli = '$Cep_cli' where Cod_cli = ".$_SESSION['usuarioID']);
if($query == TRUE) {
		echo '<br><br>
							<h5 class="end_ent"><b>Endere&ccedil;o para Entrega</b></h5>
								<h6>'.$Endereco_cli.' , '.$Numero_end_cli.' - '.$Bairro_cli.'<br>'.$Cidade_cli.' - '.$Uf_cli.' / '.$Complemento_cli.'</h6>
						  <br><br>
							<h2 style="font-size: 22px; margin-bottom: 12px; color: #363636; display: block; font-weight: bold;">Escolha a Forma de Envio</h2>';
					
					include 'utilitario/fretepg.php';
					
					echo'</section>';
}
elseif ($query == TRUE and $Uf_cli == '')
{
	echo "<br><font color='red'><h4>Não foi possível atualizar seus Dados</h4></font></section>";
}
}
?>