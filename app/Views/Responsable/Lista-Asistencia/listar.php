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
   </style>

</head>
   <body>
      <header>

         <table  style="width:100%">
            <tr>
               <th><?php
               $path = 'public/img/ISO.PNG'; 
               $type = pathinfo($path, PATHINFO_EXTENSION);
               $data = file_get_contents($path);
               $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
               ?>
               <img " style="width:8%; "  src="<?= $base64 ?>"></th>
               <th>Formato para Registro de Participantes de actividades complementarias</th>
               <th>Código: TecNM-VI-PO-003-01</th>
            </tr>
            <tr>
               <td></td>
               <td>Referencia a la Norma ISO 9001:2015: 8.1, 8.2.1, 8.2.2</td>
               <td>Revisión: 0</td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td>Página 2 de 2</td>
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
               <th scope="row" style="font-size:80%; width: 4%;"><?= $key + 1 ?></th>
               <td class="a" style="text-align: left; width: 50%; font-size:80%;"><?= $alumno['ap_paterno'] . ' ' . $alumno['ap_materno'] .' '. $alumno['nombre']?></td>
               <td style="width: 15%;font-size:85%;"><?= $alumno['num_control']?></td>
               <td><?= $alumno['carrera']?></td>
               <td><?= $alumno['semestre']?></td>
               <td></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
      <?php date_default_timezone_set('America/Mexico_city');
      $fecha = date("d");
      $fecha1 = date("Y");
      ?>
      <?php
      $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
      ?>
      
      <footer style="float: center;">
         <p style="font-size: 90%;">Lugar y fecha: San Pedro Pochutla a <?= $fecha ?> de <?php echo $meses[date('n')-1];?> del <?= $fecha1 ?></p>
         <div> 
            <p style="font-family: Montserrat; font-weight:800; font-size:10pt; text-align:center; margin-right:550px;  margin-top:55px;"><?php foreach($responsable as  $r) : ?> <strong><?= $r->nombre ?>  <?= $r->apaterno?> <?= $r->amaterno ?>  <?php endforeach ?><hr width="95%"> </strong> promotor cultural o deportivo</p> 
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:5px; text-align:center; margin-top:-99px;"><strong> <hr width="25%"></strong>jefe de oficina de promocion <br>Cultural o Deportiva </p>
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:470px; text-align:center; margin-top:-99px;"><strong> <hr width="70%"></strong> JEFE DE <?=  $act->nombre_area ?></p> 
            <p style="font-family: Montserrat;  font-size:10pt; text-align:center; margin-right:580px;  margin-top:20px;">TecNM-VI-PO-003-05</p>
            <p style=" font-family: Montserrat;  font-size:10pt;  margin-left:660px; text-align:center; margin-top:-190px;">Rev. 0</p>
         </div>
      </footer>

</body>
</html>