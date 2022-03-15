<?php
include "conexao.php";
require_once("seguranca.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $login = (isset($_POST['Email_cli'])) ? $_POST['Email_cli'] : '';
  $senha = (isset($_POST['Senha_cli'])) ? $_POST['Senha_cli'] : '';
  if (validaUsuario($login, $senha) == true) {
    header("Location: ../compra.php");
  } else {
    expulsaVisitante();
  }
}