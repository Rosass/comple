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
                <form action="" method="post">
                    <div class="table-responsive-sm text-center">
                        <table class="table     table-striped " id="tablaEvaluacion">
                            <thead class="justifi text-center">
                                <tr>
                                    <th scope="col" class="border-top-0">Nombre del Estudiante</th>
                                </tr>
                            </thead>     
                            <tbody class="text-center table-sm">
                        <?php foreach($alumnos as $key => $alumno) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $alumno['nombre'] . ' ' . $alumno['ap_materno'] .' '. $alumno['ap_paterno']?></td>                                                          
                                
                            </tr>
                        <?php endforeach ?>
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
                                            <input type="radio" name="radio1" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio1" value="excelente">
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
                                            <input type="radio" name="radio2" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio2" value="excelente">
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
                                            <input type="radio" name="radio3" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio3" value="excelente">
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
                                            <input type="radio" name="radio4" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio4" value="excelente">
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
                                            <input type="radio" name="radio5" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio5" value="excelente">
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
                                            <input type="radio" name="radio6" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio6" value="excelente">
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
                                            <input type="radio" name="radio7" value="insuficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="suficiente">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="bueno">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="notable">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <label class="container">
                                            <input type="radio" name="radio7" value="excelente">
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
                        <textarea class="form-control" id="observaciónes" name="observaciónes" rows="3"></textarea>
                    </div>
                    <p id="calificacion">Calificación: </p>
                    <p id="nivel-desempeno">Nivel de desempeño alcanzado de la actividad: </p>
                    
                    <button type="submit" class="btn btn-primary">Enviar</button>
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
                spanCalificacion.classList.add( clase, 'span-calificacion' );
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

