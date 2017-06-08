<?php
  session_start();
  $newlang = $_GET['lang'];
  $url = $_GET['url'];
  $_SESSION['lang'] = $newlang;
  function redirect($url) {
    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
    exit;
  }
  redirect('http://'.$url);
?>
