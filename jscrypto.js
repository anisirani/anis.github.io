const ctx = document.getElementById('cryptoChart').getContext('2d');
let chart;

async function fetchCryptoData(coin) {
  const res = await fetch(`https://api.coingecko.com/api/v3/coins/${coin}/market_chart?vs_currency=usd&days=7`);
  const data = await res.json();
  const labels = data.prices.map(item => new Date(item[0]).toLocaleDateString());
  const prices = data.prices.map(item => item[1]);

  if (chart) chart.destroy();
  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: `${coin} Price (USD)`,
        data: prices,
        borderColor: 'blue',
        fill: false
      }]
    }
  });
}

document.getElementById('cryptoSelect').addEventListener('change', (e) => {
  fetchCryptoData(e.target.value);
});

fetchCryptoData('bitcoin');
