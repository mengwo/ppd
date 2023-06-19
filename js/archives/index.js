$(document).ready(function () {
    var sale_chart;
    var dataTable; // Declare dataTable variable outside the fetch_data function

    function fetch_data(start_date = '', end_date = '') {
        // Check if dataTable is already initialized
        if ($.fn.DataTable.isDataTable('#order_table_completed')) {
            dataTable.destroy(); // Destroy existing DataTable
        }

        dataTable = $('#order_table_completed').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "components/archive/display/index.php",
                type: "POST",
                data: {
                    action: 'fetch',
                    start_date: start_date,
                    end_date: end_date
                }
            },
            "drawCallback": function (settings) {
                var sales_date = [];
                var sale = [];

                for (var count = 0; count < settings.aoData.length; count++) {
                    sales_date.push(settings.aoData[count]._aData[3]);
                    sale.push(parseFloat(settings.aoData[count]._aData[1]));
                }

                var chart_data = {
                    labels: sales_date,
                    datasets: [{
                        label: 'Sales',
                        backgroundColor: 'rgb(255, 205, 86)',
                        color: '#fff',
                        data: sale
                    }]
                };

                var group_chart3 = $('#bar_chart');
                if (sale_chart) {
                    sale_chart.destroy();
                }

                sale_chart = new Chart(group_chart3, {
                    type: 'bar',
                    data: chart_data
                });
            }
        });
    }

    $('#daterange_textbox_completed').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format: 'YYYY/MM/DD'
    }, function (start, end) {
        fetch_data(start.format('YYYY/MM/DD'), end.format('YYYY/MM/DD'));
    });

    fetch_data(); // Fetch data initially without any date range
});