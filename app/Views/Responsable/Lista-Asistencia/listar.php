<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista de asistencia</title>
   </head>
   <style type="text/css">
      table ,th,td{
      border:1.5px solid black;
      border-collapse:collapse;
      }
      h3{
      text-align: center;
      }
      td, th {
      text-align: center;
      }
      td.a{
      text-indent: 10px;
      }
      th{
      font-size:85%;
      }
      p, i.a{
      font-style: Arial;
      }

      p{
      font-size:85%";
      }
      #piedepagina{
         width: 800px;
         position: absolute;
         bottom:0 !important;
         bottom: -1px;
      }
      #alto{
         height: 2.1%;
      }
   </style>

</head>
   <body>
      <header>

         <table  style="width:100%">
            <tr>
               <th rowspan="3"><?php
               $path = 'public/img/ISO.png'; 
               $type = pathinfo($path, PATHINFO_EXTENSION);
               $data = file_get_contents($path);
               $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
               ?>
               <img " style="width:8%; "  src="<?= $base64 ?>"></th>
               <th rowspan="2">Formato para Registro de Participantes de actividades<?php foreach($actividad as  $ar) : ?> <?php  if ( $ar->id_area == '1') echo 'Academica';
               if ( $ar->id_area == '2') echo 'Cultural y/o Deportiva';?></th><?php endforeach ?>
               <th>Código: TecNM-VI-PO-003-01</th>
            </tr>
            <tr>
               
               <td>Revisión: 0</td>
            </tr>
            <tr>
            <td>Referencia a la Norma ISO 9001:2015: 8.1, 8.2.1, 8.2.2</td>
               <td>Página 1</td>
            </tr>
         </table>
      <h4 style="text-align: center;">INSTITUTO TECNOLÓGICO DE POCHUTLA</h4>
      <p style="text-align:center; font-size:70%;"><strong>SUBDIRECCION DE PLANEACIÓN Y VINCULACION</strong><br>
      <?php foreach($actividad as  $act) : ?> 
      <strong><?=  $act->nombre_area ?></strong><br> 
      <strong >OFICINA DE PROMOCIÓN:</strong> <?= $act->tipo_actividad?><br>
      <strong>ACTIVIDAD: </strong> <?= $act->nombre_actividad?></P>
         <?php endforeach ?>
      </header>
      <table style="width:100%; font-size:90%;" >
         <thead>
            <tr>
               <th>No</th>
               <th>NOMBRE</th>
               <th>CONTROL</th>
               <th>ESP</th>
               <th>SEM</th>
               <th>OBSERVACIONES</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach($alumnos as $key => $alumno) : ?>
            <tr>
               <th id="alto" scope="row" style="font-size:80%; width: 4%;"><?= $key + 1 ?></th>
               <td id="alto" class="a" style="text-align: left; width: 50%; font-size:80%;"><?= $alumno['ap_paterno'] . ' ' . $alumno['ap_materno'] .' '. $alumno['nombre']?></td>
               <td id="alto" style="width: 15%;font-size:85%;"><?= $alumno['num_control']?></td>
               <td id="alto"><?= $alumno['carrera']?></td>
               <td id="alto"><?= $alumno['semestre']?></td>
               <td id="alto"></td>
            </tr>
            <?php endforeach ?>
         </tbody>
         <?php date_default_timezone_set('America/Mexico_city');
         $fecha = date("d");
         $fecha1 = date("Y");
         ?>
         <?php
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
         ?>
            <p style="font-size: 90%;">Lugar y fecha: San Pedro Pochutla a <?= $fecha ?> de <?php echo $meses[date('n')-1];?> del <?= $fecha1 ?></p>
      </table>
         <footer id="piedepagina">
         <div> 
         <p style="font-family: Montserrat; font-weight:800; font-size:10pt; text-align:center; margin-right:600px; margin-top:55px;"><?php foreach($responsable as  $act) : ?> <strong><?= $act->nombre ?>  <?= $act->apaterno?> <?= $act->amaterno ?> <hr width="93%"> </strong> promotor</p> <?php endforeach ?>
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-right:120px;  text-align:center; margin-top:-99px;"><?php foreach($actividad as  $ar) : ?><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?> <hr width="38%"></strong>jefe de oficina de promocion <br><?php  if ( $ar->id_area == '2') echo 'Cultural o Deportiva';
            if ( $ar->id_area == '1') echo 'Academica';?> </p>
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:420px;  text-align:center;  margin-top:-160px;"><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?> <hr width="68%"></strong> Jefe de Departamento de <br> <?php
            if ( $ar->id_area == '2') echo ' Actividades Extraescolares';
            if ( $ar->id_area == '1') echo ' Ingenierias';?></p> <br><br><br><br>
            <p style="font-family: Montserrat;  font-size:10pt; text-align:left; margin-right:550px;  margin-top:20px;">TecNM-VI-PO-003-01</p>
            <p style=" font-family: Montserrat;  font-size:10pt;  margin-left:690px; text-align:left; margin-top:-400px;">Rev. 0</p>
            <?php endforeach ?>
         </div>
      </footer>

</body>
</html>