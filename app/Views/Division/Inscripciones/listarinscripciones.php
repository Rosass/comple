<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista De Alumnos</title>
   </head>
   <style type="text/css">
      table ,th,td{
      border:1.6px solid black;
      border-collapse:collapse;
      }
      td, th {
      text-align: center;
      }
      th{
      font-size:85%;
      }
      th.a{
      padding: 10px;
      }
       th.a {
      background-color: #99ccff;
      }
   </style>

</head>
   <body>
      <table style="width:50%;margin: 0 auto;">
         <thead>
            <tr>
               <th class="a" >No</th>
               <th class="a" >No. CONTROL</th>
               <th class="a" >CARRERA</th>
               <th class="a" >ACTIVIDAD</th>
               <th class="a" >CREDITOS</th> 
            </tr>
         </thead>
         <tbody>
            <?php foreach($inscripciones as $key => $i) : ?>
            <tr>
               <th scope="row" style="font-size:80%; height: 50%; width: 5%;"><?= $key + 1 ?></th>
               <td style="width: 17%;"><?= $i->num_control ?></td>
               <td style="width: 12%;"><?= $i->carrera ?></td>
               <td style="width: 45%;"><?= $i->nombre_actividad ?></td>
               <td style="width: 12%;"><?= $i->creditos ?></td>
            </tr>
            <?php endforeach ?>
         </tbody>
      </table>
   </body>
</html>