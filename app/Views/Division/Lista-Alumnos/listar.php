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
                     <img  style="width:37%; margin-left: 40px;" src="<?= $base64 ?>">
                  
                  
                     <?php
                     $path = 'public/img/logotec.png';
                     $type = pathinfo($path, PATHINFO_EXTENSION);
                     $data = file_get_contents($path);
                     $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                     ?>
                     <img  style="width:10%; margin-left:8%;" src="<?= $base64 ?>">
         </div>

      
      <h3>INSTITUTO TECNOLÓGICO DE POCHUTLA</h3>
      <p>
      <strong>ACTIVIDAD: </strong> <?php foreach($actividad as  $a) : ?> 
         <?= $a->nombre_actividad?>
         <?php endforeach ?><br>
      <i class="a"> <strong>PERIODO: </strong>  <?php foreach($actividad as $a) : ?> 
         <?= $a->descripcion?> </i>
         <?php endforeach ?> <br>
      <i class="a"> <strong>ALUMNOS: </strong><?= Count($alumnos)?> </i> </p>
      <table style="width:100%;margin: 0 auto;"">
         <thead>
            <tr>
               <th colspan="6">LISTA DE ASISTENCIA</th>
            </tr>
            <tr>
               <th>No</th>
               <th>No. CONTROL</th>
               <th>NOMBRE DEL ALUMNO</th>
               <th>CARRERA</th>
               <th>SEMESTRE</th>
               <th>TELEFONO</th> 
            </tr>
         </thead>
         <tbody>
            <?php foreach($alumnos as $key => $alumno) : ?>
            <tr>
               <th scope="row" style="font-size:80%; width: 4%;"><?= $key + 1 ?></th>
               <td style="width: 15%;font-size:85%;"><?= $alumno['num_control']?></td>
               <td class="a" style="text-align: left; width: 50%; font-size:80%;"><?= $alumno['ap_paterno'] . ' ' . $alumno['ap_materno'] .' '. $alumno['nombre']?></td>
               <td style="width: 13%;font-size:85%;"><?= $alumno['carrera']?></td>
               <td style="width: 13%;font-size:85%;"><?= $alumno['semestre']?></td>
               <td style="width: 13%;font-size:85%;"><?= $alumno['telefono']?></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
      <!--  -->
   </body>
</html>