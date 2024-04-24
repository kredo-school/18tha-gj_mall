$(function () {
    var startDate;
    var endDate;
    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: '2000-01-01', // Optionally restrict the range
        maxDate: '2100-12-31', // Optionally restrict the range
        startDate: moment().startOf('year'), // Start from the beginning of the current year
        //endDate: moment().endOf('year'), // End at the end of the current year
        locale: {
            format: 'YYYYMMDD', // Display only the year
        }
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        startDate = start;
        endDate = end;
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            console.log(picker.startDate.format('YYYY-MM-DD'));
            console.log(picker.endDate.format('YYYY-MM-DD'));

            // Send data to Laravel controller via Ajax
            $.ajax({
                url: dashboardRoute,
                type: 'GET',
                data: {
                    startDate: picker.startDate.format('YYYY-MM-DD'),
                    endDate: picker.endDate.format('YYYY-MM-DD')

                },
                success: function(response) {
                    // Handle success response here
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error here
                    console.error(xhr.responseText);
                }
            });
        });
    });

});

//Pageview count graph
document.addEventListener('DOMContentLoaded', function() {
    const pageViewPlotCanvas = document.getElementById("pageViewPlot");
    const labels = pageViewPlotCanvas.getAttribute("labels");
    const pageViewLabels = JSON.parse(labels);
    const pageviews = pageViewPlotCanvas.getAttribute("pageviews");
    const pageViewData = JSON.parse(pageviews);

    console.log(labels)
    console.log('pageViewData' + ': ' + pageViewData)

    const pageViewPlot_ctx = pageViewPlotCanvas.getContext("2d");

    new Chart(pageViewPlot_ctx, {
        type: "line",
        data: {
            labels: pageViewLabels,
            datasets: [
                {
                    label: 'Pageview',
                    data: pageViewData,
                }
            ]
        }
    });
});

// Pageview Ranking
document.addEventListener('DOMContentLoaded', function() {
    const pageRankingPlotCanvas = document.getElementById("pageRankingPlot");
    const paths = pageRankingPlotCanvas.getAttribute("paths");
    const pageRankingLabels = JSON.parse(paths);
    const rankingPageViews = pageRankingPlotCanvas.getAttribute("ranking_pageviews");
    const rankingPageViewsData = JSON.parse(rankingPageViews);

    console.log(pageRankingLabels)
    console.log('rankingPageViewsData' + ': ' + rankingPageViewsData)

    const pageRannkingPlot_ctx = pageRankingPlotCanvas.getContext("2d");

    new Chart(pageRannkingPlot_ctx, {
        type: 'bar',
        data: {
            labels: pageRankingLabels,
            datasets: [
                {
                    label: 'Pageview',
                    data: rankingPageViewsData,
                }
            ]
        },
        options: {
            indexAxis: 'y',
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
              bar: {
                borderWidth: 2,
              }
            },
            responsive: true,
            plugins: {
              legend: {
                position: 'right',
              },
              title: {
                display: true,
                text: 'Pageview Ranking Recent 7days'
              }
            }
          },
    });
});
