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

   $requete_nb_user = "SELECT count(*) FROM utilisateurs";
   $exec_requete = mysqli_query($db,$requete_nb_user);
   $reponse3      = mysqli_fetch_array($exec_requete);

   $requete_nb_imp = "SELECT count(*) FROM imprimantes";
   $exec_requete = mysqli_query($db,$requete_nb_imp);
   $reponse4     = mysqli_fetch_array($exec_requete);

   $requete_nb_ticket = "SELECT count(*) FROM tickets";
   $exec_requete = mysqli_query($db,$requete_nb_ticket);
   $reponse5    = mysqli_fetch_array($exec_requete);

   $count2 = $reponse2['count(*)'];
   $count3 = $reponse3['count(*)'];
   $count4 = $reponse4['count(*)'];
   $count5 = $reponse5['count(*)'];

   $myarray = array($count2, $count3, $count4, $count5);
   
   $json_data = json_encode($myarray);

   file_put_contents('myfile.json', $json_data);
   
   mysqli_close($db); // fermer la connexion

?>