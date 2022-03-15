<?php
$_SG['conectaServidor'] = true;
$_SG['abreSessao'] = true;
$_SG['caseSensitive'] = false;
$_SG['validaSempre'] = true;
$_SG['servidor'] = 'localhost';
$_SG['usuario'] = 'root';
$_SG['senha'] = 'vertrigo';
$_SG['banco'] = 'tcc';
$_SG['paginaLogin'] = '../compra.php';
$_SG['tabela'] = 'cliente';

if ($_SG['conectaServidor'] == true) {
  $_SG['link'] = @mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
  mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
}
if ($_SG['abreSessao'] == true)
  session_start();
function validaUsuario($usuario, $senha) {
  global $_SG;

  $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
  $nusuario = addslashes($usuario);
  $nsenha = addslashes($senha);
  $sql = "SELECT `Cod_cli`, `Email_cli` FROM `".$_SG['tabela']."` WHERE ".$cS." `Email_cli` = '".$nusuario."' AND ".$cS." `Senha_cli` = '".$nsenha."' LIMIT 1";
  $query = mysql_query($sql);
  $resultado = mysql_fetch_assoc($query);
  if (empty($resultado)) {
    return false;
  } else {
    $_SESSION['usuarioID'] = $resultado['Cod_cli'];
    $_SESSION['usuarioNome'] = $resultado['Email_cli'];
    if ($_SG['validaSempre'] == true) {
      $_SESSION['usuarioLogin'] = $usuario;
      $_SESSION['usuarioSenha'] = $senha;
    }

    return true;
  }
}
function protegePagina() {
  global $_SG;

  if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
    expulsaVisitante();
  } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
    if ($_SG['validaSempre'] == true) {
      if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
        expulsaVisitante();
      }
    }
  }
}
function expulsaVisitante() {
  global $_SG;
  unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
  header("Location: ".$_SG['paginaLogin']);
}
?>