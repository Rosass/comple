<html>

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Lista De Calificacion</title>
   </head>
   
      <style>
            /** Define the margins of your page **/
            @page {
               margin: 120px 35px;
            }

            header {
               position: fixed;
               top: -90px;
               left: 0px;
               right: 0px;
               height: 40px;
               margin-top: -26px;

                /** Extra personal styles **/
               text-align: center;
            }

            footer {
               position: fixed; 
               bottom: 0px; 
               left: 0px; 
               right: 0px;
               height:100px; 

                /** Extra personal styles **/
               text-align: center;
            }
            #div{
               float: left;
            }

            table,th,td{
               border: 1.5px solid black;
               border-collapse: collapse;

            }
            td,th{
            text-align: center;
         }
         td.a{
            text-indent: 10px;
         }
         h3{
            text-align: center;
         }
         th{
            font-size: 85%;
         }
         p,i.a{
            font-style: Arial;
         }
         p{
            font-size: 85%;
         }   
         #alto{
            height: 2.5%;
         }
         #m{
            margin-top: 15px;
         }
         #m2{
            margin-top: -88px;
         }
         #tabla2{
            margin: 99px 0px;
            min-height: 50px;
            max-height: 50pc;
         }
         
      </style>
   <body>
      <!-- Define header and footer blocks before your content -->
      <header>
            <table style="width:100%;">
               <tr >
                  <th rowspan="3" style="width:20%; height:auto;"> <?php
               $path = 'public/img/ISO.png'; 
               $type = pathinfo($path, PATHINFO_EXTENSION);
               $data = file_get_contents($path);
               $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
               ?>
               <img " style="width:50%; "  src="<?= $base64 ?>"></th>
                  <th class="border" style="width: 40%;" rowspan="2">Formato de Resultado de Actividades <?php foreach($actividad as  $a) : ?> <?php if ($a->tipo_actividad == 'DEPORTIVA') echo 'Cultural y/o Deportiva';
               if ($a->tipo_actividad == 'CULTURAL') echo 'Cultural y/o Deportiva';
               if ($a->tipo_actividad == 'ACADEMICA') echo 'ACADEMICA'; ?></th><?php endforeach ?>
                  <th>Código:TecNM-VI-PO-003-03</th>
               </tr>
               <tr>
                  <td style="width: 30%;">Revisión: 0</td>
               </tr>
               <tr>
                  <td style="width: 30%;">Referencia a la Norma ISO 9001:2015:8.1, 8.2.1, 8.2.2</td>
                  <td style="width: 30%;">Página</td>
               </tr>

            </table>
      </header>
      <footer>
         <div> 
            <?php date_default_timezone_set('America/Mexico_city');
            $fecha = date("d");
            $fecha1 = date("Y");
            ?>
            <?php
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            ?>
               <p style="font-size: 90%; text-align:left;">Lugar y fecha: San Pedro Pochutla a <?= $fecha ?> de <?php echo $meses[date('n')-1];?> del <?= $fecha1 ?></p>
            <?php foreach($areas as $ar) : ?>
               <p style="font-family: Montserrat; font-weight:800; font-size:10pt; text-align:center; margin-right:530px; margin-top:55px;"><?php foreach($actividad as  $act) : ?> <strong><?= $act->nombre_responsable ?>  <?= $act->apaterno?> <?= $act->amaterno ?> <hr width="98%"> </strong> promotor</p> <?php endforeach ?>
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-right:45px;  text-align:center; margin-top:-99px;"><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?> <hr width="36%"></strong>jefe de oficina de promocion <br><?php  if ( $ar->id_area == '2') echo ' Cultural o Deportiva';
            if ( $ar->id_area == '1') echo 'Academica';?> </p>
            <p style=" font-family: Montserrat; font-weight:800; font-size:10pt;  margin-left:482px;  text-align:center;  margin-top:-160px;"><strong><?= $ar->nombre_jefe ?> <?= $ar->apaterno_jefe?> <?= $ar->amaterno_jefe ?> <hr width="96%"></strong> Jefe de Departamento de <br> <?php
            if ( $ar->id_area == '2') echo ' Actividades Extraescolares';
            if ( $ar->id_area == '1') echo ' Ingenierias';?></p>
            <p style="font-family: Montserrat;  font-size:10pt; text-align:left; margin-right:550px;  " id="m">TecNM-VI-PO-003-03</p>
            <p style=" font-family: Montserrat;  font-size:10pt;  margin-left:690px; text-align:left;" id="m2">Rev. 0</p>
         </div>
         <?php endforeach ?> 
      </footer>
      <!-- Wrap the content of your PDF inside a main tag --> 
      <main>
      <div class="container">
               <?php foreach($areas as $ar) : ?>
                  <h5 style="text-align: center; margin-top:-17;">INSTITUTO TECNOLÓGICO DE POCHUTLA</h5>
                  <p style="text-align:center; font-size:70%; margin-top:-4;"><strong>SUBDIRECCION DE PLANEACIÓN Y VINCULACION</strong><br>
                  <strong><?=  $ar->nombre_area ?></strong><br> <?php endforeach ?>
                  <?php foreach($actividad as  $a) : ?> 
                  <strong >OFICINA DE PROMOCIÓN:</strong> <?= $a->tipo_actividad?><br>
                  <strong>ACTIVIDAD: </strong> <?= $a->nombre_actividad?></P>
               <?php endforeach ?>
               <table style="width:100%; font-size:90%; margin-top:0%;" id="tabla2" >
               <thead>
                  <tr>
                     <th>No</th>
                     <th>NOMBRE</th>
                     <th>CONTROL</th>
                     <th>CARRERA</th>
                     <th>SEM</th>
                     <th>RESULTADO</th>
                     <th>FIRMA DE ENTERADO</th>
                  </tr>
               </thead>
               <tbody >
               <?php foreach($alumnos as $key => $alumno) : ?>
               <tr>
                  <th id="alto" scope="row" style="font-size:80%; width: 4%;"><?= $key + 1 ?></th>
                  <td id="alto" class="a" style="text-align: left; width: 40%; font-size:80%;"><?= $alumno['ap_paterno'] . ' ' . $alumno['ap_materno'] .' '. $alumno['nombre']?></td>
                  <td id="alto" style="width: 15%;font-size:85%;"><?= $alumno['num_control']?></td>
                  <td id="alto"><?= $alumno['carrera']?></td>
                  <td id="alto"><?= $alumno['semestre']?></td>
                  <td id="alto" style="font-size:80%;"><?php
                        if ( $alumno['nivel_desempeno'] == 'Suficiente') echo 'ACREDITADO';
                        elseif ( $alumno['nivel_desempeno'] == 'Bueno') echo 'ACREDITADO';
                        elseif ( $alumno['nivel_desempeno'] == 'Notable') echo 'ACREDITADO';
                        elseif ( $alumno['nivel_desempeno'] == 'Excelente') echo 'ACREDITADO';
                        else if ( $alumno['nivel_desempeno'] == 'Insuficiente' ) echo 'NO ACREDITADO';
                     ?>
                  </td>
                  <td id="alto" style="width: 20%;"></td>
               </tr>
            <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
      </main><br><br>
   </body>
</html>