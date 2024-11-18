<?php

require 'Modele.php';
try{
           ajoutParties();
} catch (Exception $ex) {

}
header('Location: index.php');            
