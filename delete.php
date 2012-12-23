<?php
  $doc = new DOMDocument();
  $doc->formatOutput = true;
  
  if( $doc->load('data/bbs.xml') ){
    $deleteMessage = $doc->getElementsByTagName('message')->item((int)$_GET['a']);
    $deleteMessage = $doc->documentElement->removeChild($deleteMessage);
    $doc->save('data/bbs.xml');
  }
  
  echo "<meta http-equiv='refresh' content='0;index.php'/>";
?>