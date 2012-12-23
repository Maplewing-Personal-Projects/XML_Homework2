<?php
  $doc = new DOMDocument();
  $doc->formatOutput = true;
  if( $doc->load('data/bbs.xml') ){
    $root = $doc->getElementsByTagName('bbs')->item(0);
  }
  else{
    $root = $doc->createElement('bbs');
    $root = $doc->appendChild($root);
  }
  
  $message = $doc->createElement('message');
  $name = $doc->createElement('name');
  $name->appendChild($doc->createTextNode($_POST['name']));
  $mail = $doc->createElement('mail');
  $mail->appendChild($doc->createTextNode($_POST['mail']));
  $timestamp = time();
  $time = $doc->createElement('time');
  $time->appendChild($doc->createTextNode($timestamp));
  $content = $doc->createElement('content');
  $content->appendChild($doc->createTextNode($_POST['content']));
  
  $name = $message->appendChild($name);
  $mail = $message->appendChild($mail);
  $time = $message->appendChild($time);
  $content = $message->appendChild($content);
  
  if( $_POST['mode'] == "edit" ){
    $replaceMessage = $doc->getElementsByTagName('message')->item((int)$_POST['a']);
    $replaceMessage = $replaceMessage->parentNode->replaceChild($message, $replaceMessage);
  }
  else{
    $message = $root->appendChild($message);
  }
  
  $doc->save('data/bbs.xml');
  echo "<meta http-equiv='refresh' content='0;index.php'/>";
?>