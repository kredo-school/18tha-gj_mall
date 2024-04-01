// DateRange
$(function() {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: '1900-01-01', // Optionally restrict the range
        maxDate: '2100-12-31', // Optionally restrict the range
        startDate: moment().startOf('year'), // Start from the beginning of the current year
        endDate: moment().endOf('year'), // End at the end of the current year
        locale: {
            format: 'YYYY', // Display only the year
        }
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});
// Multi Axis Line Chart
const xValues = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
const monthlyYValues = [10, 15, 18, 20, 29, 49, 90, 150, 50, 95, 20];
const monthlyYValues2 = [6, 2, 11, 24, 39, 59, 70, 180, 50, 25, 90];

const monthlyPlot_ctx = document.getElementById("monthlyPlot");

new Chart(monthlyPlot_ctx, {
    type: "line",
    data: {
        labels: xValues,
        datasets: [
            {
                label: '2023',
                borderColor: '#0AA873',
                data: monthlyYValues, 
            },
            {
                label: '2024',
                borderColor: '#FF0000',
                data: monthlyYValues2, 
            }
        ]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Monthly Sales"
        }
    }
});


//Daily Sales
const daily_xValues = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
const daily_YValues = [10, 15, 18, 20, 29, 45, 64];

const dailyPlot_ctx = document.getElementById("dailyPlot");

new Chart(dailyPlot_ctx, {
    type: "bar",
    data: {
        labels: daily_xValues,
        datasets: [
            {
                label: 'Monthly Sales',
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
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Monthly Sales"
        }
    }
});