<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia Parcial</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,800;1,200&display=swap" rel="stylesheet">
    <style type="text/css">
    .border {
    border: 1.5px solid black;
    border-collapse: collapse;
}

.tabla-border {
    border-top: none;
    border-left: none;
}
    h4{
    text-align: center;
    }
    td, th {
    text-align: center;
    }
    #obs{
        text-align: left;
        text-indent: 5px;
    }
    td.a{
    text-indent: 5px;
    }
    th{
    font-size:90%;
    }
    #piedepagina{
    
        position: absolute;
        bottom:0 !important;
        bottom: -1px;

    }
    p{
        margin-bottom: 0px;
        margin-top: 0px;
    }
    #letra{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 13px;
    }

    #watermar{
        position: fixed;

        bottom: 26cm;
        left: -5cm;
        
        width: 1040px;
        height: 33;
        opacity: 0.08;
        

        z-index: -1000;

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
    <p style="margin-left:505px; margin-top:1px; font-size:80%;">Instituto Tecnológico de Pochutla<br/><?=  $ar->nombre_area ?> <?php
        if ( $ar->id_area == '2') echo '(Formación Integral)';
    ?></p><br>
<p style="text-align: center;"><?php foreach($actividad as $act) : ?><?= $act->frase_decreto ?><?php endforeach; ?></p><br>
    <p style=" margin-left:456px; text-align: justify;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?><strong style="font-size:78%; "><?=  $ar->nombre_area ?></strong><br/>  <strong> Folio:</strong> 
    <?php
            if ( $ar->id_area == '2') echo '11V.1.1.4.0.0/EXT/';
            if ( $ar->id_area == '1') echo '11V.0.0.0.0.0/ING/';
            
        ?><?php echo $folio ?>/<?= $fecha1 ?></p><br>

    <p style="text-align:center; font-size:85%; margin-top:-5px;"><strong>CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDADES COMPLEMENTARIAS</strong></p><br>
    <div  style="font-family: Montserrat; font-weight:800; font-size:10pt;">
    <P><strong>ALBERTO SALINAS SÁNCHEZ </strong><br/>
    <strong>JEFE(A) DEL DEPARTAMENTO DE SERVICIOS ESCOLARES  </strong><br><strong>P R E S E N T E</strong></P></div><br>

        <div id="letra">
            <P style =" text-align:justify; ">El que suscribe <strong><u><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?></u></strong>,<?php endforeach; ?> por este medio se permite hacer de su conocimiento que el (la) estudiante  <?php foreach ( $alumno as $a ):?> <strong><u><?= $a->nombre?> <?=$a->ap_paterno?>
                <?=$a->ap_materno?></u></strong>, con número de control
            <strong><u><?= $control?></u></strong> de la carrera de <strong><u><?php
                    if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
                    if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
                    if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
                ?></u></strong>, <?php endforeach; ?> ha cumplido su actividad  <?php foreach($actividad as $act) : ?> <strong><u><?= $act->tipo_actividad ?></u></strong>: <strong><u><?= $act->actividad ?></u></strong> con el nivel de desempeño<strong>
            <u><?= $act->nivel ?></u></strong> y un valor numérico de <strong><u><?= $act->valor_numerico ?></u></strong> durante el periodo escolar <strong><u><?= $act->periodo_descripcion ?></u></strong> con un valor curricular de <strong><u><?= $act->credito ?></u></strong> crédito.</P> <br>

            
                <?php endforeach ?>
                <?php date_default_timezone_set('America/Mexico_city');
                $date = date("d");
                $date1 = date("Y")
                ?>

            <p style="text-align: justify;">Se extiende la presente en la <strong><u>Cd. De San Pedro Pochutla</u></strong> a los<strong><u> <?=$date?> </u></strong> dias del mes de  <strong><u><?php echo $meses[date('n')-1];?></u></strong> del <?=$date1?>.</p></div><br/><br><br><br><br>
        </div>
<P style=" text-align:center;  font-family: Montserrat; font-weight:800; font-size:10pt;"><strong>A T E N T A M E N T E</strong><br/>
<strong style =" font-family: Montserrat; font-weight:200; font-style:italic; font-size:9pt;">Excelencia en Educación Tecnológica</strong><br/></P><br/><br><br>

<div>
    <p style="font-family: Montserrat; font-weight:800; font-size:10pt; text-align:center; margin-right:430px;  margin-top:58px; "><strong><?= $act->nombre_responsable ?>  <?= $act->apaterno?> <?= $act->amaterno ?><hr color="black" size="2.3"></strong>
    NOMBRE Y FIRMA DEL (DE LA) RESPONSABLE</p>
    <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:430px; text-align:center; margin-top:-99px; "><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?><hr color="black" size="2.3"></strong>JEFE(A) DEL <?=  $ar->nombre_area ?></p>
</div><br>

<p style=" font-family: Montserrat; font-weight:500; font-size:8pt;">C.c.p. Jefe (a) de Departamento Correspondiente <br> estudiante.</p><br>
<footer id="piedepagina">
    <div>
        <p style="font-family: Montserrat; font-weight:500; font-size:8pt; margin-top:-18px;">TecNM-VI-PO-003-03 <strong style="margin-left:110px;">Esta constancia es oficial y la puede validar en: https://constancias.pochutla.tecnm.mx/</strong></p>
        <p style="font-family: Montserrat; font-weight:500; font-size:8pt; margin-left:650px; text-align:center; margin-top:-900%;">Rev. 0</p>
    </div>
    <hr size="2.3">

    
        <?php
            $path = 'public/img/logotec.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
    <img  style="width:10%;" align="left" src="<?= $base64 ?>">
    <div id="logos">
        <?php
                $path = 'public/img/3logos.jpeg';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
        <img  style=" width:20%;" align="right" src="<?= $base64 ?>">
    </div>

    <p style=" text-align:center; float:none; font-size:50%; ">Instituto Tecnológico certificado conforme a la NMX-CC-9001-IMNC-2015 ISO 9001:2015<br/>
    "Número de registro: RSGC-928, fecha de inicio:2015-06-22 y término de la certificación 2021-06-22" <br/>El Alcance de la certificación: Proceso Educativo; que comprende desde la inscripción<br/>
    hasta la entrega del Titulo y la Cedula Profesional de licenciatura.<br/> Instituto Tecnológico certificado conforme a la NMX-R-025-SCFI-2015 en igualdad Laboral y No Discriminación<br/> k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado,<br/> C.P. 70902, San Pedro Pochutla, Oaxaca, México.<br/>Tel. 01(958) 5878050, e-mail:dir_pochutla@tecnm.mx<br>www.tecnm.mx | www.pochutla.tecnm.mx</p>
</footer>
<div id="watermar">
<?php
    $path = 'public/img/image.png'; 
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img " style="width:80%;" src="<?= $base64 ?>"> 

</div> <br><br><br><br><br><br>
<!-- tabla de calificacion -->
<body>
    
    <header>
    
    <table  class="border tabla-border" >
    <tr >
    <th class="border" rowspan="3" style="width:28%;"><?php
        $path = 'public/img/ISO.png'; 
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <img " style="width:36%;  height:90px; "  src="<?= $base64 ?>">
    </th>
        <th class="border" style="width:40%;">Evaluación al desempeño de la actividad Promoción <?php if ($act->tipo_actividad == 'DEPORTIVA') echo 'Cultural y/o Deportiva';
          if ($act->tipo_actividad == 'CULTURAL') echo 'Cultural y/o Deportiva';
          if ($act->tipo_actividad == 'ACADEMICA') echo 'ACADEMICA'; ?></th>
        <th class="border">Código: TecNM-VI-PO-003-03</th>
    </tr>
    <tr>
        <td class="border">Referencia a la Norma ISO 9001:2015: 8.1, 8.2.1, 8.2.2</td>
        <td class="border">Revisión: 0</td>
    </tr>
    <tr>
        <td class="border"></td>
        <td class="border">Página </td>
    </tr>
    </table><br>
    
    <p style="text-align: center;"><strong> INSTITUTO TECNOLÓGICO DE POCHUTLA</strong><br>
    <strong style="text-align:center; font-size:70%;">SUBDIRECCION DE PLANEACIÓN Y VINCULACION</strong><br></p><br>

    <p style="font-size: 80%; text-align:center;"> <strong> <?=  $ar->nombre_area ?> <br> OFICINA DE PROMOCIÓN <?php foreach($actividad as $act) : ?> <strong><u><?= $act->tipo_actividad ?></u></strong></strong></p>
    <p style="font-size: 80%; text-align:center;"><strong>Nombre del estudiante: <?php foreach ( $alumno as $a ):?> <strong><u><?= $a->nombre?> <?=$a->ap_paterno?> <?=$a->ap_materno?><?php endforeach ?></strong><br>
    <strong>Actividad:<strong><u><?= $act->actividad ?></u></strong><br>
    <strong>Periodo de realización:<strong><strong><u><?= $act->periodo_descripcion ?></u></strong></p><br>
        <?php endforeach ?>
    </header>
    <table  class="border tabla-border" style="width:100%">
        <thead>
            <tr>
            <th></th>
            <th></th>
            <th class="border" colspan="5">Nivel de desempeño del criterio</th>
            </tr>
            <tr>
                <th class="border">No.</th>
                <th class="border">Criterio a evaluar</th>
                <th class="border">Insuficiente</th>
                <th class="border">Suficiente</th>
                <th class="border">Bueno</th>
                <th class="border">Notable</th>
                <th class="border">Excelente</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border">1</td>
                <td class="border">Cumple en tiempo y forma con las actividades encomendadas alcanzando los objetivos.</td>
                <td class="border"><?php if ($act->criterio1 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio1 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio1 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio1 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio1 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">2</td>
                <td class="border">Trabaja en equipo y se adapta a nuevas situaciones.</td>
                <td class="border"><?php if ($act->criterio2 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio2 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio2 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio2 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio2 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">3</td>
                <td class="border">Muestra liderazgo en las actividades encomendadas.</td>
                <td class="border"><?php if ($act->criterio3 == 0) echo 'x';       ?></td>
                <td class="border"><?php if ($act->criterio3 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio3 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio3 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio3 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">4</td>
                <td class="border">Organiza su tiempo y trabaja de manera proactiva.</td>
                <td class="border"><?php if ($act->criterio4 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio4 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio4 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio4 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio4 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">5</td>
                <td class="border">Interpreta la realidad y se sensibiliza aportando soluciones a la problemática con la actividad.</td>
                <td class="border"><?php if ($act->criterio5 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio5 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio5 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio5 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio5 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">6</td>
                <td class="border">Realiza sugerencias innovadoras para beneficio o mejora del programa en el que participa..</td>
                <td class="border"><?php if ($act->criterio6 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio6 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio6 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio6 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio6 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td class="border">7</td>
                <td class="border">Tiene iniciativa para ayudar en las actividades encomendadas y muestra espiritu de servicio.</td>
                <td class="border"><?php if ($act->criterio7 == 0) echo 'x';?></td>
                <td class="border"><?php if ($act->criterio7 == 1) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio7 == 2) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio7 == 3) echo 'x'; ?></td>
                <td class="border"><?php if ($act->criterio7 == 4) echo 'x'; ?></td>
            </tr>
            <tr>
                <td id="obs" class="border" colspan="7" style="font-size: 80%;">
                <strong> Observaciones:</strong> <?= $act->observaciones ?><strong><hr color="black" width="97%"></strong><br>
                <strong style=" text-indent: 5px;">Valor numérico de la actividad <?php if ($act->tipo_actividad == 'CULTURAL') echo 'Cultural';
                if ($act->tipo_actividad == 'DEPORTIVA') echo 'Deportiva';
                if ($act->tipo_actividad == 'ACADEMICA') echo 'Academica';?></strong>: <strong><?= $act->valor_numerico ?></strong><br>
                <strong>Nivel de desempeño alcanzado de la actividad <?php if ($act->tipo_actividad == 'CULTURAL') echo 'Cultural';
                if ($act->tipo_actividad == 'DEPORTIVA') echo 'Deportiva';
                if ($act->tipo_actividad == 'ACADEMICA') echo 'Academica';?></strong>: <strong><?= $act->nivel ?></strong>
                </td><br>
                </tr><br><br>
        </tbody>

    </table>
</body>

</body>
</html>