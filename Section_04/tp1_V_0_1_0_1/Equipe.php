<?php

require 'Modele.php';
try{
    if (isset($_GET['id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0) {
            $equipe = getEquipe($id);
            require 'VueEquipe.php';
            
        } else
            throw new Exception("Identifiant de article incorrect");
    } else
        throw new Exception("Aucun identifiant de article");
} catch (Exception $ex) {

}


/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

