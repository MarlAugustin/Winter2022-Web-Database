<?php

require_once 'Framework/Vue.php';

$partie= [
        'id' => '2123',
        'id_Equipe1' => '3',
        'id_Equipe2' => '8',
        'point_Equipe1' => '90',
        'point_Equipe2' => '125',
        'jour_de_la_partie' => '2022-04-21',
        'Serie' => '1ere manche',
        'Ville' => 'Milwaukee, WI'
    
];
$vue = new Vue('Modifier','AdminPartie');
$vue->generer(['partie' => $partie]);