

CREATE TABLE `adddepartment` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(255) NOT NULL,
  `depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;






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
) ENGINE=InnoDB AUTO_INCREMENT=326 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionanswer VALUES("1","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("2","1","2","Machines or equipment","Are there any unused machines or other equipment around?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("3","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("4","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("5","1","5","Written standards","Has establishing the 5Ss left behind any useless standard?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("6","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("7","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("8","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("9","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("10","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("11","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("12","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("13","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("14","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("15","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("16","1","16","Improvement memos","Are improvement memos regularly being generated?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("17","1","17","Improvement ideas","Are improvement ideas being acted on?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("18","1","18","Key procedures","Are standard procedures clear, documented and actively used?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("19","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("20","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("21","1","21","Training","Is everyone adequately trained in standard procedure?","352","","352");
INSERT INTO tbl_questionanswer VALUES("22","1","22","Tools and parts","Are tools and parts being stored correctly?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("23","1","23","Stock controls","Are stock controls being adhered to?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("24","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("25","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("26","2","1","Matriel ou pices","L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("27","2","2","Machine ou quipement","Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("28","2","3","Outils, Matrice ou gabarits","Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("29","2","4","Contrle visuel","Les objets marqus comme non ncessaires sont-ils mis en vidence?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("30","2","5","Normes rdactionnelles","La mise  jour des standards XXX rend elle les anciens standards inutiles?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("31","2","6","Indicateurs de positionnement","Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("32","2","7","Indicateurs d\' article","Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("33","2","8","Indicateurs de quantit","Les quantits maximale et minimale permises sont-elles indiques?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("34","2","9","Dmarcateur des alles et des zones d\'inventaire en cours","Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("35","2","10","Gabarits et outils","Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("36","2","11","Sols","Les sols sont-ils gardss propre et sans ordures, eau et huile?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("37","2","12","Machines","Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("38","2","13","Nettoyage et vrification","L\'inspection et la maintenance sont-elles faites ensemble?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("39","2","14","Responsabilits de nettoyage","Y-a-t\'il une personne responsable pour les oprations de nettoyage?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("40","2","15","Propret  habituelle","Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("41","2","16","Mmos d\'amlioration","Les mmos d\'amlioration sont-ils rgulirement gnrs?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("42","2","17","Ides d\'amlioration","Les ides d\'amlioration sont-elles souvent prises en compte?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("43","2","18","Procedures Cls","Les procedures standards sont-elles claires, documentes et souvent utilises?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("44","2","19","Plan d\'amlioration","Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("45","2","20","Les trois premires  secondes","Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("46","2","21","Formation","Tout le monde est-il correctement entrain pour les procdures standards?","352","","352");
INSERT INTO tbl_questionanswer VALUES("47","2","22","Outils et pices dtaches","Les outils et les pices sont-ils correctement rangs?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("48","2","23","Contrle de stock","Les contrles de stock sont-ils respects?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("49","2","24","Procdures","Les procdures sont-elles mise  jour et rgulirement inspectes?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("50","2","25","Affichage d\'activit","L\'affichage des activits est-elle mise  jour et rgulirement inspecte","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("51","3","1","Materiali o parti","L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("52","3","2","Macchine o equipaggiamento","Sono presenti macchinari o altro equipaggiamento inutilizzati?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("53","3","3","Strutture di montaggio, attrezzi o matrici di stampa","Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("54","3","4","Controllo visivo","E\' evidente quali oggetti sono stati identificati come non necessari?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("55","3","5","Standard scritti","L\'adozione dello standard 5S’ ha reso obsoleto ogni altro inutile standard?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("56","3","6","Indicatori di posizione","Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("57","3","7","Indicatori Oggetto","Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("58","3","8","Indicatori di Quantit","Sono indicate le quantit massime e minime consentite?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("59","3","9","Demarcazione di passatoi e di aree di inventario per materiale in lavorazione","Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("60","3","10","Strutture di montaggio e attrezzi","Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("61","3","11","Pavimenti","I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("62","3","12","Macchinari","Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("63","3","13","Pulizia e controllo","L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("64","3","14","Responsabilit di pulizia","C\' una persona responsabile alla supervisione delle operazioni di pulizia?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("65","3","15","Pulizia abituale","Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("66","3","16","Promemoria per il miglioramento","I promemoria per il miglioramento vengono realizzati con regolarit?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("67","3","17","Idee per il miglioramento","Le idee per il miglioramento vengono tenute in considerazione?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("68","3","18","Procedure chiave","Le procedure standard sono chiare, documentate e usate attivamente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("69","3","19","Miglioramento piano","Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("70","3","20","Le prime tre S","Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("71","3","21","Addestramento","Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?","352","","352");
INSERT INTO tbl_questionanswer VALUES("72","3","22","Strumenti e parti","Attrezzi e parti vengono immagazzinati correttamente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("73","3","23","Controllo Stock","Vengono rispettati i controlli di stock?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("74","3","24","Procedure","Le procedure sono aggiornate e revisionate regolarmente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("75","3","25","Tabelle attivit","Le tabelle delle attivit sono aggiornate e revisionate regolarmente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("76","4","1","Material eller delar","Innehller lagret eller lager som ni arbetar med ondiga material eller delar?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("77","4","2","Maskiner eller utrustning","r det ngra oanvnda maskiner eller andra redskap tillgngliga?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("78","4","3","Jigg, verktyg, eller stmplar","Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("79","4","4","Visuell kontroll","r det uppenbart vilken artikel som har mrkts som ondig?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("80","4","5","Skriftliga standarder","Har inrttandet av 5S’s lmnat kvar ngra vrdelsa standarder?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("81","4","6","Platsvisare","r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("82","4","7","Sakmtare","Har hyllorna skyltar som visar vart artiklarna skall vara?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("83","4","8","Kvantitetsrknare","Finns det minimalt och maximalt artiklar angivet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("84","4","9","Avgrnsning av gngbanor och omrden under inventering","r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("85","4","10","Jigg och verktyg","r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("86","4","11","Golv","r golv skinande rena och fria frn avfall, vatten och olja?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("87","4","12","Maskiner","r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("88","4","13","Rengring och kontroll","r verktygsinspektion kombinerat med verktygsunderhll?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("89","4","14","Ansvar fr rengring","Finns det en person som ansvarar fr rengringsoperationer?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("90","4","15","Livsmiljrengring","Rengr operatrer golv och maskiner utan att bli tillsagda?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("91","4","16","FrbttringsPMs","Kommer det regelbundet frbttrings PMs?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("92","4","17","Frbttringsider","r frbttringsider diskuterade?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("93","4","18","Huvudrutiner","r standard procedurer frstdda, dokumenterade och aktivt i anvndning?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("94","4","19","Frbttringsplan","Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("95","4","20","De frsta 3 S:ena","r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("96","4","21","Trning","r alla utbildade tillrckligt i standard procedurer?","352","","352");
INSERT INTO tbl_questionanswer VALUES("97","4","22","Verktyg och delar","r verktyg och delar lagrade p rtt stt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("98","4","23","Frrdskontroll","Fljs lagerkontroller?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("99","4","24","Tillvgagngsstt","r procedurer nydaterade och regelbundet granskade?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("100","4","25","Aktivitetsstyrelser","r aktivitetsstyrelser nydaterade och regelbundet granskade?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("101","5","1","Materialer eller dele","Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("102","5","2","Maskiner eller udstyr","Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("103","5","3","Skabeloner, Vrktjer og Gevindskrerer","Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("104","5","4","Visuel Kontrol","Er det indlysende, hvilke ting der er markeret som ubrugelige?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("105","5","5","Skriftlige stanarder","Har etableringen af  5S’s efterladt en ubrugelig standard?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("106","5","6","Lokation indikator","Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("107","5","7","Ting indikator","Har hylderne symboltavler der indikerer hvilke ting passer hvor?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("108","5","8","Kvantitets indikatorer","Er der et maksimum og minimum tilladt kvantitet indikeret?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("109","5","9","Afgrnsning af gangomrder og vareindleverings omrder","Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("110","5","10","Skabeloner og vrktjer","Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("111","5","11","Gulv","Er gulv holdt skindende rene og fri for skidt, vand og olie?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("112","5","12","Maskiner eller udstyr","Er maskinen holdt ren for spner, flis og olie ofte?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("113","5","13","Rengring og undersgelse","Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("114","5","14","Rengringsansvar","Er der en person med ansvar for tilsyn med rengringsopgaver?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("115","5","15","Vanlig rengring","Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("116","5","16","Forbedring memoer","Bliver et forbedrelsespapir udarbejdet ofte?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("117","5","17","Forbedring ideer","Bliver forbedringsideer prvet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("118","5","18","Ngleprocedurer","Er standard procedurer klare, dokumenteret og brugt hyppigt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("119","5","19","Forbedringsplan","Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("120","5","20","De frste 3 S\'er","Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("121","5","21","Trning","Er alle tilfredsstillende trnet i standard procedurer?","352","","352");
INSERT INTO tbl_questionanswer VALUES("122","5","22","Vrktjer og dele","Bliver vrktjer opbevaret korrekt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("123","5","23","Lagerkontrol","Bliver lagerkontrollerne efterfulgt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("124","5","24","Procedurer","Er procedurerne nutidige og genovervejet ofte?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("125","5","25","Aktivitets tavle","Er aktivitetstavlen nutidige og ofte genovervejet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("126","6","1","Material oder Teile","Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("127","6","2","Maschienen oder Zubehr","Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("128","6","3","Bohrvorrichtungen, Werkzeuge, oder Andere","Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("129","6","4","Visuelle Kontrolle","Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("130","6","5","Schriftliche Normen","Bleibt beim erstellen des 5S’ irgend ein Standart zurck?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("131","6","6","Positionsbestimmung","Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("132","6","7","Materialkennzeichnung","Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("133","6","8","Mengenindikatoren","Sind die maximalen und minimalen zulssigen Mengen angezeigt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("134","6","9","Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"","Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("135","6","10","Bohrvorrichtungen und Werkzeuge","Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("136","6","11","Bden","Sind die Bden sauber, frei von Schmutz, Wasser und l?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("137","6","12","Maschinen","Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("138","6","13","Reiningen und testen","Wrde die Kontrolle mit einer Wartung verbuden?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("139","6","14","Reinigungsanforderung","Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("140","6","15","Gewhnlicher Reiningungszustand","Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("141","6","16","Protokolle","Werden regelmig Verbessungsvorschlge unterbreitet?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("142","6","17","Ideen","Folgen Verbesserungsvorschlge?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("143","6","18","Wichtige Verfahren","Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("144","6","19","Plne","Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("145","6","20","Die ersten 3 Sekunden","Wurden die 3s eingehalten?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("146","6","21","Training","Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?","352","","352");
INSERT INTO tbl_questionanswer VALUES("147","6","22","Werkzeuge und Teile","Wurden Werkzeuge und Teile ordnungsgem eingelagert?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("148","6","23","Warenbestandskontrolle","Wurden Lagerkontrollen eingehalten?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("149","6","24","Abwicklung","Sind die Verfahren aktuell und ordnungsgem kontrolliert?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("150","6","25","Aufgaben, Ttigkeiten","Sind die Lauflisten aktuell und ordnungsgem kontrolliert?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("151","7","1","Materiais ou peas","O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("152","7","2","Mquinas ou equipamentos","H algumas mquinas ou outros equipamentos desnecessrios por a?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("153","7","3","Utenslios, ferramentas ou matrizes","H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("154","7","4","Controlo Visual"," obvio qual o objeto que foi definido como desnecessrio?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("155","7","5","Normas escritas","Estabeleceu que o 5S’s deixou para trs algum padro desnecessrio?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("156","7","6","Indicadores de localizao","As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("157","7","7","Indicadores de Item","As prateleiras tm placas com a indicao de que item contm?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("158","7","8","Indicadores de Quantidade","As quantidades mximas e mnimas permitidas esto indicadas?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("159","7","9","Demarcao de caminhos e reas em processo de inventrio","H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("160","7","10","Utenslios e ferramentas","Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("161","7","11","Chos","O cho  mantido limpo e livre de lixo, gua e leo?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("162","7","12","Mquinas","As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("163","7","13","Limpando e verificando","A inspeo de equipamentos  combinada com a manuteno dos equipamentos?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("164","7","14","Responsabilidades de limpeza","H uma pessoa responsvel por supervisionar as operaes de limpeza?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("165","7","15","Limpeza habitual","Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("166","7","16","Memorandos de melhoras","Os memorandos de melhorias esto a ser feitos com regularidade?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("167","7","17","Ideias de melhorias","As ideias de melhorias esto a ser postas em prtica?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("168","7","18","Procedimentos principais","As normas de procedimentos so claras, documentadas e utilizadas ativamente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("169","7","19","Plano de melhoria","As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("170","7","20","Os primeiros 3 Ss","Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("171","7","21","Treino","Todas as pessoas tm a devida formao dos standards de procedimentos?","352","","352");
INSERT INTO tbl_questionanswer VALUES("172","7","22","Ferramentas e peas","As ferramentas e as peas esto a ser devidamente armazenadas?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("173","7","23","Controlo de stocks","Os controlos de stock tambm esto a ser cumpridos?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("174","7","24","Procedimentos","Os procedimentos esto atualizados e so revistos regularmente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("175","7","25","Quadros de atividades ","Os quadros de atividades esto atualizados e so revistos\n regularmente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("176","8","1","Materiales o piezas","Incluye el inventario vigente o en proceso algn material o parte innecesaria?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("177","8","2","Mquinas o equipos","Existe alguna mquina u otro equipo sin utilizar alrededor?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("178","8","3","Plantillas, herramientas o moldes","Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("179","8","4","Control visual","Es evidente cules artculos han sido marcados como innecesarios?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("180","8","5","Normas escritas","Ha dejado el establecimiento de 5S’s alguna norma inefectiva?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("181","8","6","Indicadores de lugar","Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("182","8","7","Indicadores de artculos","Tienen los estantes algn letrero mostrando cules artculos van dnde?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("183","8","8","Indicadores de cantidad","Estn indicadas las cantidades mximas y mnimas admisibles?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("184","8","9","Demarcacin de pasillos y reas de inventarios en proceso","Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("185","8","10","Plantillas y herramientas","Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("186","8","11","Pisos","Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("187","8","12","Mquinas","Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("188","8","13","Limpieza y verificacin","Se combina la inspeccin de los equipos con el mantenimiento de los mismos?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("189","8","14","Responsabilidades de limpieza","Existe una persona responsable de supervisar las operaciones de limpieza?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("190","8","15","Limpieza habitual","Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("191","8","16","Notas de mejoramiento","Se generan regularmente las notas de mejoramiento?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("192","8","17","Ideas de mejoramiento","Son llevadas a efecto las ideas de mejoramiento?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("193","8","18","Procedimientos clave","Son los procedimientos estndar claros, documentados y utilizados activamente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("194","8","19","Plan de mejoramiento","Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("195","8","20","Las primeras 3 Ss","Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("196","8","21","Capacitacin","Estn todos adecuadamente capacitados en el procedimiento estndar?","352","","352");
INSERT INTO tbl_questionanswer VALUES("197","8","22","Herramientas y partes","Las herramientas y piezas se almacenan correctamente?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("198","8","23","Controles de exist\nencias","Se han observado los controles de las existencias?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("199","8","24","Procedimientos","Estn los procedimientos actualizados y con revisin peridica?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("200","8","25","Tablas de actividad","Estn las tablas de actividad actualizadas y con revisin peridica?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("201","9","1","Материалы или части","Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("202","9","2","Машины и оборудование","Есть ли неиспользованные машин или другого оборудования, вокруг?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("203","9","3","Джиги, инструменты и штампы","Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("204","9","4","Визуальный контроль","Является очевидным, какие элементы были отмечены как ненужное?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("205","9","5","Письменные стандарты","С установлении 5SA € ™ с любого оставил бесполезные стандарт?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("206","9","6","Расположение индикаторов","Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("207","9","7","Пункт показатели","У полках вывески, показывающие, какие элементы Куда?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("208","9","8","Количественные показатели","Максимальное и минимальное допустимое количество указано?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("209","9","9","Демаркация проходы и в процессе инвентаризации областях","Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("210","9","10","Приспособления и инструменты","Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("211","9","11","Этажи","Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("212","9","12","машины","Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("213","9","13","Очистка и проверка","Является ли проверка оборудования сочетании с оборудованием обслуживания?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("214","9","14","Очистка обязанностей","Есть ли лицо, ответственное за контроль операций по очистке?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("215","9","15","Привычные чистоты","У операторов обычно подметать полы и протрите оборудование без слов?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("216","9","16","Улучшение заметки","Являются совершенствование заметки регулярно генерируется?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("217","9","17","Улучшение идеи","Являются улучшение идеи, действовали на?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("218","9","18","Основные процедуры","Существуют стандартные процедуры ясно, документированный и активно используется?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("219","9","19","Улучшение плана","Это будущие стандарты рассматриваются с четким планом улучшения для области?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("220","9","20","Первые 3 Ss","Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("221","9","21","обучение","Является ли все должным образом подготовлены в стандартной процедурой?","352","","352");
INSERT INTO tbl_questionanswer VALUES("222","9","22","Инструменты и запчасти","Существуют приборы и комплектующие хранится правильно?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("223","9","23","со контроля","Ли фондовый управления соблюдались?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("224","9","24","Процедуры","Существуют ли процедуры, до современных и регулярно пересматриваться?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("225","9","25","Деятельность платы","Есть деятельностью платы до современных и регулярно пересматриваться?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("226","10","1","材料或零件","庫存或在製品庫存是否包括和不必要的材料或零部件？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("227","10","2","機器或設備","是否有任何未使用的機器或其他周邊設備嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("228","10","3","夾具，工具或模具","是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("229","10","4","可視化控制","這是明顯的項目已被標記為不必要的？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("230","10","5","書面標準","建立5SA€™的留下任何無用的標準嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("231","10","6","位置指示燈","標記的貨架上和其他存儲區的位置指標和地址嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("232","10","7","項目指標","做的貨架，招牌顯示哪些項目去哪裡？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("233","10","8","數量指標","的最大和最小允許數量是否表示嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("234","10","9","人行道和在製品庫存區的劃界","白線或其他標記，清楚地表明人行道和存儲領域嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("235","10","10","夾具和工具","夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("236","10","11","地板","地板保持光澤的清潔，廢物，水和油？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("237","10","12","機","是機器擦拭乾淨，經常保持無屑，薯片和油嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("238","10","13","清潔和檢查","設備設備的維護與檢查相結合？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("239","10","14","清潔工作","有一個人負責監督清潔操作？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("240","10","15","習慣性的清潔","，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("241","10","16","改善備忘錄","定期改善備忘錄產生的呢？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("242","10","17","改進思路","改進的思路是否採取行動？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("243","10","18","關鍵程序","標準程序是明確的，成文的和積極地使用？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("244","10","19","改進計劃","被認為是未來的標準，該地區有明顯的改善計劃？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("245","10","20","第3條SS","第3 SS（排序，設置位置和光澤）維護呢？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("246","10","21","訓練","大家充分的培訓標準的過程中嗎？","352","","352");
INSERT INTO tbl_questionanswer VALUES("247","10","22","工具及零件","正確存放的工具和零件嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("248","10","23","庫存控制","存貨控制是否得到遵守？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("249","10","24","程序","程序到日期，並定期檢討嗎？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("250","10","25","活動板","最新活動板，並定期檢討呢？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("251","11","1","Υλικά ή εξαρτήματα","Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("252","11","2","Μηχανήματα ή εξοπλισμός","Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("253","11","3","Σφιγκτήρες, εργαλεία ή καλούπια","Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("254","11","4","Οπτικός έλεγχος","Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("255","11","5","Γραπτά πρότυπα","Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("256","11","6","Δείκτες τοποθεσίας","Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("257","11","7","Δείτες αντικειμένου","Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("258","11","8","Δείκτες ποσότητας","Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("259","11","9","Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών","Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("260","11","10","Σφιγκτήρες και εργαλεία","Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("261","11","11","Δάπεδα","Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("262","11","12","Μηχανήματα","Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("263","11","13","Καθαρισμός και έλεγχος","Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("264","11","14","Αρμοδιότητες καθαρισμού","Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("265","11","15","Συνήθης καθαριότητα","Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("266","11","16","Υπομνήματα για βελτίωση","Δημιουργούνται συχνά υπομνήματα βελτίωσης;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("267","11","17","Ιδέες για βελτίωση","Οι ιδέες βελτίωσης εφαρμόζονται;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("268","11","18","Διαδικασίες κλειδί","Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("269","11","19","Πλάνο βελτίωσης","Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("270","11","20","Τα πρώτα 3 Ss","Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("271","11","21","Εκπαίδευση","Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;","352","","352");
INSERT INTO tbl_questionanswer VALUES("272","11","22","Εργαλεία και εξαρτήματα","Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("273","11","23","Έλεγχοι του αποθέματος","Τηρούνται στοιχεία ελέγχου των αποθεμάτων;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("274","11","24","Διαδικασίες ","Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("275","11","25","Πίνακες δραστηριότητας","Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("276","12","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("277","12","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("278","12","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("279","12","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("280","12","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("281","12","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("282","12","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("283","12","8","品質指標","最大値と最小値の許容量が示されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("284","12","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("285","12","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("286","12","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("287","12","12","機械","削り、チップやオイルを機械から拭き取っていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("288","12","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("289","12","14","清掃責任","洗浄操作を監督する責任者はいますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("290","12","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("291","12","16","改善メモ","改善メモは定期的に生成されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("292","12","17","改善アイディア","改善のアイデアは作用されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("293","12","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("294","12","19","改善プラン","将来の規格は明確な改善計画で検討されている？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("295","12","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("296","12","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","352","","352");
INSERT INTO tbl_questionanswer VALUES("297","12","22","工具や部品","ツールや部品は正しく保存されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("298","12","23","ストックコントロール","ストックコントロールがに付着されていますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("299","12","24","手続き","手順は、最新かつ定期的に見直していますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("300","12","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("301","13","1","Materialen of onderdelen","Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("302","13","2","Machines of gereedschap","Is er sprake van niet gebruikte machines of andere uitrusting?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("303","13","3","Sjablonen, gereedschap of stempels","Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("304","13","4","Visuele controle","Is het duidelijk welke items zijn aangeduid als onnodig?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("305","13","5","Beschreven standaarden","Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("306","13","6","Plaats-aanduiders","Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("307","13","7","Item-aanduiders","Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("308","13","8","Hoeveelheid-aanwijzers"," Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("309","13","9","Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden","Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("310","13","10","Sjablonen en gereedschap","Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("311","13","11","Verdiepingen","Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("312","13","12","Machines","Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("313","13","13","Schoonmaak en controle","Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("314","13","14","Schoonmaak-verantwoordelijkheden","Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("315","13","15","Gebruikelijke zuiverheid","Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("316","13","16","Memo’s ter verbetering","Worden er regelmatig memo’s ter verbetering opgemaakt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("317","13","17","Ideeën voor verbeteringen","Wordt er actie ondernomen op ideeën ter verbetering?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("318","13","18","Sleutel-procedures","Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("319","13","19","Plan ter verbetering","Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("320","13","20","De eerste drie S’en","Worden de eerste drie S’en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("321","13","21","Training","Is iedereen voldoende getraind in de standaard procedures?","352","","352");
INSERT INTO tbl_questionanswer VALUES("322","13","22","Gereedschap en onderdelen","Worden gereedschap en onderdelen op de juiste wijze opgeborgen?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("323","13","23","Voorraad-controles","Wordt er vastgehouden aan voorraad-controles?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("324","13","24","Procedures","Zijn de procedures up-to-date en worden ze regelmatig herzien?","352","2012-10-23 12:58:55","352");
INSERT INTO tbl_questionanswer VALUES("325","13","25","Activiteiten-commissies","Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?","352","2012-10-23 12:58:55","352");





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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionnair VALUES("1","5s audit - english","352","9","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("2","5s audit - french","352","4","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("3","5s audit - italy","352","7","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("4","5s audit - swedish","352","14","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("5","5s audit - danish","352","2","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("6","5s audit - german","352","5","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("7","5s audit - portugal","352","11","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("8","5s audit - spanish","352","13","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("9","5s audit - russsian","352","12","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("10","5s audit - chinese","352","1","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("11","5s audit - greek","352","6","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("12","5s audit - japanese","352","8","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");
INSERT INTO tbl_questionnair VALUES("13","5s audit - dutch","352","3","352","1970-01-05 00:00:00","1","2012-10-23 12:58:55");





CREATE TABLE `tbl_settings` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tbl_settings VALUES("1","default_language","9","352","352");
INSERT INTO tbl_settings VALUES("2","default_language_question","9","352","352");



