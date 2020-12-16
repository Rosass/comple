<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia de Liberación</title>
</head>
<body>
<div>
<?php
    $path = 'public/img/sepp.jpg'; 
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img " style="width:35%;"  src="<?= $base64 ?>">    
<?php
$path = 'public/img/logo_tecnm.gif';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<?php date_default_timezone_set('America/Mexico_city');
    $fecha = date("d/");
    $fecha1 = date("Y");
?>
<?php
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

?>

    <img  style="width:34%;" align="right" src="<?= $base64 ?>"><br/>
    <p style="text-align:right; margin-top:1px;">Instituto tecnológico de Pochutla</p><br/>
    <p style=" margin-left:420px;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?> <strong>Folio:</strong> <?php echo $folio ?></p>
</div>
    <h5><strong>A QUIEN CORRESPONDA:</strong></h5>
    <P>Por este medio se hace constar que según documentos que existen en el archivo del Instituto Tecnólogico de Pochutla, clave 20DIT0011V el (la) C.</P>
    <div>
    <?php foreach ( $alumno as $a ):?>
        <p style="text-align:center;"><strong> 
        <?=$a->nombre?>
        <?=$a->ap_paterno?>
        <?=$a->ap_materno?></strong><br/>
        <strong>NUM. DE CONTROL: <?= $control?></strong></p>
    </div><br/>
    <p>Alumno de la carrera de <strong><?php
        if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
        if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
        if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
    ?></strong> de esta Institución, ha liberado su actividad complementaria con el nivel de desempeño <strong><?=$nivelDesempenio?></strong> y un valor numérico de <strong> <?=$calificacion?></strong>, con valor curricular de 5 creditos.</p>
    <?php endforeach; ?>
    <?php date_default_timezone_set('America/Mexico_city');
    $date = date("d");
    $date1 = date("Y")
    ?>
    <p>A petición del interesado y para los efectos a que haya lugar, se extiende la presente en la ciudad de San Pedro Pochutla, Oaxaca, a los <?=$date?> dias del mes de  <?php echo $meses[date('n')-1];?> del  <?=$date1?>.</p><br/>
<P style="font-size:80%;"><strong>ATENTAMENTE</strong><br/>
<strong> EXCELENCIA EN EDUCACIÓN TECNOLÓGICA</strong><br/>
<strong>"Tecnologia y Ciencia como medios de independencia"</strong></P><br/><br/>
<p style="font-size:80%;"><strong> ING.ALBERTO SALINAS SÁNCHEZ</strong><br/>
<strong>JEFE DEL DEPTO. DE SERVICIOS ESCOLARES</strong></p>

    <p>c.c.p. Archivo.</p><br/><br/></br></br><br/>

    <?php
        $path = 'public/img/logotec.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <img  style="width:10%;" align="left" src="<?= $base64 ?>"><br/><br/></br><br/>
    <p style="margin-left:130px; text-align:center;">k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado, C.P. 70902, San Pedro Pochutla, Oaxaca. E-mail: se_pochutla@tecnm.mx<br/>www.itpochutla.edu.mx</p>


</body>
</html>