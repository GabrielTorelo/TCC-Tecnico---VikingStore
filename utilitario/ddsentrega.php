<script>
	function cep()
	{
		if(document.getElementById('icep1').value.length == 4)
		{
			document.getElementById('icep2').focus();
		}
	}
			$(document).ready( function() 
			{
				$('#cep').blur(function()
				{
					$.ajax
					({
						url : '',
						type : 'POST',
						data: 'cep=' + $('#cep').val(),
						dataType: 'json',
						success: function(data)
						{
							if(data.sucesso == 1)
							{
								$('#rua').val(data.rua);
								$('#bairro').val(data.bairro);
								$('#cidade').val(data.cidade);
								$('#estado').val(data.estado);
								$('#numero').focus();
							}
						}
					});   
					return false;    
				})
			});
		</script>
		<style>
			input[id="numero"].numero::-webkit-input-placeholder 
			{
				color: red;
			}
			
			.cep
			{
				padding: 2px 0 2px 2px;
				margin: 0 auto; 
				border-radius: 4px;
				-moz-border-radius: 4px;
				-webkit-border-radius: 4px;
				-o-border-radius: 4px;
			}
			
			#auto input
			{
				padding: 0 0 0 3px;
				width: 162px;
				height: 25px;
				margin: 0 auto;
			}
			#auto .block
			{
				padding: 0 0 0 3px;
				width: 162px;
				height: 25px;
				margin: 0 auto;
				pointer-events: none;
			}
			#auto .ddresidencia
			{
				margin-bottom: 6px;

			}
			#cep_input
			{
				margin-left: -100px;
			}
		</style>
		<?php
 
			@$cep1 = $_POST['cep1'];
			@$cep2 = $_POST['cep2'];
			$reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" .$cep1.$cep2);
 
			$dados['sucesso'] = (string) $reg->resultado;
			$dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
			$dados['bairro']  = (string) $reg->bairro;
			$dados['cidade']  = (string) $reg->cidade;
			$dados['estado']  = (string) $reg->uf;
		
			$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
			while($dado = mysql_fetch_array($cliente))
			{
				$Endereco_cli = $dado['Endereco_cli'];
			
		if ($cep1 == '' and !isset($_POST["Conf_ddresidencia"]))
		{
				echo '<br><br>
						<h5 class="end_ent"><b>Digite seu CEP</b></h5><br>
						<div id="cep_input">
						<input style="border-radius: 6px; border-style: ridge;" class="cep" id="icep1" onkeypress="cep();" name="cep1" type="tel" class="text" size="5" maxlength="5" onkeypress="ChecarTAB();" onkeyup="Mostra(this, 5); mascara(this,numeros,event);" onfocus="PararTAB(this);"> - 
						<input style="border-radius: 6px; border-style: ridge;" class="cep" id="icep2" onkeypress="cep();" name="cep2" type="tel" class="text" size="3" maxlength="3" onkeyup="mascara(this,numeros,event);">&nbsp;&nbsp;<br><br>
						<input name="Config_ddresidencia" type="submit" value="Pesquisar" style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 90px; border: 0px; cursor: pointer;"/><br><br>
						</div>
						</section>';
		}		
		
		elseif ($dados['estado'] == '' and isset($_POST["Config_ddresidencia"]))
		{
						echo '	<br><br><h4><b>Por favor digite um CEP válido!</b></h4><br>
								<input style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 150px; border: 0px; cursor: pointer;" type="submit" name="tent_novament" value="Tentar Novamente"/><br><br></section>';
		}
		elseif (isset($_POST["Config_ddresidencia"]))
		{
				echo '</form>
						<br><br><div id="auto">
							<h4 class="ddresidencia"><b>Confirme os Dados de sua Residência</b></h4><br>
							<form action="" method="post">
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="0" name="Cep_cli" class="block" id="rua" value="'.$cep1.''.$cep2.'"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="0" name="Endereco_cli" class="block" id="rua" value="'.$dados['rua'].'"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="0" name="Bairro_cli" class="block" id="bairro" value="'.$dados['bairro'].'"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="5" name="Numero_end_cli" class="numero" id="numero" placeholder="Número"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="20" name="Complemento_cli" class="numero" id="numero" placeholder="Complemento"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="0" name="Cidade_cli" class="block" id="cidade" value="'.$dados['cidade'].'"/><br><br>
								<input style="border-radius: 6px; border-style: ridge;" type="text" maxlength="0" name="Uf_cli" class="block" id="estado" value="'.$dados['estado'].'"/><br><br>
								<input name="Conf_ddresidencia" type="submit" value="Confirmar" style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 90px; border: 0px; cursor: pointer;"/>
							</form>
						</div><br><br>
						</section>';
		}
			}
?>				
<?php include'enviar_ddsentrega.php'?>