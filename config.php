<?php
try{
	$link = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u997666230_valm','u997666230_teste','123456',
           array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            )
			
        );
	
}
catch(PDOException $e){
	echo 'ERROR: '. $e->getMessage();
}
?>