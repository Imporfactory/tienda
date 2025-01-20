<?php include 'Views/templates/header3.php'; ?>


    <header class="py-3 py-md-5">
        <div class="container my-3 my-md-4">
            <h2 class="display-4">Reservar una cita</h2>
            <p class="d-inline-flex gap-1">
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    ¿Cómo reservar una cita?
                </a>
            </p>

            <div class="collapse mb-3" id="collapseExample">
                <div class="">
                    <div class="alert alert-info" role="alert">
                        <strong>Cómo reservar una cita:</strong><br>
                        1. <strong>Elige una fecha:</strong> Selecciona el día en el calendario para tu cita.<br>
                        2. <strong>Selecciona una hora:</strong> Las horas disponibles aparecerán después de elegir la
                        fecha. Las horas en rojo ya están reservadas.<br>
                        3. <strong>Completa el formulario:</strong> Ingresa tu nombre, teléfono y correo
                        electrónico.<br>
                        4. <strong>Confirma la cita:</strong> Revisa tus datos y haz clic en "Reservar Cita". Recibirás
                        una confirmación por correo.<br>
                        5. <strong>Limpiar el formulario:</strong> Si necesitas empezar de nuevo, haz clic en "Limpiar".
                    </div>
                </div>
            </div>


            <div class="row">


                <div class="col-md-8">
                    <div class="contenedor-calendario mb-3">
                        <div class="cabecera-calendario">
                            <button class="btn btn-primary btn-sm" id="mesAnterior">Anterior</button>
                            <h3 class="mb-0 fs-5" id="mesAno"></h3>
                            <button class="btn btn-primary btn-sm" id="mesSiguiente">Siguiente</button>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Lun</th>
                                    <th>Mar</th>
                                    <th>Mié</th>
                                    <th>Jue</th>
                                    <th>Vie</th>
                                    <th>Sáb</th>
                                    <th>Dom</th>
                                </tr>
                            </thead>
                            <tbody id="cuerpoCalendario">
                            </tbody>
                        </table>

                        <h4 class="mt-4">Horas Disponibles</h4>

                        <ul class="horas-reservadas list-group list-group-flush" id="listaHoras">
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="contenedor-calendario">
                        <h4>Formulario de Reserva</h4>
                        <form id="formularioDatos" class="mt-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombreUsuario" placeholder="Tu nombre"
                                    required>
                                <label for="nombreUsuario">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="telefonoUsuario" placeholder="Tu teléfono"
                                    required>
                                <label for="telefonoUsuario">Teléfono</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="correoUsuario" placeholder="Tu correo"
                                    required>
                                <label for="correoUsuario">Correo electrónico</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" id="fechaSeleccionada" placeholder="Fecha Seleccionada"
                                    class="form-control" readonly value="Selecciona una fecha">
                                <label for="fechaSeleccionada">Fecha seleccionada</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="horaSeleccionada"
                                    placeholder="Hora seleccionada" readonly required value="Selecciona una hora">
                                <label for="horaSeleccionada">Hora seleccionada</label>
                            </div>




                            <div class="d-flex gap-3">
                                <button type="submit" class="btn btn-primary w-100">Reservar Cita</button>
                                <button type="button" class="btn btn-secondary w-100" id="limpiarDatos">Limpiar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <script src="Views/templates/js/main_header3.js"></script>
    <script src="Views/templates/js/citas_p3.js"></script>


<?php include 'Views/templates/footer3.php'; ?>