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
      $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
      $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
      
      if($username !== "" && $password !== "")
      {
         $requete = "SELECT count(*) FROM utilisateurs where 
               Adresse_mail = '".$username."' and mot_de_passe = '".$password."' ";
         $exec_requete = mysqli_query($db,$requete);
         $reponse      = mysqli_fetch_array($exec_requete);
         $count = $reponse['count(*)'];
         if($count!=0) // nom d'utilisateur et mot de passe correctes
         {
            $_SESSION['username'] = $username;
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

   $requete_nb_pc = "SELECT count(*) FROM ordinateurs";
   $exec_requete = mysqli_query($db,$requete_nb_pc);
   $reponse2      = mysqli_fetch_array($exec_requete);

   $requete_nb_imp = "SELECT count(*) FROM ordinateurs";
   $exec_requete = mysqli_query($db,$requete_nb_imp);
   $reponse3      = mysqli_fetch_array($exec_requete);

   $requete_nb_user = "SELECT count(*) FROM ordinateurs";
   $exec_requete = mysqli_query($db,$requete_nb_user);
   $reponse4     = mysqli_fetch_array($exec_requete);

   $count2 = $reponse2['count(*)'];
   $count3 = $reponse3['count(*)'];
   $count4 = $reponse4['count(*)'];

   $json_data = json_encode($count2);
   $json_data2 = json_encode($count3);
   $json_data3 = json_encode($count4);

   file_put_contents('myfile.json', $json_data);
   file_put_contents('myfile.json', $json_data2);
   file_put_contents('myfile.json', $json_data3);




   mysqli_close($db); // fermer la connexion




?>