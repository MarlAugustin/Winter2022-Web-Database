CREATE
	TRIGGER `parties_after_insert` AFTER INSERT 
	ON `parties` 
	FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Nouveau';
		END IF;
    
		INSERT INTO parties_audit (partie_id, changetype) VALUES (NEW.id, @changetype);
		
    END$$
/**
 * Author:  Marlond
 * Created: 9 mai 2022
 */

