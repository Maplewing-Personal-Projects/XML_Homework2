<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>灆洢的索尼克介紹網站</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <!--[if lt IE 9]>
    <script src="dist/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <img alt="Sonic" src="images/logo.png" />
    </header>
    <nav>
      <ul>
        <li>
          <a href="index.php">留言首頁</a>
        </li>
        <li>
          <a href="write.php">撰寫留言</a>
        </li>
      </ul>
    </nav>
    <section id="content">
      <div id="sonic"></div>
      <div id="metal_sonic"></div>
      <?php
      if( $_GET['mode'] == "edit"){
        echo "<h1>編輯留言</h1>";
        $doc = new DOMDocument();
        if( $doc->load("data/bbs.xml") ){
          $editMessage = $doc->getElementsByTagName('message')->item((int)$_GET['a']);
          $name = $editMessage->getElementsByTagName('name')->item(0)->nodeValue;
          $mail = $editMessage->getElementsByTagName('mail')->item(0)->nodeValue;
          $content = $editMessage->getElementsByTagName('content')->item(0)->nodeValue;
        }
      }
      else echo "<h1>撰寫留言</h1>";
      ?>
      <br/>
      <div style = "padding-left: 50px;">
        <form action = "process.php" method = "post">
            <strong>暱稱：</strong><br/><input type = "text" name = "name" value = "<?php echo $name; ?>"/><br/>
            <strong>聯絡信箱：</strong><br/><input type = "text" name = "mail" value = "<?php echo $mail; ?>"/><br/>
            <strong>留言內容：</strong><br/><textarea name = "content" style = "width: 500px; height: 200px;"><?php echo $content; ?></textarea><br/>
            <?php 
            if( $_GET['mode'] == "edit" ){ 
              echo '<input type = "hidden" name = "mode" value = "edit">'; 
              echo '<input type = "hidden" name = "a" value = "'. $_GET['a'] .'">'; 
            }  
            ?>
            <input type = "submit" value = "留言"/>
        </form>
      </div>
    </section>
    <footer>Powered by Lanyi (資工系103級 曹又霖)
    <br />Pictures are from Sonic Channel, Sonic Wikia, Sonic Hub and Wiki.
    <br />This HTML5 Website is Lanyi&#39;s XML Homework 2.
    <br />
    <span style="color: yellow">!!DO NOT USE IE TO OPEN THIS HTML5 WEBSITE!!</span></footer>
  </body>
</html>
