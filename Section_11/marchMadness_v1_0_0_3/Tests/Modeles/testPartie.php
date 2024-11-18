<?php

require_once 'Modele/Partie.php';

$tstPartie = new Partie;
$parties = $tstPartie->getParties();
echo '<h3>Test getParties : </h3>';
var_dump($parties->rowCount());

$partie = $tstPartie->getPartie(1);
echo '<h3>Test getPartie : </h3>';
var_dump($partie);