CREATE
	TRIGGER `parties_after_update` AFTER UPDATE 
	ON `parties` 
	FOR EACH ROW BEGIN
	
		IF NEW.efface THEN
			SET @changetype = 'Effacé';
		ELSE
			SET @changetype = 'Modifié';
		END IF;
    
		INSERT INTO parties_audit (partie_id, changetype) VALUES (NEW.id, @changetype);
		
    END$$
