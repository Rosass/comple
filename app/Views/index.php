<div class="container-fluid contenedor-index">
    
    <div class="row justify-content-center mt-5 mb-4">
        <div class="col-md-12 text-center text-dark">
            <span class="h4">¿Cómo quieres iniciar sesión?</span>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-4 mt-3 mb-3">
            <a href="<?= base_url('alumno/login') ?>" class="text-decoration-none text-color-tec-red" target=”_blank”>
                <div class="card shadow p-2">
                    <div class="card-body d-flex justify-content-between align-items-center h5 mb-0 border-0">
                        <span><i class="fas fa-user-graduate"></i> ALUMNO</span>
                         <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 mt-3 mb-3">
            <a href="<?= base_url('login') ?>" class="text-decoration-none text-color-tec-red">
                <div class="card shadow p-2">
                    <div class="card-body d-flex justify-content-between align-items-center h5 mb-0">
                        <span><i class="far fa-building"></i> DIVISIÓN</span>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mt-3 mb-3">
            <a href="<?= base_url('login') ?>" class="text-decoration-none text-color-tec-red">
                <div class="card shadow p-2">
                    <div class="card-body d-flex justify-content-between align-items-center h5 mb-0">
                        <span><i class="far fa-building"></i> ÁREA</span> <i class="fas fa-chevron-right"></i>
                    </div>
                 </div>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 mt-3 mb-3">
           <a href="<?= base_url('profesor/login') ?>" class="text-decoration-none text-color-tec-red">
                <div class="card shadow p-2">
                    <div class="card-body d-flex justify-content-between align-items-center h5 mb-0">
                        <span><i class="fas fa-chalkboard-teacher"></i> RESPONSABLE</span> <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
           </a>
        </div>
    </div>
</div>