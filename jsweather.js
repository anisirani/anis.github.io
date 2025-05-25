const apiKey = '893c03a31fbdfbabc43e8047186a929e'; // Your OpenWeather API key

async function getWeather() {
  const city = document.getElementById('cityInput').value.trim();
  const weatherDiv = document.getElementById('weatherResult');

  if (!city) {
    weatherDiv.innerHTML = `<p>Please enter a city name.</p>`;
    weatherDiv.classList.remove('hidden');
    return;
  }

  try {
    const res = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
    const data = await res.json();

    if (data.cod !== 200) {
      weatherDiv.innerHTML = `<p>Error: ${data.message}</p>`;
    } else {
      weatherDiv.innerHTML = `
        <h2>${data.name}</h2>
        <p>Temperature: ${data.main.temp} °C</p>
        <p>Humidity: ${data.main.humidity} %</p>
        <p>Condition: ${data.weather[0].description}</p>
      `;
    }

    weatherDiv.classList.remove('hidden');
  } catch (error) {
    weatherDiv.innerHTML = `<p>Error fetching data.</p>`;
    weatherDiv.classList.remove('hidden');
  }
}
