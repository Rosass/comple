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
                <!-- Formulario para enviar al servidor -->
                <form action="<?= base_url("responsables/evaluacion/agregar") ?>" method="post">
                    <div class="table-responsive-sm text-center">
                        <table class="table     table-striped " id="tablaEvaluacion">
                            <thead class="justifi text-center">
                                <tr>
                                    <th scope="col" class="border-top-0">Nombre del Estudiante</th>
                                </tr>
                            </thead>
                            <tbody class="text-center table-sm">
                        <?php foreach($alumno as $a) : ?>
                            <tr>
                                <td><?= $a->nombre?> <?= $a->ap_materno?> <?= $a->ap_paterno?></td>
                            </tr>
                        <?php endforeach ?>
                        <input type="hidden" name="id_inscripcion" value="<?= $id_inscripcion ?>">
                        <input type="hidden" name="id_actividad" value="<?= $id_actividad ?>">
                    </tbody>

                        </table>
                        <table class="table table-hover  table-bordered table-light table-striped shadow-lg" id="tablaEvaluacion">
                            <thead class="bg-color-tec-blue border-top-0 table-sm text-center text-white">
                                <tr>
                                    <th scope="col" colspan="13" class="border-top-0 p-2"><h3 class="mb-0">Evaluacion de desempeño del criterio</h3></th>
                                </tr>
                                <tr>
                                    <th scope="col" class="border-top-0">No</th>
                                    <th scope="col" class="border-top-0">Criterios a evaluar</th>
                                    <th scope="col" class="border-top-0">insuficiente</th>
                                    <th scope="col" class="border-top-0">suficiente</th>
                                    <th scope="col" class="border-top-0">Bueno</th>
                                    <th scope="col" class="border-top-0">Notable</th>
                                    <th scope="col" class="border-top-0">Excelente</th>
                                    <th scope="col" class="border-top-0">criterio total</th>
                                </tr>
                            </thead>
                            <tbody class="text-center table-sm">
                                <tr id="radio1">
                                    <th scope="row">1</th>
                                    <td ><p>Cumple en tiempo y forma</p> las actividades
                                        encomendadas alcanzando los objetivos.
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="insuficiente" <?= old('radio1') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="suficiente" <?= old('radio1') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="bueno" <?= old('radio1') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="notable" <?= old('radio1') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="excelente" <?= old('radio1') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio2">
                                    <th scope="row">2</th>
                                    <td >Trabaja en equipo y se adapta a nuevas situaciones.</td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="insuficiente" <?= old('radio2') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="suficiente" <?= old('radio2') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="bueno" <?= old('radio2') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="notable" <?= old('radio2') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="excelente" <?= old('radio2') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio3">
                                    <th scope="row">3</th>
                                    <td > Muestra liderazgo en las actividades encomendadas.</td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="insuficiente" <?= old('radio3') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="suficiente" <?= old('radio3') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="bueno" <?= old('radio3') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="notable" <?= old('radio3') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="excelente" <?= old('radio3') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio4">
                                    <th scope="row">4</th>
                                    <td >Organiza su tiempo y trabaja de manera proactiva.</td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="insuficiente" <?= old('radio5') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="suficiente" <?= old('radio5') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="bueno" <?= old('radio5') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="notable" <?= old('radio5') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="excelente" <?= old('radio5') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio5">
                                    <th scope="row">5</th>
                                    <td >Interpreta la realidad y se sensibiliza aportando soluciones a <p> la problemática con la actividad Cultural y/o Deportiva.</p></td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="insuficiente" <?= old('radio5') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="suficiente" <?= old('radio5') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="bueno" <?= old('radio5') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="notable" <?= old('radio5') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="excelente" <?= old('radio5') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio6">
                                    <th scope="row">6</th>
                                    <td >Realiza sugerencias innovadoras para beneficio o <p>mejora del programa en el que participa.</p></td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="insuficiente" <?= old('radio6') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="suficiente" <?= old('radio6') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="bueno" <?= old('radio6') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="notable" <?= old('radio6') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="excelente" <?= old('radio6') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                                <tr id="radio7">
                                    <th scope="row">7</th>
                                    <td>Tiene iniciativa para ayudar en las actividades<p>encomendadas y muestra espiritu de servicio.</p></td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="insuficiente"  <?= old('radio7') == 'insuficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="suficiente"  <?= old('radio7') == 'suficiente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="bueno"  <?= old('radio7') == 'bueno' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="notable"  <?= old('radio7') == 'notable' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="excelente" <?= old('radio7') == 'excelente' ? 'checked='.'"'.'checked'.'"' : '' ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="valor">0</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                    <div class="form-group">
                        <label for="observaciónes">Observaciónes</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?= old("observaciones") ?></textarea>
                    </div>
                    <p id="calificacion">Calificación: </p>
                    <p id="nivel-desempeno">Nivel de desempeño alcanzado de la actividad: </p>

                    <button type="submit" class="btn btn-success">Enviar</button>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                        Ver ayuda
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="<?= base_url('public/img/logotec_blanco.png') ?>" alt="ayuda">
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        //IIFI
        (() => {
            /**
            * FEFERENCIAS DEL HTML
            */
            const radio1 = document.querySelector('#radio1');
            const radio2 = document.querySelector('#radio2');
            const radio3 = document.querySelector('#radio3');
            const radio4 = document.querySelector('#radio4');
            const radio5 = document.querySelector('#radio5');
            const radio6 = document.querySelector('#radio6');
            const radio7 = document.querySelector('#radio7');
            const calificacionHTML = document.querySelector('#calificacion');
            const nivelDesempenoHTML = document.querySelector('#nivel-desempeno');
            //
            let valuesObj = { radio1: 0, radio2: 0, radio3: 0, radio4: 0, radio5: 0, radio6: 0, radio7: 0};

            /**
            * Calcula y agrega la calificación en el parrafo
            */
            const agregaCalificacion = () => {
                const span = document.querySelector('.span-calificacion');
                const { radio1, radio2, radio3, radio4, radio5, radio6, radio7 } = valuesObj;
                let calificacion = (radio1 + radio2 + radio3 + radio4 + radio5 + radio6 + radio7);
                if ( span ) { span.remove() }

                let clase = ( calificacion < 1 ) ? 'text-danger' : 'text-success';

                const spanCalificacion = document.createElement('span');
                spanCalificacion.classList.add( clase, 'span-calificacion');
                spanCalificacion.textContent = ( calificacion / 7 ).toFixed(2);
                calificacionHTML.appendChild( spanCalificacion );
                nivelDesempeno();
            }

            /**
            * Calcula y agrega el nivel de desempeño al parrafo
            */
            const nivelDesempeno = () => {
                const span = document.querySelector('.span-desempeno');
                if ( span ) { span.remove() }
                const calificacion =  Number(document.querySelector('.span-calificacion').textContent);
                const spanDesempeno = document.createElement('span');
                let clase = ( calificacion < 1 ) ? 'text-danger' : 'text-success';
                spanDesempeno.classList.add(clase, 'span-desempeno');
                spanDesempeno.textContent = calculaDesempeno( calificacion );
                nivelDesempenoHTML.appendChild( spanDesempeno );
            }

            // Calculo del tipo de desempeño
            const calculaDesempeno = desempeno => {
                return ( desempeno < 1 ) ? 'Insuficiente' :
                        ( desempeno >=1 && desempeno < 1.50) ? 'Suficiente' :
                        ( desempeno >= 1.50 && desempeno < 2.50 ) ? 'Bueno' :
                        ( desempeno >= 2.50 && desempeno  < 3.50 ) ? 'Notable' :
                        ( desempeno >= 2.50 && desempeno <=4 ) ? 'Excelente' : 'Algo salió mal';
            }
            /**
            * Retorna el valor del criterio
            */
            const getValorCriterio = criterio => {
                let valor = 0;
                switch ( criterio ) {
                    case 'insuficiente': valor = 0;
                        break;
                    case 'suficiente': valor = 1;
                        break;
                    case 'bueno': valor = 2;
                        break;
                    case 'notable': valor = 3;
                        break;
                    case 'excelente': valor = 4;
                        break;
                    default: valor = 0;
                        break;
                }
                return valor;
            }

            /**
            * EVENTOS
            */
            radio1.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio1' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio1 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio2.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio2' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio2 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio3.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio3' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio3 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio4.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio4' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio4 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio5.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio5' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio5 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio6.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio6' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio6 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });
            radio7.addEventListener('click', function( e ) {
                if ( e.target.name === 'radio7' ) {
                    const valueRadio = getValorCriterio( e.target.value );
                    valuesObj.radio7 = valueRadio;
                    agregaCalificacion();
                    this.querySelector('.valor').textContent = valueRadio;
                }
            });

            
        })();
    </script>
</body>
</html>

