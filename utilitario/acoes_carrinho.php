<script language='JavaScript'>
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
<?php 
	if(!isset($_SESSION)) 
    {	
		session_start(); 
	}
	
	if(isset($_GET['acao']))
	{
		if($_GET['acao'] == 'add')
		{
			$Cod_prod = intval($_GET['Cod_prod']);
			if(!isset($_SESSION['carrinho'][$Cod_prod]))
			{
				$_SESSION['carrinho'][$Cod_prod] = 1;
			}
			else
			{
				$_SESSION['carrinho'][$Cod_prod] += 1;
			}
		}
		
		if($_GET['acao'] == 'del')
		{
			$Cod_prod = intval($_GET['Cod_prod']);
			if(isset($_SESSION['carrinho'][$Cod_prod]))
			{
				unset($_SESSION['carrinho'][$Cod_prod]);
			}
		}
		
		if($_GET['acao'] == 'up')
		{
			if(is_array($_POST['prod']))
			{
				foreach($_POST['prod'] as $Cod_prod => $qtd)
				{	
					$sql   = "SELECT * FROM produtos WHERE Cod_prod= '$Cod_prod'";
					$qr    = mysql_query($sql) or die(mysql_error());
					$ln    = mysql_fetch_assoc($qr);
					
					$Cod_prod  = intval($Cod_prod);
					$qtd = intval($qtd);
					$Estoque_prod = $ln['Estoque_prod'];
					if($qtd <= $Estoque_prod)
					{
						if(!empty($qtd) || $qtd <> 0)
						{
							$_SESSION['carrinho'][$Cod_prod] = $qtd;
						}
						else
						{
							unset($_SESSION['carrinho'][$Cod_prod]);
						}
					}
					else
					{
						
					}
				}
			}
		}
	}
?>