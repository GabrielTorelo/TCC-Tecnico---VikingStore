				<?php include 'modelos/head_compra.php' ?>
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
			
			function bloquear(e)
			{
				return false
			}
		
			function desbloquear()
			{
				return true
			}
			document.onselectstart=new Function (&quot;return false&quot;)

			if (window.sidebar)
			{
				document.onmousedown=bloquear
				document.onclick=desbloquear
			}
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
		</style>
	<?php
	if (!isset($_POST["Comp_login"]) and !isset($_POST["Comp_pgmento"]) and !isset($_POST["trocar_usuario"]))
		{
			echo '<center>	
					<table>
						<tr>
							<td class="ok"><img src="imagens/loc_pedido.png"></td>
							<td class="nao-ok"><img src="imagens/loc_identificacao.png"></td>
							<td class="nao-ok"><img src="imagens/loc_pagamento.png"></td>
							<td class="nao-ok"><img src="imagens/loc_confirmar.png"></td>
							<td class="nao-ok"><img src="imagens/loc_concluido.png"></td>
						</tr>
					</table>
				  </center>
				<br><br>
			<h1>Aqui estão os seus pedidos!</h1>';
					require("utilitario/conexao.php");
								$total = 0;
									foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
									{
										$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
										$qr    = mysql_query($sql) or die(mysql_error());
										$ln    = mysql_fetch_assoc($qr);
									   
										$Nome_prod  = $ln['Nome_prod'];
										$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
										$sub   = $Preco_a_vista_prod * $qtd;
									   
										$total += $Preco_a_vista_prod * $qtd;
									
							echo '
								<tr>       
									<td>'.$Nome_prod.'</td><br><br>
								</tr>';
									}
								$total = number_format($total, 2, ',', '.');
							echo '<br>
							<form action="" method="post">
								<tr>
									<td><b>TOTAL: R$ '.$total.'<font color="gree"> à vista</font></b></td><br><br>
									<td><button  type="submit" name="Comp_login" type="button" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Continuar a Compra</button></td>
								</tr>
							</form>';	
		}
	else
		{
			echo '<center>	
					<table>
						<tr>
							<td class="ok"><img src="imagens/loc_pedido.png"></td>
							<td class="ok"><img src="imagens/loc_identificacao.png"></td>
							<td class="nao-ok"><img src="imagens/loc_pagamento.png"></td>
							<td class="nao-ok"><img src="imagens/loc_confirmar.png"></td>
							<td class="nao-ok"><img src="imagens/loc_concluido.png"></td>
						</tr>
					</table>
				  </center>
				<br><br>';
			
			if (@$_SESSION['usuarioID'] == true)
				{
					$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
					
					while($dado = mysql_fetch_array($cliente))
					{
						$Nome_cli = $dado['Nome_cli'];
					
						if(!isset($_POST["trocar_usuario"]))
						{
							echo '
								<h1>Deseja continuar a Compra como '.$Nome_cli.'?</h1>
									<form action="" method="post">
										<button name="trocar_usuario" type="submit" style="background-color:#222222; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Trocar Usuario</button>
									</form><br>
									<form action="pagamento.php" method="post">
										<button name="Comp_pgmento" type="submit" style="background-color:#588885; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">Continuar a Compra</button>
									</form>';
						}
					}
					if(isset($_POST["trocar_usuario"]) and !isset($_POST["Comp_pgmento"]))
					{
						unset($_SESSION['usuarioID']);
						echo '
							<h1>Para poder continuar, efetue login!</h1>
								<div class="login-page">
									<div class="form">
										<form class="login-form" action="utilitario/confere.php" method="post" enctype="multi_part/form-data">
											<input type="text" name="Email_cli" placeholder="Email"/>
											<input type="password" name="Senha_cli" placeholder="Senha"/>
											<button class="button">Entrar</button>
											<p class="message">Não tem uma conta? <a href="cliente/index.php" style="font-weight: lighter;">Criar</a></p>
										</form>
									</div>
								</div>';
					}
				}
			else
				{
					echo '
						<h1>Para poder continuar, efetue login!</h1>
							<div class="login-page">
								<div class="form">
									<form class="login-form" action="utilitario/confere.php" method="post" enctype="multi_part/form-data">
										<input type="text" name="Email_cli" placeholder="Email"/>
										<input type="password" name="Senha_cli" placeholder="Senha"/>
										<button class="button">Entrar</button>
										<p class="message">Não tem uma conta? <a href="cliente/index.php" style="font-weight: lighter;">Criar</a></p>
									</form>
								</div>
							</div>';
				}
		}
	?>
	</div>
					<?php include 'modelos/copyright.php' ?>