<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr">

<link rel="stylesheet" href="../styles/main.css" media="screen">

<head>

<script>
    const xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function() {
    const myObj = JSON.parse(this.responseText);
    document.getElementById("computer").innerHTML = myObj.name;
    document.getElementById("users").innerHTML = myObj.name;
    document.getElementById("printer").innerHTML = myObj.name;
    document.getElementById("ticket").innerHTML = myObj.name;
  
  }
  xmlhttp.open("GET", "infra.php");
  xmlhttp.send();
  </script>

  </head>
  
      <div class="computer" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de PC :<br> $json_data[0]";
        ?>
      </div>
      <div class="users" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'utilisateur : <br> $json_data[1]";
        ?>
      </div>
      <div class="printer" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'imprimante : <br> $json_data[2]" ;
        ?>
      </div>
      <div class="ticket" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de ticket en cours : <br> $json_data[3]" ;
        ?>
      </div>
    

  
</body>
</html>