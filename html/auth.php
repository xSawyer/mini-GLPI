<?php

session_start();
   if(isset($_POST['username']) && isset($_POST['password']))
   {
      // connexion à la base de données
      $db_username = 'root';
      $db_password = 'root';
      $db_name     = 'mydb';
      $db_host     = 'localhost';
      $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
            or die('could not connect to database');
      
      // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
      // pour éliminer toute attaque de type injection SQL et XSS
      $addr_mail = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
      $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
      
      if($addr_mail !== "" && $password !== "")
      {
         $requete = "SELECT count(*) FROM utilisateurs where 
               Adresse_mail = '".$addr_mail."' and mot_de_passe = '".$password."' ";
         $exec_requete = mysqli_query($db,$requete);
         $reponse      = mysqli_fetch_array($exec_requete);
         $count = $reponse['count(*)'];
         if($count!=0) // nom d'utilisateur et mot de passe correctes
         {
            // $_SESSION['username'] = $addr_mail;
            header('Location: main.php');
         }
         else
         {
            header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
         }
      }
      else
      {
         header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
      }
   }
   else
   {
      header('Location: login.php');
   }

   $requete = "SELECT Prenom FROM utilisateurs where Adresse_mail = '".$addr_mail."'";
   $exec_requete = mysqli_query($db,$requete);
   $reponse      = mysqli_fetch_array($exec_requete);
   
   $_SESSION['username'] = $reponse[0];
   

   
   mysqli_close($db); // fermer la connexion

?>