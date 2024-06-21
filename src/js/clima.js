let key = "21cdb199330a330bdef3e125904c4691";
let city_name = 'bogota'; // Asigna aquí el nombre de la ciudad que deseas consultar

let updateWeatherInfo = (temperature, description, iconUrl) => {
    // Obtén el div por su ID o cualquier otro selector que prefieras
    let weatherDiv = document.getElementById('weather-info');

    // Actualiza el contenido del div con la información meteorológica
    weatherDiv.innerHTML = `
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">El clima de Bogotá en este momento es de...</h1>
        <div class="m-auto text-center">
            <img src="${iconUrl}" alt="Icono del clima" class="mx-auto w-1/4 lg:w-1/4">
        </div>
        <div class="text-4xl font-semibold text-gray-700 dark:text-gray-400">
            ${temperature}°
        </div>
    `;
};

let get_weather = () => {
    let url = `https://api.openweathermap.org/data/2.5/weather?q=${city_name}&appid=${key}&units=metric`;

    fetch(url)
        .then((resp) => resp.json())
        .then(data => {
            // Obtén la URL completa del ícono
            const iconCode = data.weather[0].icon;
            const iconUrl = `http://openweathermap.org/img/w/${iconCode}.png`;

            // Llama a la función para actualizar la información meteorológica en el div
            updateWeatherInfo(data.main.temp, data.weather[0].description, iconUrl);
        })
        .catch(error => {
            console.error("Error al obtener el clima:", error);
        });
};

// Agregar un evento de carga a window
window.addEventListener('load', () => {
    // Llamada a la función get_weather al cargar la página
    get_weather();
});
