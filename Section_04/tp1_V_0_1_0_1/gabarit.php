<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre ?></title>
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
                <a href="index.php"><h1 id="titreSite">Progression du tournoi march Madness</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste site.</p>
                <p><a href="A_propos.html">[À propos] </a></p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Site réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </body>