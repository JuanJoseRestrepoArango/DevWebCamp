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

            if(Object.values(busqueda).includes('')){//Buscar si algun valor del objeto busqeuda esta vacio
                return;
            }

            buscarEventos();
        }

        async function buscarEventos(){

            const {dia, categoria_id} = busqueda;
            const url = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;
            
            const resultado = await fetch(url)
            const eventos = await resultado.json();
            

            obtenerHorasDisponibles();

        }

        function obtenerHorasDisponibles(){
            const horasDisponibles = document.querySelectorAll('#horas li');
            
            horasDisponibles.forEach(hora => hora.addEventListener('click',seleccionarHora));
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
            
        }
    }

})();