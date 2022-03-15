<!DOCTYPE HTML>
<?php
include("seguranca.php");
protegePagina();
?>
<?php include 'modelos/header.php' ?>
<div id="altsenha" width="50%" height="100%">
		<h1 style="font-weight: bold; color: #303030;">Alterar Senha</h1><br>
		<form action="" method="post" >
		<input style="border-radius: 6px; border-style: ridge; padding: 0 0 0 3px;" type="password" name="atual_senha" placeholder="Senha Atual"><br><br>
		<input style="border-radius: 6px; border-style: ridge; padding: 0 0 0 3px;" type="password" name="nova_senha" placeholder="Nova Senha"><br><br>
		<input style="border-radius: 6px; border-style: ridge; padding: 0 0 0 3px;" type="password" name="renova_senha" placeholder="Repita Nova Senha">
		<?php include 'utilitario/altsenha.php' ?><br><br>
		<input type="submit" name="altsenha" value="Alterar" style="background-color: #222222; border-radius: 22px; height: 30px; color: #fff; width: 90px; border: 0px; cursor: pointer;">
		</form>
	</div>
</div>
<?php include 'modelos/copyright.php' ?>