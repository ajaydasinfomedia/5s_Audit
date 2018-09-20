<?php
	$request = "cmd=_notify-validate"; 
	$varvalue = "";
	foreach ($_POST as $varname => $varvalue)
	{
		$email .= "$varname: $varvalue\n";  	
		if(function_exists('get_magic_quotes_gpc') and get_magic_quotes_gpc())
		{  
		$varvalue = urlencode(stripslashes($varvalue)); 
		}
		else 
		{ 
		$value = urlencode($value); 
		} 
		$request .= "&$varname=$varvalue"; 
		$varvalue.=$email;
		$sbcid = $_POST['subscr_id'];
		$itemnumber = $_POST['item_number'];
		$itemname = $_POST['item_name'];
		$txn_id = $_POST['txn_id'];
		$username = $_POST['username'];
	} 
	$strexp = explode("_",$itemnumber);
	$id = $strexp[0];
	$planid = $strexp[1];
	$ch = curl_init();
	/*curl_setopt($ch,CURLOPT_URL,"https://www.sandbox.paypal.com/cgi-bin/webscr");*/
	curl_setopt($ch,CURLOPT_URL,"https://www.paypal.com");
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	switch($result)
	{
		case "VERIFIED":
	 		include("dbconnect.php");   
			if(strpos($varvalue , 'txn_type: subscr_cancel'))
			{
			 	$yesterdate = date("Y-m-d", strtotime("-1 day"));
		 		$utbl_plan ="update tbl_plan set active_status = 0, exp_date = '".$yesterdate."' where uid = ".$id." and subscr_id ='".$sbcid;
				mysqli_query($sql,$utbl_plan);
				$sqlq = "update tbl_login_relation set status = 0 where superadminid =$id ";
				mysqli_query($sql,$sqlq);
			}
			$sqlchecksubscr = "select * from tbl_plan where planid = $planid";
			$rssubscr = mysqli_query($sql,$sqlchecksubscr);
			$row = mysqli_fetch_assoc($rssubscr);
			$subscr_id = $row['subscr_id'];
			$id1 =  $id.'_5sdb';
			if($subscr_id == '' )
			{
				$squery = " update tbl_login_relation set dbname = '".$id1."' , status = '1' where uid =".$id;		  
				mysqli_query($sql,$squery) ;
				$chkentry ="update tbl_plan set active_status = 0 where uid ='".$id."' and plan_type like '5s' ";
				mysqli_query($sql,$chkentry);	
				$chkentry1 ="update tbl_plan set active_status = 1,subscr_id = '".$sbcid."' where planid =".$planid;
				mysqli_query($sql,$chkentry1);
				$link =mysqli_connect("localhost","root","");
				$sql = "CREATE DATABASE if not exists $id1 DEFAULT CHARACTER SET utf8";
				mysqli_query($link,$sql);
				mysqli_select_db($link,$id1);
				$sql_tbl_dept = "CREATE TABLE IF NOT EXISTS `adddepartment` (`deptid` int(11) NOT NULL AUTO_INCREMENT,`deptname` varchar(255) NOT NULL,
				  				`depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,`uid` int(11) NOT NULL,`superadminid` int(11) NOT NULL,
				  				 PRIMARY KEY (`deptid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ";	
				mysqli_query($link,$sql_tbl_dept);
				$sql_tbl_template= "CREATE TABLE IF NOT EXISTS `addtemplate` (`tempid` int(11) NOT NULL AUTO_INCREMENT,`tempname` varchar(255) NOT NULL,
				  					`auditorcname` varchar(255) NOT NULL,`auditorclogo` varchar(255) NOT NULL,`clientcname` varchar(255) NOT NULL,
				  					`clientclogo` varchar(255) NOT NULL,`temptype` varchar(255) NOT NULL,`modified_date` timestamp NOT NULL DEFAULT '1970-01-05',
				  					`temptimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, `uid` int(11) NOT NULL,`superadminid` int(11) NOT NULL,
				  					 PRIMARY KEY (`tempid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ";
				mysqli_query($link,$sql_tbl_template);
				$sql_tbl_project="CREATE TABLE IF NOT EXISTS `tbl_project` (`pid` int(11) NOT NULL AUTO_INCREMENT,`tempid` int(11) NOT NULL,`tempname` varchar(255) NOT NULL,
				  				 `deptid` int(11) NOT NULL,`deptname` varchar(255) NOT NULL,`qid` int(11) NOT NULL,`title` varchar(255) NOT NULL,`pdate` date NOT NULL,
				  				 `auditorcname` varchar(255) NOT NULL,`auditorclogo` varchar(255) NOT NULL,`clientcname` varchar(255) NOT NULL,
				  				 `clientclogo` varchar(255) NOT NULL,`temptype` varchar(255) NOT NULL,`uid` int(11) NOT NULL,`superadminid` int(11) NOT NULL,
				  				 `timestamp` varchar(255) NOT NULL,`status` varchar(255) NOT NULL DEFAULT '1',`notes` varchar(255) NOT NULL,
				  				 `auditedby` varchar(255) NOT NULL,`status_progress` int(11) NOT NULL DEFAULT '1',`sync_status` int(11) NOT NULL,
				  				 `tstamp` int(11) NOT NULL,PRIMARY KEY (`pid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0";
				mysqli_query($link,$sql_tbl_project);
				$sql_tbl_project_review="CREATE TABLE IF NOT EXISTS `tbl_project_review`(`prjid` int(11) NOT NULL AUTO_INCREMENT,`pid` int(11) NOT NULL,
				  						`qid` int(11) NOT NULL,`queid` int(11) NOT NULL,`answer` int(11) NOT NULL,`status` varchar(255) NOT NULL,
				  						`uid` int(11) NOT NULL,`timestamp` varchar(255) NOT NULL,`superadminid` int(11) NOT NULL,PRIMARY KEY (`prjid`)) 
										 ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0";	
				mysqli_query($link,$sql_tbl_project_review);
				$sql_tbl_questionanswer="CREATE TABLE IF NOT EXISTS `tbl_questionanswer` (`qaid` int(11) NOT NULL AUTO_INCREMENT,`qid` int(11) NOT NULL,
				  						`queid` int(11) NOT NULL,`checkitem` varchar(255) NOT NULL,`description` longtext NOT NULL,`uid` int(11) NOT NULL,
				  						`timestamp` varchar(255) NOT NULL,`superadminid` int(11) NOT NULL,PRIMARY KEY (`qaid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0";
				mysqli_query($link,$sql_tbl_questionanswer);
				$sql_tbl_questionnair="CREATE TABLE IF NOT EXISTS `tbl_questionnair` (`qid` int(11) NOT NULL AUTO_INCREMENT,`title` varchar(255) NOT NULL,
				  						`uid` int(11) NOT NULL,`lid` int(11) NOT NULL,`superadminid` int(11) NOT NULL,`modified_date` timestamp NOT NULL DEFAULT '1970-01-05',
				  						`status` int(11) NOT NULL,`timestamp` varchar(255) NOT NULL,PRIMARY KEY (`qid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ";
				mysqli_query($link,$sql_tbl_questionnair);
				$sql_tbl_settings="CREATE TABLE IF NOT EXISTS `tbl_settings` (`sid` int(11) NOT NULL AUTO_INCREMENT,`key` varchar(255) NOT NULL,`value` varchar(255) NOT NULL,
				  					`superadminid` int(11) NOT NULL,`uid` int(11) NOT NULL,PRIMARY KEY (`sid`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ";
				mysqli_query($link,$sql_tbl_settings);
				mysqli_query($link,"set names 'utf8'");
				$sql_insert_queans="INSERT INTO `tbl_questionanswer`(`qaid`, `qid`,`checkitem`,`description`, `uid`, `timestamp`, `queid`) VALUES	
				('', '1', 'Materials or parts', 'Does the inventory or in-process inventory include and unneeded materials or parts?','$id',CURRENT_TIMESTAMP,'1'),
				('', '1', 'Machines or equipment', 'Are there any unused machines or other equipment around?','$id', CURRENT_TIMESTAMP, '2'),	
				('', '1', 'Jigs, tools, or dies', 'Are there any unused jigs, tools, dies or similar items around?','$id', CURRENT_TIMESTAMP, '3'),		
				('','1', 'Visual control', 'Is it obvious which items have been marked as unnecessary?','$id', CURRENT_TIMESTAMP, '4'),
				('', '1', 'Written standards', 'Has establishing the 5Ss left behind any useless standard?','$id', CURRENT_TIMESTAMP, '5'),
				('', '1', 'Location Indicators', 'Are shelves and other storage areas marked with location indicators and addresses?', '$id', CURRENT_TIMESTAMP, '6'),
				('', '1', 'Item Indicators', 'Do the shelves have signboards showing which items go where?','$id',CURRENT_TIMESTAMP, '7'),
				('', '1', 'Quantity Indicators', 'Are the maximum and minimum allowable quantities indicated?','$id',CURRENT_TIMESTAMP, '8'),		
				('', '1', 'Demarcation of walkways and in-process inventory areas', 'Are white lines or other markers used to clearly indicate walkways and storage areas?','$id', CURRENT_TIMESTAMP, '9'),	
				('', '1', 'Jigs and tools', 'Are jigs and tools arranged more rationally to facilitate picking them up and returning them?', '$id', CURRENT_TIMESTAMP, '10'),
				('', '1', 'Floors', 'Are floors kept shiny clean and free of waste, water and oil?','$id',CURRENT_TIMESTAMP, '11'),
				('', '1', 'Machines', 'Are the machine wiped clean often and kept free of shavings, chips and oil?','$id',CURRENT_TIMESTAMP, '12'),
				('','1', 'Cleaning and checking', 'Is equipment inspection combined with equipment maintenance?','$id',CURRENT_TIMESTAMP, '13'),
				('', '1', 'Cleaning responsibilities', 'Is there a person responsible for overseeing cleaning operations?','$id',CURRENT_TIMESTAMP, '14'),
				('', '1', 'Habitual cleanliness', 'Do operators habitually sweep floors, and wipe equipment without being told?', '$id',CURRENT_TIMESTAMP, '15'),
				('', '1', 'Improvement memos', 'Are improvement memos regularly being generated?', '$id',CURRENT_TIMESTAMP, '16'),
				('', '1', 'Improvement ideas', 'Are improvement ideas being acted on?','$id',CURRENT_TIMESTAMP, '17'),
				('', '1', 'Key procedures', 'Are standard procedures clear, documented and actively used?', '$id',CURRENT_TIMESTAMP, '18'),	
				('', '1', 'Improvement plan', 'Are the future standards being considered with a clear improvement plan for the area?', '$id', CURRENT_TIMESTAMP, '19'),	
				('', '1', 'The first 3 Ss', 'Are the first 3 Ss (sort, set locations and shine) being maintained?','$id',CURRENT_TIMESTAMP, '20'),	
				('', '1', 'Training', 'Is everyone adequately trained in standard procedure?', '$id',  NULL, '21'),	
				('', '1', 'Tools and parts', 'Are tools and parts being stored correctly?','$id',CURRENT_TIMESTAMP, '22'),
				('', '1', 'Stock controls', 'Are stock controls being adhered to?','$id',CURRENT_TIMESTAMP, '23'),
				('', '1', 'Procedures', 'Are procedures up-to-date and regularly reviewed?','$id',CURRENT_TIMESTAMP, '24'),
				('', '1', 'Activity boards', 'Are activity boards up-to-date and regularly reviewed?','$id',CURRENT_TIMESTAMP, '25'),
				
				('', '2', 'Matriel ou pices', 'L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?','$id',CURRENT_TIMESTAMP, '1'),
				('', '2', 'Machine ou quipement', 'Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?','$id', CURRENT_TIMESTAMP, '2'),
				('', '2', 'Outils, Matrice ou gabarits', 'Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?','$id', CURRENT_TIMESTAMP, '3'),	
				('','2', 'Contrle visuel', 'Les objets marqus comme non ncessaires sont-ils mis en vidence?','$id', CURRENT_TIMESTAMP, '4'),
				('', '2', 'Normes rdactionnelles', 'La mise  jour des standards XXX rend elle les anciens standards inutiles?','$id', CURRENT_TIMESTAMP, '5'),
				('', '2', 'Indicateurs de positionnement', 'Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?', '$id', CURRENT_TIMESTAMP, '6'),
				('', '2', 'Indicateurs d\' article', 'Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?','$id',CURRENT_TIMESTAMP, '7'),
				('', '2', 'Indicateurs de quantit', 'Les quantits maximale et minimale permises sont-elles indiques?','$id',CURRENT_TIMESTAMP, '8'),
				('', '2', 'Dmarcateur des alles et des zones d\'inventaire en cours', 'Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?','$id', CURRENT_TIMESTAMP, '9'),
				('', '2', 'Gabarits et outils', 'Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?', '$id', CURRENT_TIMESTAMP, '10'),
				('', '2', 'Sols', 'Les sols sont-ils gardss propre et sans ordures, eau et huile?','$id',CURRENT_TIMESTAMP, '11'),
				('', '2', 'Machines', 'Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?','$id',CURRENT_TIMESTAMP, '12'),
				('','2', 'Nettoyage et vrification', 'L\'inspection et la maintenance sont-elles faites ensemble?','$id',CURRENT_TIMESTAMP, '13'),
				('', '2', 'Responsabilits de nettoyage', 'Y-a-t\'il une personne responsable pour les oprations de nettoyage?','$id',CURRENT_TIMESTAMP, '14'),
				('', '2', 'Propret  habituelle', 'Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ', '$id',CURRENT_TIMESTAMP, '15'),
				('', '2', 'Mmos d\'amlioration', 'Les mmos d\'amlioration sont-ils rgulirement gnrs?', '$id',CURRENT_TIMESTAMP, '16'),
				('', '2', 'Ides d\'amlioration', 'Les ides d\'amlioration sont-elles souvent prises en compte?','$id',CURRENT_TIMESTAMP, '17'),
				('', '2', 'Procedures Cls', 'Les procedures standards sont-elles claires, documentes et souvent utilises?', '$id',CURRENT_TIMESTAMP, '18'),
				('', '2', 'Plan d\'amlioration', 'Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?', '$id', CURRENT_TIMESTAMP, '19'),
				('', '2', 'Les trois premires  secondes', 'Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?','$id',CURRENT_TIMESTAMP, '20'),
				('', '2', 'Formation', 'Tout le monde est-il correctement entrain pour les procdures standards?', '$id',  NULL, '21'),
				('', '2', 'Outils et pices dtaches', 'Les outils et les pices sont-ils correctement rangs?','$id',CURRENT_TIMESTAMP, '22'),
				('', '2', 'Contrle de stock', 'Les contrles de stock sont-ils respects?','$id',CURRENT_TIMESTAMP, '23'),
				('', '2', 'Procdures', 'Les procdures sont-elles mise  jour et rgulirement inspectes?','$id',CURRENT_TIMESTAMP, '24'),
				('', '2', 'Affichage d\'activit', 'L\'affichage des activits est-elle mise  jour et rgulirement inspecte','$id',CURRENT_TIMESTAMP, '25'),
				
				('', '3', 'Materiali o parti', 'L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?','$id',CURRENT_TIMESTAMP, '1'),
				('', '3', 'Macchine o equipaggiamento', 'Sono presenti macchinari o altro equipaggiamento inutilizzati?','$id', CURRENT_TIMESTAMP, '2'),
				('', '3', 'Strutture di montaggio, attrezzi o matrici di stampa', 'Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?','$id', CURRENT_TIMESTAMP, '3'),
				('','3', 'Controllo visivo', 'E\' evidente quali oggetti sono stati identificati come non necessari?','$id', CURRENT_TIMESTAMP, '4'),
				('', '3', 'Standard scritti', 'L\'adozione dello standard 5S\' ha reso obsoleto ogni altro inutile standard?','$id', CURRENT_TIMESTAMP, '5'),
				('', '3', 'Indicatori di posizione', 'Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?', '$id', CURRENT_TIMESTAMP, '6'),
				('', '3', 'Indicatori Oggetto', 'Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?','$id',CURRENT_TIMESTAMP, '7'),
				('', '3', 'Indicatori di Quantit', 'Sono indicate le quantit massime e minime consentite?','$id',CURRENT_TIMESTAMP, '8'),
				('', '3', 'Demarcazione di passatoi e di aree di inventario per materiale in lavorazione', 'Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?','$id', CURRENT_TIMESTAMP, '9'),	
				('', '3', 'Strutture di montaggio e attrezzi', 'Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '3', 'Pavimenti', 'I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '3', 'Macchinari', 'Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?','$id',CURRENT_TIMESTAMP, '12'),				
				('','3', 'Pulizia e controllo', 'L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '3', 'Responsabilit di pulizia', 'C\' una persona responsabile alla supervisione delle operazioni di pulizia?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '3', 'Pulizia abituale', 'Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '3', 'Promemoria per il miglioramento', 'I promemoria per il miglioramento vengono realizzati con regolarit?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '3', 'Idee per il miglioramento', 'Le idee per il miglioramento vengono tenute in considerazione?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '3', 'Procedure chiave', 'Le procedure standard sono chiare, documentate e usate attivamente?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '3', 'Miglioramento piano', 'Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '3', 'Le prime tre S', 'Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '3', 'Addestramento', 'Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?', '$id',  NULL, '21'),				
				('', '3', 'Strumenti e parti', 'Attrezzi e parti vengono immagazzinati correttamente?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '3', 'Controllo Stock', 'Vengono rispettati i controlli di stock?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '3', 'Procedure', 'Le procedure sono aggiornate e revisionate regolarmente?','$id',CURRENT_TIMESTAMP, '24'),
				('', '3', 'Tabelle attivit', 'Le tabelle delle attivit sono aggiornate e revisionate regolarmente?','$id',CURRENT_TIMESTAMP, '25'),				
				
				('', '4', 'Material eller delar', 'Innehller lagret eller lager som ni arbetar med ondiga material eller delar?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '4', 'Maskiner eller utrustning', 'r det ngra oanvnda maskiner eller andra redskap tillgngliga?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '4', 'Jigg, verktyg, eller stmplar', 'Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?','$id', CURRENT_TIMESTAMP, '3'),				
				('','4', 'Visuell kontroll', 'r det uppenbart vilken artikel som har mrkts som ondig?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '4', 'Skriftliga standarder', 'Har inrttandet av 5S\'s lmnat kvar ngra vrdelsa standarder?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '4', 'Platsvisare', 'r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '4', 'Sakmtare', 'Har hyllorna skyltar som visar vart artiklarna skall vara?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '4', 'Kvantitetsrknare', 'Finns det minimalt och maximalt artiklar angivet?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '4', 'Avgrnsning av gngbanor och omrden under inventering', 'r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '4', 'Jigg och verktyg', 'r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '4', 'Golv', 'r golv skinande rena och fria frn avfall, vatten och olja?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '4', 'Maskiner', 'r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?','$id',CURRENT_TIMESTAMP, '12'),				
				('','4', 'Rengring och kontroll', 'r verktygsinspektion kombinerat med verktygsunderhll?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '4', 'Ansvar fr rengring', 'Finns det en person som ansvarar fr rengringsoperationer?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '4', 'Livsmiljrengring', 'Rengr operatrer golv och maskiner utan att bli tillsagda?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '4', 'FrbttringsPMs', 'Kommer det regelbundet frbttrings PMs?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '4', 'Frbttringsider', 'r frbttringsider diskuterade?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '4', 'Huvudrutiner', 'r standard procedurer frstdda, dokumenterade och aktivt i anvndning?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '4', 'Frbttringsplan', 'Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '4', 'De frsta 3 S:ena', 'r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '4', 'Trning', 'r alla utbildade tillrckligt i standard procedurer?', '$id',  NULL, '21'),				
				('', '4', 'Verktyg och delar', 'r verktyg och delar lagrade p rtt stt?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '4', 'Frrdskontroll', 'Fljs lagerkontroller?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '4', 'Tillvgagngsstt', 'r procedurer nydaterade och regelbundet granskade?','$id',CURRENT_TIMESTAMP, '24'),
				('', '4', 'Aktivitetsstyrelser', 'r aktivitetsstyrelser nydaterade och regelbundet granskade?','$id',CURRENT_TIMESTAMP, '25'),
				
				('', '5', 'Materialer eller dele', 'Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '5', 'Maskiner eller udstyr', 'Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '5', 'Skabeloner, Vrktjer og Gevindskrerer', 'Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?','$id', CURRENT_TIMESTAMP, '3'),				
				('','5', 'Visuel Kontrol', 'Er det indlysende, hvilke ting der er markeret som ubrugelige?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '5', 'Skriftlige stanarder', 'Har etableringen af  5S\'s efterladt en ubrugelig standard?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '5', 'Lokation indikator', 'Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '5', 'Ting indikator', 'Har hylderne symboltavler der indikerer hvilke ting passer hvor?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '5', 'Kvantitets indikatorer', 'Er der et maksimum og minimum tilladt kvantitet indikeret?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '5', 'Afgrnsning af gangomrder og vareindleverings omrder', 'Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '5', 'Skabeloner og vrktjer', 'Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '5', 'Gulv', 'Er gulv holdt skindende rene og fri for skidt, vand og olie?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '5', 'Maskiner eller udstyr', 'Er maskinen holdt ren for spner, flis og olie ofte?','$id',CURRENT_TIMESTAMP, '12'),				
				('','5', 'Rengring og undersgelse', 'Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '5', 'Rengringsansvar', 'Er der en person med ansvar for tilsyn med rengringsopgaver?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '5', 'Vanlig rengring', 'Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '5', 'Forbedring memoer', 'Bliver et forbedrelsespapir udarbejdet ofte?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '5', 'Forbedring ideer', 'Bliver forbedringsideer prvet?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '5', 'Ngleprocedurer', 'Er standard procedurer klare, dokumenteret og brugt hyppigt?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '5', 'Forbedringsplan', 'Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '5', 'De frste 3 S\'er', 'Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '5', 'Trning', 'Er alle tilfredsstillende trnet i standard procedurer?', '$id',  NULL, '21'),				
				('', '5', 'Vrktjer og dele', 'Bliver vrktjer opbevaret korrekt?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '5', 'Lagerkontrol', 'Bliver lagerkontrollerne efterfulgt?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '5', 'Procedurer', 'Er procedurerne nutidige og genovervejet ofte?','$id',CURRENT_TIMESTAMP, '24'),
				('', '5', 'Aktivitets tavle', 'Er aktivitetstavlen nutidige og ofte genovervejet?','$id',CURRENT_TIMESTAMP, '25'),				
				
				('', '6', 'Material oder Teile', 'Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ','$id',CURRENT_TIMESTAMP, '1'),				
				('', '6', 'Maschienen oder Zubehr', 'Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '6','Bohrvorrichtungen, Werkzeuge, oder Andere', 'Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?','$id', CURRENT_TIMESTAMP, '3'),				
				('','6', 'Visuelle Kontrolle', 'Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '6', 'Schriftliche Normen', 'Bleibt beim erstellen des 5S\' irgend ein Standart zurck?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '6', 'Positionsbestimmung', 'Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '6', 'Materialkennzeichnung', 'Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '6', 'Mengenindikatoren', 'Sind die maximalen und minimalen zulssigen Mengen angezeigt?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '6', 'Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"', 'Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '6', 'Bohrvorrichtungen und Werkzeuge', 'Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '6', 'Bden', 'Sind die Bden sauber, frei von Schmutz, Wasser und l?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '6', 'Maschinen', 'Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?','$id',CURRENT_TIMESTAMP, '12'),				
				('','6', 'Reiningen und testen', 'Wrde die Kontrolle mit einer Wartung verbuden?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '6', 'Reinigungsanforderung', 'Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '6', 'Gewhnlicher Reiningungszustand', 'Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '6', 'Protokolle', 'Werden regelmig Verbessungsvorschlge unterbreitet?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '6', 'Ideen', 'Folgen Verbesserungsvorschlge?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '6', 'Wichtige Verfahren', 'Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '6', 'Plne', 'Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '6', 'Die ersten 3 Sekunden', 'Wurden die 3s eingehalten?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '6', 'Training', 'Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?', '$id',  NULL, '21'),				
				('', '6', 'Werkzeuge und Teile', 'Wurden Werkzeuge und Teile ordnungsgem eingelagert?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '6', 'Warenbestandskontrolle', 'Wurden Lagerkontrollen eingehalten?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '6', 'Abwicklung', 'Sind die Verfahren aktuell und ordnungsgem kontrolliert?','$id',CURRENT_TIMESTAMP, '24'),
				('', '6', 'Aufgaben, Ttigkeiten', 'Sind die Lauflisten aktuell und ordnungsgem kontrolliert?','$id',CURRENT_TIMESTAMP, '25'),				
				
				('', '7', 'Materiais ou peas', 'O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '7', 'Mquinas ou equipamentos', 'H algumas mquinas ou outros equipamentos desnecessrios por a?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '7','Utenslios, ferramentas ou matrizes', 'H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?','$id', CURRENT_TIMESTAMP, '3'),				
				('','7', 'Controlo Visual', ' obvio qual o objeto que foi definido como desnecessrio?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '7', 'Normas escritas', 'Estabeleceu que o 5S\'s deixou para trs algum padro desnecessrio?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '7', 'Indicadores de localizao', 'As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '7', 'Indicadores de Item', 'As prateleiras tm placas com a indicao de que item contm?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '7', 'Indicadores de Quantidade', 'As quantidades mximas e mnimas permitidas esto indicadas?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '7', 'Demarcao de caminhos e reas em processo de inventrio', 'H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '7', 'Utenslios e ferramentas', 'Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '7', 'Chos', 'O cho  mantido limpo e livre de lixo, gua e leo?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '7', 'Mquinas', 'As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?','$id',CURRENT_TIMESTAMP, '12'),				
				('','7', 'Limpando e verificando', 'A inspeo de equipamentos  combinada com a manuteno dos equipamentos?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '7', 'Responsabilidades de limpeza', 'H uma pessoa responsvel por supervisionar as operaes de limpeza?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '7', 'Limpeza habitual', 'Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '7', 'Memorandos de melhoras', 'Os memorandos de melhorias esto a ser feitos com regularidade?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '7', 'Ideias de melhorias', 'As ideias de melhorias esto a ser postas em prtica?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '7', 'Procedimentos principais', 'As normas de procedimentos so claras, documentadas e utilizadas ativamente?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '7', 'Plano de melhoria', 'As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '7', 'Os primeiros 3 Ss', 'Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '7', 'Treino', 'Todas as pessoas tm a devida formao dos standards de procedimentos?', '$id',  NULL, '21'),				
				('', '7', 'Ferramentas e peas', 'As ferramentas e as peas esto a ser devidamente armazenadas?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '7', 'Controlo de stocks', 'Os controlos de stock tambm esto a ser cumpridos?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '7', 'Procedimentos', 'Os procedimentos esto atualizados e so revistos regularmente?','$id',CURRENT_TIMESTAMP, '24'),
				('', '7', 'Quadros de atividades ', 'Os quadros de atividades esto atualizados e so revistos regularmente?','$id',CURRENT_TIMESTAMP, '25'),
				 
				 ('', '8', 'Materiales o piezas', 'Incluye el inventario vigente o en proceso algn material o parte innecesaria?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '8', 'Mquinas o equipos', 'Existe alguna mquina u otro equipo sin utilizar alrededor?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '8','Plantillas, herramientas o moldes', 'Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?','$id', CURRENT_TIMESTAMP, '3'),				
				('','8', 'Control visual', 'Es evidente cules artculos han sido marcados como innecesarios?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '8', 'Normas escritas', 'Ha dejado el establecimiento de 5S\'s alguna norma inefectiva?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '8', 'Indicadores de lugar', 'Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '8', 'Indicadores de artculos', 'Tienen los estantes algn letrero mostrando cules artculos van dnde?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '8', 'Indicadores de cantidad', 'Estn indicadas las cantidades mximas y mnimas admisibles?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '8', 'Demarcacin de pasillos y reas de inventarios en proceso', 'Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '8', 'Plantillas y herramientas', 'Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '8', 'Pisos', 'Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '8', 'Mquinas', 'Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?','$id',CURRENT_TIMESTAMP, '12'),				
				('','8', 'Limpieza y verificacin', 'Se combina la inspeccin de los equipos con el mantenimiento de los mismos?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '8', 'Responsabilidades de limpieza', 'Existe una persona responsable de supervisar las operaciones de limpieza?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '8', 'Limpieza habitual', 'Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '8', 'Notas de mejoramiento', 'Se generan regularmente las notas de mejoramiento?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '8', 'Ideas de mejoramiento', 'Son llevadas a efecto las ideas de mejoramiento?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '8', 'Procedimientos clave', 'Son los procedimientos estndar claros, documentados y utilizados activamente?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '8', 'Plan de mejoramiento', 'Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '8', 'Las primeras 3 Ss', 'Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '8', 'Capacitacin', 'Estn todos adecuadamente capacitados en el procedimiento estndar?', '$id',  NULL, '21'),				
				('', '8', 'Herramientas y partes', 'Las herramientas y piezas se almacenan correctamente?','$id',CURRENT_TIMESTAMP, '22'),			
				('', '8', 'Controles de exist encias', 'Se han observado los controles de las existencias?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '8', 'Procedimientos', 'Estn los procedimientos actualizados y con revisin peridica?','$id',CURRENT_TIMESTAMP, '24'),
				('', '8', 'Tablas de actividad', 'Estn las tablas de actividad actualizadas y con revisin peridica?','$id',CURRENT_TIMESTAMP, '25'),				 
				 
				 ('', '9', 'Материалы или части', 'Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '9', 'Машины и оборудование', 'Есть ли неиспользованные машин или другого оборудования, вокруг?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '9','Джиги, инструменты и штампы', 'Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?','$id', CURRENT_TIMESTAMP, '3'),				
				('','9', 'Визуальный контроль', 'Является очевидным, какие элементы были отмечены как ненужное?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '9', 'Письменные стандарты', 'С установлении 5SA € ™ с любого оставил бесполезные стандарт?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '9', 'Расположение индикаторов', 'Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '9', 'Пункт показатели', 'У полках вывески, показывающие, какие элементы Куда?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '9', 'Количественные показатели', 'Максимальное и минимальное допустимое количество указано?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '9', 'Демаркация проходы и в процессе инвентаризации областях', 'Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '9', 'Приспособления и инструменты', 'Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '9', 'Этажи', 'Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '9', 'машины', 'Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?','$id',CURRENT_TIMESTAMP, '12'),				
				('','9', 'Очистка и проверка', 'Является ли проверка оборудования сочетании с оборудованием обслуживания?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '9', 'Очистка обязанностей', 'Есть ли лицо, ответственное за контроль операций по очистке?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '9', 'Привычные чистоты', 'У операторов обычно подметать полы и протрите оборудование без слов?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '9', 'Улучшение заметки', 'Являются совершенствование заметки регулярно генерируется?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '9', 'Улучшение идеи', 'Являются улучшение идеи, действовали на?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '9', 'Основные процедуры', 'Существуют стандартные процедуры ясно, документированный и активно используется?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '9', 'Улучшение плана', 'Это будущие стандарты рассматриваются с четким планом улучшения для области?', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '9', 'Первые 3 Ss', 'Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '9', 'обучение', 'Является ли все должным образом подготовлены в стандартной процедурой?', '$id',  NULL, '21'),				
				('', '9', 'Инструменты и запчасти', 'Существуют приборы и комплектующие хранится правильно?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '9', 'со контроля', 'Ли фондовый управления соблюдались?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '9', 'Процедуры', 'Существуют ли процедуры, до современных и регулярно пересматриваться?','$id',CURRENT_TIMESTAMP, '24'),
				('', '9', 'Деятельность платы', 'Есть деятельностью платы до современных и регулярно пересматриваться?','$id',CURRENT_TIMESTAMP, '25'),				
				 
				 ('', '10', '材料或零件', '庫存或在製品庫存是否包括和不必要的材料或零部件？','$id',CURRENT_TIMESTAMP, '1'),				
				('', '10', '機器或設備', '是否有任何未使用的機器或其他周邊設備嗎？','$id', CURRENT_TIMESTAMP, '2'),				
				('', '10','夾具，工具或模具', '是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？','$id', CURRENT_TIMESTAMP, '3'),				
				('','10', '可視化控制', '這是明顯的項目已被標記為不必要的？','$id', CURRENT_TIMESTAMP, '4'),				
				('', '10', '書面標準', '建立5SA€™的留下任何無用的標準嗎？','$id', CURRENT_TIMESTAMP, '5'),				
				('', '10', '位置指示燈', '標記的貨架上和其他存儲區的位置指標和地址嗎？', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '10', '項目指標', '做的貨架，招牌顯示哪些項目去哪裡？','$id',CURRENT_TIMESTAMP, '7'),				
				('', '10', '數量指標', '的最大和最小允許數量是否表示嗎？','$id',CURRENT_TIMESTAMP, '8'),				
				('', '10', '人行道和在製品庫存區的劃界', '白線或其他標記，清楚地表明人行道和存儲領域嗎？','$id', CURRENT_TIMESTAMP, '9'),				
				('', '10', '夾具和工具', '夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '10', '地板', '地板保持光澤的清潔，廢物，水和油？','$id',CURRENT_TIMESTAMP, '11'),				
				('', '10', '機', '是機器擦拭乾淨，經常保持無屑，薯片和油嗎？','$id',CURRENT_TIMESTAMP, '12'),				
				('','10', '清潔和檢查', '設備設備的維護與檢查相結合？','$id',CURRENT_TIMESTAMP, '13'),				
				('', '10', '清潔工作', '有一個人負責監督清潔操作？','$id',CURRENT_TIMESTAMP, '14'),				
				('', '10', '習慣性的清潔', '，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '10', '改善備忘錄', '定期改善備忘錄產生的呢？', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '10', '改進思路', '改進的思路是否採取行動？','$id',CURRENT_TIMESTAMP, '17'),				
				('', '10', '關鍵程序', '標準程序是明確的，成文的和積極地使用？', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '10', '改進計劃', '被認為是未來的標準，該地區有明顯的改善計劃？', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '10', '第3條SS', '第3 SS（排序，設置位置和光澤）維護呢？','$id',CURRENT_TIMESTAMP, '20'),				
				('', '10', '訓練', '大家充分的培訓標準的過程中嗎？', '$id',  NULL, '21'),				
				('', '10', '工具及零件', '正確存放的工具和零件嗎？','$id',CURRENT_TIMESTAMP, '22'),				
				('', '10', '庫存控制', '存貨控制是否得到遵守？','$id',CURRENT_TIMESTAMP, '23'),				
				('', '10', '程序', '程序到日期，並定期檢討嗎？','$id',CURRENT_TIMESTAMP, '24'),
				('', '10', '活動板', '最新活動板，並定期檢討呢？','$id',CURRENT_TIMESTAMP, '25'),				
				 
				('', '11', 'Υλικά ή εξαρτήματα', 'Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;','$id',CURRENT_TIMESTAMP, '1'),				
				('', '11', 'Μηχανήματα ή εξοπλισμός', 'Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;','$id', CURRENT_TIMESTAMP, '2'),				
				('', '11','Σφιγκτήρες, εργαλεία ή καλούπια', 'Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;','$id', CURRENT_TIMESTAMP, '3'),				
				('','11', 'Οπτικός έλεγχος', 'Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;','$id', CURRENT_TIMESTAMP, '4'),				
				('', '11', 'Γραπτά πρότυπα', 'Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;','$id', CURRENT_TIMESTAMP, '5'),				
				('', '11', 'Δείκτες τοποθεσίας', 'Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '11', 'Δείτες αντικειμένου', 'Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;','$id',CURRENT_TIMESTAMP, '7'),				
				('', '11', 'Δείκτες ποσότητας', 'Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;','$id',CURRENT_TIMESTAMP, '8'),				
				('', '11', 'Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών', 'Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;','$id', CURRENT_TIMESTAMP, '9'),				
				('', '11', 'Σφιγκτήρες και εργαλεία', 'Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '11', 'Δάπεδα', 'Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;','$id',CURRENT_TIMESTAMP, '11'),				
				('', '11', 'Μηχανήματα', 'Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;','$id',CURRENT_TIMESTAMP, '12'),				
				('','11', 'Καθαρισμός και έλεγχος', 'Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;','$id',CURRENT_TIMESTAMP, '13'),				
				('', '11', 'Αρμοδιότητες καθαρισμού', 'Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;','$id',CURRENT_TIMESTAMP, '14'),				
				('', '11', 'Συνήθης καθαριότητα', 'Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '11', 'Υπομνήματα για βελτίωση', 'Δημιουργούνται συχνά υπομνήματα βελτίωσης;', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '11', 'Ιδέες για βελτίωση', 'Οι ιδέες βελτίωσης εφαρμόζονται;','$id',CURRENT_TIMESTAMP, '17'),				
				('', '11', 'Διαδικασίες κλειδί', 'Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '11', 'Πλάνο βελτίωσης', 'Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '11', 'Τα πρώτα 3 Ss', 'Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;','$id',CURRENT_TIMESTAMP, '20'),				
				('', '11', 'Εκπαίδευση', 'Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;', '$id',  NULL, '21'),				
				('', '11', 'Εργαλεία και εξαρτήματα', 'Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;','$id',CURRENT_TIMESTAMP, '22'),				
				('', '11', 'Έλεγχοι του αποθέματος', 'Τηρούνται στοιχεία ελέγχου των αποθεμάτων;','$id',CURRENT_TIMESTAMP, '23'),				
				('', '11', 'Διαδικασίες ', 'Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;','$id',CURRENT_TIMESTAMP, '24'),
				('', '11', 'Πίνακες δραστηριότητας', 'Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;','$id',CURRENT_TIMESTAMP, '25'),				 
				 
				 ('', '12', '具材か部品', 'インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？','$id',CURRENT_TIMESTAMP, '1'),				
				('', '12', '機械か装備', 'そこに使用されていない機械や他の装備は周辺にありますか？','$id', CURRENT_TIMESTAMP, '2'),				
				('', '12','冶具、道具か型', 'そこに使用されていない冶具、道具か型は周辺にありますか？','$id', CURRENT_TIMESTAMP, '3'),				
				('','12', '視覚制御', '不必要としてマークされているアイテムは明らかですか？','$id', CURRENT_TIMESTAMP, '4'),				
				('', '12', '規格書', '5S™sを確立する事によって無駄な標準は解消できましたか？','$id', CURRENT_TIMESTAMP, '5'),				
				('', '12', '位置表示', '棚や他は位置表示と住所マーク付けされてますか？', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '12', '項目インジケータ', '棚にはアイテムの行き先が指定するものがありますか？','$id',CURRENT_TIMESTAMP, '7'),				
				('', '12', '品質指標', '最大値と最小値の許容量が示されていますか？','$id',CURRENT_TIMESTAMP, '8'),				
				('', '12', '歩道やプロセス中インベントリ領域の境界', '歩道や保存エリアは白い線や他のマーカーで示されていますか？','$id', CURRENT_TIMESTAMP, '9'),				
				('', '12', '冶具や道具', '治工具やそれらを拾って返しやすい配置に置いていますか？', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '12', 'フロア', '床は汚れ、水やオイルの無い清潔を保ってますか？','$id',CURRENT_TIMESTAMP, '11'),				
				('', '12', '機械', '削り、チップやオイルを機械から拭き取っていますか？','$id',CURRENT_TIMESTAMP, '12'),				
				('','12', '清掃と点検', '設備点検と機器のメンテナンス葉同時に行われていますか？','$id',CURRENT_TIMESTAMP, '13'),				
				('', '12', '清掃責任', '洗浄操作を監督する責任者はいますか？','$id',CURRENT_TIMESTAMP, '14'),				
				('', '12', '常習的な清浄度', 'オペレータは言われずに習慣的に機器を拭きますか？', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '12', '改善メモ', '改善メモは定期的に生成されていますか？', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '12', '改善アイディア', '改善のアイデアは作用されていますか？','$id',CURRENT_TIMESTAMP, '17'),				
				('', '12', '主要な手順', '標準的な手順は、明確な文書化と積極的に使われていますか？', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '12', '改善プラン', '将来の規格は明確な改善計画で検討されている？', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '12', '最初のS三つ', '最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？','$id',CURRENT_TIMESTAMP, '20'),				
				('', '12', '訓練', '誰もが十分に標準的な手順の訓練を受けていますか？', '$id',  NULL, '21'),				
				('', '12', '工具や部品', 'ツールや部品は正しく保存されていますか？','$id',CURRENT_TIMESTAMP, '22'),				
				('', '12', 'ストックコントロール', 'ストックコントロールがに付着されていますか？','$id',CURRENT_TIMESTAMP, '23'),				
				('', '12', '手続き', '手順は、最新かつ定期的に見直していますか？','$id',CURRENT_TIMESTAMP, '24'),
				('', '12', 'アクティビティボード', 'アクティビティボードは、最新かつ定期的に見直していますか？','$id',CURRENT_TIMESTAMP, '25'),				
				 
				 ('', '13', 'Materialen of onderdelen', 'Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?','$id',CURRENT_TIMESTAMP, '1'),				
				('', '13', 'Machines of gereedschap', 'Is er sprake van niet gebruikte machines of andere uitrusting?','$id', CURRENT_TIMESTAMP, '2'),				
				('', '13','Sjablonen, gereedschap of stempels', 'Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?','$id', CURRENT_TIMESTAMP, '3'),				
				('','13', 'Visuele controle', 'Is het duidelijk welke items zijn aangeduid als onnodig?','$id', CURRENT_TIMESTAMP, '4'),				
				('', '13', 'Beschreven standaarden', 'Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?','$id', CURRENT_TIMESTAMP, '5'),				
				('', '13', 'Plaats-aanduiders', 'Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?', '$id', CURRENT_TIMESTAMP, '6'),				
				('', '13', 'Item-aanduiders', 'Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?','$id',CURRENT_TIMESTAMP, '7'),				
				('', '13', 'Hoeveelheid-aanwijzers', ' Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?','$id',CURRENT_TIMESTAMP, '8'),				
				('', '13', 'Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden', 'Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?','$id', CURRENT_TIMESTAMP, '9'),				
				('', '13', 'Sjablonen en gereedschap', 'Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ', '$id', CURRENT_TIMESTAMP, '10'),				
				('', '13', 'Verdiepingen', 'Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?','$id',CURRENT_TIMESTAMP, '11'),				
				('', '13', 'Machines', 'Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?','$id',CURRENT_TIMESTAMP, '12'),				
				('','13', 'Schoonmaak en controle', 'Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?','$id',CURRENT_TIMESTAMP, '13'),				
				('', '13', 'Schoonmaak-verantwoordelijkheden', 'Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?','$id',CURRENT_TIMESTAMP, '14'),				
				('', '13', 'Gebruikelijke zuiverheid', 'Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?', '$id',CURRENT_TIMESTAMP, '15'),				
				('', '13', 'Memo\'s ter verbetering', 'Worden er regelmatig memo\'s ter verbetering opgemaakt?', '$id',CURRENT_TIMESTAMP, '16'),				
				('', '13', 'Ideeën voor verbeteringen', 'Wordt er actie ondernomen op ideeën ter verbetering?','$id',CURRENT_TIMESTAMP, '17'),				
				('', '13', 'Sleutel-procedures', 'Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?', '$id',CURRENT_TIMESTAMP, '18'),				
				('', '13', 'Plan ter verbetering', 'Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ', '$id', CURRENT_TIMESTAMP, '19'),				
				('', '13', 'De eerste drie S\'en', 'Worden de eerste drie S\'en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?','$id',CURRENT_TIMESTAMP, '20'),				
				('', '13', 'Training', 'Is iedereen voldoende getraind in de standaard procedures?', '$id',  NULL, '21'),				
				('', '13', 'Gereedschap en onderdelen', 'Worden gereedschap en onderdelen op de juiste wijze opgeborgen?','$id',CURRENT_TIMESTAMP, '22'),				
				('', '13', 'Voorraad-controles', 'Wordt er vastgehouden aan voorraad-controles?','$id',CURRENT_TIMESTAMP, '23'),				
				('', '13', 'Procedures', 'Zijn de procedures up-to-date en worden ze regelmatig herzien?','$id',CURRENT_TIMESTAMP, '24'),
				('', '13', 'Activiteiten-commissies', 'Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?','$id',CURRENT_TIMESTAMP, '25')";
				mysqli_query($link,$sql_insert_queans);
				$sql_insert_questionnair =" insert into  tbl_questionnair(`qid`,`title`,`uid`,`lid`,`superadminid`,`timestamp`,`status`)
											values('1','5s audit - english','$id','9','$id',CURRENT_TIMESTAMP,'1'),('2','5s audit - french','$id','4','$id',CURRENT_TIMESTAMP,'1'),
											('3','5s audit - italy','$id','7','$id',CURRENT_TIMESTAMP,'1'),('4','5s audit - swedish','$id','14','$id',CURRENT_TIMESTAMP,'1'),
											('5','5s audit - danish','$id','2','$id',CURRENT_TIMESTAMP,'1'),('6','5s audit - german','$id','5','$id',CURRENT_TIMESTAMP,'1'),
											('7','5s audit - portugal','$id','11','$id',CURRENT_TIMESTAMP,'1'),('8','5s audit - spanish','$id','13','$id',CURRENT_TIMESTAMP,'1'),
											('9','5s audit - russsian','$id','12','$id',CURRENT_TIMESTAMP,'1'),('10','5s audit - chinese','$id','1','$id',CURRENT_TIMESTAMP,'1'),
											('11','5s audit - greek','$id','6','$id',CURRENT_TIMESTAMP,'1'),('12','5s audit - japanese','$id','8','$id',CURRENT_TIMESTAMP,'1'),
											('13','5s audit - dutch','$id','3','$id',CURRENT_TIMESTAMP,'1')";	
				mysqli_query($link,$sql_insert_questionnair) ;
				
				$access_right = "CREATE TABLE IF NOT EXISTS `access_rights` (
								  `id` int(11) NOT NULL,
								  `module_name` varchar(50) NOT NULL,
								  `admin` int(2) NOT NULL,
								  `auditor` int(2) NOT NULL
								) ENGINE=InnoDB DEFAULT CHARSET=latin1;"
				mysqli_query($link,$access_right);
				
				$access_right_insert = "INSERT INTO `access_rights` (`id`, `module_name`, `admin`, `auditor`) VALUES
									(1, 'Dashboard', 1, 1),
									(2, 'Template Create', 1, 1),
									(3, 'View Template', 1, 1),
									(4, 'Create Audit', 1, 1),
									(5, 'Add Department', 1, 1),
									(6, 'Manage Questionnaire', 1, 1),
									(7, 'Manage Audit', 1, 1),
									(8, 'Archive', 1, 1),
									(9, 'Reports', 1, 1),
									(10, 'Access Rights', 1, 1);";
				mysqli_query($link,$access_right_insert);
				
				$sq="update tbl_questionanswer set superadminid = '$id' where uid = '$id'";
				mysqli_query($link,$sq);
				$sql_insert_setting="INSERT INTO `tbl_settings` (`sid`,  `key`, `value`,`superadminid`,`uid`) VALUES('', 'default_language',  '9','$id','$id'), ('', 'default_language_question', '9', '$id', '$id')";
				mysqli_query($link,$sql_insert_setting);
				mysqli_close($link);
				//Send Mail to User
				include("dbconnect.php");
				$sqlemail = "select `email`,`displayname`,`firstname` from tbl_login where uid =".$id;
				$res = mysqli_query($sql,$sqlemail);	 
				while($r = mysqli_fetch_array($res))
				{
					$email = $r['email'];
					$disname = $r['displayname'];
					$firstname = $r['firstname'];
				}
				$url = 'http://5s.niftysol.com/app/webroot/custom/5snewsletter.php';
				$strdata="email=".$email;
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, 4);
				curl_setopt($ch,CURLOPT_POSTFIELDS, $strdata);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				$result = curl_exec($ch);
				curl_close($ch);
					//Ends Sending Mail
		}
	break;
	case "INVALID":
		 break;
	default:
}
?>