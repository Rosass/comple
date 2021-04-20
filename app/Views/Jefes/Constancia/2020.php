<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia Parcial</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;800&display=swap" rel="stylesheet">
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
        font-size: 9.3pt;
        float: none;
    }
    #regular{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 8pt;
        float: none;
    }
    #light{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 300;
        font-size: 7pt;
        float: none;
    }
    #regular8{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 7pt;
    }
    #medium{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 9pt;
    }
    #medium8{
        
        font-family: 'Montserrat', sans-serif;
        font-weight: 500;
        font-size: 8pt;
    }
    #extrabold{
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        font-size: 10pt;
    }
    #extralight{
        font-family: 'Montserrat', sans-serif;
        font-weight: 200;
        font-size: 9pt;
    }

    #watermar{
        position: fixed;

        bottom: 26cm;
        left: -5cm;
        width: 990px;
        opacity: 0.08;
        z-index: -1000;
    }

    #tabla{
	
	width: 100%; /* hacemos que la cabecera ocupe el ancho completo de la página */
	top: 0; /* Posicionamos la cabecera pegada arriba */
	position: fixed;/* Hacemos que la cabecera tenga una posición fija */
}
</style>
</head>
<body>
<?php
    $path = 'public/img/logonew.png'; 
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<img " style="width:80%;"  src="<?= $base64 ?>">

<?php date_default_timezone_set('America/Mexico_city');
    $fecha = date("d/");
    $fecha1 = date("Y");
?>
<?php
$meses = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");

?>
<?php foreach($areas as $ar) : ?>
    <p style="margin-left:549px; float:none; margin-top:1px; text-align:justify;" id="regular"><strong>Instituto Tecnológico de Pochutla</strong></p>
    <p style="margin-left:549px; float:none; margin-top:1px; text-align: justify;" id="regular8"><?php  if ( $ar->id_area == '2') echo 'Subdirección de Planeación y Vinculación'?></p>
    <p style="margin-left:379px; float:none; text-align:justify;" id="light"><?php  if ( $ar->id_area == '2') echo 'DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES'?> <?php
        if ( $ar->id_area == '2') echo '(Formación Integral)';
    ?></p>
    <P  style="margin-left:560px; float:none; text-align:justify;" id="light"><?php  if ( $ar->id_area == '1') echo 'DEPARTAMENTO DE INGENIERIAS'?></P><br>
<p style="text-align: center;"><?php foreach($actividad as $act) : ?><?= $act->frase_decreto ?><?php endforeach; ?></p><br>
    <p style=" text-align:right;" id="medium text-align:justify;" >San Pedro Pochutla, Oax.,<?= $fecha ?><?php echo $meses[date('n')-1];?>/<?= $fecha1 ?></p><p style="font-size:70%;  margin-left:417px; text-align: justify;" id="medium""><?php  if ( $ar->id_area == '2') echo 'DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES'?></p>
    <p style="font-size:70%;  margin-left:530px; text-align: justify;" id="medium""><?php  if ( $ar->id_area == '1') echo 'DEPARTAMENTO DE INGENIERIAS'?></p>  
    <p  style=" margin-left:540px; text-align: justify;" id="medium"><strong> Folio:</strong> 
    <?php
            if ( $ar->id_area == '2') echo '11V.1.1.4.0.0/EXT/';
            if ( $ar->id_area == '1') echo '11V.0.0.0.0.0/ING/';
            
        ?><?=  $folio  ?>/<?= $fecha1 ?></p><br>

    <p style="text-align:center; margin-top:-5px;" id="medium"><strong>CONSTANCIA DE CUMPLIMIENTO DE ACTIVIDADES COMPLEMENTARIAS</strong></p><br>
    <div id="extrabold" >
    <P><strong>ALBERTO SALINAS SÁNCHEZ </strong><br/>
    <strong>JEFE(A) DEL DEPARTAMENTO DE SERVICIOS ESCOLARES  </strong><br><strong>P R E S E N T E</strong></P></div><br>

        <div id="letra">
            <P style ="text-align:center; text-align:justify; ">El que suscribe <strong><u><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?></u></strong>,<?php endforeach; ?> por este medio se permite hacer de su conocimiento que el (la) estudiante  <?php foreach ( $alumno as $a ):?> <strong><u><?= $a->nombre?> <?=$a->ap_paterno?>
                <?=$a->ap_materno?></u></strong>, con número de control
            <strong><u><?= $control?></u></strong> de la carrera de <strong><u><?php
                    if ( $a->carrera == 'ISC') echo 'INGENIERIA EN SISTEMAS COMPUTACIONALES';
                    if ( $a->carrera == 'ICI') echo 'INGENIERIA CIVIL';
                    if ( $a->carrera == 'IGE') echo 'INGENIERIA EN GESTION EMPRESARIAL';
                ?></u></strong>, <?php endforeach; ?> ha cumplido su actividad  <?php foreach($actividad as $act) : ?> <strong><u><?= $act->tipo_actividad ?></u></strong>: <strong><u><?= $act->actividad ?></u></strong> con el nivel de desempeño<strong>
            <u><?= $act->nivel ?></u></strong> y un valor numérico de <strong><u><?= $act->valor_numerico ?></u></strong> durante el periodo escolar <strong><u><?= $act->periodo_descripcion ?></u></strong> con un valor curricular de <strong><u><?= $act->credito ?></u></strong> <?php
                    if ( $act->credito == 1) echo 'crédito.';
                    if ( $act->credito == 2) echo 'créditos.'; ?> </P> <br>

            
                <?php endforeach ?>
                <?php date_default_timezone_set('America/Mexico_city');
                $date = date("d");
                $date1 = date("Y")
                ?>

            <p style="text-align: justify;">Se extiende la presente en la <strong><u>Cd. de San Pedro Pochutla</u></strong> a los<strong><u> <?=$date?> </u></strong> dias del mes de  <strong><u><?php echo $meses[date('n')-1];?></u></strong> del <?=$date1?>.</p></div><br/><br><br><br><br>
        </div>
<P style=" text-align:center;" id="extrabold"><strong>A T E N T A M E N T E</strong><br/>
<strong style =" font-style:italic;" id="extralight">"Excelencia en Educación Tecnológica"</strong><br/></P><br/><br><br>

<div>
    <p style="text-align:center; margin-right:430px;  margin-top:58px; " id="extrabold"><strong><?= $act->nombre_responsable ?>  <?= $act->apaterno?> <?= $act->amaterno ?><hr color="black" size="2.3"></strong>
    NOMBRE Y FIRMA DEL (DE LA) RESPONSABLE</p>
    <p style="margin-left:430px; text-align:center; margin-top:-99px; " id="extrabold"><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?><hr color="black" size="2.3"></strong>JEFE(A) DEL <?=  $ar->nombre_area ?></p>
</div><br>

<p id="medium8">C.c.p. Jefe (a) de Departamento Correspondiente <br> estudiante.</p><br><br>
<footer id="piedepagina">
    <div>
        <p style="margin-top:-18px;" id="medium8">TecNM-VI-PO-003-05 <strong style="margin-left:110px;">Esta constancia es oficial y la puede validar en: https://constancias.pochutla.tecnm.mx/</strong></p>
        <p style="margin-left:650px; text-align:center; margin-top:-900%;" id="medium8">Rev. 0</p>
    </div>
    <div>

<?php
        $path = 'public/img/logotec.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
<img  style="width:9%;" align="left" src="<?= $base64 ?>">
<div >
        <?php
                $path = 'public/img/s.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
        <img  style=" width:13%;" align="left" src="<?= $base64 ?>">
    </div>
<div >
        <?php
                $path = 'public/img/3logos.jpeg';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
        <img  style=" width:18%;" align="left" src="<?= $base64 ?>">
    </div>
    <div >
            <?php
                    $path = 'public/img/d.png';
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
            <img  style=" width:13%;" align="right" src="<?= $base64 ?>">
        </div>
<p style=" text-align:center; text-align:justify; font-size:85%;">k.m 5.35 Carretera San Pedro Pochutla-Puerto Ángel, Localidad El Colorado, C.P. 70902, San Pedro Pochutla, Oaxaca. Tel. 01 (958) 5878050. e-mail: dir pochutla@tecnm.mx</p>

        <?php
                $path = 'public/img/hr.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
        <img  style=" width:80%;" align="right" src="<?= $base64 ?>">
    </div>
</div>
</footer>

</div> <br><br><br><br><br><br><br>

<!-- tabla de calificacion -->
    <table id="tabla"  class="border tabla-border ">
        <tr >
        <th class="border" rowspan="3" style="width:36%;"><?php
            $path = 'public/img/ISO.png'; 
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            ?>
            <img " style="width:42%;  height:88px; "  src="<?= $base64 ?>">
        </th>
            <th rowspan="2" class="border" style="width:37%;">Evaluación al desempeño de la actividad Promoción <?php if ($act->tipo_actividad == 'DEPORTIVA') echo 'Cultural y/o Deportiva';
                if ($act->tipo_actividad == 'CULTURAL') echo 'Cultural y/o Deportiva';
                if ($act->tipo_actividad == 'ACADEMICA') echo 'Academica'; ?></th>
            <th class="border" style="width:36%;">Código: TecNM-VI-PO-003-04</th>
        </tr>
        <tr>
            
            <td class="border" style="width:36%;" >Revisión: 0</td>
        </tr>
        <tr>
        <td class="border">Referencia a la Norma ISO 9001:2015: 8.1, 8.2.1, 8.2.2</td>
            <td class="border" style="width:36%;">Página </td>
        </tr>
    </table><br><br><br><br><br><br>
    
    <p style="text-align: center;"><strong> INSTITUTO TECNOLÓGICO DE POCHUTLA</strong><br>
    <strong style="text-align:center; font-size:70%;">SUBDIRECCION DE PLANEACIÓN Y VINCULACION</strong><br></p><br>
    
    <p style="font-size: 80%; text-align:center;"> <strong> <?=  $ar->nombre_area ?> <br> OFICINA DE PROMOCIÓN <?php foreach($actividad as $act) : ?> <strong><u><?= $act->tipo_actividad ?></u></strong></strong></p><br>
        
        <p style="font-size: 80%; text-align:justify;"><strong>Nombre del estudiante: <?php foreach ( $alumno as $a ):?> <strong><u><?= $a->nombre?> <?=$a->ap_paterno?> <?=$a->ap_materno?><?php endforeach ?></strong><br>
            <strong>Actividad:<strong><u><?= $act->actividad ?></u></strong><br>
            <strong>Periodo de realización:<strong><strong><u><?= $act->periodo_descripcion ?></u></strong></p><br>
            <?php endforeach ?>
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
</html>