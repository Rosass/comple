<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lista Asistencia </title>
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
