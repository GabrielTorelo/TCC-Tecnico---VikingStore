<html>
	<head>
		<meta charset="UTF-8">
		<title>Viking</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style_pg.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<style type="text/css">
			input:focus, select:focus 
			{
				box-shadow: 0 0 0 0;
				border: 0 none;
				outline: 0;
			} 
		</style>
		<script>
			function BlockTAb()
			{
				var tecla = window.event.keyCode;

				if (tecla == 09) 
				{ 
					event.keyCode=0; 
					event.returnValue=false;
				}
				//if (tecla == 116) 
				//{ 
				//	event.keyCode=0; 
				//	event.returnValue=false;
				//}
			}
		</script>
	</head>
	<body class="homepage" onKeyDown="BlockTAb(event);">
		<div id="Copyright">
			<div id="nav-wrapper">
				<nav id="nav">
					<ul>
						<li><a href="index.php">Viking</a></li>
						<li><form name="buscaForm" method="get" data-search="suggestion" class="caixa-busca limpar" action="buscar.php">
							<input name="busca" placeholder="Digite a sua procura..." data-input="suggestion" tabindex="0" type="text" style="width: 550px; height: 45px; font-family: 'helvetica', sans-serif; border: none; padding-left: 10px; border-radius: 50px; margin-top: -10px;" autocomplete="off"></li>
							<li><button class="search-button" style="font-size:13px; background: #222222; width: 80px; height: 45px;color: #fff; font-family: Helvetica, sans-serif; cursor: pointer; border: 4px solid #fff; border-top-right-radius: 2em; border-bottom-right-radius: 2em; position: relative; margin-top: -10px; margin-left: -80px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">BUSCAR</button>
						</form></li>
						<li><a href="cliente/sair.php" class="fa-">Sair</a></li>
					</ul>
				</nav>
			</div>
		</div>