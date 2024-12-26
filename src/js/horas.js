(function(){


    const horas = document.querySelector('#horas');

    if(horas){

        let busqueda = {
            categoria_id:'',
            dia:''
        }

        const categoria = document.querySelector('[name="categoria_id"]')
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');
        
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda))
        categoria.addEventListener('change',terminoBusqueda);
        
        
        function terminoBusqueda(e){
            busqueda[e.target.name] = e.target.value;

            //REINICIAR campos ocultos y selector de horas
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';

            if(Object.values(busqueda).includes('')){//Buscar si algun valor del objeto busqeuda esta vacio
                desActivarCampo();
                return;

            }

            buscarEventos();
        }

        async function buscarEventos(){

            const {dia, categoria_id} = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
            
            const resultado = await fetch(url)
            const eventos = await resultado.json();
            
           
            obtenerHorasDisponibles(eventos);

        }

        function obtenerHorasDisponibles(eventos){
            //reINICIAR LAS HORAS 
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--desactivada'))
            activarCampo();


            //Comprobar eeventos ya tomados 
            const horasTomadas = eventos.map(eventos=>eventos.hora_id);
            const listadoHorasArray = Array.from(listadoHoras);
            const resultado =listadoHorasArray.filter(li => !horasTomadas.includes(li.dataset.horaId));
            
            resultado.forEach(li => li.classList.remove('horas__hora--desactivada'));
            
            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--desactivada)');
            horasDisponibles.forEach(hora => !hora.addEventListener('click',seleccionarHora));
        }

        function seleccionarHora(e){

            //deshabilitar hora previa , si hay un nuevo click
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if(horaPrevia){
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }
            //Agregar clase de seleccionado
            e.target.classList.add('horas__hora--seleccionada')
            inputHiddenHora.value = e.target.dataset.horaId;

            //LLenar el campo oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
            
        }

        function activarCampo(){
            campoParaActivado = document.querySelector('.formulario__campo--desactivado');
            if(campoParaActivado){
                campoParaActivado.classList.remove('formulario__campo--desactivado');
                
                campoParaActivado.classList.add('formulario__campo--activado');
            }


        }
        function desActivarCampo(){
            campoDesactivar = document.querySelector('#horas');
            if(campoDesactivar){
                campoDesactivar.classList.add('formulario__campo--desactivado');
                
                campoDesactivar.classList.remove('formulario__campo--activado');
            }


        }
    }

})();