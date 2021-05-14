<?php $session = session(); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <!-- Mensajes de error -->
			<?php if($session->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
			<!-- Mensajes satisfactorios -->
			<?php if($session->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $session->getFlashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
			<?php endif ?>
            <div class="text-right">
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#nuevoUsuarioModal"><i class="fas fa-plus"></i> Nuevo Usuario</button>
            </div>
            <div class="table-responsive-sm text-center">
                <table class="table table-hover table-white table-striped shadow-lg" id="tablaUsuarios">
                    <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                        <tr>
                            <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">USUARIOS </h3></th>
                        </tr>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">USUARIO</th>                           
                            <th scope="col" class="border-top-0">TIPO</th>
                            <th scope="col" class="border-top-0">AREA</th>                            
                            <th scope="col" class="border-top-0">ESTATUS</th>
                            <th scope="col" class="border-top-0">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody class="text-center table-sm">
                        <?php foreach($usuarios as $key => $usuario) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $usuario->usuario ?></td>
                                <td><?= $usuario->tipo_usuario ?> </td>
                                <td><?= $usuario->nombre_area ?></td>
                                <td>
                                    <?php if( $usuario->estatus ) : ?>
                                        <span class="bg-success p-1 rounded small text-white">Activo</span>
                                    <?php else : ?>
                                        <span class="bg-danger p-1 rounded small text-white">Inactivo</span>
                                    <?php endif ?>
                                
                                </td>
                                <td style="width:10%;">
                                <div class="d-flex flex-column">
                                      <!--  Editar responsable-->
                                    <a class="btn btn-warning btn-sm btn-block mb-1" href="<?= base_url("admin/usuarios/editar/".$usuario->usuario) ?>"><i class="fas fa-pen"></i> Editar</a>
                                    <!-- Se podra¡ inhabilitar siempre que el tipo de usuario no sea ADMINISTRADOR -->
                                    <?php if ( $usuario->tipo_usuario !== 'ADMINISTRADOR' ):?>
                                        <?php if ( $usuario->estatus ) : ?>
                                            <form action="<?= base_url('admin/usuarios/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="usuario" value="<?= $usuario->usuario ?>">
                                                <button type="submit" class="btn btn-danger btn-sm btn-block btnEnviarFormulario"><i class="fas fa-ban"></i> Inhabilitar</button>
                                            </form>
                                        <?php else : ?>
                                            <form action="<?= base_url('admin/usuarios/cambiar-estatus') ?>" method="POST">
                                                <input type="hidden" name="usuario" value="<?= $usuario->usuario ?>">
                                                <button type="submit" class="btn btn-success btn-sm btn-block btnEnviarFormulario"><i class="fas fa-check"></i> Habilitar</button>
                                            </form>
                                        <?php endif ?>
                                    <?php endif;?>
								</div>
							    </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Responsable-->
<?= view("Admin/Usuarios/agregar"); ?>