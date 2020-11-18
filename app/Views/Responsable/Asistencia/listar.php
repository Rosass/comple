

<!-- Modal Agregar Responsable-->

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
    <h2>Lista de Asistencia</h2>
    <table style="width:100%">
    <thead>
    <tr> 
        <th>No</th>
        <th>No. CONTROL</th>
        <th>NOMBRE DEL ALUMNO</th>
        <th>CARRERA</th>
    </tr>
</thead>
<tbody>

            <?php foreach($alumnos as $key => $alumno) : ?>                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $alumno['num_control'] ?></td>
                                <td><?= $alumno['nombre'] . ' ' . $alumno['ap_materno'] .' '. $alumno['ap_paterno']?></td>
                                <td><?= $alumno['carrera'] ?></td>
                              
                            </tr>
            <?php endforeach ?>
</tbody>
</table><!--  -->

</body>
</html>