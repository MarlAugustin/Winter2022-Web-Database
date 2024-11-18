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
     // Enregistre une image associé à un article
    private function enregistrerImage($image) {
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($image) AND $image['error'] == 0) {
            // Testons si le fichier n'est pas trop gros
            $dimension = $image['size'];
            if ($dimension <= 1000000) {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($image['name']);
                //var_dump($image);
                //exit();
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees)) {
                    // On peut valider le fichier et le stocker définitivement
                    $fichierImage = 'Contenu/Images/equipes/' . basename($image['name']);
                    move_uploaded_file($image['tmp_name'], $fichierImage);
                    return basename($image['name']);
                } else {
                    throw new Exception("L'extension '$extension_upload' n'est pas autorisée pour les images");
                }
            } else {
                throw new Exception("Votre image ($dimension octets) dépasse la dimension autorisée (1000000 octets)");
            }
        } else {
            throw new Exception("Erreur rencontrée lors de la transmission du fichier");
        }
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
