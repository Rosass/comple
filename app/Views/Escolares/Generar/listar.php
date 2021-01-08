<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia de Liberación</title>

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
    #watermar{
        position: fixed;

        bottom: 18cm;
        left: 1.5cm;
        
        width: 850px;
        height: 70;
        opacity: 0.09;
        

        z-index: -1000;
    }
    #piedepagina{
    
    position: absolute;
    bottom:0 !important;
    bottom: -1px;

}

</style>
</head>
<body >
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
    <p style="margin-left:505px; margin-top:1px;">Instituto Tecnológico de Pochutla</p>
    <p style=" margin-left:454px; text-align:justify;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?> <strong>Folio:</strong> <?php echo $folio ?></p>
</div>
<div id="watermar">
<?php
    $path = 'public/img/estado.png'; 
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img " style="width:70%;" src="<?= $base64 ?>"> 

</div>
    <h5><strong>A QUIEN CORRESPONDA:</strong></h5>
    <P style="text-align: justify;">Por este medio se hace constar que según documentos que existen en el archivo del Instituto Tecnólogico de Pochutla, clave 20DIT0011V el (la) C.</P>
    <div>
    <?php foreach ( $alumno as $a ):?>
        <p style="text-align:center;"><strong> 
        <?=$a->nombre?>
        <?=$a->ap_paterno?>
        <?=$a->ap_materno?></strong><br/>
        <strong>NUM. DE CONTROL: <?= $control?></strong></p>
    </div><br/>
    <p style="text-align: justify;">Alumno de la carrera de <strong><?php
        if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
        if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
        if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
    ?></strong> de esta Institución, ha liberado su actividad complementaria con el nivel de desempeño <strong><?=$nivelDesempenio?></strong> y un valor numérico de <strong> <?=$calificacion?></strong>, con valor curricular de 5 creditos.</p>
    <?php endforeach; ?>
    <?php date_default_timezone_set('America/Mexico_city');
    $date = date("d");
    $date1 = date("Y")
    ?>
    <p style="text-align: justify;">A petición del interesado y para los efectos a que haya lugar, se extiende la presente en la ciudad de San Pedro Pochutla, Oaxaca, a los <?=$date?> dias del mes de  <?php echo $meses[date('n')-1];?> del  <?=$date1?>.</p><br/><br>
<P style="font-size:80%;"><strong>ATENTAMENTE</strong><br/>
<strong> EXCELENCIA EN EDUCACIÓN TECNOLÓGICA</strong><br/>
<strong>"Tecnologia y Ciencia como medios de independencia"</strong></P><br/><br/>
<p style="font-size:80%;"><strong> ING.ALBERTO SALINAS SÁNCHEZ</strong><br/>
<strong>JEFE DEL DEPTO. DE SERVICIOS ESCOLARES</strong></p><br><br>

    <p>c.c.p. Archivo.</p><br/><br><br><br><br><br>

<div id="piedepagina">

    <?php
        $path = 'public/img/logotec.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
<img  style="width:11%;" align="left" src="<?= $base64 ?>">
<p style=" text-align:center;">k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado, C.P. 70902, San Pedro Pochutla, Oaxaca. E-mail: se_pochutla@tecnm.mx<br/>www.itpochutla.edu.mx</p>
</div>
<!-- constancia parcial -->
<header>

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
        <img  style="width:34%;" align="right" src="<?= $base64 ?>"><br>
</header>
    <p style="margin-left:505px; margin-top:1px;">Instituto Tecnológico de Pochutla</p>
    <p style=" margin-left:454px;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?>  <strong> Folio:</strong> <?php echo $folio ?></p>
</div>
    <h5><strong>A QUIEN CORRESPONDA:</strong></h5>
    <P style="text-align: justify;">Por este medio se hace constar que según documentos que existen en el archivo del Instituto Tecnólogico de Pochutla, clave 20DIT0011V el (la) C.</P>
    <div>
    <?php foreach ( $alumno as $a ):?>
        <p style="text-align:center;"><strong> 
        <?=$a->nombre?>
        <?=$a->ap_paterno?>
        <?=$a->ap_materno?></strong><br/>
        <strong>NUM. DE CONTROL: <?= $control?></strong></p>
    </div>
<p style="text-align: justify;">Alumno de la carrera de <strong> <?php
        if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
        if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
        if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
    ?></strong> de esta Institución, ha cursado en las  siguientes actividades complementarias.</p>
<?php endforeach; ?>
<table style=" margin: 20 auto; width:90%" >
    <thead>
            <tr>
            <th colspan="7">Actividades</th>
            </tr>
            <tr>
            <th>No</th>
            <th>Periodo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Creditos</th>
            <th>Valor Numerico</th>
            <th>Nivel Desempeño</th>  
            </tr>
        </thead>
        <tbody> 
        <?php foreach($actividades as $key => $ac) : ?>
            <tr style="font-size:70%;">
                <th scope="row" style="font-size:70%; width: 4%;"><?= $key + 1 ?></th>
                <td> <?=$ac->periodo_descripcion?></td>
                <td > <?=$ac->actividad?></td>
                <td > <?=$ac->tipo_actividad?></td>
                <td ><?=$ac->credito?></td>
                <td ><?=$ac->calificacion?></td>
                <td ><?=$ac->nivel?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
</table>
<?php date_default_timezone_set('America/Mexico_city');
    $date = date("d");
    $date1 = date("Y")
?>
<p style="text-align: justify;">A petición del interesado y para los efectos a que haya lugar, se extiende la presente en la ciudad de San Pedro Pochutla, Oaxaca, a los <?=$date?> dias del mes de  <?php echo $meses[date('n')-1];?> del  <?=$date1?>.</p><br/>
<P style="font-size:80%;"><strong>ATENTAMENTE</strong><br/>
<strong> EXCELENCIA EN EDUCACIÓN TECNOLÓGICA</strong><br/>
<strong>"Tecnologia y Ciencia como medios de independencia"</strong></P><br/>
<p style="font-size:80%;"><strong> ING.ALBERTO SALINAS SÁNCHEZ</strong><br/>
<strong>JEFE DEL DEPTO. DE SERVICIOS ESCOLARES</strong></p>

    <p>c.c.p. Archivo.</p><br>
    <div id="piedepagina">

<?php
    $path = 'public/img/logotec.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img  style="width:11%;" align="left" src="<?= $base64 ?>">
<p style=" text-align:center;">k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado, C.P. 70902, San Pedro Pochutla, Oaxaca. E-mail: se_pochutla@tecnm.mx<br/>www.itpochutla.edu.mx</p>
</div>
</body>
</html>


