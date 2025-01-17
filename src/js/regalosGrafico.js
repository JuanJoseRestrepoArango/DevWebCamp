(function(){
    obtenerDatos();
    async function obtenerDatos() {
        const url ='/api/regalos';

        const respuesta = await fetch(url);
        const resultado = await respuesta.json();

        console.log(resultado);

        const grafica = document.getElementById('regalos-grafica');
        if(grafica){
            const ctx = document.getElementById('regalos-grafica');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: resultado.map(regalo =>regalo.nombre),
                datasets: [{
                    label: '',
                    data: resultado.map(regalo => regalo.total),
                    backgroundColor: [
                        '#e6a496',
                        '#8cd0ab',
                        '#8fb5bd',
                        '#8cb3ec',
                        '#f4d3b6',
                        '#a9ffb1',
                        '#f28282',
                        '#ed9fe1',
                        '#57e3b4'
                    ],
                    borderColor:[
                        '#ef370f',
                        '#10c964',
                        '#039dbd',
                        '#005fea',
                        '#e96d00',
                        '#00f917',
                        '#f60101',
                        '#ec02c8',
                        '#00e397'
                    ],
                    borderWidth: 1
                }],
                
            },
            options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                },
                plugins:{
                    legend:{
                        display:false
                    }
                }
            }
        });
        }
    }

    

    
})();