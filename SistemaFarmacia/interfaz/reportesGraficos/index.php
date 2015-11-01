<?php

                include("./conexion/BDConexion.php");
                 include ("./conexion/Data.php");

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Reportes</title>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <style type="text/css">
${demo.css}
        </style>
        <script src="./reportesGraficos/Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="./reportesGraficos/Highcharts-4.1.5/js/modules/exporting.js"></script>
        <script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'PERSONAS QUE DEBEN, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: '0',
            name: '1',
            data: [
                <?php
            $deudor = new Data();

            $dbConexion= new DBConexion();

            $dbConexion->conectar();

            $sql=$deudor->getDeudores();

            while($res=mysql_fetch_array($sql)){
            ?>            
                ['<?php echo $res['0']; ?>', <?php echo $res['1'] ?>],
            <?php
            }
            ?>  
            ]
        }]
    });
});


        </script>
   
    </head>
    <body>


<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
<br><br>
<center><a href="ejemplo2.php">Ver ejemplo 2</a></center>
    </body>
</html>
