<?php
$dir="image/";                       
$name_of_pdf =$dir.$_REQUEST['file'].'.pdf';
$path=$dir.$_FILES ['image']['name'];
move_uploaded_file($_FILES ['image']['tmp_name'], $path);
echo 'path=>'.'http://5s.niftysol.com/windows_webservice/'.$path; 
?>