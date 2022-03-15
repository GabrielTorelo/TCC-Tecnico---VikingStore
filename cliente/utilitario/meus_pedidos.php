	<div id="tabela">
		<table align="center" border="1" bgcolor="white" width="59%" height="100%">
			<tr>
				<th><b>Código</b></th>
				<th><b>Nome do Jogo</b></th>
				<th><b>Valor Total</b></th>
				<th><b>Parcelas</b></th>
				<th><b>Quantidade</b></th>
				<th><b>Class. Indicativa</b></th>
				<th><b>Status da Compra</b></th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
<?php 
	
		$cliente = mysql_query("SELECT * FROM compras WHERE Cod_cli_comp = ".$_SESSION['usuarioID']);
	
	while($dado = mysql_fetch_array($cliente))
	{
		$Cod_comp = $dado['Cod_comp'];
		$Nome_prod_comp = $dado['Nome_prod_comp'];
		$Preco_comp = $dado['Preco_comp'];
		$QtdVezes_comp = $dado['QtdVezes_comp'];
		$Qtd_prod_comp = $dado['Qtd_prod_comp'];
		$Idade_prod_comp = $dado['Idade_prod_comp'];
		$Status_comp= $dado['Status_comp'];
?>
			<tr>
				<th class="produtos"><?php echo $Cod_comp ?></th>
				<th class="produtos"><?php echo substr($Nome_prod_comp, 0, 14); echo(" ...") ?></th>
				<th class="produtos"><?php echo 'R$ '.$Preco_comp ?></th>
				<th class="produtos"><?php echo $QtdVezes_comp.'x' ?></th>
				<th class="produtos"><?php echo $Qtd_prod_comp ?></th>
				<th class="produtos"><?php echo $Idade_prod_comp ?></th>
				<th class="produtos"><?php if($Status_comp == 'Pendente'){ echo '<font color="red">'.$Status_comp.'</font>';}elseif($Status_comp == 'Confirmado'){ echo '<font color="orange">'.$Status_comp.'</font>';}elseif($Status_comp == 'Entregue'){ echo '<font color="green">'.$Status_comp.'</font>';}?></th>
			</tr>
			<tr>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
<?php } ?>
		</table>
	</center>
	</div>