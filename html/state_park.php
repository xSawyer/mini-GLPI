<?php
         // connexion à la base de données
      $db_username = 'root';
      $db_password = 'root';
      $db_name     = 'mydb';
      $db_host     = 'localhost';
      $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
            or die('could not connect to database');
      
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
   
   mysqli_close($db); 

?>