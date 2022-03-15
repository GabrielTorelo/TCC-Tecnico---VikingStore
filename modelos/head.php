<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Viking</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/gallery.css">
		<link rel="stylesheet" href="css/gallery.theme.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/jquery2.min.js"></script>
		<script src="js/owl.carousel.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<style type="text/css">
			html
			{
				overflow-x:hidden;
			}
			
			input:focus, select:focus 
			{
				box-shadow: 0 0 0 0;
				border: 0 none;
				outline: 0;
			} 
		</style>
	</head>
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
	<body class="homepage" onselectstart='return false'>
		<div id="copyright">
			<div id="nav-wrapper">
				<nav id="nav">
					<ul>
						<li><a href="index.php">Viking</a></li>
						<li><form name="buscaForm" method="get" data-search="suggestion" class="caixa-busca limpar" action="buscar.php">
							<input name="busca" placeholder="Digite a sua procura..." data-input="suggestion" tabindex="0" type="text" style="width: 550px; height: 45px; font-family: 'helvetica', sans-serif; border: none; padding-left: 10px; border-radius: 50px; margin-top: -10px;" autocomplete="off"></li>
							<li><button class="search-button" style="font-size:13px; background: #222222; width: 80px; height: 45px;color: #fff; font-family: Helvetica, sans-serif; cursor: pointer; border: 4px solid #fff; border-top-right-radius: 2em; border-bottom-right-radius: 2em; position: relative; margin-top: -10px; margin-left: -80px; outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">BUSCAR</button>
						</form></li>
					<?php 
					include 'utilitario/conexao.php';
					include 'cliente/seguranca.php';
					?>
						<li><?php if ((!isset ($_SESSION['usuarioNome']) == false) and (!isset ($_SESSION['usuarioSenha']) == false)) { echo '<a class="fa-" href="cliente/perfil_cliente.php" >Minha conta</a>'; }else{ echo '<a class="fa-" href="cliente/index.php" >Logar/Cadastrar</a>';}?></li>
						<li><a href="carrinho.php" class="fa-">Carrinho</a></li>
					</ul>
				</nav>
				<!-- <nav class="menu">
					<ul>
						<li><a href="#">Categorias</a>
	         	<ul>
	                  <li><a href="#">Celulares</a></li>
	                  <li><a href="#">Computadores</a></li>
	                  <li><a href="#">Tv, Áudio</a></li>
	                  <li><a href="#">Eletrodomésticos</a></li>
	                  <li><a href="#">Games, Consoles</a></li>
	                  <li><a href="#">Livros</a></li>
	                  <li><a href="#">Brinquedos</a></li>
	                  <li><a href="#">Todos os Departamentos</a></li>
	       		</ul>
						</li>
						<li><a href="#">Pré-Venda</a></li>
						<li><a href="#">Lançamentos</a></li>
						<li><a href="#">Até R$ 100,00</a></li>
						<li><a href="#">Promoção da SEMANA</a></li>
					</ul>
				</nav>
				 <script src="jquery.min.js"></script>
					<script>
						$(".menu>ul").addClass("js");
						$(".menu>ul").addClass("js").before('<div class="atalho">Menu</div>');

						$(".atalho").click(function(){
						$(".menu>ul").toggle();
						});

						$(window).resize(function()
						{
							if(window.innerWidth > 768) {
							$(".menu>ul").removeAttr("style");
						}
						});

					</script> -->
			</div>
		</div>