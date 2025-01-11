if(document.querySelector('#mapa')){

    const lat = 40.4395271;
    const lng =-3.6996066;
    const zoom = 15;
    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
                <h2 class = "mapa__heading">DevWebCamp</h2>
                <p class = "mapa__texto"> Centro de Eventos</p>
            `)
        .openPopup();
}