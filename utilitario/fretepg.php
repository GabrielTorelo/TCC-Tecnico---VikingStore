<table>
<style>
	#form-frete
	{
		border: 5px solid white;
		border-color: #FFF;
		margin-left: -10px;
		margin-right: 2px;
		border-radius: 10px;
	}
	#form-frete input
	{
		margin-top: 7px;
	}
	#form-frete2
	{
		border: 5px solid white;
		border-color: #FFF;
		margin-left: 115px;
		margin-right: 2px;
		margin-top: -132px;
		border-radius: 10px;
	}
	#form-frete2 input
	{
		margin-top: 7px;
	}
	#form-frete3
	{
		border: 5px solid white;
		border-color: #FFF;
		margin-left: 240px;
		margin-right: 2px;
		margin-top: -132px;
		border-radius: 10px;
	}
	#form-frete3 input
	{
		margin-top: 7px;
	}
</style>
<?php
	require("utilitario/conexao.php");
		$total = 0;
		$total_pedido = 0;
		$frete_cep = '0,00';
			foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
			{
				$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
				$qr    = mysql_query($sql) or die(mysql_error());
				$ln    = mysql_fetch_assoc($qr);
                                   
				$NomeNP_prod  = $ln['NomeNP_prod'];
				$Plataf_prod  = $ln['Plataf_prod'];
				$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
				$sub   = number_format($ln['Preco_a_vista_prod'] * $qtd, 2, ',', '.');
                                   
				$total += $Preco_a_vista_prod * $qtd;
			}
	if($total >= '250')
	{
		echo'
			<tr>
				<th>
					<br>
					<h5><b>Envio <font  color="green">GRATUITO</font> R$ 0,00</b></h5><br><br>
				</th>
			</tr>';
	}
	else
	{
		echo '';
?>
<?php
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	while($dado = mysql_fetch_array($cliente))
	{
                                   
		$Cep_cli  = $dado['Cep_cli'];
		
		$parametros['sCepDestino'] = "$Cep_cli";
	}
	$parametros['nVlPeso'] = '1';
	$parametros['nCdFormato'] = '1';
	$parametros['nVlComprimento'] = '19';
	$parametros['nVlAltura'] = '4';
	$parametros['nVlLargura'] = '15';
	$parametros['nVlDiametro'] = '0';
	$parametros['sCdMaoPropria'] = 's';
	$parametros['nVlValorDeclarado'] = '200';
	$parametros['sCdAvisoRecebimento'] = 'n';
	$parametros['StrRetorno'] = 'xml';
	$parametros['nCdServico'] = '40010';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			$sedex = $linhas->Valor;
			$sedex = str_replace(",",".", $sedex);
			$sedex = floatval($sedex);
		?>
		<section id="form-frete" class="4u">
		<input type="radio" name="frete" checked="CHECKED" onclick="document.getElementById('frete').value='<?php echo $sedex?>';document.getElementById('escolha').value='SEDEX'"><br><br>	
			<b>SEDEX</b><br><br>
			<b> R$ <?php echo $linhas->Valor.'<br>';?></b><br>
			<font size="1">Entregue em <?php echo $linhas->PrazoEntrega.''; if($linhas->PrazoEntrega == 1){echo ' Dia <br>';}else{echo ' Dias <br>';}?></font><br>
		</section>
		<?php } }?>
<?php
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	while($dado = mysql_fetch_array($cliente))
	{
                                   
		$Cep_cli  = $dado['Cep_cli'];
		
		$parametros['sCepDestino'] = "$Cep_cli";
	}
	$parametros['nVlPeso'] = '1';
	$parametros['nCdFormato'] = '1';
	$parametros['nVlComprimento'] = '19';
	$parametros['nVlAltura'] = '4';
	$parametros['nVlLargura'] = '15';
	$parametros['nVlDiametro'] = '0';
	$parametros['sCdMaoPropria'] = 's';
	$parametros['nVlValorDeclarado'] = '200';
	$parametros['sCdAvisoRecebimento'] = 'n';
	$parametros['StrRetorno'] = 'xml';
	$parametros['nCdServico'] = '40215';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			$sedex_dez = $linhas->Valor;
			$sedex_dez = str_replace(",",".", $sedex_dez);
			$sedex_dez = floatval($sedex_dez);
		?>
		<section id="form-frete2" class="4u">
		<input type="radio" name="frete" onclick="document.getElementById('frete').value='<?php echo $sedex_dez?>';document.getElementById('escolha').value='SEDEX-10'"><br><br>
			<b>SEDEX-10</b><br><br>
			<b> R$ <?php echo $linhas->Valor.'<br>';?></b><br>
			<font size="1">Entregue em <?php echo $linhas->PrazoEntrega.''; if($linhas->PrazoEntrega == 1){echo ' Dia <br>';}else{echo 'Dias <br>';}?></font><br>
		</section>
		<?php } }?>
<?php
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	while($dado = mysql_fetch_array($cliente))
	{
                                   
		$Cep_cli  = $dado['Cep_cli'];
		
		$parametros['sCepDestino'] = "$Cep_cli";
	}
	$parametros['nVlPeso'] = '1';
	$parametros['nCdFormato'] = '1';
	$parametros['nVlComprimento'] = '19';
	$parametros['nVlAltura'] = '4';
	$parametros['nVlLargura'] = '15';
	$parametros['nVlDiametro'] = '0';
	$parametros['sCdMaoPropria'] = 's';
	$parametros['nVlValorDeclarado'] = '200';
	$parametros['sCdAvisoRecebimento'] = 'n';
	$parametros['StrRetorno'] = 'xml';
	$parametros['nCdServico'] = '41106';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			$pac = $linhas->Valor;
			$pac = str_replace(",",".", $pac);
			$pac = floatval($pac);
		?>
		<section id="form-frete3" class="4u">
		<input type="radio" name="frete" onclick="document.getElementById('frete').value='<?php echo $pac?>';document.getElementById('escolha').value='PAC'"><br><br>
			<b>PAC</b><br><br>
			<b> R$ <?php echo $linhas->Valor.'<br>';?></b><br>
			<font size="1">Entregue em <?php echo $linhas->PrazoEntrega.''; if($linhas->PrazoEntrega == 1){echo ' Dia <br>';}else{echo ' Dias <br>';}?></font><br>
		</section>
	<?php } } }?>
	</section>
		</table>
<?php
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	while($dado = mysql_fetch_array($cliente))
	{
                                   
		$Cep_cli  = $dado['Cep_cli'];
		
		$parametros['sCepDestino'] = "$Cep_cli";
	}
	$parametros['nVlPeso'] = '1';
	$parametros['nCdFormato'] = '1';
	$parametros['nVlComprimento'] = '19';
	$parametros['nVlAltura'] = '4';
	$parametros['nVlLargura'] = '15';
	$parametros['nVlDiametro'] = '0';
	$parametros['sCdMaoPropria'] = 's';
	$parametros['nVlValorDeclarado'] = '200';
	$parametros['sCdAvisoRecebimento'] = 'n';
	$parametros['StrRetorno'] = 'xml';
	$parametros['nCdServico'] = '40010';
	
	
	$parametros = http_build_query($parametros);
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
	$curl = curl_init($url.'?'.$parametros);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$dados = curl_exec($curl);
	$dados = simplexml_load_string($dados);
	
	foreach($dados->cServico as $linhas) {
		if($linhas->Erro == 0) {
			$sedex = $linhas->Valor;
			$sedex = str_replace(",",".", $sedex);
			$sedex = floatval($sedex);
			$escsedex = 'SEDEX';
} }?>