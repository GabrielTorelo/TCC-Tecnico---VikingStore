<?php
include("../utilitario/seguranca.php");
protegePagina();

$cliente = mysql_query("SELECT * FROM cliente WHERE Cod_cli = ".$_SESSION['usuarioID']);
	
	while($dado = mysql_fetch_array($cliente))
	{
		$Nome_cli = $dado['Nome_cli'];
		$CPF_cli = $dado['CPF_cli'];
		$Cidade_cli = $dado['Cidade_cli'];
		$Endereco_cli = $dado['Endereco_cli'];
		$Numero_end_cli = $dado['Numero_end_cli'];
		$Uf_cli = $dado['Uf_cli'];
		$Cep_cli = $dado['Cep_cli'];

$dias_de_prazo_para_pagamento = 5;
$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));
$dadosboleto["nosso_numero"] = "12345678";
$dadosboleto["numero_documento"] = $dadosboleto["nosso_numero"];
$dadosboleto["data_vencimento"] = $data_venc;
$dadosboleto["data_documento"] = date("d/m/Y");
$dadosboleto["data_processamento"] = date("d/m/Y");
$dadosboleto["sacado"] = $Nome_cli;
$dadosboleto["endereco1"] = $Endereco_cli.",".$Numero_end_cli ;
$dadosboleto["endereco2"] = $Cidade_cli." - ".$Uf_cli." - ".$Cep_cli;
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DS";
$dadosboleto["agencia"] = "1234";
$dadosboleto["agencia_dv"] = "1";
$dadosboleto["conta"] = "1234567";
$dadosboleto["conta_dv"] = "1";
$dadosboleto["conta_cedente"] = "1234567";
$dadosboleto["conta_cedente_dv"] = "1";
$dadosboleto["carteira"] = "12";
$dadosboleto["identificacao"] = "Viking - ".$Nome_cli;
$dadosboleto["cpf_cnpj"] = "12.345.678/9101-11";
$dadosboleto["cedente"] = "Viking Store";
	}
require("../utilitario/conexao.php");
$total = 0;
	foreach($_SESSION['carrinho'] as $Cod_prod => $qtd)
	{
		$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
		$qr    = mysql_query($sql) or die(mysql_error());
		$ln    = mysql_fetch_assoc($qr);
                                
			$Preco_a_vista_prod = $ln['Preco_a_vista_prod'];
			$Nome_prod = $ln['Nome_prod'];
			$sub   = number_format($ln['Preco_a_vista_prod'] * $qtd, 2, '.', '.');
                                   
			$total += $Preco_a_vista_prod * $qtd;
	}
		$total = number_format($total, 2, '.', '.');

$valor_cobrado = $_SESSION['frete'];
$taxa_boleto = 1.50;

$dadosboleto["demonstrativo1"] = "Pagamento referente a compra na loja Viking";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, n&atilde;o receber ap&oacute;s o vencimento";
$dadosboleto["demonstrativo2"] = "<br>Taxa banc&aacute;ria - R$ ".number_format($taxa_boleto, 2, '.', '');
$valor_boleto = number_format($valor_cobrado + $taxa_boleto, 2, ',', '');
$dadosboleto["valor_boleto"] = $valor_boleto;
$dadosboleto["valor_unitario"] = $valor_boleto;
$dadosboleto["quantidade"] = count ($_SESSION['carrinho']);

include("include/funcoes_bradesco.php");
include("include/layout_bradesco.php");
?>
