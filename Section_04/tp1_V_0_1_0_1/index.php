<?php
require 'Modele.php';
try {
    $donnees = getParties();
    require 'vueAccueil.php';
} catch (Exception $e) {
   
}
