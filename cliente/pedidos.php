<!DOCTYPE HTML>
<?php
include("seguranca.php");
protegePagina();
?>
<?php include 'modelos/header.php' ?>
<br><br><br><br><h1 style="font-weight: bold; color: #303030;">Seus Pedidos</h1><br><br><br>
	<center>
<?php include'utilitario/meus_pedidos.php';?>
		</div>
<?php include 'modelos/copyright-sair.php' ?>