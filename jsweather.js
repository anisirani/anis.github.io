const apiKey = '893c03a31fbdfbabc43e8047186a929e'; // Replace with your actual OpenWeather API key

async function getWeather() {
  const city = document.getElementById('cityInput').value;
  const res = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
  const data = await res.json();

  document.getElementById('weatherResult').innerHTML = `
    <h2>${data.name}</h2>
    <p>Temperature: ${data.main.temp} °C</p>
    <p>Humidity: ${data.main.humidity} %</p>
    <p>Condition: ${data.weather[0].description}</p>
  `;
}
