<?php

require_once 'Modele/Modele.php';

class Type extends Modele {
    
// Recherche les types répondant à l'autocomplete
public function searchVille($term) {
    $sql='SELECT nomVille FROM villes WHERE nomVille LIKE :term';
    $stmt=$this->executerRequete($sql,(array('term' => '%' . $term . '%')));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['nomVille'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}

}
