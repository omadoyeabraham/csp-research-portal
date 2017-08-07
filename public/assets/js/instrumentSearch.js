/**
 * Snippet used to ensure that bootstrap tabs and jquery dataTables play nicely
 * 
 */
$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
   $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
});



$(function () {
    $.getJSON('api/v1/getStockData/'+phpvar.instrumentName , function (data) {
        console.log(data);
        // Create the chart
        $('#instrument-graph').highcharts('StockChart', {
            rangeSelector: {
                selected: 1
            },
            title: {
                text: phpvar.instrumentName+' Stock Price'
            },
            series: [{
                name: phpvar.instrumentName,
                data: data,
                type: 'areaspline',
                threshold: null,
                tooltip: {
                    valueDecimals: 2
                },
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                }
            }]
        });
    });
});

/**
 * Making the different tab tables jquery data tables
 */
  
    $('#financialReportsTabTable').dataTable({
               "paging": false,
                "scrollY": "75vh",
                "bInfo" : false,
                "columnDefs" : [
                    {
                        "targets": [2],
                        "sortable": false //Ensures that the table isn't sortable by download buttons.
                    }
                ],  
        });  

    $('#researchReportsTabTable').dataTable({
               "paging": false,
                "scrollY": "75vh",
                "bInfo" : false,
                "columnDefs" : [
                    {
                        "targets": [2],
                        "sortable": false //Ensures that the table isn't sortable by download buttons.
                    }
                ],  
        });  

     $('#presentationTabTable').dataTable({
               "paging": false,
                "scrollY": "75vh",
                "bInfo" : false,
                "columnDefs" : [
                    {
                        "targets": [2],
                        "sortable": false //Ensures that the table isn't sortable by download buttons.
                    }
                ],  
        });  

      $('#dividendsBonusesTabTable').dataTable({
               "paging": false,
                "scrollY": "75vh",
                "bInfo" : false,
                "columnDefs" : [
                    {
                        "targets": [2],
                        "sortable": false //Ensures that the table isn't sortable by download buttons.
                    }
                ],  
        });  
   
