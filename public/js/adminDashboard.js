// Multi Axis Line Chart
document.addEventListener('DOMContentLoaded', function() {
    const monthlyPlotCanvas = document.getElementById("monthlyPlot");

    const salesData = {
        currentYear: JSON.parse(monthlyPlotCanvas.getAttribute("monthlyYValues")),
        previousYear: JSON.parse(monthlyPlotCanvas.getAttribute("monthlyYValues2"))
    };

    const currentYear = monthlyPlotCanvas.getAttribute("data-year");
    const xValues = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    new Chart(monthlyPlotCanvas, {
        type: "line",
        data: {
            labels: xValues,
            datasets: [
                {
                    label: currentYear,
                    borderColor: '#0AA873',
                    data: salesData.currentYear,
                },
                {
                    label: (currentYear - 1).toString(),
                    borderColor: '#FF0000',
                    data: salesData.previousYear,
                }
            ]
        },
        options: {
            legend: { display: true },
            title: {
                display: true,
                text: "Monthly Sales"
            }
        }
    });
});

//Daily Sales
document.addEventListener('DOMContentLoaded', function() {
    const dailyPlotCanvas = document.getElementById("dailyPlot");
    const salesDataAttribute = dailyPlotCanvas.getAttribute("data-sales-data");
    const dailySalesData = JSON.parse(salesDataAttribute);

    const daily_xValues = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const daily_YValues = daily_xValues.map(day => dailySalesData[day] || 0);

    console.log(dailySalesData)
    console.log('daily_xValues' + ': ' + daily_xValues)


    const dailyPlot_ctx = dailyPlotCanvas.getContext("2d");

    new Chart(dailyPlot_ctx, {
        type: "bar",
        data: {
            labels: daily_xValues,
            datasets: [
                {
                    label: 'Daily Sales',
                    data: daily_YValues,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                        ],
                    borderWidth: 1
                }
            ]
        }
    });
});