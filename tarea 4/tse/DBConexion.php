<?php

class DBConexion{
  
  var $conect;
  
     function DBConexion(){
	 }	

	 function conectar() {

	     if(!($con=@mysql_connect("localhost","root","")))
		 {
		     echo"Error al conectar a la base de datos";
			 exit();
	      }
		  if (!@mysql_select_db("tse",$con)) {
		   echo "Error al seleccionar la base de datos";
		   exit();
		  }
	       $this->conect=$con;
		   return true;
	 }

	  function getCon(){
	 return $this->conect;
	 }
	 
}

?>