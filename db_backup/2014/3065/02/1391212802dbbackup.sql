

CREATE TABLE `adddepartment` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(255) NOT NULL,
  `depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO adddepartment VALUES("1","Manufacturing ","2014-01-01 03:46:13","3065","3065");





CREATE TABLE `addtemplate` (
  `tempid` int(11) NOT NULL AUTO_INCREMENT,
  `tempname` varchar(255) NOT NULL,
  `auditorcname` varchar(255) NOT NULL,
  `auditorclogo` varchar(255) NOT NULL,
  `clientcname` varchar(255) NOT NULL,
  `clientclogo` varchar(255) NOT NULL,
  `temptype` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '1970-01-05 00:00:00',
  `temptimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`tempid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO addtemplate VALUES("1","Template 001","McAllister Tool and  Machine ","","","","o","1970-01-05 00:00:00","2014-01-01 03:19:59","3065","3065");





CREATE TABLE `tbl_project` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `tempid` int(11) NOT NULL,
  `tempname` varchar(255) NOT NULL,
  `deptid` int(11) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `qid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `auditorcname` varchar(255) NOT NULL,
  `auditorclogo` varchar(255) NOT NULL,
  `clientcname` varchar(255) NOT NULL,
  `clientclogo` varchar(255) NOT NULL,
  `temptype` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `notes` varchar(255) NOT NULL,
  `auditedby` varchar(255) NOT NULL,
  `status_progress` int(11) NOT NULL DEFAULT '1',
  `sync_status` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO tbl_project VALUES("1","1","Template 001","1","Manufacturing  ","14","Shop 5s Audit ","2014-01-31","McAllister Tool and  Machine ","","","","o","3065","3065","","1","","MA McAllister","1","0","0");





CREATE TABLE `tbl_project_review` (
  `prjid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `queid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`prjid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_questionanswer` (
  `qaid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `queid` int(11) NOT NULL,
  `checkitem` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`qaid`)
) ENGINE=InnoDB AUTO_INCREMENT=1039 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionanswer VALUES("1","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("2","1","2","Machines or equipment","Are there any unused machines or other equipment around?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("3","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("4","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("5","1","5","Written standards","Has establishing the 5Ss left behind any useless standard?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("6","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("7","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("8","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("9","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("10","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("11","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("12","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("13","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("14","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("15","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("16","1","16","Improvement memos","Are improvement memos regularly being generated?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("17","1","17","Improvement ideas","Are improvement ideas being acted on?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("18","1","18","Key procedures","Are standard procedures clear, documented and actively used?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("19","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("20","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("21","1","21","Training","Is everyone adequately trained in standard procedure?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("22","1","22","Tools and parts","Are tools and parts being stored correctly?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("23","1","23","Stock controls","Are stock controls being adhered to?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("24","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("25","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("26","2","1","Matriel ou pices","L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("27","2","2","Machine ou quipement","Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("28","2","3","Outils, Matrice ou gabarits","Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("29","2","4","Contrle visuel","Les objets marqus comme non ncessaires sont-ils mis en vidence?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("30","2","5","Normes rdactionnelles","La mise  jour des standards XXX rend elle les anciens standards inutiles?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("31","2","6","Indicateurs de positionnement","Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("32","2","7","Indicateurs d\' article","Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("33","2","8","Indicateurs de quantit","Les quantits maximale et minimale permises sont-elles indiques?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("34","2","9","Dmarcateur des alles et des zones d\'inventaire en cours","Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("35","2","10","Gabarits et outils","Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("36","2","11","Sols","Les sols sont-ils gardss propre et sans ordures, eau et huile?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("37","2","12","Machines","Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("38","2","13","Nettoyage et vrification","L\'inspection et la maintenance sont-elles faites ensemble?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("39","2","14","Responsabilits de nettoyage","Y-a-t\'il une personne responsable pour les oprations de nettoyage?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("40","2","15","Propret  habituelle","Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("41","2","16","Mmos d\'amlioration","Les mmos d\'amlioration sont-ils rgulirement gnrs?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("42","2","17","Ides d\'amlioration","Les ides d\'amlioration sont-elles souvent prises en compte?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("43","2","18","Procedures Cls","Les procedures standards sont-elles claires, documentes et souvent utilises?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("44","2","19","Plan d\'amlioration","Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("45","2","20","Les trois premires  secondes","Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("46","2","21","Formation","Tout le monde est-il correctement entrain pour les procdures standards?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("47","2","22","Outils et pices dtaches","Les outils et les pices sont-ils correctement rangs?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("48","2","23","Contrle de stock","Les contrles de stock sont-ils respects?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("49","2","24","Procdures","Les procdures sont-elles mise  jour et rgulirement inspectes?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("50","2","25","Affichage d\'activit","L\'affichage des activits est-elle mise  jour et rgulirement inspecte","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("51","3","1","Materiali o parti","L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("52","3","2","Macchine o equipaggiamento","Sono presenti macchinari o altro equipaggiamento inutilizzati?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("53","3","3","Strutture di montaggio, attrezzi o matrici di stampa","Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("54","3","4","Controllo visivo","E\' evidente quali oggetti sono stati identificati come non necessari?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("55","3","5","Standard scritti","L\'adozione dello standard 5S\' ha reso obsoleto ogni altro inutile standard?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("56","3","6","Indicatori di posizione","Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("57","3","7","Indicatori Oggetto","Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("58","3","8","Indicatori di Quantit","Sono indicate le quantit massime e minime consentite?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("59","3","9","Demarcazione di passatoi e di aree di inventario per materiale in lavorazione","Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("60","3","10","Strutture di montaggio e attrezzi","Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("61","3","11","Pavimenti","I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("62","3","12","Macchinari","Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("63","3","13","Pulizia e controllo","L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("64","3","14","Responsabilit di pulizia","C\' una persona responsabile alla supervisione delle operazioni di pulizia?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("65","3","15","Pulizia abituale","Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("66","3","16","Promemoria per il miglioramento","I promemoria per il miglioramento vengono realizzati con regolarit?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("67","3","17","Idee per il miglioramento","Le idee per il miglioramento vengono tenute in considerazione?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("68","3","18","Procedure chiave","Le procedure standard sono chiare, documentate e usate attivamente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("69","3","19","Miglioramento piano","Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("70","3","20","Le prime tre S","Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("71","3","21","Addestramento","Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("72","3","22","Strumenti e parti","Attrezzi e parti vengono immagazzinati correttamente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("73","3","23","Controllo Stock","Vengono rispettati i controlli di stock?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("74","3","24","Procedure","Le procedure sono aggiornate e revisionate regolarmente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("75","3","25","Tabelle attivit","Le tabelle delle attivit sono aggiornate e revisionate regolarmente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("76","4","1","Material eller delar","Innehller lagret eller lager som ni arbetar med ondiga material eller delar?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("77","4","2","Maskiner eller utrustning","r det ngra oanvnda maskiner eller andra redskap tillgngliga?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("78","4","3","Jigg, verktyg, eller stmplar","Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("79","4","4","Visuell kontroll","r det uppenbart vilken artikel som har mrkts som ondig?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("80","4","5","Skriftliga standarder","Har inrttandet av 5S\'s lmnat kvar ngra vrdelsa standarder?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("81","4","6","Platsvisare","r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("82","4","7","Sakmtare","Har hyllorna skyltar som visar vart artiklarna skall vara?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("83","4","8","Kvantitetsrknare","Finns det minimalt och maximalt artiklar angivet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("84","4","9","Avgrnsning av gngbanor och omrden under inventering","r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("85","4","10","Jigg och verktyg","r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("86","4","11","Golv","r golv skinande rena och fria frn avfall, vatten och olja?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("87","4","12","Maskiner","r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("88","4","13","Rengring och kontroll","r verktygsinspektion kombinerat med verktygsunderhll?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("89","4","14","Ansvar fr rengring","Finns det en person som ansvarar fr rengringsoperationer?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("90","4","15","Livsmiljrengring","Rengr operatrer golv och maskiner utan att bli tillsagda?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("91","4","16","FrbttringsPMs","Kommer det regelbundet frbttrings PMs?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("92","4","17","Frbttringsider","r frbttringsider diskuterade?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("93","4","18","Huvudrutiner","r standard procedurer frstdda, dokumenterade och aktivt i anvndning?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("94","4","19","Frbttringsplan","Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("95","4","20","De frsta 3 S:ena","r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("96","4","21","Trning","r alla utbildade tillrckligt i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("97","4","22","Verktyg och delar","r verktyg och delar lagrade p rtt stt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("98","4","23","Frrdskontroll","Fljs lagerkontroller?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("99","4","24","Tillvgagngsstt","r procedurer nydaterade och regelbundet granskade?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("100","4","25","Aktivitetsstyrelser","r aktivitetsstyrelser nydaterade och regelbundet granskade?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("101","5","1","Materialer eller dele","Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("102","5","2","Maskiner eller udstyr","Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("103","5","3","Skabeloner, Vrktjer og Gevindskrerer","Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("104","5","4","Visuel Kontrol","Er det indlysende, hvilke ting der er markeret som ubrugelige?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("105","5","5","Skriftlige stanarder","Har etableringen af  5S\'s efterladt en ubrugelig standard?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("106","5","6","Lokation indikator","Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("107","5","7","Ting indikator","Har hylderne symboltavler der indikerer hvilke ting passer hvor?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("108","5","8","Kvantitets indikatorer","Er der et maksimum og minimum tilladt kvantitet indikeret?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("109","5","9","Afgrnsning af gangomrder og vareindleverings omrder","Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("110","5","10","Skabeloner og vrktjer","Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("111","5","11","Gulv","Er gulv holdt skindende rene og fri for skidt, vand og olie?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("112","5","12","Maskiner eller udstyr","Er maskinen holdt ren for spner, flis og olie ofte?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("113","5","13","Rengring og undersgelse","Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("114","5","14","Rengringsansvar","Er der en person med ansvar for tilsyn med rengringsopgaver?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("115","5","15","Vanlig rengring","Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("116","5","16","Forbedring memoer","Bliver et forbedrelsespapir udarbejdet ofte?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("117","5","17","Forbedring ideer","Bliver forbedringsideer prvet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("118","5","18","Ngleprocedurer","Er standard procedurer klare, dokumenteret og brugt hyppigt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("119","5","19","Forbedringsplan","Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("120","5","20","De frste 3 S\'er","Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("121","5","21","Trning","Er alle tilfredsstillende trnet i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("122","5","22","Vrktjer og dele","Bliver vrktjer opbevaret korrekt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("123","5","23","Lagerkontrol","Bliver lagerkontrollerne efterfulgt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("124","5","24","Procedurer","Er procedurerne nutidige og genovervejet ofte?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("125","5","25","Aktivitets tavle","Er aktivitetstavlen nutidige og ofte genovervejet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("126","6","1","Material oder Teile","Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("127","6","2","Maschienen oder Zubehr","Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("128","6","3","Bohrvorrichtungen, Werkzeuge, oder Andere","Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("129","6","4","Visuelle Kontrolle","Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("130","6","5","Schriftliche Normen","Bleibt beim erstellen des 5S\' irgend ein Standart zurck?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("131","6","6","Positionsbestimmung","Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("132","6","7","Materialkennzeichnung","Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("133","6","8","Mengenindikatoren","Sind die maximalen und minimalen zulssigen Mengen angezeigt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("134","6","9","Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"","Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("135","6","10","Bohrvorrichtungen und Werkzeuge","Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("136","6","11","Bden","Sind die Bden sauber, frei von Schmutz, Wasser und l?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("137","6","12","Maschinen","Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("138","6","13","Reiningen und testen","Wrde die Kontrolle mit einer Wartung verbuden?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("139","6","14","Reinigungsanforderung","Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("140","6","15","Gewhnlicher Reiningungszustand","Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("141","6","16","Protokolle","Werden regelmig Verbessungsvorschlge unterbreitet?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("142","6","17","Ideen","Folgen Verbesserungsvorschlge?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("143","6","18","Wichtige Verfahren","Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("144","6","19","Plne","Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("145","6","20","Die ersten 3 Sekunden","Wurden die 3s eingehalten?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("146","6","21","Training","Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("147","6","22","Werkzeuge und Teile","Wurden Werkzeuge und Teile ordnungsgem eingelagert?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("148","6","23","Warenbestandskontrolle","Wurden Lagerkontrollen eingehalten?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("149","6","24","Abwicklung","Sind die Verfahren aktuell und ordnungsgem kontrolliert?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("150","6","25","Aufgaben, Ttigkeiten","Sind die Lauflisten aktuell und ordnungsgem kontrolliert?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("151","7","1","Materiais ou peas","O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("152","7","2","Mquinas ou equipamentos","H algumas mquinas ou outros equipamentos desnecessrios por a?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("153","7","3","Utenslios, ferramentas ou matrizes","H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("154","7","4","Controlo Visual"," obvio qual o objeto que foi definido como desnecessrio?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("155","7","5","Normas escritas","Estabeleceu que o 5S\'s deixou para trs algum padro desnecessrio?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("156","7","6","Indicadores de localizao","As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("157","7","7","Indicadores de Item","As prateleiras tm placas com a indicao de que item contm?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("158","7","8","Indicadores de Quantidade","As quantidades mximas e mnimas permitidas esto indicadas?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("159","7","9","Demarcao de caminhos e reas em processo de inventrio","H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("160","7","10","Utenslios e ferramentas","Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("161","7","11","Chos","O cho  mantido limpo e livre de lixo, gua e leo?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("162","7","12","Mquinas","As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("163","7","13","Limpando e verificando","A inspeo de equipamentos  combinada com a manuteno dos equipamentos?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("164","7","14","Responsabilidades de limpeza","H uma pessoa responsvel por supervisionar as operaes de limpeza?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("165","7","15","Limpeza habitual","Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("166","7","16","Memorandos de melhoras","Os memorandos de melhorias esto a ser feitos com regularidade?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("167","7","17","Ideias de melhorias","As ideias de melhorias esto a ser postas em prtica?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("168","7","18","Procedimentos principais","As normas de procedimentos so claras, documentadas e utilizadas ativamente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("169","7","19","Plano de melhoria","As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("170","7","20","Os primeiros 3 Ss","Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("171","7","21","Treino","Todas as pessoas tm a devida formao dos standards de procedimentos?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("172","7","22","Ferramentas e peas","As ferramentas e as peas esto a ser devidamente armazenadas?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("173","7","23","Controlo de stocks","Os controlos de stock tambm esto a ser cumpridos?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("174","7","24","Procedimentos","Os procedimentos esto atualizados e so revistos regularmente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("175","7","25","Quadros de atividades ","Os quadros de atividades esto atualizados e so revistos regularmente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("176","8","1","Materiales o piezas","Incluye el inventario vigente o en proceso algn material o parte innecesaria?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("177","8","2","Mquinas o equipos","Existe alguna mquina u otro equipo sin utilizar alrededor?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("178","8","3","Plantillas, herramientas o moldes","Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("179","8","4","Control visual","Es evidente cules artculos han sido marcados como innecesarios?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("180","8","5","Normas escritas","Ha dejado el establecimiento de 5S\'s alguna norma inefectiva?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("181","8","6","Indicadores de lugar","Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("182","8","7","Indicadores de artculos","Tienen los estantes algn letrero mostrando cules artculos van dnde?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("183","8","8","Indicadores de cantidad","Estn indicadas las cantidades mximas y mnimas admisibles?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("184","8","9","Demarcacin de pasillos y reas de inventarios en proceso","Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("185","8","10","Plantillas y herramientas","Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("186","8","11","Pisos","Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("187","8","12","Mquinas","Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("188","8","13","Limpieza y verificacin","Se combina la inspeccin de los equipos con el mantenimiento de los mismos?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("189","8","14","Responsabilidades de limpieza","Existe una persona responsable de supervisar las operaciones de limpieza?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("190","8","15","Limpieza habitual","Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("191","8","16","Notas de mejoramiento","Se generan regularmente las notas de mejoramiento?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("192","8","17","Ideas de mejoramiento","Son llevadas a efecto las ideas de mejoramiento?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("193","8","18","Procedimientos clave","Son los procedimientos estndar claros, documentados y utilizados activamente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("194","8","19","Plan de mejoramiento","Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("195","8","20","Las primeras 3 Ss","Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("196","8","21","Capacitacin","Estn todos adecuadamente capacitados en el procedimiento estndar?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("197","8","22","Herramientas y partes","Las herramientas y piezas se almacenan correctamente?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("198","8","23","Controles de exist encias","Se han observado los controles de las existencias?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("199","8","24","Procedimientos","Estn los procedimientos actualizados y con revisin peridica?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("200","8","25","Tablas de actividad","Estn las tablas de actividad actualizadas y con revisin peridica?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("201","9","1","Материалы или части","Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("202","9","2","Машины и оборудование","Есть ли неиспользованные машин или другого оборудования, вокруг?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("203","9","3","Джиги, инструменты и штампы","Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("204","9","4","Визуальный контроль","Является очевидным, какие элементы были отмечены как ненужное?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("205","9","5","Письменные стандарты","С установлении 5SA € ™ с любого оставил бесполезные стандарт?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("206","9","6","Расположение индикаторов","Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("207","9","7","Пункт показатели","У полках вывески, показывающие, какие элементы Куда?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("208","9","8","Количественные показатели","Максимальное и минимальное допустимое количество указано?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("209","9","9","Демаркация проходы и в процессе инвентаризации областях","Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("210","9","10","Приспособления и инструменты","Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("211","9","11","Этажи","Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("212","9","12","машины","Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("213","9","13","Очистка и проверка","Является ли проверка оборудования сочетании с оборудованием обслуживания?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("214","9","14","Очистка обязанностей","Есть ли лицо, ответственное за контроль операций по очистке?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("215","9","15","Привычные чистоты","У операторов обычно подметать полы и протрите оборудование без слов?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("216","9","16","Улучшение заметки","Являются совершенствование заметки регулярно генерируется?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("217","9","17","Улучшение идеи","Являются улучшение идеи, действовали на?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("218","9","18","Основные процедуры","Существуют стандартные процедуры ясно, документированный и активно используется?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("219","9","19","Улучшение плана","Это будущие стандарты рассматриваются с четким планом улучшения для области?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("220","9","20","Первые 3 Ss","Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("221","9","21","обучение","Является ли все должным образом подготовлены в стандартной процедурой?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("222","9","22","Инструменты и запчасти","Существуют приборы и комплектующие хранится правильно?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("223","9","23","со контроля","Ли фондовый управления соблюдались?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("224","9","24","Процедуры","Существуют ли процедуры, до современных и регулярно пересматриваться?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("225","9","25","Деятельность платы","Есть деятельностью платы до современных и регулярно пересматриваться?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("226","10","1","材料或零件","庫存或在製品庫存是否包括和不必要的材料或零部件？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("227","10","2","機器或設備","是否有任何未使用的機器或其他周邊設備嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("228","10","3","夾具，工具或模具","是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("229","10","4","可視化控制","這是明顯的項目已被標記為不必要的？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("230","10","5","書面標準","建立5SA€™的留下任何無用的標準嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("231","10","6","位置指示燈","標記的貨架上和其他存儲區的位置指標和地址嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("232","10","7","項目指標","做的貨架，招牌顯示哪些項目去哪裡？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("233","10","8","數量指標","的最大和最小允許數量是否表示嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("234","10","9","人行道和在製品庫存區的劃界","白線或其他標記，清楚地表明人行道和存儲領域嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("235","10","10","夾具和工具","夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("236","10","11","地板","地板保持光澤的清潔，廢物，水和油？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("237","10","12","機","是機器擦拭乾淨，經常保持無屑，薯片和油嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("238","10","13","清潔和檢查","設備設備的維護與檢查相結合？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("239","10","14","清潔工作","有一個人負責監督清潔操作？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("240","10","15","習慣性的清潔","，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("241","10","16","改善備忘錄","定期改善備忘錄產生的呢？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("242","10","17","改進思路","改進的思路是否採取行動？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("243","10","18","關鍵程序","標準程序是明確的，成文的和積極地使用？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("244","10","19","改進計劃","被認為是未來的標準，該地區有明顯的改善計劃？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("245","10","20","第3條SS","第3 SS（排序，設置位置和光澤）維護呢？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("246","10","21","訓練","大家充分的培訓標準的過程中嗎？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("247","10","22","工具及零件","正確存放的工具和零件嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("248","10","23","庫存控制","存貨控制是否得到遵守？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("249","10","24","程序","程序到日期，並定期檢討嗎？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("250","10","25","活動板","最新活動板，並定期檢討呢？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("251","11","1","Υλικά ή εξαρτήματα","Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("252","11","2","Μηχανήματα ή εξοπλισμός","Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("253","11","3","Σφιγκτήρες, εργαλεία ή καλούπια","Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("254","11","4","Οπτικός έλεγχος","Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("255","11","5","Γραπτά πρότυπα","Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("256","11","6","Δείκτες τοποθεσίας","Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("257","11","7","Δείτες αντικειμένου","Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("258","11","8","Δείκτες ποσότητας","Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("259","11","9","Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών","Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("260","11","10","Σφιγκτήρες και εργαλεία","Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("261","11","11","Δάπεδα","Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("262","11","12","Μηχανήματα","Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("263","11","13","Καθαρισμός και έλεγχος","Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("264","11","14","Αρμοδιότητες καθαρισμού","Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("265","11","15","Συνήθης καθαριότητα","Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("266","11","16","Υπομνήματα για βελτίωση","Δημιουργούνται συχνά υπομνήματα βελτίωσης;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("267","11","17","Ιδέες για βελτίωση","Οι ιδέες βελτίωσης εφαρμόζονται;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("268","11","18","Διαδικασίες κλειδί","Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("269","11","19","Πλάνο βελτίωσης","Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("270","11","20","Τα πρώτα 3 Ss","Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("271","11","21","Εκπαίδευση","Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("272","11","22","Εργαλεία και εξαρτήματα","Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("273","11","23","Έλεγχοι του αποθέματος","Τηρούνται στοιχεία ελέγχου των αποθεμάτων;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("274","11","24","Διαδικασίες ","Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("275","11","25","Πίνακες δραστηριότητας","Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("276","12","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("277","12","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("278","12","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("279","12","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("280","12","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("281","12","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("282","12","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("283","12","8","品質指標","最大値と最小値の許容量が示されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("284","12","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("285","12","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("286","12","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("287","12","12","機械","削り、チップやオイルを機械から拭き取っていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("288","12","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("289","12","14","清掃責任","洗浄操作を監督する責任者はいますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("290","12","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("291","12","16","改善メモ","改善メモは定期的に生成されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("292","12","17","改善アイディア","改善のアイデアは作用されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("293","12","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("294","12","19","改善プラン","将来の規格は明確な改善計画で検討されている？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("295","12","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("296","12","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("297","12","22","工具や部品","ツールや部品は正しく保存されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("298","12","23","ストックコントロール","ストックコントロールがに付着されていますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("299","12","24","手続き","手順は、最新かつ定期的に見直していますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("300","12","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("301","13","1","Materialen of onderdelen","Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("302","13","2","Machines of gereedschap","Is er sprake van niet gebruikte machines of andere uitrusting?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("303","13","3","Sjablonen, gereedschap of stempels","Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("304","13","4","Visuele controle","Is het duidelijk welke items zijn aangeduid als onnodig?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("305","13","5","Beschreven standaarden","Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("306","13","6","Plaats-aanduiders","Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("307","13","7","Item-aanduiders","Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("308","13","8","Hoeveelheid-aanwijzers"," Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("309","13","9","Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden","Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("310","13","10","Sjablonen en gereedschap","Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("311","13","11","Verdiepingen","Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("312","13","12","Machines","Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("313","13","13","Schoonmaak en controle","Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("314","13","14","Schoonmaak-verantwoordelijkheden","Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("315","13","15","Gebruikelijke zuiverheid","Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("316","13","16","Memo\'s ter verbetering","Worden er regelmatig memo\'s ter verbetering opgemaakt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("317","13","17","Ideeën voor verbeteringen","Wordt er actie ondernomen op ideeën ter verbetering?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("318","13","18","Sleutel-procedures","Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("319","13","19","Plan ter verbetering","Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("320","13","20","De eerste drie S\'en","Worden de eerste drie S\'en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("321","13","21","Training","Is iedereen voldoende getraind in de standaard procedures?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("322","13","22","Gereedschap en onderdelen","Worden gereedschap en onderdelen op de juiste wijze opgeborgen?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("323","13","23","Voorraad-controles","Wordt er vastgehouden aan voorraad-controles?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("324","13","24","Procedures","Zijn de procedures up-to-date en worden ze regelmatig herzien?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("325","13","25","Activiteiten-commissies","Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("326","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("327","1","2","Machines or equipment","Are there any unused machines or other equipment around?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("328","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("329","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("330","1","5","Written standards","Has establishing the 5Ss left behind any useless standard?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("331","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("332","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("333","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("334","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("335","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("336","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("337","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("338","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("339","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("340","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("341","1","16","Improvement memos","Are improvement memos regularly being generated?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("342","1","17","Improvement ideas","Are improvement ideas being acted on?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("343","1","18","Key procedures","Are standard procedures clear, documented and actively used?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("344","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("345","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("346","1","21","Training","Is everyone adequately trained in standard procedure?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("347","1","22","Tools and parts","Are tools and parts being stored correctly?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("348","1","23","Stock controls","Are stock controls being adhered to?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("349","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("350","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("351","2","1","Matriel ou pices","L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("352","2","2","Machine ou quipement","Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("353","2","3","Outils, Matrice ou gabarits","Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("354","2","4","Contrle visuel","Les objets marqus comme non ncessaires sont-ils mis en vidence?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("355","2","5","Normes rdactionnelles","La mise  jour des standards XXX rend elle les anciens standards inutiles?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("356","2","6","Indicateurs de positionnement","Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("357","2","7","Indicateurs d\' article","Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("358","2","8","Indicateurs de quantit","Les quantits maximale et minimale permises sont-elles indiques?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("359","2","9","Dmarcateur des alles et des zones d\'inventaire en cours","Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("360","2","10","Gabarits et outils","Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("361","2","11","Sols","Les sols sont-ils gardss propre et sans ordures, eau et huile?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("362","2","12","Machines","Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("363","2","13","Nettoyage et vrification","L\'inspection et la maintenance sont-elles faites ensemble?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("364","2","14","Responsabilits de nettoyage","Y-a-t\'il une personne responsable pour les oprations de nettoyage?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("365","2","15","Propret  habituelle","Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("366","2","16","Mmos d\'amlioration","Les mmos d\'amlioration sont-ils rgulirement gnrs?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("367","2","17","Ides d\'amlioration","Les ides d\'amlioration sont-elles souvent prises en compte?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("368","2","18","Procedures Cls","Les procedures standards sont-elles claires, documentes et souvent utilises?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("369","2","19","Plan d\'amlioration","Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("370","2","20","Les trois premires  secondes","Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("371","2","21","Formation","Tout le monde est-il correctement entrain pour les procdures standards?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("372","2","22","Outils et pices dtaches","Les outils et les pices sont-ils correctement rangs?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("373","2","23","Contrle de stock","Les contrles de stock sont-ils respects?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("374","2","24","Procdures","Les procdures sont-elles mise  jour et rgulirement inspectes?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("375","2","25","Affichage d\'activit","L\'affichage des activits est-elle mise  jour et rgulirement inspecte","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("376","3","1","Materiali o parti","L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("377","3","2","Macchine o equipaggiamento","Sono presenti macchinari o altro equipaggiamento inutilizzati?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("378","3","3","Strutture di montaggio, attrezzi o matrici di stampa","Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("379","3","4","Controllo visivo","E\' evidente quali oggetti sono stati identificati come non necessari?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("380","3","5","Standard scritti","L\'adozione dello standard 5S\' ha reso obsoleto ogni altro inutile standard?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("381","3","6","Indicatori di posizione","Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("382","3","7","Indicatori Oggetto","Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("383","3","8","Indicatori di Quantit","Sono indicate le quantit massime e minime consentite?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("384","3","9","Demarcazione di passatoi e di aree di inventario per materiale in lavorazione","Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("385","3","10","Strutture di montaggio e attrezzi","Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("386","3","11","Pavimenti","I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("387","3","12","Macchinari","Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("388","3","13","Pulizia e controllo","L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("389","3","14","Responsabilit di pulizia","C\' una persona responsabile alla supervisione delle operazioni di pulizia?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("390","3","15","Pulizia abituale","Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("391","3","16","Promemoria per il miglioramento","I promemoria per il miglioramento vengono realizzati con regolarit?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("392","3","17","Idee per il miglioramento","Le idee per il miglioramento vengono tenute in considerazione?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("393","3","18","Procedure chiave","Le procedure standard sono chiare, documentate e usate attivamente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("394","3","19","Miglioramento piano","Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("395","3","20","Le prime tre S","Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("396","3","21","Addestramento","Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("397","3","22","Strumenti e parti","Attrezzi e parti vengono immagazzinati correttamente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("398","3","23","Controllo Stock","Vengono rispettati i controlli di stock?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("399","3","24","Procedure","Le procedure sono aggiornate e revisionate regolarmente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("400","3","25","Tabelle attivit","Le tabelle delle attivit sono aggiornate e revisionate regolarmente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("401","4","1","Material eller delar","Innehller lagret eller lager som ni arbetar med ondiga material eller delar?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("402","4","2","Maskiner eller utrustning","r det ngra oanvnda maskiner eller andra redskap tillgngliga?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("403","4","3","Jigg, verktyg, eller stmplar","Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("404","4","4","Visuell kontroll","r det uppenbart vilken artikel som har mrkts som ondig?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("405","4","5","Skriftliga standarder","Har inrttandet av 5S\'s lmnat kvar ngra vrdelsa standarder?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("406","4","6","Platsvisare","r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("407","4","7","Sakmtare","Har hyllorna skyltar som visar vart artiklarna skall vara?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("408","4","8","Kvantitetsrknare","Finns det minimalt och maximalt artiklar angivet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("409","4","9","Avgrnsning av gngbanor och omrden under inventering","r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("410","4","10","Jigg och verktyg","r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("411","4","11","Golv","r golv skinande rena och fria frn avfall, vatten och olja?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("412","4","12","Maskiner","r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("413","4","13","Rengring och kontroll","r verktygsinspektion kombinerat med verktygsunderhll?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("414","4","14","Ansvar fr rengring","Finns det en person som ansvarar fr rengringsoperationer?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("415","4","15","Livsmiljrengring","Rengr operatrer golv och maskiner utan att bli tillsagda?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("416","4","16","FrbttringsPMs","Kommer det regelbundet frbttrings PMs?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("417","4","17","Frbttringsider","r frbttringsider diskuterade?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("418","4","18","Huvudrutiner","r standard procedurer frstdda, dokumenterade och aktivt i anvndning?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("419","4","19","Frbttringsplan","Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("420","4","20","De frsta 3 S:ena","r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("421","4","21","Trning","r alla utbildade tillrckligt i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("422","4","22","Verktyg och delar","r verktyg och delar lagrade p rtt stt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("423","4","23","Frrdskontroll","Fljs lagerkontroller?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("424","4","24","Tillvgagngsstt","r procedurer nydaterade och regelbundet granskade?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("425","4","25","Aktivitetsstyrelser","r aktivitetsstyrelser nydaterade och regelbundet granskade?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("426","5","1","Materialer eller dele","Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("427","5","2","Maskiner eller udstyr","Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("428","5","3","Skabeloner, Vrktjer og Gevindskrerer","Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("429","5","4","Visuel Kontrol","Er det indlysende, hvilke ting der er markeret som ubrugelige?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("430","5","5","Skriftlige stanarder","Har etableringen af  5S\'s efterladt en ubrugelig standard?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("431","5","6","Lokation indikator","Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("432","5","7","Ting indikator","Har hylderne symboltavler der indikerer hvilke ting passer hvor?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("433","5","8","Kvantitets indikatorer","Er der et maksimum og minimum tilladt kvantitet indikeret?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("434","5","9","Afgrnsning af gangomrder og vareindleverings omrder","Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("435","5","10","Skabeloner og vrktjer","Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("436","5","11","Gulv","Er gulv holdt skindende rene og fri for skidt, vand og olie?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("437","5","12","Maskiner eller udstyr","Er maskinen holdt ren for spner, flis og olie ofte?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("438","5","13","Rengring og undersgelse","Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("439","5","14","Rengringsansvar","Er der en person med ansvar for tilsyn med rengringsopgaver?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("440","5","15","Vanlig rengring","Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("441","5","16","Forbedring memoer","Bliver et forbedrelsespapir udarbejdet ofte?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("442","5","17","Forbedring ideer","Bliver forbedringsideer prvet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("443","5","18","Ngleprocedurer","Er standard procedurer klare, dokumenteret og brugt hyppigt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("444","5","19","Forbedringsplan","Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("445","5","20","De frste 3 S\'er","Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("446","5","21","Trning","Er alle tilfredsstillende trnet i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("447","5","22","Vrktjer og dele","Bliver vrktjer opbevaret korrekt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("448","5","23","Lagerkontrol","Bliver lagerkontrollerne efterfulgt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("449","5","24","Procedurer","Er procedurerne nutidige og genovervejet ofte?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("450","5","25","Aktivitets tavle","Er aktivitetstavlen nutidige og ofte genovervejet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("451","6","1","Material oder Teile","Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("452","6","2","Maschienen oder Zubehr","Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("453","6","3","Bohrvorrichtungen, Werkzeuge, oder Andere","Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("454","6","4","Visuelle Kontrolle","Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("455","6","5","Schriftliche Normen","Bleibt beim erstellen des 5S\' irgend ein Standart zurck?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("456","6","6","Positionsbestimmung","Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("457","6","7","Materialkennzeichnung","Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("458","6","8","Mengenindikatoren","Sind die maximalen und minimalen zulssigen Mengen angezeigt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("459","6","9","Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"","Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("460","6","10","Bohrvorrichtungen und Werkzeuge","Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("461","6","11","Bden","Sind die Bden sauber, frei von Schmutz, Wasser und l?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("462","6","12","Maschinen","Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("463","6","13","Reiningen und testen","Wrde die Kontrolle mit einer Wartung verbuden?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("464","6","14","Reinigungsanforderung","Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("465","6","15","Gewhnlicher Reiningungszustand","Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("466","6","16","Protokolle","Werden regelmig Verbessungsvorschlge unterbreitet?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("467","6","17","Ideen","Folgen Verbesserungsvorschlge?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("468","6","18","Wichtige Verfahren","Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("469","6","19","Plne","Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("470","6","20","Die ersten 3 Sekunden","Wurden die 3s eingehalten?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("471","6","21","Training","Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("472","6","22","Werkzeuge und Teile","Wurden Werkzeuge und Teile ordnungsgem eingelagert?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("473","6","23","Warenbestandskontrolle","Wurden Lagerkontrollen eingehalten?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("474","6","24","Abwicklung","Sind die Verfahren aktuell und ordnungsgem kontrolliert?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("475","6","25","Aufgaben, Ttigkeiten","Sind die Lauflisten aktuell und ordnungsgem kontrolliert?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("476","7","1","Materiais ou peas","O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("477","7","2","Mquinas ou equipamentos","H algumas mquinas ou outros equipamentos desnecessrios por a?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("478","7","3","Utenslios, ferramentas ou matrizes","H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("479","7","4","Controlo Visual"," obvio qual o objeto que foi definido como desnecessrio?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("480","7","5","Normas escritas","Estabeleceu que o 5S\'s deixou para trs algum padro desnecessrio?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("481","7","6","Indicadores de localizao","As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("482","7","7","Indicadores de Item","As prateleiras tm placas com a indicao de que item contm?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("483","7","8","Indicadores de Quantidade","As quantidades mximas e mnimas permitidas esto indicadas?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("484","7","9","Demarcao de caminhos e reas em processo de inventrio","H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("485","7","10","Utenslios e ferramentas","Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("486","7","11","Chos","O cho  mantido limpo e livre de lixo, gua e leo?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("487","7","12","Mquinas","As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("488","7","13","Limpando e verificando","A inspeo de equipamentos  combinada com a manuteno dos equipamentos?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("489","7","14","Responsabilidades de limpeza","H uma pessoa responsvel por supervisionar as operaes de limpeza?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("490","7","15","Limpeza habitual","Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("491","7","16","Memorandos de melhoras","Os memorandos de melhorias esto a ser feitos com regularidade?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("492","7","17","Ideias de melhorias","As ideias de melhorias esto a ser postas em prtica?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("493","7","18","Procedimentos principais","As normas de procedimentos so claras, documentadas e utilizadas ativamente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("494","7","19","Plano de melhoria","As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("495","7","20","Os primeiros 3 Ss","Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("496","7","21","Treino","Todas as pessoas tm a devida formao dos standards de procedimentos?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("497","7","22","Ferramentas e peas","As ferramentas e as peas esto a ser devidamente armazenadas?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("498","7","23","Controlo de stocks","Os controlos de stock tambm esto a ser cumpridos?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("499","7","24","Procedimentos","Os procedimentos esto atualizados e so revistos regularmente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("500","7","25","Quadros de atividades ","Os quadros de atividades esto atualizados e so revistos regularmente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("501","8","1","Materiales o piezas","Incluye el inventario vigente o en proceso algn material o parte innecesaria?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("502","8","2","Mquinas o equipos","Existe alguna mquina u otro equipo sin utilizar alrededor?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("503","8","3","Plantillas, herramientas o moldes","Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("504","8","4","Control visual","Es evidente cules artculos han sido marcados como innecesarios?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("505","8","5","Normas escritas","Ha dejado el establecimiento de 5S\'s alguna norma inefectiva?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("506","8","6","Indicadores de lugar","Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("507","8","7","Indicadores de artculos","Tienen los estantes algn letrero mostrando cules artculos van dnde?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("508","8","8","Indicadores de cantidad","Estn indicadas las cantidades mximas y mnimas admisibles?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("509","8","9","Demarcacin de pasillos y reas de inventarios en proceso","Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("510","8","10","Plantillas y herramientas","Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("511","8","11","Pisos","Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("512","8","12","Mquinas","Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("513","8","13","Limpieza y verificacin","Se combina la inspeccin de los equipos con el mantenimiento de los mismos?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("514","8","14","Responsabilidades de limpieza","Existe una persona responsable de supervisar las operaciones de limpieza?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("515","8","15","Limpieza habitual","Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("516","8","16","Notas de mejoramiento","Se generan regularmente las notas de mejoramiento?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("517","8","17","Ideas de mejoramiento","Son llevadas a efecto las ideas de mejoramiento?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("518","8","18","Procedimientos clave","Son los procedimientos estndar claros, documentados y utilizados activamente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("519","8","19","Plan de mejoramiento","Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("520","8","20","Las primeras 3 Ss","Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("521","8","21","Capacitacin","Estn todos adecuadamente capacitados en el procedimiento estndar?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("522","8","22","Herramientas y partes","Las herramientas y piezas se almacenan correctamente?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("523","8","23","Controles de exist encias","Se han observado los controles de las existencias?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("524","8","24","Procedimientos","Estn los procedimientos actualizados y con revisin peridica?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("525","8","25","Tablas de actividad","Estn las tablas de actividad actualizadas y con revisin peridica?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("526","9","1","Материалы или части","Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("527","9","2","Машины и оборудование","Есть ли неиспользованные машин или другого оборудования, вокруг?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("528","9","3","Джиги, инструменты и штампы","Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("529","9","4","Визуальный контроль","Является очевидным, какие элементы были отмечены как ненужное?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("530","9","5","Письменные стандарты","С установлении 5SA € ™ с любого оставил бесполезные стандарт?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("531","9","6","Расположение индикаторов","Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("532","9","7","Пункт показатели","У полках вывески, показывающие, какие элементы Куда?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("533","9","8","Количественные показатели","Максимальное и минимальное допустимое количество указано?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("534","9","9","Демаркация проходы и в процессе инвентаризации областях","Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("535","9","10","Приспособления и инструменты","Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("536","9","11","Этажи","Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("537","9","12","машины","Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("538","9","13","Очистка и проверка","Является ли проверка оборудования сочетании с оборудованием обслуживания?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("539","9","14","Очистка обязанностей","Есть ли лицо, ответственное за контроль операций по очистке?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("540","9","15","Привычные чистоты","У операторов обычно подметать полы и протрите оборудование без слов?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("541","9","16","Улучшение заметки","Являются совершенствование заметки регулярно генерируется?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("542","9","17","Улучшение идеи","Являются улучшение идеи, действовали на?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("543","9","18","Основные процедуры","Существуют стандартные процедуры ясно, документированный и активно используется?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("544","9","19","Улучшение плана","Это будущие стандарты рассматриваются с четким планом улучшения для области?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("545","9","20","Первые 3 Ss","Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("546","9","21","обучение","Является ли все должным образом подготовлены в стандартной процедурой?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("547","9","22","Инструменты и запчасти","Существуют приборы и комплектующие хранится правильно?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("548","9","23","со контроля","Ли фондовый управления соблюдались?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("549","9","24","Процедуры","Существуют ли процедуры, до современных и регулярно пересматриваться?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("550","9","25","Деятельность платы","Есть деятельностью платы до современных и регулярно пересматриваться?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("551","10","1","材料或零件","庫存或在製品庫存是否包括和不必要的材料或零部件？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("552","10","2","機器或設備","是否有任何未使用的機器或其他周邊設備嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("553","10","3","夾具，工具或模具","是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("554","10","4","可視化控制","這是明顯的項目已被標記為不必要的？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("555","10","5","書面標準","建立5SA€™的留下任何無用的標準嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("556","10","6","位置指示燈","標記的貨架上和其他存儲區的位置指標和地址嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("557","10","7","項目指標","做的貨架，招牌顯示哪些項目去哪裡？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("558","10","8","數量指標","的最大和最小允許數量是否表示嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("559","10","9","人行道和在製品庫存區的劃界","白線或其他標記，清楚地表明人行道和存儲領域嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("560","10","10","夾具和工具","夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("561","10","11","地板","地板保持光澤的清潔，廢物，水和油？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("562","10","12","機","是機器擦拭乾淨，經常保持無屑，薯片和油嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("563","10","13","清潔和檢查","設備設備的維護與檢查相結合？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("564","10","14","清潔工作","有一個人負責監督清潔操作？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("565","10","15","習慣性的清潔","，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("566","10","16","改善備忘錄","定期改善備忘錄產生的呢？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("567","10","17","改進思路","改進的思路是否採取行動？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("568","10","18","關鍵程序","標準程序是明確的，成文的和積極地使用？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("569","10","19","改進計劃","被認為是未來的標準，該地區有明顯的改善計劃？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("570","10","20","第3條SS","第3 SS（排序，設置位置和光澤）維護呢？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("571","10","21","訓練","大家充分的培訓標準的過程中嗎？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("572","10","22","工具及零件","正確存放的工具和零件嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("573","10","23","庫存控制","存貨控制是否得到遵守？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("574","10","24","程序","程序到日期，並定期檢討嗎？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("575","10","25","活動板","最新活動板，並定期檢討呢？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("576","11","1","Υλικά ή εξαρτήματα","Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("577","11","2","Μηχανήματα ή εξοπλισμός","Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("578","11","3","Σφιγκτήρες, εργαλεία ή καλούπια","Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("579","11","4","Οπτικός έλεγχος","Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("580","11","5","Γραπτά πρότυπα","Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("581","11","6","Δείκτες τοποθεσίας","Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("582","11","7","Δείτες αντικειμένου","Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("583","11","8","Δείκτες ποσότητας","Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("584","11","9","Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών","Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("585","11","10","Σφιγκτήρες και εργαλεία","Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("586","11","11","Δάπεδα","Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("587","11","12","Μηχανήματα","Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("588","11","13","Καθαρισμός και έλεγχος","Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("589","11","14","Αρμοδιότητες καθαρισμού","Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("590","11","15","Συνήθης καθαριότητα","Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("591","11","16","Υπομνήματα για βελτίωση","Δημιουργούνται συχνά υπομνήματα βελτίωσης;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("592","11","17","Ιδέες για βελτίωση","Οι ιδέες βελτίωσης εφαρμόζονται;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("593","11","18","Διαδικασίες κλειδί","Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("594","11","19","Πλάνο βελτίωσης","Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("595","11","20","Τα πρώτα 3 Ss","Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("596","11","21","Εκπαίδευση","Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("597","11","22","Εργαλεία και εξαρτήματα","Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("598","11","23","Έλεγχοι του αποθέματος","Τηρούνται στοιχεία ελέγχου των αποθεμάτων;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("599","11","24","Διαδικασίες ","Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("600","11","25","Πίνακες δραστηριότητας","Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("601","12","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("602","12","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("603","12","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("604","12","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("605","12","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("606","12","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("607","12","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("608","12","8","品質指標","最大値と最小値の許容量が示されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("609","12","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("610","12","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("611","12","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("612","12","12","機械","削り、チップやオイルを機械から拭き取っていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("613","12","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("614","12","14","清掃責任","洗浄操作を監督する責任者はいますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("615","12","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("616","12","16","改善メモ","改善メモは定期的に生成されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("617","12","17","改善アイディア","改善のアイデアは作用されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("618","12","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("619","12","19","改善プラン","将来の規格は明確な改善計画で検討されている？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("620","12","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("621","12","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("622","12","22","工具や部品","ツールや部品は正しく保存されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("623","12","23","ストックコントロール","ストックコントロールがに付着されていますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("624","12","24","手続き","手順は、最新かつ定期的に見直していますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("625","12","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("626","13","1","Materialen of onderdelen","Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("627","13","2","Machines of gereedschap","Is er sprake van niet gebruikte machines of andere uitrusting?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("628","13","3","Sjablonen, gereedschap of stempels","Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("629","13","4","Visuele controle","Is het duidelijk welke items zijn aangeduid als onnodig?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("630","13","5","Beschreven standaarden","Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("631","13","6","Plaats-aanduiders","Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("632","13","7","Item-aanduiders","Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("633","13","8","Hoeveelheid-aanwijzers"," Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("634","13","9","Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden","Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("635","13","10","Sjablonen en gereedschap","Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("636","13","11","Verdiepingen","Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("637","13","12","Machines","Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("638","13","13","Schoonmaak en controle","Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("639","13","14","Schoonmaak-verantwoordelijkheden","Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("640","13","15","Gebruikelijke zuiverheid","Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("641","13","16","Memo\'s ter verbetering","Worden er regelmatig memo\'s ter verbetering opgemaakt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("642","13","17","Ideeën voor verbeteringen","Wordt er actie ondernomen op ideeën ter verbetering?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("643","13","18","Sleutel-procedures","Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("644","13","19","Plan ter verbetering","Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("645","13","20","De eerste drie S\'en","Worden de eerste drie S\'en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("646","13","21","Training","Is iedereen voldoende getraind in de standaard procedures?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("647","13","22","Gereedschap en onderdelen","Worden gereedschap en onderdelen op de juiste wijze opgeborgen?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("648","13","23","Voorraad-controles","Wordt er vastgehouden aan voorraad-controles?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("649","13","24","Procedures","Zijn de procedures up-to-date en worden ze regelmatig herzien?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("650","13","25","Activiteiten-commissies","Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("651","14","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("652","14","2","Machines or equipment","Are there any unused machines or other equipment around?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("653","14","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("654","14","4","Visual control","Is it obvious which items have been marked as unnecessary?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("655","14","5","Written standards","Has establishing the 5Ss left behind any useless standard?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("656","14","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("657","14","7","Item Indicators","Do the shelves have signboards showing which items go where?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("658","14","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("659","14","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("660","14","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("661","14","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("662","14","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("663","14","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("664","14","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("665","14","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("666","14","16","Improvement memos","Are improvement memos regularly being generated?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("667","14","17","Improvement ideas","Are improvement ideas being acted on?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("668","14","18","Key procedures","Are standard procedures clear, documented and actively used?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("669","14","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("670","14","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("671","14","21","Training","Is everyone adequately trained in standard procedure?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("672","14","22","Tools and parts","Are tools and parts being stored correctly?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("673","14","23","Stock controls","Are stock controls being adhered to?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("674","14","24","Procedures","Are procedures up-to-date and regularly reviewed?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("675","14","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3065","2014-01-01 03:14:05","3065");
INSERT INTO tbl_questionanswer VALUES("676","14","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("677","14","2","Machines or equipment","Are there any unused machines or other equipment around?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("678","14","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("679","14","4","Visual control","Is it obvious which items have been marked as unnecessary?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("680","14","5","Written standards","Has establishing the 5Ss left behind any useless standard?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("681","14","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("682","14","7","Item Indicators","Do the shelves have signboards showing which items go where?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("683","14","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("684","14","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("685","14","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("686","14","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("687","14","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("688","14","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("689","14","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("690","14","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("691","14","16","Improvement memos","Are improvement memos regularly being generated?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("692","14","17","Improvement ideas","Are improvement ideas being acted on?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("693","14","18","Key procedures","Are standard procedures clear, documented and actively used?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("694","14","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("695","14","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("696","14","21","Training","Is everyone adequately trained in standard procedure?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("697","14","22","Tools and parts","Are tools and parts being stored correctly?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("698","14","23","Stock controls","Are stock controls being adhered to?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("699","14","24","Procedures","Are procedures up-to-date and regularly reviewed?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("700","14","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3065","2014-01-01 03:14:06","3065");
INSERT INTO tbl_questionanswer VALUES("714","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("715","1","2","Machines or equipment","Are there any unused machines or other equipment around?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("716","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("717","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("718","1","5","Written standards","Has establishing the 5Ss left behind any useless standard?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("719","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("720","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("721","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("722","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("723","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("724","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("725","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("726","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("727","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("728","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("729","1","16","Improvement memos","Are improvement memos regularly being generated?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("730","1","17","Improvement ideas","Are improvement ideas being acted on?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("731","1","18","Key procedures","Are standard procedures clear, documented and actively used?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("732","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("733","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("734","1","21","Training","Is everyone adequately trained in standard procedure?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("735","1","22","Tools and parts","Are tools and parts being stored correctly?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("736","1","23","Stock controls","Are stock controls being adhered to?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("737","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("738","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("739","2","1","Matriel ou pices","L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("740","2","2","Machine ou quipement","Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("741","2","3","Outils, Matrice ou gabarits","Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("742","2","4","Contrle visuel","Les objets marqus comme non ncessaires sont-ils mis en vidence?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("743","2","5","Normes rdactionnelles","La mise  jour des standards XXX rend elle les anciens standards inutiles?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("744","2","6","Indicateurs de positionnement","Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("745","2","7","Indicateurs d\' article","Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("746","2","8","Indicateurs de quantit","Les quantits maximale et minimale permises sont-elles indiques?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("747","2","9","Dmarcateur des alles et des zones d\'inventaire en cours","Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("748","2","10","Gabarits et outils","Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("749","2","11","Sols","Les sols sont-ils gardss propre et sans ordures, eau et huile?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("750","2","12","Machines","Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("751","2","13","Nettoyage et vrification","L\'inspection et la maintenance sont-elles faites ensemble?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("752","2","14","Responsabilits de nettoyage","Y-a-t\'il une personne responsable pour les oprations de nettoyage?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("753","2","15","Propret  habituelle","Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("754","2","16","Mmos d\'amlioration","Les mmos d\'amlioration sont-ils rgulirement gnrs?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("755","2","17","Ides d\'amlioration","Les ides d\'amlioration sont-elles souvent prises en compte?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("756","2","18","Procedures Cls","Les procedures standards sont-elles claires, documentes et souvent utilises?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("757","2","19","Plan d\'amlioration","Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("758","2","20","Les trois premires  secondes","Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("759","2","21","Formation","Tout le monde est-il correctement entrain pour les procdures standards?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("760","2","22","Outils et pices dtaches","Les outils et les pices sont-ils correctement rangs?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("761","2","23","Contrle de stock","Les contrles de stock sont-ils respects?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("762","2","24","Procdures","Les procdures sont-elles mise  jour et rgulirement inspectes?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("763","2","25","Affichage d\'activit","L\'affichage des activits est-elle mise  jour et rgulirement inspecte","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("764","3","1","Materiali o parti","L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("765","3","2","Macchine o equipaggiamento","Sono presenti macchinari o altro equipaggiamento inutilizzati?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("766","3","3","Strutture di montaggio, attrezzi o matrici di stampa","Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("767","3","4","Controllo visivo","E\' evidente quali oggetti sono stati identificati come non necessari?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("768","3","5","Standard scritti","L\'adozione dello standard 5S\' ha reso obsoleto ogni altro inutile standard?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("769","3","6","Indicatori di posizione","Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("770","3","7","Indicatori Oggetto","Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("771","3","8","Indicatori di Quantit","Sono indicate le quantit massime e minime consentite?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("772","3","9","Demarcazione di passatoi e di aree di inventario per materiale in lavorazione","Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("773","3","10","Strutture di montaggio e attrezzi","Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("774","3","11","Pavimenti","I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("775","3","12","Macchinari","Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("776","3","13","Pulizia e controllo","L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("777","3","14","Responsabilit di pulizia","C\' una persona responsabile alla supervisione delle operazioni di pulizia?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("778","3","15","Pulizia abituale","Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("779","3","16","Promemoria per il miglioramento","I promemoria per il miglioramento vengono realizzati con regolarit?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("780","3","17","Idee per il miglioramento","Le idee per il miglioramento vengono tenute in considerazione?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("781","3","18","Procedure chiave","Le procedure standard sono chiare, documentate e usate attivamente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("782","3","19","Miglioramento piano","Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("783","3","20","Le prime tre S","Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("784","3","21","Addestramento","Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("785","3","22","Strumenti e parti","Attrezzi e parti vengono immagazzinati correttamente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("786","3","23","Controllo Stock","Vengono rispettati i controlli di stock?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("787","3","24","Procedure","Le procedure sono aggiornate e revisionate regolarmente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("788","3","25","Tabelle attivit","Le tabelle delle attivit sono aggiornate e revisionate regolarmente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("789","4","1","Material eller delar","Innehller lagret eller lager som ni arbetar med ondiga material eller delar?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("790","4","2","Maskiner eller utrustning","r det ngra oanvnda maskiner eller andra redskap tillgngliga?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("791","4","3","Jigg, verktyg, eller stmplar","Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("792","4","4","Visuell kontroll","r det uppenbart vilken artikel som har mrkts som ondig?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("793","4","5","Skriftliga standarder","Har inrttandet av 5S\'s lmnat kvar ngra vrdelsa standarder?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("794","4","6","Platsvisare","r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("795","4","7","Sakmtare","Har hyllorna skyltar som visar vart artiklarna skall vara?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("796","4","8","Kvantitetsrknare","Finns det minimalt och maximalt artiklar angivet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("797","4","9","Avgrnsning av gngbanor och omrden under inventering","r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("798","4","10","Jigg och verktyg","r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("799","4","11","Golv","r golv skinande rena och fria frn avfall, vatten och olja?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("800","4","12","Maskiner","r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("801","4","13","Rengring och kontroll","r verktygsinspektion kombinerat med verktygsunderhll?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("802","4","14","Ansvar fr rengring","Finns det en person som ansvarar fr rengringsoperationer?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("803","4","15","Livsmiljrengring","Rengr operatrer golv och maskiner utan att bli tillsagda?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("804","4","16","FrbttringsPMs","Kommer det regelbundet frbttrings PMs?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("805","4","17","Frbttringsider","r frbttringsider diskuterade?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("806","4","18","Huvudrutiner","r standard procedurer frstdda, dokumenterade och aktivt i anvndning?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("807","4","19","Frbttringsplan","Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("808","4","20","De frsta 3 S:ena","r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("809","4","21","Trning","r alla utbildade tillrckligt i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("810","4","22","Verktyg och delar","r verktyg och delar lagrade p rtt stt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("811","4","23","Frrdskontroll","Fljs lagerkontroller?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("812","4","24","Tillvgagngsstt","r procedurer nydaterade och regelbundet granskade?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("813","4","25","Aktivitetsstyrelser","r aktivitetsstyrelser nydaterade och regelbundet granskade?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("814","5","1","Materialer eller dele","Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("815","5","2","Maskiner eller udstyr","Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("816","5","3","Skabeloner, Vrktjer og Gevindskrerer","Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("817","5","4","Visuel Kontrol","Er det indlysende, hvilke ting der er markeret som ubrugelige?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("818","5","5","Skriftlige stanarder","Har etableringen af  5S\'s efterladt en ubrugelig standard?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("819","5","6","Lokation indikator","Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("820","5","7","Ting indikator","Har hylderne symboltavler der indikerer hvilke ting passer hvor?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("821","5","8","Kvantitets indikatorer","Er der et maksimum og minimum tilladt kvantitet indikeret?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("822","5","9","Afgrnsning af gangomrder og vareindleverings omrder","Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("823","5","10","Skabeloner og vrktjer","Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("824","5","11","Gulv","Er gulv holdt skindende rene og fri for skidt, vand og olie?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("825","5","12","Maskiner eller udstyr","Er maskinen holdt ren for spner, flis og olie ofte?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("826","5","13","Rengring og undersgelse","Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("827","5","14","Rengringsansvar","Er der en person med ansvar for tilsyn med rengringsopgaver?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("828","5","15","Vanlig rengring","Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("829","5","16","Forbedring memoer","Bliver et forbedrelsespapir udarbejdet ofte?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("830","5","17","Forbedring ideer","Bliver forbedringsideer prvet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("831","5","18","Ngleprocedurer","Er standard procedurer klare, dokumenteret og brugt hyppigt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("832","5","19","Forbedringsplan","Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("833","5","20","De frste 3 S\'er","Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("834","5","21","Trning","Er alle tilfredsstillende trnet i standard procedurer?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("835","5","22","Vrktjer og dele","Bliver vrktjer opbevaret korrekt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("836","5","23","Lagerkontrol","Bliver lagerkontrollerne efterfulgt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("837","5","24","Procedurer","Er procedurerne nutidige og genovervejet ofte?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("838","5","25","Aktivitets tavle","Er aktivitetstavlen nutidige og ofte genovervejet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("839","6","1","Material oder Teile","Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("840","6","2","Maschienen oder Zubehr","Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("841","6","3","Bohrvorrichtungen, Werkzeuge, oder Andere","Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("842","6","4","Visuelle Kontrolle","Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("843","6","5","Schriftliche Normen","Bleibt beim erstellen des 5S\' irgend ein Standart zurck?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("844","6","6","Positionsbestimmung","Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("845","6","7","Materialkennzeichnung","Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("846","6","8","Mengenindikatoren","Sind die maximalen und minimalen zulssigen Mengen angezeigt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("847","6","9","Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"","Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("848","6","10","Bohrvorrichtungen und Werkzeuge","Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("849","6","11","Bden","Sind die Bden sauber, frei von Schmutz, Wasser und l?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("850","6","12","Maschinen","Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("851","6","13","Reiningen und testen","Wrde die Kontrolle mit einer Wartung verbuden?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("852","6","14","Reinigungsanforderung","Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("853","6","15","Gewhnlicher Reiningungszustand","Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("854","6","16","Protokolle","Werden regelmig Verbessungsvorschlge unterbreitet?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("855","6","17","Ideen","Folgen Verbesserungsvorschlge?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("856","6","18","Wichtige Verfahren","Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("857","6","19","Plne","Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("858","6","20","Die ersten 3 Sekunden","Wurden die 3s eingehalten?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("859","6","21","Training","Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("860","6","22","Werkzeuge und Teile","Wurden Werkzeuge und Teile ordnungsgem eingelagert?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("861","6","23","Warenbestandskontrolle","Wurden Lagerkontrollen eingehalten?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("862","6","24","Abwicklung","Sind die Verfahren aktuell und ordnungsgem kontrolliert?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("863","6","25","Aufgaben, Ttigkeiten","Sind die Lauflisten aktuell und ordnungsgem kontrolliert?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("864","7","1","Materiais ou peas","O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("865","7","2","Mquinas ou equipamentos","H algumas mquinas ou outros equipamentos desnecessrios por a?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("866","7","3","Utenslios, ferramentas ou matrizes","H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("867","7","4","Controlo Visual"," obvio qual o objeto que foi definido como desnecessrio?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("868","7","5","Normas escritas","Estabeleceu que o 5S\'s deixou para trs algum padro desnecessrio?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("869","7","6","Indicadores de localizao","As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("870","7","7","Indicadores de Item","As prateleiras tm placas com a indicao de que item contm?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("871","7","8","Indicadores de Quantidade","As quantidades mximas e mnimas permitidas esto indicadas?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("872","7","9","Demarcao de caminhos e reas em processo de inventrio","H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("873","7","10","Utenslios e ferramentas","Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("874","7","11","Chos","O cho  mantido limpo e livre de lixo, gua e leo?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("875","7","12","Mquinas","As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("876","7","13","Limpando e verificando","A inspeo de equipamentos  combinada com a manuteno dos equipamentos?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("877","7","14","Responsabilidades de limpeza","H uma pessoa responsvel por supervisionar as operaes de limpeza?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("878","7","15","Limpeza habitual","Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("879","7","16","Memorandos de melhoras","Os memorandos de melhorias esto a ser feitos com regularidade?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("880","7","17","Ideias de melhorias","As ideias de melhorias esto a ser postas em prtica?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("881","7","18","Procedimentos principais","As normas de procedimentos so claras, documentadas e utilizadas ativamente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("882","7","19","Plano de melhoria","As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("883","7","20","Os primeiros 3 Ss","Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("884","7","21","Treino","Todas as pessoas tm a devida formao dos standards de procedimentos?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("885","7","22","Ferramentas e peas","As ferramentas e as peas esto a ser devidamente armazenadas?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("886","7","23","Controlo de stocks","Os controlos de stock tambm esto a ser cumpridos?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("887","7","24","Procedimentos","Os procedimentos esto atualizados e so revistos regularmente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("888","7","25","Quadros de atividades ","Os quadros de atividades esto atualizados e so revistos regularmente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("889","8","1","Materiales o piezas","Incluye el inventario vigente o en proceso algn material o parte innecesaria?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("890","8","2","Mquinas o equipos","Existe alguna mquina u otro equipo sin utilizar alrededor?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("891","8","3","Plantillas, herramientas o moldes","Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("892","8","4","Control visual","Es evidente cules artculos han sido marcados como innecesarios?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("893","8","5","Normas escritas","Ha dejado el establecimiento de 5S\'s alguna norma inefectiva?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("894","8","6","Indicadores de lugar","Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("895","8","7","Indicadores de artculos","Tienen los estantes algn letrero mostrando cules artculos van dnde?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("896","8","8","Indicadores de cantidad","Estn indicadas las cantidades mximas y mnimas admisibles?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("897","8","9","Demarcacin de pasillos y reas de inventarios en proceso","Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("898","8","10","Plantillas y herramientas","Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("899","8","11","Pisos","Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("900","8","12","Mquinas","Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("901","8","13","Limpieza y verificacin","Se combina la inspeccin de los equipos con el mantenimiento de los mismos?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("902","8","14","Responsabilidades de limpieza","Existe una persona responsable de supervisar las operaciones de limpieza?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("903","8","15","Limpieza habitual","Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("904","8","16","Notas de mejoramiento","Se generan regularmente las notas de mejoramiento?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("905","8","17","Ideas de mejoramiento","Son llevadas a efecto las ideas de mejoramiento?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("906","8","18","Procedimientos clave","Son los procedimientos estndar claros, documentados y utilizados activamente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("907","8","19","Plan de mejoramiento","Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("908","8","20","Las primeras 3 Ss","Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("909","8","21","Capacitacin","Estn todos adecuadamente capacitados en el procedimiento estndar?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("910","8","22","Herramientas y partes","Las herramientas y piezas se almacenan correctamente?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("911","8","23","Controles de exist encias","Se han observado los controles de las existencias?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("912","8","24","Procedimientos","Estn los procedimientos actualizados y con revisin peridica?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("913","8","25","Tablas de actividad","Estn las tablas de actividad actualizadas y con revisin peridica?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("914","9","1","Материалы или части","Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("915","9","2","Машины и оборудование","Есть ли неиспользованные машин или другого оборудования, вокруг?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("916","9","3","Джиги, инструменты и штампы","Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("917","9","4","Визуальный контроль","Является очевидным, какие элементы были отмечены как ненужное?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("918","9","5","Письменные стандарты","С установлении 5SA € ™ с любого оставил бесполезные стандарт?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("919","9","6","Расположение индикаторов","Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("920","9","7","Пункт показатели","У полках вывески, показывающие, какие элементы Куда?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("921","9","8","Количественные показатели","Максимальное и минимальное допустимое количество указано?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("922","9","9","Демаркация проходы и в процессе инвентаризации областях","Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("923","9","10","Приспособления и инструменты","Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("924","9","11","Этажи","Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("925","9","12","машины","Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("926","9","13","Очистка и проверка","Является ли проверка оборудования сочетании с оборудованием обслуживания?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("927","9","14","Очистка обязанностей","Есть ли лицо, ответственное за контроль операций по очистке?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("928","9","15","Привычные чистоты","У операторов обычно подметать полы и протрите оборудование без слов?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("929","9","16","Улучшение заметки","Являются совершенствование заметки регулярно генерируется?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("930","9","17","Улучшение идеи","Являются улучшение идеи, действовали на?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("931","9","18","Основные процедуры","Существуют стандартные процедуры ясно, документированный и активно используется?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("932","9","19","Улучшение плана","Это будущие стандарты рассматриваются с четким планом улучшения для области?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("933","9","20","Первые 3 Ss","Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("934","9","21","обучение","Является ли все должным образом подготовлены в стандартной процедурой?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("935","9","22","Инструменты и запчасти","Существуют приборы и комплектующие хранится правильно?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("936","9","23","со контроля","Ли фондовый управления соблюдались?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("937","9","24","Процедуры","Существуют ли процедуры, до современных и регулярно пересматриваться?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("938","9","25","Деятельность платы","Есть деятельностью платы до современных и регулярно пересматриваться?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("939","10","1","材料或零件","庫存或在製品庫存是否包括和不必要的材料或零部件？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("940","10","2","機器或設備","是否有任何未使用的機器或其他周邊設備嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("941","10","3","夾具，工具或模具","是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("942","10","4","可視化控制","這是明顯的項目已被標記為不必要的？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("943","10","5","書面標準","建立5SA€™的留下任何無用的標準嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("944","10","6","位置指示燈","標記的貨架上和其他存儲區的位置指標和地址嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("945","10","7","項目指標","做的貨架，招牌顯示哪些項目去哪裡？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("946","10","8","數量指標","的最大和最小允許數量是否表示嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("947","10","9","人行道和在製品庫存區的劃界","白線或其他標記，清楚地表明人行道和存儲領域嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("948","10","10","夾具和工具","夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("949","10","11","地板","地板保持光澤的清潔，廢物，水和油？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("950","10","12","機","是機器擦拭乾淨，經常保持無屑，薯片和油嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("951","10","13","清潔和檢查","設備設備的維護與檢查相結合？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("952","10","14","清潔工作","有一個人負責監督清潔操作？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("953","10","15","習慣性的清潔","，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("954","10","16","改善備忘錄","定期改善備忘錄產生的呢？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("955","10","17","改進思路","改進的思路是否採取行動？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("956","10","18","關鍵程序","標準程序是明確的，成文的和積極地使用？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("957","10","19","改進計劃","被認為是未來的標準，該地區有明顯的改善計劃？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("958","10","20","第3條SS","第3 SS（排序，設置位置和光澤）維護呢？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("959","10","21","訓練","大家充分的培訓標準的過程中嗎？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("960","10","22","工具及零件","正確存放的工具和零件嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("961","10","23","庫存控制","存貨控制是否得到遵守？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("962","10","24","程序","程序到日期，並定期檢討嗎？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("963","10","25","活動板","最新活動板，並定期檢討呢？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("964","11","1","Υλικά ή εξαρτήματα","Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("965","11","2","Μηχανήματα ή εξοπλισμός","Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("966","11","3","Σφιγκτήρες, εργαλεία ή καλούπια","Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("967","11","4","Οπτικός έλεγχος","Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("968","11","5","Γραπτά πρότυπα","Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("969","11","6","Δείκτες τοποθεσίας","Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("970","11","7","Δείτες αντικειμένου","Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("971","11","8","Δείκτες ποσότητας","Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("972","11","9","Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών","Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("973","11","10","Σφιγκτήρες και εργαλεία","Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("974","11","11","Δάπεδα","Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("975","11","12","Μηχανήματα","Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("976","11","13","Καθαρισμός και έλεγχος","Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("977","11","14","Αρμοδιότητες καθαρισμού","Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("978","11","15","Συνήθης καθαριότητα","Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("979","11","16","Υπομνήματα για βελτίωση","Δημιουργούνται συχνά υπομνήματα βελτίωσης;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("980","11","17","Ιδέες για βελτίωση","Οι ιδέες βελτίωσης εφαρμόζονται;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("981","11","18","Διαδικασίες κλειδί","Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("982","11","19","Πλάνο βελτίωσης","Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("983","11","20","Τα πρώτα 3 Ss","Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("984","11","21","Εκπαίδευση","Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("985","11","22","Εργαλεία και εξαρτήματα","Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("986","11","23","Έλεγχοι του αποθέματος","Τηρούνται στοιχεία ελέγχου των αποθεμάτων;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("987","11","24","Διαδικασίες ","Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("988","11","25","Πίνακες δραστηριότητας","Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("989","12","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("990","12","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("991","12","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("992","12","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("993","12","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("994","12","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("995","12","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("996","12","8","品質指標","最大値と最小値の許容量が示されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("997","12","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("998","12","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("999","12","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1000","12","12","機械","削り、チップやオイルを機械から拭き取っていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1001","12","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1002","12","14","清掃責任","洗浄操作を監督する責任者はいますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1003","12","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1004","12","16","改善メモ","改善メモは定期的に生成されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1005","12","17","改善アイディア","改善のアイデアは作用されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1006","12","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1007","12","19","改善プラン","将来の規格は明確な改善計画で検討されている？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1008","12","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1009","12","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("1010","12","22","工具や部品","ツールや部品は正しく保存されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1011","12","23","ストックコントロール","ストックコントロールがに付着されていますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1012","12","24","手続き","手順は、最新かつ定期的に見直していますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1013","12","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1014","13","1","Materialen of onderdelen","Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1015","13","2","Machines of gereedschap","Is er sprake van niet gebruikte machines of andere uitrusting?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1016","13","3","Sjablonen, gereedschap of stempels","Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1017","13","4","Visuele controle","Is het duidelijk welke items zijn aangeduid als onnodig?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1018","13","5","Beschreven standaarden","Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1019","13","6","Plaats-aanduiders","Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1020","13","7","Item-aanduiders","Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1021","13","8","Hoeveelheid-aanwijzers"," Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1022","13","9","Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden","Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1023","13","10","Sjablonen en gereedschap","Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1024","13","11","Verdiepingen","Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1025","13","12","Machines","Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1026","13","13","Schoonmaak en controle","Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1027","13","14","Schoonmaak-verantwoordelijkheden","Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1028","13","15","Gebruikelijke zuiverheid","Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1029","13","16","Memo\'s ter verbetering","Worden er regelmatig memo\'s ter verbetering opgemaakt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1030","13","17","Ideeën voor verbeteringen","Wordt er actie ondernomen op ideeën ter verbetering?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1031","13","18","Sleutel-procedures","Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1032","13","19","Plan ter verbetering","Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1033","13","20","De eerste drie S\'en","Worden de eerste drie S\'en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1034","13","21","Training","Is iedereen voldoende getraind in de standaard procedures?","3065","","3065");
INSERT INTO tbl_questionanswer VALUES("1035","13","22","Gereedschap en onderdelen","Worden gereedschap en onderdelen op de juiste wijze opgeborgen?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1036","13","23","Voorraad-controles","Wordt er vastgehouden aan voorraad-controles?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1037","13","24","Procedures","Zijn de procedures up-to-date en worden ze regelmatig herzien?","3065","2014-01-02 00:37:28","3065");
INSERT INTO tbl_questionanswer VALUES("1038","13","25","Activiteiten-commissies","Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?","3065","2014-01-02 00:37:28","3065");





CREATE TABLE `tbl_questionnair` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '1970-01-05 00:00:00',
  `status` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionnair VALUES("1","5s audit - english","3065","9","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("2","5s audit - french","3065","4","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("3","5s audit - italy","3065","7","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("4","5s audit - swedish","3065","14","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("5","5s audit - danish","3065","2","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("6","5s audit - german","3065","5","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("7","5s audit - portugal","3065","11","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("8","5s audit - spanish","3065","13","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("9","5s audit - russsian","3065","12","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("10","5s audit - chinese","3065","1","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("11","5s audit - greek","3065","6","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("12","5s audit - japanese","3065","8","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("13","5s audit - dutch","3065","3","3065","1970-01-05 00:00:00","1","2014-01-01 03:14:05");
INSERT INTO tbl_questionnair VALUES("14","Shop 5s Audit","3065","9","3065","1970-01-05 00:00:00","0","2014-01-01 03:46:54");





CREATE TABLE `tbl_settings` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO tbl_settings VALUES("1","default_language","9","3065","3065");
INSERT INTO tbl_settings VALUES("2","default_language_question","9","3065","3065");
INSERT INTO tbl_settings VALUES("3","default_language","9","3065","3065");
INSERT INTO tbl_settings VALUES("4","default_language_question","9","3065","3065");
INSERT INTO tbl_settings VALUES("5","default_language","9","3065","3065");
INSERT INTO tbl_settings VALUES("6","default_language_question","9","3065","3065");



