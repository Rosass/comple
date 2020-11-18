<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de asistencia</title>
</head>
<style type="text/css">
table ,th,td{
    border:1px solid black;
    border-collapse:collapse;
}
h2 {
    text-align: center;
}
td {
    text-align: center;
}
</style>
<body>

    <div class="container box">
    <h3 align="center">Lista de Asistencia</h3>


<div class="container box">
<h3 align="center">Lista de ASSsistencia</h3>


    <h2>Lista de Asistencia</h2>
    <table style="width:100%">
    <thead>
    <tr> 
        <th>No</th>
        <th>No. CONTROL</th>
        <th>CARRERA</th>
        <th>NOMBRE DEL ALUMNO</th>
    </tr>
</thead>
<tbody>
<?php foreach($alumnos as $key => $lista) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $lista->num_control ?></td>
                                <td><?= $lista->carrera ?></td>
                               
                            </tr>
                        <?php endforeach ?>
</tbody>
</table><!--  -->

</body>
</html>
