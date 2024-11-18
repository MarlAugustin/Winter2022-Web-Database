DELIMITER $$
CREATE DEFINER=`root`@`localhost` EVENT `archive_parties` ON SCHEDULE EVERY 1 MINUTE STARTS '2018-03-26 15:30:15' 
        ON COMPLETION NOT PRESERVE ENABLE
        DO BEGIN	
		-- copy efface posts
		INSERT INTO parties_archives (id, id_Equipe1, id_Equipe2,point_Equipe1,point_Equipe2,jour_de_la_partie,Serie,Ville) 
		SELECT id, id_Equipe1, id_Equipe2,point_Equipe1,point_Equipe2,jour_de_la_partie,Serie,Ville
		FROM parties
		WHERE efface = 1;
	    
		-- copy associated audit records
		INSERT INTO parties_audit_archives (id, partie_id, changetype, changetime) 
		SELECT parties_audit.id, parties_audit.partie_id, parties_audit.changetype, parties_audit.changetime 
		FROM parties_audit
		JOIN parties ON parties_audit.partie_id = parties.id WHERE parties.efface = 1;
		
		-- remove efface blogs and audit entries
		DELETE FROM parties WHERE efface = 1;
	    
	END $$
DELIMITER ;