			<?php include 'modelos/head.php' ?>
<?php include'utilitario/acoes_carrinho.php';?>
	<script language='javascript'>
		var mensagem="";
		function clickIE() 
		{
			if (document.all) 
			{
				(mensagem);
				return false;
			}
		}
		
		function clickNS(e) 
		{
			if (document.layers||(document.getElementById&&!document.all)) 
			{
				if (e.which==2||e.which==3) 
				{
					(mensagem);
					return false;
				}
			}
		}
		
		if (document.layers) 
		{
			document.captureEvents(Event.MOUSEDOWN);
			document.onmousedown=clickNS;
		}
		else
		{
			document.onmouseup=clickNS;
			document.oncontextmenu=clickIE;
		}
		
		document.oncontextmenu=new Function("return false")
</script>
<style>
	#carrinho td
	{
		border: 3px solid #FFF;
		padding: 10px 10px 13px 10px;
		border-radius: 25px;
	}
</style>
		<div id="featured">	
				<?php
					if(count(@$_SESSION['carrinho']) == 0)
					{
						echo '
							<tr>
								<td colspan="5"><h1>Não há jogos no carrinho</h1></td>
								<td colspan="5"><a href="index.php"><button style="background-color:#FFF; font-size: 20px; border-radius: 25px; border: 2px solid #7b7c7c; color: #7b7c7c; padding: 5px 15px 5px 15px;">Começar a Comprar</button></a></td>
							</tr>';
						
					}
					else
					{	
						echo'
						<center>
								<h1>Carrinho de Compras</h1>
							<div id="carrinho">
							<table>
									<tr>              
										<th width="244"><b>Nome do Jogo</b></th>
										<th width="79"><b>Quantidade</b></th>
										<th width="89"><b>Preço</b></th>
										<th width="100"><b>SubTotal</b></th>
										<th width="100"><b>Atualizar</b></th>
										<th width="64"><b>Remover</b></th>
									</tr>
									<tr>              
										<th width="244">&nbsp;</th>
										<th width="79">&nbsp;</th>
										<th width="89">&nbsp;</th>
										<th width="89">&nbsp;</th>
										<th width="100">&nbsp;</th>
										<th width="64">&nbsp;</th>
									</tr>

					<form action="?acao=up" method="post">';
						
						require("utilitario/conexao.php");
							$total = 0;
								foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
								{
									$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
									$qr    = mysql_query($sql) or die(mysql_error());
									$ln    = mysql_fetch_assoc($qr);
                                   
									$Nome_prod  = $ln['Nome_prod'];
									$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
									$sub   = number_format($ln['Preco_a_vista_prod'] * $qtd, 2, '.', '.');
                                   
									$total += $Preco_a_vista_prod * $qtd;
                                
						echo '
							<tr>';       
						echo'<td>'; echo substr($Nome_prod, 0, 27); echo(" ..."); echo '</td>';
						echo'	<td><input type="text" style="width:33px; font-size: 14px; margin-left: 13px; margin-right: -10px; padding: 2px 0 2px 3px;" maxlength="3" name="prod['.$Cod_prod.']" value="'.$qtd.'" /></td>
								<td>R$ '.$Preco_a_vista_prod.'</td>
								<td>R$ '.$sub.'</td>
								<td><button type="submit" style="padding:5px 15px 2px 15px; margin-left: 12px; margin-right: 12px;"><img width="15" height="15" src="imagens/refresh.png"/></button></td>
								<td><a href="?acao=del&Cod_prod='.$Cod_prod.'"><button type="button" style="padding:5px 15px 2px 15px;"><img width="15" height="15" src="imagens/delete.png"/></button></a></td>
							</tr>';
								}
					  echo '</div>';
									$total = number_format($total, 2, ',', '.');
									echo '
									<center>
										<div id="total">
											<tr>                                       
												<th>&nbsp;</th>
											</tr>
											<tr>                                       
												<th>&nbsp;</th>
											</tr>
											<tr>                                       
												<th>&nbsp;</th>
											</tr>
											<tr>                                       
												<th><h4 style="margin-left: 0px;"><b>Total</b></h4></th><br>
											</tr>
											<tr>
												<th>&nbsp;</th>
											</tr>
											<tr>
												<td><h4 style="margin-left: 0px; text-align:center;"><b>R$ '.$total.'</b></h4></td>
											</tr>
											<tr>
												<th>&nbsp;</th>
											</tr>
											<tr>
												<th>&nbsp;</th>
											</tr>
										</div>
							</table>
												<a href="index.php" style="margin-right: 0px;"><button type="button" style="background-color:#FFF; font-size: 20px; border-radius: 25px; border: 2px solid #7b7c7c; color: #7b7c7c; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Continuar Comprando</button></a>
												<a href="compra.php" style="margin-left: 0px;"><button type="button" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Realizar Compra</button></a>';
					}
				?>
									</center>
										
						</center>
					</form>
		</div>
<?php include 'modelos/copyright.php'?>