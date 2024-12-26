(function(){
    const ponentesInput = document.querySelector('#ponentes');

    if(ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');


        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

        async function obtenerPonentes(){
            
            const url = `/api/ponentes`;
            
            const respuesta = await fetch(url)
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        function formatearPonentes(arrayPonentes = []){
            ponentes = arrayPonentes.map(ponente=> {
                return{
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })
            
        }

        function buscarPonentes(e){
            const busqueda = e.target.value;
            
            if(busqueda.length > 1){
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter(ponente =>{
                    if(ponente.nombre.toLowerCase().search(expresion) != -1){
                        return ponente;
                    }
                })

                
            }else{
                ponentesFiltrados =[];
            }


            mostrarPonentes();
        }

        function mostrarPonentes(){
            while(listadoPonentes.firstChild){
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if(ponentesFiltrados.length > 0){
                
                ponentesFiltrados.forEach(ponente =>{
                    const ponenteHtml = document.createElement('LI') ;
                    ponenteHtml.classList.add('listado-ponentes__ponente');

                    ponenteHtml.textContent = ponente.nombre;
                    ponenteHtml.dataset.ponenteId = ponente.id;

                    ponenteHtml.onclick = seleccionarPonente;

                    //Añadir al DOM
                    listadoPonentes.appendChild(ponenteHtml);
                })
            }else{
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponentes__no-resultado');
                noResultados.textContent = 'No hay resultados de la busqueda';

                listadoPonentes.appendChild(noResultados);
            }

        }

        function seleccionarPonente(e){
            const ponente = e.target;

            //remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');

            if(ponentePrevio){
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado');

            }
            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId;
        }
    }
})();