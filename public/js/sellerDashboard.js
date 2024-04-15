$(function () {
    var startDate;
    var endDate;
    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: '2000-01-01', // Optionally restrict the range
        maxDate: '2100-12-31', // Optionally restrict the range
        startDate: moment().startOf('year'), // Start from the beginning of the current year
        endDate: moment().endOf('year'), // End at the end of the current year
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
