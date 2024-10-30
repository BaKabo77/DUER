<?php

   try {
      $bdd = new PDO("mysql:host=localhost;dbname=duer;charset=utf8", 'root', '');
      // Configuration des options de PDO pour afficher les erreurs en mode exception
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
      echo 'Erreur de connexion : '. $e->getMessage();
      exit;
   }

