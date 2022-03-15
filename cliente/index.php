<?php include 'modelos/header-index.php' ?>
<script>
	function formatar(mascara, documento)
	{
		var i = documento.value.length;
		var saida = mascara.substring(0,1);
		var texto = mascara.substring(i)
  
		if (texto.substring(0,1) != saida)
		{
			documento.value += texto.substring(0,1);
		}
	}
</script>
<br><br><br><br><br>
<div class="login-page">
  <div class="form">
		<form id="login-register" class="register-form" action="criar_conta.php" method="post" enctype="multi_part/form-data">
			<input type="text" maxlength="150" name="Nome_cli" placeholder="Nome completo"/>
			<input type="text" maxlength="100" name="Email_cli" placeholder="Email"/>
			<input type="text" maxlength="14" name="CPF_cli" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)"/>
			<input type="password" maxlength="18" name="Senha_cli" placeholder="Senha"/>
			<button class="button">Criar</button>
			<p class="message">Já tem uma conta? <a onclick="Escorder('login')" href="javascript:void(0);">Entrar</a></p>
		</form>
	<div id="login">
		<form id="login-register" class="login-form" action="confere.php" method="post" enctype="multi_part/form-data">
			<input type="text" name="Email_cli" placeholder="Email"/>
			<input type="password" name="Senha_cli" placeholder="Senha"/>
			<button class="button">Entrar</button>
			<p class="message">Não tem uma conta? <a onclick="Escorder('login')" href="javascript:void(0);">Criar</a></p>
		</form>
	</div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
		</div>
				<?php include 'modelos/copyright.php' ?>