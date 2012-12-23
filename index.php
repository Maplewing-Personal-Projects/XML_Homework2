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
      <h1>留言首頁</h1>
      <?php
        function avoid($value){
          $value = str_replace("<", "&lt;", $value);
          $value = str_replace(">", "&gt;", $value);
          return $value;
        }
      
        $doc = new DOMDocument();
        if( $doc->load('data/bbs.xml') ){
          $messages = $doc->getElementsByTagName('message');
          $count = 0;
          foreach( $messages as $message ){
            echo "<table border = '1' class = 'bbs'>";
            $name = $message->getElementsByTagName("name")->item(0);
            $mail = $message->getElementsByTagName("mail")->item(0);
            $content = $message->getElementsByTagName("content")->item(0);
            $time = $message->getElementsByTagName("time")->item(0);
            
            $name = avoid($name->nodeValue);
            $mail = avoid($mail->nodeValue);
            $content = avoid($content->nodeValue);
            $time = avoid($time->nodeValue);
            
            echo "<tr><th>姓名</th><td>" . $name . "</td></tr>";
            echo "<tr><th>信箱</th><td>" . $mail . "</td></tr>";
            echo "<tr><th>留言內容</th><td>" . $content . "</td></tr>";
            echo "<tr><th>日期</th><td>" . date(DATE_RFC822, $time) . "</td></tr>";
            echo "<tr><td colspan = '2'><a href = 'write.php?mode=edit&a=" . $count . "'>編輯</a>/<a href = 'delete.php?a=" . $count . "'>刪除</a></td></tr>";
            echo "</table>";
            $count++;
          }
        }
      ?>
    </section>
    <footer>Powered by Lanyi (資工系103級 曹又霖)
    <br />Pictures are from Sonic Channel, Sonic Wikia, Sonic Hub and Wiki.
    <br />This HTML5 Website is Lanyi&#39;s XML Homework 2.
    <br />
    <span style="color: yellow">!!DO NOT USE IE TO OPEN THIS HTML5 WEBSITE!!</span></footer>
  </body>
</html>
