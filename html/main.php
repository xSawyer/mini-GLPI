<!DOCTYPE html>
<meta charset="utf-8">
<html style="font-size: 16px;" lang="fr">

<link rel="stylesheet" href="../styles/main.css" media="screen">

<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-GLPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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

  <body style="background-color:#FFFFFF">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



  <nav class="navbar navbar-expand-lg" style="background-color:#009faf">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MINI GLPI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ordinateurs
          </a>
        
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Ajouter un ordinateur</a></li>
            <li><a class="dropdown-item" href="#">Visualiser le parc</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Plus d'options...</a></li>
          </ul>
        </li>

        
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <?php
                session_start();
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "Bonjour <strong>$user</strong>, vous êtes connecté";
                }
            ?>
          </a>
        </div>   
        
      <form>
        <div class="container-fluid">
          <button type="submit" class="btn btn-primary" onclick="deco()">Deconnexion 
            <script>
              function deco(){
                alert ("Vous allez être déconnecté ! ")
              }
            
          </script>


          </button>
        </div>
      </form>
    </div>
  </div>
</nav>


<ul class="nav flex-column">


<li class="nav-item">
  
  
  <li class="nav-item">    
    <div class="computer" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de PC :<br><strong> $json_data[0]</strong>";
        ?>
      </div>
  </li>
  <li class="nav-item">
  <div class="users" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'utilisateur : <br><strong> $json_data[1]</strong>";
        ?>
      </div>
  </li>
  <li class="nav-item">
    <div class="printer" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre d'imprimante : <br><strong> $json_data[2]</strong>" ;
        ?>
    </div>
  </li>
  <li class="nav-item">
  <div class="ticket" data-custom-php="">
        <?php
          $json = file_get_contents("myfile.json");
          $json_data = json_decode($json,true);
          echo "Nombre de ticket en cours : <br><strong> $json_data[3]</strong>" ;
        ?>
      </div>
    
  </li>
</ul>

</body>
</html>