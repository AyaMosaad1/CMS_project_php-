<?php

/*it is function to add my server ,loginapp in which sql i creat ... to make a connation by  mysqli_connect('localhost','root','',
	'database name ');
	*/

/*we make array to make connection more security , MAKE array witk keys and use KEY in coonection ,arreyname['key']=value*/
$db['db_host'] = "localhost";
$db['db_name'] = "Cms";
$db['db_pass'] = "";
$db['db_user'] = "root";


#function to put value to key
# strtoupper =>> to make letter capital 
foreach($db as $key => $value){
define (strtoupper ($key) , $value );
}
 $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>