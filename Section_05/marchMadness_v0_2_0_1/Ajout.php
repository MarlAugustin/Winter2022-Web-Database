<?php

require 'Modele.php';
try{
           ajoutPartie();
} catch (Exception $ex) {

}
header('Location: index.php');            
