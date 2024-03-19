// Daily Data

// var dailyData = [
//     {
//       x: ['2024-03-01', '2024-03-02', '2024-03-03', '2024-03-04', '2024-03-05', '2024-03-06', '2024-03-07'],
//       y: [100, 30, 65 , 200 , 72 , 49],
//       type: 'bar'
//     }
//   ];


//   Plotly.newPlot('dailyPlot', dailyData);

const xValues2 = ['2024-03-01', '2024-03-02', '2024-03-03', '2024-03-04', '2024-03-05', '2024-03-06', '2024-03-07'];
const yValues2 = [100, 30, 65 , 200 , 72 , 49 , 89];
const barColors2 = ["#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873"];

new Chart("dailyPlot", {
    type: "bar",
    data: {
        labels: xValues2,
        datasets: [{
            backgroundColor: barColors2,
            data: yValues2
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Daily Sales Recent 7 days"
        }
    }
});

// Monthly Data

// var monthlyData = [
//     {
//       x: ['2023-07', '2023-08', '2023-09', '2023-10', '2023-11', '2023-12', '2024-01','2024-02'],
//       y: [10, 15, 18 , 20 , 29 , 49 , 90 , 150],
//       type: 'scatter'
//     }
//   ];

//   Plotly.newPlot('monthlyPlot', monthlyData);

const xValues = ['2023-07', '2023-08', '2023-09', '2023-10', '2023-11', '2023-12', '2024-01', '2024-02'];
const yValues = [10, 15, 18, 20, 29, 49, 90, 150];
const barColors = ["#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873", "#0AA873"];

new Chart("monthlyPlot", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Sales Recent 8 months"
        }
    }
});




