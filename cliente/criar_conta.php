<?php
	include("../utilitario/conexao.php");
		$Nome_cli = $_POST ["Nome_cli"];
		$Email_cli = $_POST ["Email_cli"];
		$CPF_cli = $_POST ["CPF_cli"];
		$Senha_cli = $_POST ["Senha_cli"];

if($Nome_cli == '' or $Email_cli== '' or $CPF_cli == '' or $Senha_cli == '')
{
	echo "
		<script> alert('Nenhum campo pode ser Nulo!'); 
			    		window.location.href = 'index.php';
		</script>";
}
else
{
	if($CPF_cli != '' and !preg_match("([a-z])",$CPF_cli))
	{
		if($CPF_cli == '000.000.000-00' or $CPF_cli == '111.111.111-11' or $CPF_cli == '222.222.222-22' or $CPF_cli == '333.333.333-33' or $CPF_cli == '444.444.444-44' or $CPF_cli == '555.555.555-55' or $CPF_cli == '666.666.666-66' or $CPF_cli == '777.777.777-77' or $CPF_cli == '888.888.888-88' or $CPF_cli == '999.999.999-99')
		{	
			echo "
				<script> alert('Insira um CPF válido!'); 
						 window.location.href = 'index.php';
				</script>";
		}
		else
		{
			if($Nome_cli == '')
			{	
				echo "
					<script> alert('Campo Nome não pode ser nulo!'); 
							 window.location.href = 'index.php';
					</script>";
			}
			else
			{
				if($Email_cli== '')
				{
					echo "
						<script> alert('Campo Email não pode ser nulo!'); 
								 window.location.href = 'index.php';
						</script>";
				}
				else
				{
					if($Senha_cli== '')
					{
						echo "
							<script> alert('Campo Senha não pode ser nulo!'); 
									 window.location.href = 'index.php';
							</script>";
					}
					else
					{
						function validaEmail($Email_cli) 
						{
							$conta = '/^[a-zA-Z0-9\._-]+?@';
							$domino = '[a-zA-Z0-9_-]+?\.';	
							$gTLD = '[a-zA-Z]{2,6}';
							$ccTLD = '((\.[a-zA-Z]{2,4}){0,1})$/';
							$pattern = $conta.$domino.$gTLD.$ccTLD;

							if (preg_match($pattern, $Email_cli))
								return true;
							else
								return false;
						}
						if(validaEmail($Email_cli))
						{
							$verifica = mysql_query("SELECT * FROM cliente WHERE  Email_cli = '$Email_cli' LIMIT 1") or die(mysql_error());
							$verifica_email = mysql_num_rows($verifica);
						
							if($verifica_email < 1)
							{
								$verific = mysql_query("SELECT * FROM cliente WHERE  CPF_cli = '$CPF_cli' LIMIT 1") or die(mysql_error());
								$verific_cpf = mysql_num_rows($verific);
						
								if($verific_cpf < 1)
								{
									$query = mysql_query("INSERT INTO cliente (Nome_cli, Email_cli, CPF_cli, Senha_cli)
														  VALUES('$Nome_cli', '$Email_cli', '$CPF_cli', '$Senha_cli')");
									if($query == true)
									{
										header("Location: sucesso.php");
									}
									else
									{
										include "modelos/header-index.php";
										echo '<!DOCTYPE HTML>
												<div id="sucesso"><br><br><br><br><br><br>
													<h1><font color="red">Ouve</font> <font color="orange">algum</font> <font color="yellow">problema</font> <font color="green">ao</font> <font color="blue">criar</font> <font color="#00FFFF">sua</font> <font color="magenta">conta!</font></h1><br>
													<a href="index.php"><input type="button" value="Tentar Novamente" style="background-color:#222222; font-size: 20px; border-radius: 25px; border: 2px solid #FFF; color: #FFF; padding: 5px 15px 5px 15px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px; cursor: pointer;"></a>
												</div>
												</div>';
										include "modelos/copyright.php";
									}
								}
								else
								{
									echo "
									<script> alert('O CPF já foi cadastrado no Site!'); 
											 window.location.href = 'index.php';
									</script>";
								}
							}
							else
							{
								echo "
								<script> alert('Esse email já foi cadastrado no Site!'); 
										 window.location.href = 'index.php';
								</script>";
							}
						}
						else
						{
							echo "
								<script> alert('Favor inserir um email válido!'); 
										 window.location.href = 'index.php';
								</script>";
						}	
					}	
				}
			}
		}
	}
	else
	{
		echo "
			<script> alert('Campo CPF nulo ou Inválido!'); 
					 window.location.href = 'index.php';
			</script>";
	}
}
?>