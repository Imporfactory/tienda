const nombresMeses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        let mesActual = new Date().getMonth();
        let anoActual = new Date().getFullYear();
        let diaSeleccionado = null;
        let horaSeleccionada = null;
        let horasReservadas = {
            "2024-10-15": ["10:00", "14:00"],
            "2024-10-17": ["09:00", "13:00", "16:00"]
        }; // Ejemplo de horas reservadas

        document.addEventListener('DOMContentLoaded', () => {
            renderizarCalendario(mesActual, anoActual);

            document.getElementById('mesAnterior').addEventListener('click', () => cambiarMes(-1));
            document.getElementById('mesSiguiente').addEventListener('click', () => cambiarMes(1));

            document.getElementById('formularioDatos').addEventListener('submit', (e) => {
                e.preventDefault();
                if (diaSeleccionado && horaSeleccionada) {
                    alert("¡Cita reservada con éxito!");
                    actualizarHorasReservadas();
                    limpiarFormulario();
                } else {
                    alert("Por favor seleccione una fecha y una hora.");
                }
            });
        });

        function renderizarCalendario(mes, ano) {
            const primerDia = new Date(ano, mes, 1).getDay() || 7;
            const diasEnMes = new Date(ano, mes + 1, 0).getDate();
            const hoy = new Date();

            document.getElementById('mesAno').textContent = `${nombresMeses[mes]} ${ano}`;
            const cuerpoCalendario = document.getElementById('cuerpoCalendario');
            cuerpoCalendario.innerHTML = "";

            let fila = document.createElement('tr');
            for (let i = 1; i < primerDia; i++) {
                const celda = document.createElement('td');
                fila.appendChild(celda);
            }

            for (let dia = 1; dia <= diasEnMes; dia++) {
                if (fila.children.length === 7) {
                    cuerpoCalendario.appendChild(fila);
                    fila = document.createElement('tr');
                }

                const celda = document.createElement('td');
                celda.textContent = dia;
                celda.addEventListener('click', () => seleccionarDia(celda, dia));

                if (dia === hoy.getDate() && mes === hoy.getMonth() && ano === hoy.getFullYear()) {
                    celda.classList.add('hoy');
                }

                fila.appendChild(celda);
            }
            cuerpoCalendario.appendChild(fila);
        }

        function seleccionarDia(celda, dia) {
            if (diaSeleccionado) {
                diaSeleccionado.classList.remove('seleccionado');
            }
            diaSeleccionado = celda;
            diaSeleccionado.classList.add('seleccionado');

            const fechaSeleccionada = `${anoActual}-${String(mesActual + 1).padStart(2, '0')}-${String(dia).padStart(2, '0')}`;

            // Mostrar la fecha seleccionada en el input
            document.getElementById('fechaSeleccionada').value = fechaSeleccionada;

            mostrarHoras(fechaSeleccionada);
        }


        function mostrarHoras(fecha) {
            const listaHoras = document.getElementById('listaHoras');
            listaHoras.innerHTML = '';

            const horas = horasReservadas[fecha] || [];
            const horasDia = ["09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00"];

            horasDia.forEach(hora => {
                const li = document.createElement('li');
                li.textContent = hora;

                if (horas.includes(hora)) {
                    li.classList.add('reservada');
                    li.textContent += ' - Reservada';
                } else {
                    li.classList.add('disponible');
                    li.addEventListener('click', () => seleccionarHora(li, hora));
                    li.textContent += ' - Disponible';
                }

                listaHoras.appendChild(li);
            });
        }

        function seleccionarHora(li, hora) {
            const horasLista = document.querySelectorAll('.horas-reservadas li');
            horasLista.forEach(item => item.classList.remove('seleccionada'));
            li.classList.add('seleccionada');
            horaSeleccionada = hora;
            document.getElementById('horaSeleccionada').value = horaSeleccionada;
        }

        function cambiarMes(cambio) {
            mesActual += cambio;
            if (mesActual < 0) {
                mesActual = 11;
                anoActual--;
            } else if (mesActual > 11) {
                mesActual = 0;
                anoActual++;
            }
            renderizarCalendario(mesActual, anoActual);
        }


        function actualizarHorasReservadas() {
            if (diaSeleccionado) {
                const diaSeleccionadoTexto = diaSeleccionado.textContent;
                const fechaSeleccionada = `${anoActual}-${String(mesActual + 1).padStart(2, '0')}-${String(diaSeleccionadoTexto).padStart(2, '0')}`;
                if (!horasReservadas[fechaSeleccionada]) {
                    horasReservadas[fechaSeleccionada] = [];
                }
                horasReservadas[fechaSeleccionada].push(horaSeleccionada);
                horasReservadas[fechaSeleccionada] = [...new Set(horasReservadas[fechaSeleccionada])];
                mostrarHoras(fechaSeleccionada);
            }
        }

        document.getElementById('limpiarDatos').addEventListener('click', () => {
            limpiarFormulario();
            if (diaSeleccionado) {
                diaSeleccionado.classList.remove('seleccionado');
                diaSeleccionado = null;
            }
            // Limpiar horas reservadas
            document.getElementById('listaHoras').innerHTML = '';
        });
        function limpiarFormulario() {
            document.getElementById('nombreUsuario').value = '';
            document.getElementById('telefonoUsuario').value = '';
            document.getElementById('correoUsuario').value = '';
            document.getElementById('horaSeleccionada').value = 'Selecciona una hora'; // Valor por defecto
            document.getElementById('fechaSeleccionada').value = 'Selecciona una fecha'; // Valor por defecto
            horaSeleccionada = null;

            // Limpiar selección de días en el calendario
            if (diaSeleccionado) {
                diaSeleccionado.classList.remove('seleccionado');
                diaSeleccionado = null;
            }

            // Limpiar selección de horas
            document.querySelectorAll('.horas-reservadas .seleccionada').forEach(li => li.classList.remove('seleccionada'));

            // Limpiar el contenido de la lista de horas
            const listaHoras = document.getElementById('listaHoras');
            listaHoras.innerHTML = '';
        }