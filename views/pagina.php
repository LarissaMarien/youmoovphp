<?php
return "<!DOCTYPE html>
<html>
<head>
<title>$paginaData->title</title>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
<link href='https://fonts.googleapis.com/css?family=Abel|Karla:400,700&display=swap' rel='stylesheet'>

$paginaData->css
$paginaData->embeddedStyle
</head>
<body>
  <header>
  $paginaData->logo
  <div class='navi'>
    $paginaData->navigatie
  </div>
  </header>

  <main>
    <div class='kader'>
      $paginaData->content
    </div>
  </main>

  <footer>
    <p>this site was made with love and php by larissa marien.</p>
    <div class='footnavi'>
      $paginaData->navigatie
    </div>
  </footer>
</body>
</html>";
