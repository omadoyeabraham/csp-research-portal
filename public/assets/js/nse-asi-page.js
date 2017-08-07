 /**
     * Code for the NSE-ASI main graph on the nse-asi-page
     */
        $(function () {
            $.getJSON('api/v1/getStockData/access' , function (data) {

                // Create the chart
                $('#nse-asi-main-graph').highcharts('StockChart', {
                    rangeSelector: {
                        selected: 1
                    },
                    title: {
                        text: 'phpvar.instrumentName'+' Stock Price'
                    },
                    series: [{
                        name: 'phpvar.instrumentName',
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
