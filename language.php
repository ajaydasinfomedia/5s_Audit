<?php 
    function loadLanguage($lang) {
    /*if (file_exists($lang)) {
        $tab2 = parse_ini_file($lang);
        //fillConstants($tab2);
    }*/
    
    if (!file_exists($lang)) {
        $lang = 'english.ini';
        
    }
    $tab = parse_ini_file($lang);
      //  print_r($tab);
    fillConstants($tab);
}

function fillConstants($array) {
    foreach ($array as $key=>$val) {
        if(!defined($key)) {
            define($key,$val);
        }
    }
}
?>