<?php
require_once 'Configuration.php';
abstract class Modele {

    private static $bdd;

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
    public function getBdd() {
        if (self::$bdd == null) {
            $dsn= Configuration::get("dsn");
            $login= Configuration::get("login");
            $mdp= Configuration::get("mdp");
            $this->bdd = new PDO($dsn,$login,$mdp, 
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
            $resultat = self::getBdd()->query($sql); // exécution directe
            
        } else {
            $resultat = self::getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

}
