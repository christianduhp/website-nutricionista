function DoughnutChart(
  canvasId,
  totalSize,
  usedSize,
  labels,
  backgroundColors,
  borderColor,  
  title
) {
  const config = {
      type: "doughnut",
      data: {
          labels: labels,
          datasets: [
              {
                  data: [usedSize, totalSize - usedSize],
                  backgroundColor: backgroundColors,
                  borderColor: borderColor, 
              },
          ],
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: "top",
              },
              title: {
                  display: title !== "",
                  text: title,
              },
          },
      },
  };

  const canvas = document.getElementById(canvasId);

  var ctx = canvas.getContext("2d");
  var databaseChart = new Chart(ctx, config);
}

function createBarChart(
  elementId,
  labels,
  dataset1Label,
  dataset1Data,
  dataset1Color,
  dataset2Label,
  dataset2Data,
  dataset2Color
) {
  var ctx = document.getElementById(elementId).getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [
        {
          label: dataset1Label,
          data: dataset1Data,
          backgroundColor: [dataset1Color],
          borderColor: [dataset1Color],
          borderWidth: 1,
        },
        {
          label: dataset2Label,
          data: dataset2Data,
          backgroundColor: [dataset2Color],
          borderColor: [dataset2Color],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}


function LineChartByMonths(canvasId, data) {
  const months = [
    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
  ];

  const labels = months.map((month, index) => {
    const monthIndex = index + 1;
    return data[monthIndex] ? month : null;
  }).filter(Boolean);

  const values = labels.map(month => data[months.indexOf(month) + 1]);

  const config = {
    type: "line",
    data: {
      labels: labels,
      datasets: [
        {
          label: "Novos Usuários",
          data: values,
          fill: false,
          borderColor: ['#ac6dd0'],
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        },
      },
      plugins: {
        legend: {
          display: true,
          position: "top",
        },
        title: {
          display: true,
        },
      },
    },
  };

  const canvas = document.getElementById(canvasId);
  const ctx = canvas.getContext("2d");
  const lineChart = new Chart(ctx, config);
}


function LineChart(canvasId, chartData, chartLabel, chartColor, chartDates) {
  return new Chart(document.getElementById(canvasId).getContext("2d"), {
    type: "line",
    data: {
      labels: chartDates,
      datasets: [
        {
          label: chartLabel,
          data: chartData,
          backgroundColor: chartColor + "80",
          borderColor: chartColor + "FF",
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
}
