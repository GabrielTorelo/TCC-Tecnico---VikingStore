<?php include 'modelos/head.php' ?>
</div>
	<div id="featured">
<?php
	include 'utilitario/conexao.php';
	
	$Cod_prod = addslashes($_GET['Cod_prod']);
	$busca = mysql_query("SELECT * FROM produtos WHERE Cod_prod = $Cod_prod");
	
	while($dado = @mysql_fetch_array($busca))
	{
		$Nome_prod = $dado['Nome_prod'];
		$Preco_prod = $dado['Preco_prod'];
		$Preco_a_vista_prod = $dado['Preco_a_vista_prod'];
		$Desc_prod = $dado['Desc_prod'];
		$QtdVezes_prod = $dado['QtdVezes_prod'];
		$Foto_prod = $dado['Foto_prod'];
		$Cod_prod = $dado['Cod_prod'];
		$Idade_prod = $dado['Idade_prod'];
?>
		<h1><?php echo $Nome_prod ?></h1><br><br><br>
		<div class="container">
			<div class="row">
	<section class="4u">
		<img height="210px" width="250px" src="<?php echo $Foto_prod ?>"/>
			<br>
		<h3>R$ <?php echo $Preco_a_vista_prod ?></h3>
		<h6><i>à vista<br> ou <?php echo $QtdVezes_prod ?>x de <?php $Result = ($Preco_prod / $QtdVezes_prod); $Result = number_format( $Result , 2, ',', '');  echo $Result?> sem juros</i></h6><br>
			<a href="carrinho.php?acao=add&Cod_prod=<?php echo $Cod_prod ?>"<button class="button">Comprar</button></a>
	</section>
	<section class="4u">
		<h3>Um pouco mais sobre o Jogo</h3>
		<font align="justify"><h5 class="descricao"><?php echo $Desc_prod ?></h5><br></font><br>
		<br>
		<br>
		<h1><?php echo $Idade_prod ?><h1>
	</section>
<?php } ?>
<?php
	$busca = mysql_query("SELECT * FROM produtos WHERE Cod_prod = $Cod_prod");
	
	while($dado = @mysql_fetch_array($busca))
	{
		$Desc_prod = $dado['Desc_prod'];
		
		if($Desc_prod == "")
		{
			
		}
		else
		{
			@include 'utilitario/frete.php';
		}
	}
?>
			</div>
		</div>
	</div>
		<?php
			if((!isset ($_SESSION['usuarioNome']) == false) and (!isset ($_SESSION['usuarioSenha']) == false))
			{
				
			}
			else
			{
				include 'modelos/popup-login.php';
			}
		?>
<?php include 'modelos/copyright.php'?>