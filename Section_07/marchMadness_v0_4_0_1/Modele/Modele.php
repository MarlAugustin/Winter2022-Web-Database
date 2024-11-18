<?php

abstract class Modele {

    private $bdd;

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
    public function getBdd() {
        if ($this->bdd == null) {

            $this->bdd = new PDO('mysql:host=localhost;dbname=march_madness_v0_2_1;charset=utf8', 'root', 'mysql', 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

}
