			<?php include 'modelos/head.php' ?>
			<?php include 'modelos/slide.php' ?>
				<nav id="prop">
					<ul>
						<li><img width="100%" height="100%" src="imagens/beneficios.png" alt=""></li>
					</ul>
				</nav>	
		<?php
			if((!isset ($_SESSION['usuarioNome']) == false) and (!isset ($_SESSION['usuarioSenha']) == false))
			{
				
			}
			else
			{
				include 'modelos/popup-login.php';
			}
		?>
		<div id="featured">
			<h1>Pré-Vendas</h1>
			<section id="demos">
    <div class="row">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
		  <?php
					include 'utilitario/conexao.php';
	
			$busca = mysql_query("SELECT * FROM produtos WHERE Nome_prod LIKE '%Pre-venda%'");
	
			while($dado = mysql_fetch_array($busca))
			{
				$Nome_prod = $dado['Nome_prod'];
				$Preco_prod = $dado['Preco_prod'];
				$Preco_a_vista_prod = $dado['Preco_a_vista_prod'];
				$QtdVezes_prod = $dado['QtdVezes_prod'];
				$Foto_prod = $dado['Foto_prod'];
				$Cod_prod = $dado['Cod_prod'];
			?>	
            <div class="item">
				<img height="210px" width="270px" src="<?php echo $Foto_prod ?>"/>
					<br>
				<p><?php echo substr($Nome_prod, 0, 25); echo(" ...") ?><br></p>
				<h3>R$ <?php echo $Preco_a_vista_prod ?></h3>
				<h6><i>à vista<br> ou <?php echo $QtdVezes_prod ?>x de <?php $Result = ($Preco_prod / $QtdVezes_prod); $Result = number_format( $Result , 2, ',', '');  echo $Result?> sem juros</i></h6>
					<br>
				<form name="buscaForm" method="get" data-search="suggestion" class="caixa-busca limpar" action="descricao.php">
					<button name="Cod_prod" value="<?php echo $Cod_prod ?>" class="button" style="outline: 0px auto -webkit-focus-ring-color; outline-offset: 0px;">+ Detalhes</button>
				</form>
            </div>
		<?php } ?>
          </div>
          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [100])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>
        </div>
    </div>
    </section>
		</div>
		</div>
	</div>
	<?php include 'modelos/copyright.php'?>