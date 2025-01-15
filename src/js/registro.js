import Swal from "sweetalert2";

(function(){
    let eventos = [];
    const resumen = document.getElementById('registro-resumen');
    if(resumen){
        const eventosBoton = document.querySelectorAll('.evento__agregar');
        eventosBoton.forEach(boton=> boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.getElementById('registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();   
        
        function seleccionarEvento(e){
            if(eventos.length<5){

                e.target.disabled = true;
                eventos = [...eventos,{
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('H4').textContent.trim()
                }]
            }else{
                Swal.fire({
                    title: 'Error',
                    text: '5 Eventos Maximo',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
            //desabilitar evento


            mostrarEventos();
        }

        function mostrarEventos(){
            //Limpiar para que no se repitan los eventos seleccionados anteriormente
            limpiar()
            if(eventos.length > 0){
                eventos.forEach(evento =>{
                    const eventoDOM = document.createElement('DIV');
                    eventoDOM.classList.add('registro__evento');

                    const titulo = document.createElement('H3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = '<i class="fa-solid fa-trash"></i>'

                    botonEliminar.onclick = function(){
                        eliminarEvento(evento.id);
                    }


                    //agregar al html
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);


                })
            }else{
                const sinRegistros = document.createElement('P');
                sinRegistros.textContent = 'No hay eventos seleccionados, añade un maximo de 5 eventos';
                sinRegistros.classList.add('registro__texto');
                resumen.appendChild(sinRegistros);
            }
        }

        function eliminarEvento(id){
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();

        }

        function limpiar(){
            while(resumen.firstChild){
                resumen.removeChild(resumen.firstChild);
            }
        }

        async function submitFormulario(e){
            e.preventDefault();
            const regaloId = document.getElementById('regalo').value;
            
            const eventosId = eventos.map(evento => evento.id);
            
            

            //Validar seleccion de regalo

            if(eventosId.length === 0 || regaloId === ''){
                Swal.fire({
                    title: 'Error',
                    text: 'Debes elegir minimo un Evento y un Regalo ',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
                return;
            }

            //Objeto de form data
            const datos = new FormData();
            datos.append('eventos',eventosId);
            datos.append('regalo_id',regaloId);

            const url = '/finalizar-registro/conferencias';
            const respuesta = await fetch(url,{
                method: 'POST',
                body:datos
            })



            const resultado = await respuesta.json()
            if(resultado.resultado){
                Swal.fire({
                    title: 'Registro Exitoso',
                    text: 'Tus conferencias se guardaron correctamente te esperamos en DevWebCamp',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => location.href = `/boleto?id=${resultado.token}`);
            }else{
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al guardar tus datos',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(()=> location.reload());
            }

        }
    }
    
})();