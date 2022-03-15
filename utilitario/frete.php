<script>
function frete()
	{
		if(document.getElementById('icep1').value.length == 4)
		{
			document.getElementById('icep2').focus();
		}
	}
function Popfrete()
	{
		varWindow = window.open ('filha.html', 'popup' )
	}
</script>
	<?php
		@$cep1 = $_POST['cep1'];
		@$cep2 = $_POST['cep2'];
	?>
	<section class="4u">
		<h3>Formas de Pagamento</h3>
		<img height="103px" width="420px" src="imagens/formas-pagamento.png"/><br>
		<h3>Calculador de Frete</h3>
		<form method="POST" action="">
			<div id="cepbox" class="cepbox">
				<label for="cep1">CEP :</label>
					<input id="icep1" onkeypress="frete();" name="cep1" type="tel" class="text" size="5" maxlength="5" onkeypress="ChecarTAB();" onkeyup="Mostra(this, 5); mascara(this,numeros,event);" onfocus="PararTAB(this);" <?php echo 'value="'.$cep1.'"'?>> - 
					<input id="icep2" onkeypress="frete();" name="cep2" type="tel" class="text" size="3" maxlength="3" onkeyup="mascara(this,numeros,event);" <?php echo 'value="'.$cep2.'"'?> >&nbsp;&nbsp;
					<input style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 90px;" type="submit" value="Calcular">
			</div>
		</form>
		<table>
		<?php
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$parametros['sCepDestino'] = "$cep1"."$cep2";
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
		$freete = $linhas->Valor;
		$freete = number_format($freete, 2, ',', '.');
		?>
			<tr>
			<th>
			<br><br>
			<h5><b>SEDEX 10</b></h5><br>
			<h4><b>R$ <?php echo $linhas->Valor.'<br>';?></b></h4><br>
			<h6>Entregue em <?php echo $linhas->PrazoEntrega.' Dias <br>';?>&nbsp</h6>
			</th>
		<?php } }?>
<?php
	@$cep1 = $_POST['cep1'];
	@$cep2 = $_POST['cep2'];
	
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$parametros['sCepDestino'] = "$cep1"."$cep2";
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
		$freete = $linhas->Valor;
		$freete = number_format($freete, 2, ',', '.');
		?>
			<th>
			<br><br>
			<h5><b>SEDEX</b></h5><br>
			<h4><b>R$ <?php echo $linhas->Valor.'<br>';?></b></h4><br>
			<h6>Entregue em <?php echo $linhas->PrazoEntrega.' Dias <br>';?></h6>
			</th>
		<?php }else { echo "<br><h6>Digite um CEP válido!</h6>"; } }?>
<?php
	@$cep1 = $_POST['cep1'];
	@$cep2 = $_POST['cep2'];
	
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$parametros['sCepDestino'] = "$cep1"."$cep2";
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
		$freete = $linhas->Valor;
		$freete = number_format($freete, 2, ',', '.');
		?>
			<th>
			<br><br>
			<h5><b>PAC</b></h5><br>
			<h4><b>R$ <?php echo $linhas->Valor.'<br>';?></b></h4><br>
			<h6>Entregue em <?php echo $linhas->PrazoEntrega.' Dias <br>';?></h6>
			</th>
		<?php } }?>
<?php
	@$cep1 = $_POST['cep1'];
	@$cep2 = $_POST['cep2'];
	
	$parametros = array();
	$parametros['nCdEmpresa'] = '';
	$parametros['sDsSenha'] = '';
	$parametros['sCepOrigem'] = '14801040';
	$parametros['sCepDestino'] = "$cep1"."$cep2";
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
		?>
			<th>
			<br><br>
			<h5><b>GRÁTIS</b></h5><br>
			<h4><b>R$ 0,00</b></h4><br>
			<h6>Compras acima de&nbsp;R$250,00</h6><h6>&nbsp;</h6>
			</th>
			</tr>
		<?php } }?>
	</section>
		</table>