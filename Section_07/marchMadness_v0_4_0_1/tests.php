<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modelePartie') {
        require 'Tests/Modeles/testPartie.php';
    } else if ($_GET['test'] == 'vueModifier') {
        require 'Tests/Vues/testVueModifier.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}    
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="tests.php?test=modelePartie">Partie</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="tests.php?test=vueModifier">Modifier</a>
    </li>
    <li>
        <a href="tests.php?test=vueErreur">Erreur</a>
    </li>
</ul>


