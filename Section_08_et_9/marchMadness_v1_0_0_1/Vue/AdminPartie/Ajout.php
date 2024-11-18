<?php $titre = "Ajouter une nouvelle partie"; ?>
<form action="AdminPartie/ajouter/" method="post" />
<h2>Ajouter une nouvelle partie</h2>

<p>
    Identifiant de l'équipe 1: <select name="id_Equipe1" id="id_Equipe1">
        <?php 
        $equipes2=[];
        foreach ($equipes as $equipe) :
            array_push($equipes2,$equipe);
        ?>
            <option value ="<?= $equipe['id'] ?>">
                <?= $equipe['id'] ?>
            </option>
        <?php endforeach; ?>                                    
    </select></br>
    Identifiant de l'équipe 2: <select name="id_Equipe2" id="id_Equipe2">
       
        <?php  var_dump($equipes2);
        foreach ($equipes2 as $equipe) : ?>
            <option value ="<?= $equipe['id'] ?>">
                <?= $equipe['id'] ?>
            </option>
        <?php endforeach; ?>                                        
    </select></br>
<label for="jour_de_la_partie">Date</label> : 
<input type="date" name="jour_de_la_partie" id="jour_de_la_partie" value="<?php echo htmlspecialchars($donnees['jour_de_la_partie']); ?>"/><br />                            
<label for="point_Equipe1">Nombre de points de l'équipe 1</label> : 
<input type="number" name="point_Equipe1" min="0" max="125" id="point_Equipe1" value="<?php echo htmlspecialchars($donnees['point_Equipe1']); ?>"/><br />
<label for="point_Equipe2">Nombre de points de l'équipe 2</label> 
<input type="number" name="point_Equipe2" min="0" max="125" id="point_Equipe2" value="<?php echo htmlspecialchars($donnees['point_Equipe2']); ?>"/><br />
Manche des séries éliminatoires:<select name="Serie" id="Serie">
    <option value ="1ere manche"
    <?php
    echo($donnees['Serie'] == '1ere manche') ?
            'selected="selected" ' : ''
    ?>
            >1ere manche</option>
    <option value ="2eme manche"
    <?php
    echo($donnees['Serie'] == '2eme manche') ?
            'selected="selected" ' : ''
    ?>
            >2eme manche</option> 
    <option value ="Sweet 16"
    <?php
    echo($donnees['Serie'] == 'Sweet 16') ?
            'selected="selected" ' : ''
    ?>
            >Sweet 16</option>
    <option value ="Top 8"
    <?php
    echo($donnees['Serie'] == 'Top 8') ?
            'selected="selected" ' : ''
    ?>
            >Top 8</option>
    <option value ="Top 4"
    <?php
    echo($donnees['Serie'] == 'Top 4') ?
            'selected="selected" ' : ''
    ?>
            >Top 4</option>
    <option value ="Champion"
    <?php
    echo($donnees['Serie'] == 'Champion') ?
            'selected="selected" ' : ''
    ?>
            >Champion</option>    
</select></br>
<label for="Ville">Lieu de la partie</label> : <input type="text" name="Ville" id="auto" /> <br />
<input type="submit" value="Ajouter" />

</p>                     
</form>
<form action="index.php" method="post">
    <input type="submit" value="Annuler" />
</form>
