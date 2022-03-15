	<?php include 'modelos/head.php' ?>
	<?php include 'modelos/slide.php' ?>
	<?php
			if((!isset ($_SESSION['usuarioNome']) == false) and (!isset ($_SESSION['usuarioSenha']) == false))
			{
				
			}
			else
			{
				include 'modelos/popup-login.php';
			}
			@$org = $_POST['org'];
		?>
	<div id="featured">
		<h1>Resultados para sua busca</h1>
				<font size="5" style="margin-left:88%;">Organizar por:</font>
					<form action="" method="post">
						<select onchange='this.form.submit()' name="org" style="float: right; width: 12%; height: 35px; text-align-last:center; margin-top: 5px;">
							<option value="Relevancia">Relevância</option>
							<option value="Precocrescente" <?php if($org == "Precocrescente"){ echo "selected";}else{} ?> >Preço crescente</option>
							<option value="Precodecrescente" <?php if($org == "Precodecrescente"){ echo "selected";}else{} ?> >Preço decrescente</option>
						</select>
					</form><br><br><br><br><br>
		<div class="container">
			<div class="row">
<?php
	include 'utilitario/conexao.php';
	
	@$buscar = addslashes($_GET['busca']);
	@$org = $_POST['org'] ? $_POST['org'] : $_GET['org'];
	
	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
    $registros = 9; 
    $inicio = ($registros*$pagina)-$registros; 
	
	if($org == "Relevancia" or $org == "")
	{
		$busca = mysql_query("SELECT * FROM produtos WHERE Tag_prod LIKE '%$buscar%' ORDER BY `Estoque_prod` asc limit $inicio,$registros");
	}
	else
	{
		if($org == "Precocrescente")
		{
			$busca = mysql_query("SELECT * FROM produtos WHERE Tag_prod LIKE '%$buscar%' ORDER BY `Preco_a_vista_prod` asc limit $inicio,$registros");
		}
		elseif($org == "Precodecrescente")
		{
			$busca = mysql_query("SELECT * FROM produtos WHERE Tag_prod LIKE '%$buscar%' ORDER BY `Preco_a_vista_prod` desc limit $inicio,$registros");
		}
	}
	
	$cmd = mysql_query("SELECT * FROM produtos WHERE Tag_prod LIKE '%$buscar%'");
	$total = mysql_num_rows($cmd);
	$numPaginas = ceil($total/$registros); 
    
	while($dado = mysql_fetch_array($busca))
	{
		$Nome_prod = $dado['Nome_prod'];
		$Preco_prod = $dado['Preco_prod'];
		$Preco_a_vista_prod = $dado['Preco_a_vista_prod'];
		$QtdVezes_prod = $dado['QtdVezes_prod'];
		$Foto_prod = $dado['Foto_prod'];
		$Cod_prod = $dado['Cod_prod'];
?>

	<section class="4u">
		<br>
		<img height="210px" width="250px" src="<?php echo $Foto_prod ?>"/>
			<br>
		<p><?php echo substr($Nome_prod, 0, 25); echo(" ...") ?><br></p>
		<h3>R$ <?php echo $Preco_a_vista_prod ?></h3>
		<h6><i>à vista<br> ou <?php echo $QtdVezes_prod ?>x de <?php $Result = ($Preco_prod / $QtdVezes_prod); $Result = number_format( $Result , 2, ',', '');  echo $Result?> sem juros</i></h6>
			<br>
		<form name="buscaForm" method="get" data-search="suggestion" class="caixa-busca limpar" action="descricao.php">
			<button name="Cod_prod" value="<?php echo $Cod_prod ?>" class="button" style="outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">+ Detalhes</button>
		</form>
			<br><br><br><br>
			<hr>
			<br>
	</section>
<?php } ?>
			</div>
		</div>
<?php 
	for($i = 1; $i < $numPaginas + 1; $i++) 
	{ 
		echo "<a href='buscar.php?pagina=$i&busca=$buscar&org=$org'><button style='border-radius: 20px; width: 30px; height: 30px; background-color: #222222; color: white; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;'>".$i."</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
	} 
?>
	</div>
<?php include 'modelos/copyright.php'?>