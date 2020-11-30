<!DOCTYPE html>
<html lang="en">
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
      h4{
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
   </style>
   <body>
            <div>
                <img src="/public/img/sepp.jpg" />
                <img id="logo" src="/public/img/sepp.jpg" width="50" alt="Logo">
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'C:\xampp\htdocs\comple\public\img'?>"/>
            </div>

      <h4>INSTITUTO TECNOLÓGICO DE POCHUTLA</h4>
      <h5>ACTIVIDAD:</h5>
   
      <table style="width:100%">
         <thead>
            <tr>
               <th colspan="15">LISTA DE ASISTENCIA</th>
            </tr>
            <tr>
               <th>No</th>
               <th>No. CONTROL</th>
               <th>NOMBRE DEL ALUMNO</th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php foreach($alumnos as $key => $alumno) : ?>
            <tr>
               <th scope="row" style="font-size:80%; width: 4%;"><?= $key + 1 ?></th>
               <td style="width: 15%;font-size:85%;"><?= $alumno['num_control']?></td>
               <td class="a" style="text-align: left; width: 50%; font-size:80%;"><?= $alumno['ap_paterno'] . ' ' . $alumno['ap_materno'] .' '. $alumno['nombre']?></td>
               <td></td>
               <td></td>
               <td></td>
               <th></th>
               <th></th>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
      <!--  -->
   </body>
</html>