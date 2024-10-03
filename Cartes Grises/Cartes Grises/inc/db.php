<?php
		$host_name  = "localhost";
    	$database   = "assurvehicules";
    	$user_name  = "root";
    	$password   = "root";

		try{
			$db = new PDO('mysql:host='.$host_name.';dbname='.$database.'',$user_name,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}catch(Exception $e){

			echo'error '.$e->getMessage();
		}
?>