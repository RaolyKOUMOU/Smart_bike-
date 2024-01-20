<?php
/*
PDO = PHP data object
*/

try{
$bdd = new pdo("mysql:host=mysql-smartbikefr.alwaysdata.net;dbname=smartbikefr_admin","338291_ad","Princewolf12@");
echo "";
}
catch (Exception $e){
    echo"Problème BDD $e";
}