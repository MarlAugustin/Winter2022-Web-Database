<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <base href="<?= $racineWeb ?>" >
        <title><?= $titre ?></title>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    </head>
    <style>
    form
    {
        text-align:center;
    }
    </style>
    <body>
        <div id="global">
            <header>
                <a href="#" class="lang-switch" data-locale="fr">Français</a> |
                <a href="#" class="lang-switch" data-locale="en">English</a> |
                <a href="#" class="lang-switch" data-locale="cre">Créole</a> 
                <h1 id="titreSite"><span data-i18n="BlogueEleve">Le Blogue de Marlond Augustin</span> v1.0.0.1</h1>
                <a href="index.php"><h1 id="titreSite"><span data-i18n="Progression">Progression du tournoi march Madness</h1></a>
                <a href="<?= $utilisateur != null ? 'Admin' : ''; ?>Equipe">
                    <h4>Afficher tous les équipes pouvant participer au tournoi</h4>
                </a>
                <p><a href="Apropos">[À propos] </a></p>
                <p> <a href="tests.php">[Tests] </a></p>
                <?php if (isset($utilisateur)) : ?>
                    <h3>Bonjour <?= $utilisateur['nom'] ?>,
                        <a href="Utilisateurs/deconnecter"><small>[Se déconnecter]</small></a>
                    </h3>
                <?php else : ?>
                    <h3>[<a href="Utilisateurs/index">Se connecter</a>] <small>(admin/admin)</small></h3>
                <?php endif; ?>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
            <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
            <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
            <script src="Contenu/js/autocompleteType.js"></script>
            <script src="Contenu/jquery.i18n/src/CLDRPluralRuleParser.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
            <script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
            <script src="Contenu/i18n/main-jquery_i18n.js"></script>
        </div>
    </body>