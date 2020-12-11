<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <img  style="width:34%;" align="right" src="<?= $base64 ?>"><br/>
    <p style="text-align:right; margin-top:1px;"><strong>Instituto tecnológico de Pochutla</strong></p>
    <p style=" margin-left:450px;" >San Pedro Pochutla, Oax., 20/Agosto/2020<br/> <strong>Folio:</strong> <?php echo $folio ?></p>
</div>
    <h5><strong>A QUIEN CORRESPONDA:</strong></h5>
    <P>Por este medio se hace constar que según documentos que existen en el archivo del Instituto Tecnólogico de Pochutla, clave 20DIT0011V el (la) C.</P>
    <div>
    <?php foreach ( $alumno as $a ):?>
        <H4 style="text-align:center;"> 
        <?=$a->nombre?>
        <?=$a->ap_paterno?>
        <?=$a->ap_materno?>
        </H4>
        <H4 style="text-align:center;">NUM. DE CONTROL: <?= $control?></H4>
    <?php endforeach; ?>
    </div>

    <p>Alumno de la carrera de <strong><?=$a->carrera?></strong> de esta Institución, ha liberado su actividad complementaria con el nivel de desempeño <strong>  </strong> y un valor numérico de <strong> </strong>, con valor curricular de 5 creditos.</p>
    <p>A petición del interesado y para los efectos a que haya lugar, se extiende la presente en la ciudad de San Pedro Pochutla, Oaxaca, a los 20 dias del mes de Agosto del 2020.</p><br/>

<P style="font-size:80%;"><strong>ATENTAMENTE</strong><br/>
<strong> EXCELENCIA EN EDUCACIÓN TECNOLÓGICA</strong><br/>
<strong>"Tecnologia y Ciencia como medios de independencia"</strong></P><br/><br/>
<p style="font-size:80%;"><strong> ING.ALBERTO SALINAS SÁNCHEZ</strong><br/>
<strong>JEFE DEL DEPTO. DE SERVICIOS ESCOLARES</strong></p>

    <p>c.c.p. Archivo.</p><br/><br/>

    <?php
        $path = 'public/img/logotec.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
<img  style="width:10%;" align="left" src="<?= $base64 ?>"><br/><br/>
<p style="margin-left:130px; text-align:center;">k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado, C.P. 70902, San Pedro Pochutla, Oaxaca. E-mail: se_pochutla@tecnm.mx<br/>www.itpochutla.edu.mx</p>

</body>
</html>