<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>

<script>
    const xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function() {
    const myObj = JSON.parse(this.responseText);
    document.getElementById("u-custom-php u-custom-php-1").innerHTML = myObj.name;
    document.getElementById("u-custom-php u-custom-php-2").innerHTML = myObj.name;
    document.getElementById("u-custom-php u-custom-php-3").innerHTML = myObj.name;
    document.getElementById("u-custom-php u-custom-php-4").innerHTML = myObj.name;
  
  }
  xmlhttp.open("GET", "infra.php");
  xmlhttp.send();
</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Join Accenture’s virtual program for new perspectives, ​Technology Of The Future, 01, 02, 03, 04, ​AI &amp;amp; Digital Platform, ​Essential 8 Emerging Technologies, ​Technology Of The Future, Join our newsletter">
    <meta name="description" content="">
    <title>Page 1</title>
    <link rel="stylesheet" href="../styles/nicepage.css" media="screen">
    <link rel="stylesheet" href="../styles/Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="../script/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../script/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Page 1">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"> 
    <section class="u-align-center u-clearfix u-image u-shading u-section-1" id="carousel_5ad0" src="" data-image-width="1280" data-image-height="675">
      <h1 class="u-text u-text-default u-text-1">Mini GLPI</h1>
      <div class="u-expanded-width u-palette-1-base u-shape u-shape-rectangle u-shape-1"></div>
      <div class="u-palette-1-base u-shape u-shape-rectangle u-shape-2"></div>
      <div class="u-custom-color-1 u-radius-10 u-shape u-shape-round u-shape-3"></div>
      <div class="u-custom-color-2 u-radius-10 u-shape u-shape-round u-shape-4"></div>
      <div class="u-custom-color-3 u-radius-10 u-shape u-shape-round u-shape-5"></div>
      <div class="u-custom-color-4 u-radius-10 u-shape u-shape-round u-shape-6"></div>
      <div class="u-custom-php u-custom-php-1" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de PC :<br> $json_data[0]";
        ?>
      </div>
      <div class="u-custom-php u-custom-php-2" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'utilisateur : <br> $json_data[1]";
        ?>
      </div>
      <div class="u-custom-php u-custom-php-3" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'imprimante : <br> $json_data[2]" ;
        ?>
      </div>
      <div class="u-custom-php u-custom-php-4" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de ticket en cours : <br> $json_data[3]" ;
        ?>
      </div>
    </section>

  
</body></html>