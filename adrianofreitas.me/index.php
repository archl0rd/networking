<?php
/**
 *
 * @author archl0rd
 * @link https://adrianofreitas.me/
 *
 */

//Pega o código do idioma
$lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
//Define o idioma em que as mensagem serão exibidas, de acordo com o código capturado
switch ($lang) {
  case 'en':
    require_once('translations/en_US.php');
    break;
  case 'pt':
    require_once('translations/pt_BR.php');
    break;
  default:
    require_once('translations/en_US.php');
    break;
}



$error_msg = array();
if (isset($_GET['e']) && is_numeric($_GET['e'])) {
  $status = array(
    400 => array('Syntax error!'),
    401 => array('Try again! '),
    403 => array('This is a private place!'),
    404 => array("I cant't seem to find the page you're looking for. Sorry!"),
    405 => array('Method not allowed'),
    408 => array("Request timed out!"),
    414 => array("The URL is too long!"),
    500 => array('An error occurred on the server!'),
    502 => array('Bad Gateway!'),
    504 => array("Gateway timed out!"),
  );
  $cod = $_GET['e'];
  $error_msg = $status[$_GET['e']];

  include('./status.php');
}else{
  include('./home.php');
}
?>
