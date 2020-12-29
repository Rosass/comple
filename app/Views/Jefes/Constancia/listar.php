<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia Parcial</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <style type="text/css">
    table ,th,td{
    border:1.5px solid black;
    border-collapse:collapse;
    }
    h4{
    text-align: center;
    }
    td, th {
    text-align: center;
    }
    td.a{
    text-indent: 5px;
    }
    th{
    font-size:90%;
    }
</style>
</head>
<body>

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
<?php foreach($areas as $ar) : ?>
    <img  style="width:34%;" align="right" src="<?= $base64 ?>"><br/>
    <p style="text-align:right; margin-top:1px; font-size:80%;">Instituto Tecnológico de Pochutla<br/><?=  $ar->nombre_area ?> <?php
        if ( $ar->id_area == '2') echo '(Formación Integral)';
    ?></p>

    <p style=" margin-left:400px;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?><br/><strong style="font-size:72%;"><?=  $ar->nombre_area ?></strong><br/>  <strong> Folio:</strong> 
    <?php
            if ( $ar->id_area == '2') echo '11V.1.1.4.0.0/EXT/';
            if ( $ar->id_area == '1') echo '11V.0.0.0.0.0/ING/';
            
        ?><?php echo $folio ?>/<?= $fecha1 ?></p><br>

    <p style="text-align:center; font-size:85%; margin-top:-5px;"><strong>CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDADES COMPLEMENTARIAS</strong></p>
    <div  style="font-family: Montserrat; font-weight:800; font-size:10pt;">
    <P><strong>ALBERTO SALINAS SÁNCHEZ </strong><br/>
    <strong>JEFE(A) DEL DEPARTAMENTO DE SERVICIOS ESCOLARES  </strong><br><strong>P R E S E N T E</strong></P></div>
    <div>
    <P style =" text-align:justify; font-family: Montserrat; font-weight:400; font-size:10pt;">El que suscribe <strong><u><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?></u></strong>,<?php endforeach; ?> por este medio se permite hacer de su conocimiento que el (la) estudiante  <?php foreach ( $alumno as $a ):?> <strong><u><?= $a->nombre?> <?=$a->ap_paterno?>
        <?=$a->ap_materno?></u></strong>, con número de control
    <strong><u><?= $control?></u></strong> de la carrera de <strong><u><?php
            if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
            if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
            if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
        ?></u></strong>, <?php endforeach; ?> ha cumplido su actividad  <?php foreach($actividad as $act) : ?> <strong><u><?= $act->tipo_actividad ?></u></strong>: <strong><u><?= $act->actividad ?></u></strong> con el nivel de desempeño<strong>
    <u><?= $act->nivel ?></u></strong> y un valor numérico de <strong><u><?= $act->valor_numerico ?></u></strong> durante el periodo escolar <strong><u><?= $act->periodo_descripcion ?></u></strong> con un valor curricular de <strong><u><?= $act->credito ?></u></strong> crédito.</P>

    <?php endforeach ?>
<?php date_default_timezone_set('America/Mexico_city');
    $date = date("d");
    $date1 = date("Y")
?>

<p >Se extiende la presente en la <strong><u>Cd. De San Pedro Pochutla</u></strong> a los<strong><u> <?=$date?> </u></strong> dias del mes de  <strong><u><?php echo $meses[date('n')-1];?></u></strong> del <?=$date1?>.</p></div><br/>
<P style=" text-align:center;  font-family: Montserrat; font-weight:800; font-size:10pt;"><strong>A T E N T A M E N T E</strong><br/>
<strong style =" font-family: Montserrat; font-weight:200; font-style:italic; font-size:9pt;">Excelencia en Educación Tecnológica</strong><br/></P><br/>
<div>
    <p style="font-family: Montserrat; font-weight:800; font-size:10pt; text-align:center; margin-right:430px;  margin-top:58px; "><strong><?= $act->nombre_responsable ?>  <?= $act->apaterno?> <?= $act->amaterno ?><hr color="black" size="2.3"></strong>
    NOMBRE Y FIRMA DEL (DE LA) RESPONSABLE</p>
    <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:430px; text-align:center; margin-top:-99px; "><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?><hr color="black" size="2.3"></strong>JEFE(A) DEL <?=  $ar->nombre_area ?></p>
</div>
<footer>
<div>
    <p style=" font-family: Montserrat; font-weight:500; font-size:8pt;">C.c.p. Jefe (a) de Departamento Correspondiente <br> estudiante.</p><br>
    <p style="font-family: Montserrat; font-weight:500; font-size:8pt; margin-top:7px;">TecNM-VI-PO-003-05 <strong style="margin-left:110px;">Esta constancia es oficial y la puede validar en: https://constancias.pochutla.tecnm.mx/</strong></p>
    <p style="font-family: Montserrat; font-weight:500; font-size:8pt; margin-left:650px; text-align:center; margin-top:-900%;">Rev. 0</p>
    <hr color="black" size="2.4">
</div>
<div>

    <?php
        $path = 'public/img/logotec.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
<img  style="width:10%;" align="left" src="<?= $base64 ?>">
<?php
        $path = 'public/img/3logos.jpeg';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
<img  style="width:18%;" align="right" src="<?= $base64 ?>">
</div>
<p style=" text-align:center; font-size:51%; ">Instituto Tecnológico certificado conforme a la NMX-CC-9001-IMNC-2015 ISO 9001:2015<br/>
"Número de registro: RSGC-928, fecha de inicio:2015-06-22 y término de la certificación 2021-06-22" <br/>El Alcance de la certificación: Proceso Educativo; que comprende desde la inscripción<br/>
hasta la entrega del Titulo y la Cedula Profesional de licenciatura.<br/> Instituto Tecnológico certificado conforme a la NMX-R-025-SCFI-2015 en igualdad Laboral y No Discriminación<br/> k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado,<br/> C.P. 70902, San Pedro Pochutla, Oaxaca, México.<br/>Tel. 01(958) 5878050, e-mail:dir_pochutla@tecnm.mx<br>www.tecnm.mx | www.pochutla.tecnm.mx</p>
</footer>
</body>
</html>