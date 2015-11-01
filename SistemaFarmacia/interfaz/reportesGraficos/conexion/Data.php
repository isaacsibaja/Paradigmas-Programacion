<?php
header('Content-Type: text/html; charset=ISO-8859-1');


class Data{

	function Data(){
	}

	function getDeudores(){

		
		 $sql=mysql_query("SELECT * FROM tbproducto");
		 return $sql;
}
}



?>