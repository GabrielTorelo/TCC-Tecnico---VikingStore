<!DOCTYPE HTML>
<?php
include("utilitario/seguranca.php");
protegePagina();
?>
				<?php include 'modelos/header-sair.php' ?>
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
			
			/* Funções do PAGAMENTO - JQuery*/
			function ocultaboleto()
			{
				$("#geraboleto").css("display","none");
			}
			function ocultacartao()
			{
				$("#carnum").css("display","none");
			}
			
	$(document).ready
		$(function()
		{
			$("#btn_boleto").click(
				function(e)
				{
					e.preventDefault();
					el = $(this).data('element');
					$(el).toggle();
				});

			$("#btn_cartao").click(
			function(e)
			{
				e.preventDefault();
				el = $(this).data('element');
				$(el).toggle();
			});
		});
	</script>
	<body onselectstart='return false'>
	<div id="featured">
		<style>
			.ok
			{
				background-color: #588885;
			}
			.nao-ok
			{
				background-color: #a09e9e;
			}
			
			#form-pg
			{
				border: 5px solid white;
				border-color: #FFF;
				margin-left: 10px;
				border-radius: 10px;
			}
			#form-resumo
			{
				border: 5px solid white;
				border-color: #FFF;
				margin-left: 5px;
				border-radius: 10px;
			}
			#form-pg h4, h5, h6
			{
				text-align: justify;
				margin-left: 57px;
			}
			#form-pg button
			{
				margin-left: -30px;
			}
			#form-pg h3
			{
				margin-left: -30px;
			}
			#form-pg .nome
			{
				margin-bottom: 4px;
			}
			#form-pg .end_ent
			{
				margin-bottom: 6px;
			}
			
			#boleto h4
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				padding: 10px 10px 10px 10px;
				width: 226px;
				border-radius: 5px 5px 0px 0px;
			}
			#boleto h6
			{
				border-top: 0px;
				background-color: #FFF;
				border-bottom: 0px;
				border-right: 2px solid #9d9c9c;
				border-left: 2px solid #9d9c9c;
				padding: 10px 10px 10px 10px;
				width: 226px;
			}
			#boleto img
			{
				text-align: right;
				display: block;
				margin-top: -12px;
				margin-bottom: 3px;
				margin-left: auto;
				position: relative;
			}
			#boleto h5
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				border-top: 0px;
				border-bottom: 0px;
				padding: 10px 10px 10px 14px;
				width: 226px;
				margin-top: -14px;
				margin-bottom: 0px;
			}
			#boleto button
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				border-top: 0px;
				padding: 20px 10px 10px 10px;
				width: 226px;
				border-radius: 0px 0px 5px 5px;
				margin-left: -6px;
				margin-top: -10px;
			}
			
			#cartão
			{
				margin-top: 15px;
			}
			#cartão h4
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				padding: 10px 10px 10px 10px;
				width: 226px;
				border-radius: 5px 5px 0px 0px;
			}
			#cartão h6
			{
				border-top: 0px;
				background-color: #FFF;
				border-bottom: 0px;
				border-right: 2px solid #9d9c9c;
				border-left: 2px solid #9d9c9c;
				padding: 10px 10px 10px 10px;
				width: 226px;
			}
			#cartão img
			{
				text-align: right;
				display: block;
				margin-top: -12px;
				margin-bottom: 3px;
				margin-left: auto;
				position: relative;
			}
			#cartão h5
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				border-top: 0px;
				border-bottom: 0px;
				padding: 10px 10px 10px 80px;
				width: 226px;
				margin-top: -14px;
				margin-bottom: 0px;
				margin-left: -12px;
			}
			#carnum input
			{
				padding: 1px 1px 1px 5px;
			}
			#cartão button
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				border-top: 0px;
				padding: 10px 10px 10px 10px;
				width: 226px;
				border-radius: 0px 0px 5px 5px;
				margin-left: -12px;
				margin-top: 0;
			}
			#carnum
			{
				background-color: #FFF;
				border: 2px solid #9d9c9c;
				border-top: 0px;
				border-bottom: 0px;
				padding: 20px 10px 0px 10px;
				width: 226px;
				margin-top: -14px;
				margin-bottom: 0px;
				margin-left: 57px;
				border-radius: 0px 0px 5px 5px;
				display: none;
			}
			
			#pedidos h6
			{
				margin-left: 0px;
				margin-right: 0px;
				margin-top: -5px;
				text-align: left;
				border: 2px solid #FFF;
				padding: 20px 10px 20px 10px;
			}
			#pedidos h3
			{
				margin-bottom: -17px;
			}
			
			.row > section
			{
				padding-left: 25px;
				padding-right: 25px;
				width: 406px;
			}
			
			#geraboleto
			{
				display: none;
			}
		</style>
<?php
		if (!isset($_POST["Comp_confir"]) and !isset($_POST["Comp_concluido"]))
		{
			$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
			while($dado = mysql_fetch_array($cliente))
			{
				$Nome_cli = $dado['Nome_cli'];
				$CPF_cli = $dado['CPF_cli'];
				$Endereco_cli = $dado['Endereco_cli'];
				$Numero_end_cli = $dado['Numero_end_cli'];
				$Bairro_cli = $dado['Bairro_cli'];
				$Cidade_cli = $dado['Cidade_cli'];
				$Uf_cli = $dado['Uf_cli'];
				$Complemento_cli = $dado['Complemento_cli'];
			echo '
					<center>	
						<table>
							<tr>
								<td class="ok"><img src="imagens/loc_pedido.png"></td>
								<td class="ok"><img src="imagens/loc_identificacao.png"></td>
								<td class="ok"><img src="imagens/loc_pagamento.png"></td>
								<td class="nao-ok"><img src="imagens/loc_confirmar.png"></td>
								<td class="nao-ok"><img src="imagens/loc_concluido.png"></td>
							</tr>
						</table>
					</center>
				<br><br>
				
				<form action="" method="post">
					<h1>Você está quase lá!</h1>
						<div class="container">
							<div class="row">
							
							<!-- INFORMAÇÕES PESSOAIS -->
				
								<section id="form-pg" class="4u">
									<h3>Informações pessoais</h3>
									<h5 class="nome"><b>'.$Nome_cli.'</b></h5><h6>CPF: '.$CPF_cli.'<br></h6>
								
			';
				if($Endereco_cli != '' and isset($_POST["Conf_ddresidencia"]))
				{
					include 'utilitario/ddsentrega.php';
				}
				else
				{
					include 'utilitario/ddsentrega.php';
				}
			}
				echo '
									
							<!-- FORMA DE PAGAMENTO -->			
							
								<section id="form-pg" class="4u">
									<h3>Forma de pagamento</h3>
								<div id="boleto">
										<a href="javascript:void(0);" id="btn_boleto" data-element="#geraboleto" onclick="return ocultacartao();"><h4><b>Boleto Bancário <img width="17,34" height="10" src="imagens/seta_baixo.png"></b></h4></a>
									<div id="geraboleto">
										<h6>Após a finalização do pedido poderá ser visualizado o boleto bancário.<br> O pagamento poderá ser feito em qualquer lotérica, agência bancária, pelo celular ou internet banking até a data de vencimento.</h6>';
								if($Endereco_cli != '')
								{
									echo'<button name="Comp_confir" type="submit" style="cursor: pointer; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Finalizar a Compra</button><br><br>';
								}
								else
								{
									echo'<button name="Comp_confir" type="submit" disabled="disabled" style="cursor: not-allowed;">Finalizar a Compra</button><br><br>';
								}
								echo'</div>
								</div>
								<div id="cartão">
										<a href="javascript:void(0);" id="btn_cartao" data-element="#carnum" onclick="return ocultaboleto();"><h4><b>Cartão de Credito <img width="17,34" height="10" src="imagens/seta_baixo.png"></b></h4></a><br>
									<div id="carnum">
										<input type="radio" name="bandeira" value="Visa">MasterCard
										<input type="radio" name="bandeira" value="MasterCard">VISA<br><br>
										<input type="text" size="24" maxlength="0" placeholder="Nome"><br><br>
										<input type="text" size="24" maxlength="0" placeholder="Sobrenome"><br><br>
										<input type="text" size="15" maxlength="0" placeholder="Número do cartão">
										<input type="text" size="4" maxlength="0" placeholder="Código"><br><br>
										<input type="text" size="9" maxlength="0" placeholder="Mês">
										<input type="text" size="10" maxlength="0" placeholder="Ano"><br><br>
										<button disabled="disabled" style="cursor: not-allowed;">Finalizar a Compra</button>
									</div>
								</div><br><br>
								</section>
								<section id="form-pg" class="5u">
									<div id="pedidos">
										<h3>Resumo do pedido</h3>
						';
						
						require("utilitario/conexao.php");
							$total = 0;
							$total_pedido = 0;
							$frete_cep = 1;
								foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
								{
									$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
									$qr    = mysql_query($sql) or die(mysql_error());
									$ln    = mysql_fetch_assoc($qr);
                                   
									$NomeNP_prod  = $ln['NomeNP_prod'];
									$Plataf_prod  = $ln['Plataf_prod'];
									$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
									
									$sub = ($Preco_a_vista_prod * $qtd);
									
									$total = $sub;
																		
									if ($total >= 250)
									{
										$frete_pg = 0;
									}
									else
									{
										$frete_pg = $frete_cep;
									}
									
									echo'<center><h6><font color="green">';echo substr($NomeNP_prod, 0, 35); echo('... - '.$Plataf_prod.'');echo '</font></h6><p style="border-radius: 50px; color: #FFF; background-color: #588885; width: 35px; position: absolute; margin-top: -47px; margin-left: 305px;">'.$qtd.'</p><br>';}

								echo'<br><br>
									<h5>Subtotal: R$ '.$total.'</h5><br>
									<h5>Frete: ';if($frete_pg == 0){ echo '<font color="green">Grátis</font>';}else{ if(isset($_POST["Conf_ddresidencia"]) and $Numero_end_cli != ''){echo 'R$ <input style="border: 0px; background-color:#f2f2f2;" readonly="true" type="text" id="frete" name="fretepagar" value="'.$sedex.'"><br>Entrega via: <input style="border: 0px; background-color:#f2f2f2;" readonly="true" type="text" id="escolha" name="fretescolhido" value="'.$escsedex.'">';}else{} };
								$total_pedido = ($total + $frete_pg);
								echo'</div><br><br>
								</section>
							</div>
						</div><br><br>
					</form>';
		}
		else
		{	
			@$frete_pg = $_POST['fretepagar'];
			@$frete_esc = $_POST['fretescolhido'];
			if(isset($_POST["Comp_confir"]))
			{
				echo '
					<center>	
						<table>
							<tr>
								<td class="ok"><img src="imagens/loc_pedido.png"></td>
								<td class="ok"><img src="imagens/loc_identificacao.png"></td>
								<td class="ok"><img src="imagens/loc_pagamento.png"></td>
								<td class="ok"><img src="imagens/loc_confirmar.png"></td>
								<td class="nao-ok"><img src="imagens/loc_concluido.png"></td>
							</tr>
						</table>
					</center>
				<br><br>
				<form action="" method="post">
					<h1>Confirme seu Pedido!</h1>
						<div class="container">
							<div class="row">
								<section id="form-resumo" class="2u">
									<div id="pedidos">
										<h3>Resumo do pedido</h3>';
					require("utilitario/conexao.php");
						$total = 0;
						$total_pedido = 0;
							foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
							{
								$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
								$qr    = mysql_query($sql) or die(mysql_error());
								$ln    = mysql_fetch_assoc($qr);
                                   
								$NomeNP_prod  = $ln['NomeNP_prod'];
								$Foto_prod  = $ln['Foto_prod'];
								$Plataf_prod  = $ln['Plataf_prod'];
								$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
								
								$sub = ($Preco_a_vista_prod * $qtd);
								$sub = number_format($sub, 2, ',', '.');
                                   
								$total = $sub;
								
								echo'<center><h6><font color="green"><img src="'.$Foto_prod.'" width="66" height="55">';echo '<font style="position: absolute;">'.substr($NomeNP_prod, 0, 35); echo('... - '.$Plataf_prod.'');echo '</font><font color="red" style="position: absolute;"><br><br>R$ '.$sub.'</font></font></h6><p style="border-radius: 50px; color: #FFF; background-color: #588885; width: 35px; position: absolute; margin-top: -47px; margin-left: 305px;">'.$qtd.'</p><br>';}
								echo'
									<br><br><br>
							</div>
								</section>
							<section id="form-resumo" class="2u">
									<div id="pedidos">
										<h3>Forma de pagamento</h3>';
							require("utilitario/conexao.php");
								foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
								{
									$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
									$qr    = mysql_query($sql) or die(mysql_error());
									$ln    = mysql_fetch_assoc($qr);
                                   
									$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
									
									$sub = ($Preco_a_vista_prod * $qtd);
									
								}
								
								if ($sub >= 250)
								{
									$frete_pg = 0;
									$total_pedido = $sub;
								}
								else
								{
									$total_pedido = ($sub + $frete_pg);
								}
								
								$_SESSION['frete'] = $total_pedido;
								$total_pedido = number_format($total_pedido, 2, ',', '.');
								
								echo'
										<font style="margin-left: 20px;"><h5><b>Total do pedido: </font><font color="red" size="4">R$ '.$total_pedido.'</font></b></h5><br><br>
										<font size="4"><b>Boleto Bancário</b></font><br><h6><font align="justify" style="position: relative;">Após a finalização do pedido poderá ser visualizado o boleto bancário. O pagamento poderá ser feito em qualquer lotérica, agência bancária, pelo celular ou internet banking até a data de vencimento.</font>.</h6><br><br><br>
									</div>
							</section>
							<section id="form-resumo" class="2u">
									<div id="pedidos">
										<h3>Forma de envio</h3>
										<font style="margin-left: 20px;"><h5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Valor do Frete: </font><font color="green" size="4">';if($frete_pg == 0){echo'Grátis';}else{echo'R$ '.$frete_pg;}
										echo'</font></b></h5><br><br>
										<font size="4"><b>';if($frete_pg == 0){echo 'Grátis disponibilizado pela loja';}elseif($frete_esc == 'SEDEX-10'){echo 'SEDEX 10';}elseif($frete_esc == 'SEDEX'){echo 'SEDEX';}elseif($frete_esc == 'PAC'){echo 'PAC';}echo'</b></font><br><h6><font align="justify" style="position: relative;">';if($frete_pg == 0){echo 'O Frete Grátis é disponibilizado exclusivamente para compras acima de R$ 250.<br>O envio é realizado via SEDEX e chegará em sua residencia em aproximadamente 7 dias';}elseif($frete_esc == 'SEDEX-10'){echo 'Serviço de encomenda da linha expressa para o envio de mercadorias com entrega garantida até as 10 horas da manhã do dia útil seguinte ao da postagem.<br>';}elseif($frete_esc == 'SEDEX'){echo 'Serviço de encomenda da Empresa dos Correios de despacho expresso de encomendas.<br><br>';}elseif($frete_esc == 'PAC'){echo 'Serviço de encomenda da linha econômica para o envio exclusivo de mercadoria.<br><br>';}echo'</font>.</h6><br><br><br>
									</div>
							</section>
						</div>
								</div><br>
					<button name="Comp_concluido" type="submit" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; cursor:pointer; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Confirmar Compra</button>
				</form>';
			}
			elseif(isset($_POST["Comp_concluido"]))
			{
				echo '
					<center>	
						<table>
							<tr>
								<td class="ok"><img src="imagens/loc_pedido.png"></td>
								<td class="ok"><img src="imagens/loc_identificacao.png"></td>
								<td class="ok"><img src="imagens/loc_pagamento.png"></td>
								<td class="ok"><img src="imagens/loc_confirmar.png"></td>
								<td class="ok"><img src="imagens/loc_concluido.png"></td>
							</tr>
						</table>
					</center>
				<br><br>
				
				<form action="cliente/pedidos.php" method="post">';
				
				$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
				while($dado = mysql_fetch_array($cliente))
				{
					$Email_cli = $dado['Email_cli'];
					echo'<h1>Tudo OK, Agora você só precisar pagar o Boleto!</h1>
						 <a target="_blank" href="boleto/index.php"><button name="boleto" type="button" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px; cursor:pointer;">Ver Boleto</button></a>
						 <button name="Comp_concluido" type="submit" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px; cursor:pointer;">Pedidos</button>';
				}
					echo'</form>';
					
				require("utilitario/conexao.php");
								$total = 0;
									foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
									{
										$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
										$qr    = mysql_query($sql) or die(mysql_error());
										$ln    = mysql_fetch_assoc($qr);
									   
										$Nome_prod  = $ln['Nome_prod'];
										$Cod_prod = $ln['Cod_prod'];
										$Idade_prod = $ln['Idade_prod'];
										$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
										
										$sub = $Preco_a_vista_prod * $qtd;
										
									   
										$total = $sub;
										
												$query = mysql_query("INSERT INTO compras (Cod_cli_comp, Idade_prod_comp, Nome_prod_comp, Preco_comp, QtdVezes_comp, Qtd_prod_comp)
																	  VALUES(".$_SESSION['usuarioID'].", '$Idade_prod', '$Nome_prod', '$total', '1', '$qtd')");
										
							//IF PARA TESTAR SE UPOU NO BANCO		
										if (@$query == true)
										{
											echo '<br><br><b>Foi upado no banco:</b> SIM';
										}else
										{
											echo '<br><br><b>Foi upado no banco:</b> NÃO&nbsp;';
										}
									}
			}
		}
?>
	</div>
					<?php include 'modelos/copyright.php' ?>