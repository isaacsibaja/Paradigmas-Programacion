<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php
/*$file = fopen("archivo.txt", "w");
echo fwrite($file, "Esto es una nueva linea de texto" . PHP_EOL);
echo "<br/>";
echo fwrite($file, "Otra más" . PHP_EOL);
fclose($file);
//http://www.tse.go.cr/zip/padron/padron_completo.zip
*/?>

<?php

    /*$url  = "http://www.tse.go.cr/zip/padron/padron_completo.zip";
    //El nombre del archivo donde se almacenara los datos descargados.
   
    $filePath = dirname(__FILE__).'/tse/padron_completo.zip';
    echo "$filePath";
    //Inicializa Curl.
    $ch = curl_init();
 
    //Pasamos la url a donde debe ir.
	curl_setopt($ch, CURLOPT_URL, $url);
	    //Si necesitamos el header del archivo, en este caso no.
	curl_setopt($ch, CURLOPT_HEADER, false);
	    //Si necesitamos descargar el archivo.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    //Lee el header y se mueve a la siguiente localización.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	    //Cantidad de segundo de limite para conectarse.
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	    //Cantidad de segundos de limite para ejecutar curl. 0 significa indefinido.
	curl_setopt($ch, CURLOPT_TIMEOUT, 0);
	    //Donde almacenaremos el archivo.
	curl_setopt($ch, CURLOPT_FILE, $filePath);
	    //curl_exec ejecuta el script.
	//$result = curl_exec($ch);
	curl_exec($ch);
    //Dejamos de utilizar el archivo creado.
    fclose($ch);
   /* if($result){ //funciono ?
         echo "Descarga correcta.";
     }*/
?>

<?php
/*

 $zip = new ZipArchive;

 $zip->open("tse/padron_completo.zip");

 $zip->extractTo("tse");

 $zip->close();*/

?>

<?php //Ejemplo aprenderaprogramar.com
	include ("./Control.php");
	include ("./Registro.php");
	$control = new Control;
	$control->eliminar();
	//echo "Esta operacion puede tardar varios minutos";
	$file = fopen("./tse/PADRON_COMPLETO.txt", "r");
		
		//$con = 0;
		while(!feof($file)) {
			feof($file);
			$aux = fgets($file);
			$array = preg_split("[,]", $aux);			
			if($array[0]==702510539){
				echo $array[5]; 
				echo $array[6]; 
				echo $array[7];
				break;
			}			
			//$registro = new Registro($array[0],$array[5],$array[6],$array[7]);
			//$control->insertar($registro);
		}
	fclose($file);

?>

<?php
// Los delimitadores pueden ser barra, punto o guión
/*$fecha = "04/30/1973";
list($mes, $día, $año) = split('[/.-]', $fecha);
echo "Mes: $mes; Día: $día; Año: $año<br />\n";*/
?>