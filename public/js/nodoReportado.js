let map = L.map('mapa_reportar').setView([20.65671835, -103.325310327668], 14)

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

let marker;


const getNodesInBlock = async (lat, lng) => {
    const overpassUrl = 'http://overpass-api.de/api/interpreter';
    const query = `
        [out:json];
        (
        way(around:5, ${lat}, ${lng})["highway"]; // Buscar vías dentro de 5m
        );
        out body;
                            >;
        out skel qt;
        `;

    try {
        const response = await axios.get(overpassUrl, {
            params: { data: query }
        });
        const ways = response.data.elements;

        if (ways.length > 0) {
            return ways; 
        } else {
            return null;
        }
    } catch (error) {
        console.error('Error al obtener los nodos:', error);
    }
};

const getClosestNodeInFirstWay = (ways, lat, lng) => {
    if (!ways || ways.length === 0) {
        return null;
    }

    // Tomar el primer way
    const firstWay = ways.find(way => way.type === "way");
    console.log(firstWay.nodes)
    if (!firstWay || !firstWay.nodes) {
        return null;
    }

    let closestNode = null;
    let minDistance = Infinity;

    firstWay.nodes.forEach(node => {
        const distance = Math.sqrt(
            Math.pow(ways.find(nodo => nodo.id === node).lat - lat, 2) + Math.pow(ways.find(nodo => nodo.id === node).lon - lng, 2)
        );

        if (distance < minDistance) {
            minDistance = distance;
            closestNode = node;
        }
    });

    return ways.find(nodo => nodo.id === closestNode);
};

(async function initializeMap() {
    // Si las coordenadas del delito existen, coloca el marcador en esas coordenadas
    if (delitoLatitud !== null && delitoLongitud !== null) {
        marker = L.marker([delitoLatitud, delitoLongitud]).addTo(map);

        // Centrar el mapa en la ubicación del delito
        map.setView([delitoLatitud, delitoLongitud], 14);

        // Inicializar los inputs ocultos con las coordenadas del delito
        document.getElementById('latitud').value = delitoLatitud;
        document.getElementById('longitud').value = delitoLongitud;
    }
})();

map.on('click', async function (e) {
    const { lat, lng } = e.latlng;

    const ways = await getNodesInBlock(lat, lng);

    if (ways && ways.length > 0) {
        // Si hay vías cercanas, coloca el marcador
        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng]).addTo(map);
        }
    toastify().success('Ubicación marcada.');
    } else {
        toastify().error('Por favor, selecciona una ubicación en una calle.');
    }

    // Coordenadas del marcador (latitud y longitud seleccionadas manualmente)
    document.getElementById('latitud').value = lat;
    document.getElementById('longitud').value = lng;

    // Coordenadas del nodo más cercano
    const closestNode = getClosestNodeInFirstWay(ways, lat, lng);
    if (closestNode) {
        document.getElementById('latitudR').value = closestNode.lat;
        document.getElementById('longitudR').value = closestNode.lon;
    }
});
