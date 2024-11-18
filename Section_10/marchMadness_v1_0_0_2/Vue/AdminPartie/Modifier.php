<?php $titre = "Modifier la partie numéro" . $partie['id']; ?>
<form action="AdminPartie/miseAJourPartie/" method="post">
			<h2>Modifier une partie</h2>
			<p>
                            Identifiant de l'équipe 1: <select name="id_Equipe1" id="id_Equipe1">
                                                            <option value ="1"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='1') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            > 1</option>
                                                            <option value ="2"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='2') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >2</option> 
                                                            <option value ="3"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='3') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >3</option>
                                                            <option value ="8"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='8') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >8</option>
                                                            <option value ="9"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='9') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >9</option>
                                                            <option value ="10"
                                                            <?php
                                                            echo($partie['id_Equipe1']=='10') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >10</option>    
                            </select></br>
Identifiant de l'équipe 2: <select name="id_Equipe2" id="id_Equipe2">
                                                            <option value ="1"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='1') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            > 1</option>
                                                            <option value ="2"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='2') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >2</option> 
                                                            <option value ="3"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='3') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >3</option>
                                                            <option value ="8"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='8') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >8</option>
                                                            <option value ="9"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='9') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >9</option>
                                                            <option value ="10"
                                                            <?php
                                                            echo($partie['id_Equipe2']=='10') ?
                                                                    'selected="selected" ' : ''
                                                            ?>
                                                            >10</option>    
                            </select></br>
                            <label for="jour_de_la_partie">Date</label> : 
                                <input type="date" name="jour_de_la_partie" id="jour_de_la_partie" value="<?php echo htmlspecialchars($partie['jour_de_la_partie']); ?>" /><br />                            
                            <label for="point_Equipe1">Nombre de points de l'équipe 1</label> : 
                                <input type="number" name="point_Equipe1" id="point_Equipe1" min="0" max="125" value="<?php echo htmlspecialchars($partie['point_Equipe1']); ?>"/><br />
                            <label for="point_Equipe2">Nombre de points de l'équipe 2</label> 
                                <input type="number" name="point_Equipe2" id="point_Equipe2" min="0" max="125" value="<?php echo htmlspecialchars($partie['point_Equipe2']); ?>"/><br />
                            Manche des séries éliminatoires:<select name="Serie" id="Serie">
                                <option value ="1ere manche"
                                <?php
                                echo($partie['Serie']=='1ere manche') ?
                                        'selected="selected" ' : ''
                                ?>
                                >1ere manche</option>
                                <option value ="2eme manche"
                                <?php
                                echo($partie['Serie']=='2eme manche') ?
                                        'selected="selected" ' : ''
                                ?>
                                >2eme manche</option> 
                                <option value ="Sweet 16"
                                <?php
                                echo($partie['Serie']=='Sweet 16') ?
                                        'selected="selected" ' : ''
                                ?>
                                >Sweet 16</option>
                                <option value ="Top 8"
                                <?php
                                echo($partie['Serie']=='Top 8') ?
                                        'selected="selected" ' : ''
                                ?>
                                >Top 8</option>
                                <option value ="Top 4"
                                <?php
                                echo($partie['Serie']=='Top 4') ?
                                        'selected="selected" ' : ''
                                ?>
                                >Top 4</option>
                                <option value ="Champion"
                                <?php
                                echo($partie['Serie']=='Champion') ?
                                        'selected="selected" ' : ''
                                ?>
                                >Champion</option>    
                            </select></br>
                            <label for="Ville">Lieu de la partie</label> : <input type="text" name="Ville" id="auto" value="<?php echo htmlspecialchars($partie['Ville']); ?>"/> <br />
                            <input type="hidden" name="id" value="<?php echo $partie['id']; ?>" />                            
                            <input type="submit" value="Modifier" />
                            <form action="index.php" method="post">
                                <input type="submit" value="Annuler" />
                            </form>
                       </p> 
        </form>
