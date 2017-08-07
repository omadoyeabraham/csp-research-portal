
$(document).ready(function(){
     $('#WebTicker').webTicker({
             height:'auto'
        });
     Highcharts.setOptions({
        lang: {
            thousandsSep: ','
        }
    });

     $('#J_report_graph').on('shown.bs.modal', function (event) {
          $("#J_report_graph_container").highcharts({});
      });

$("#J_report_graph").modal();

    
       /**
        * Snippet used to remove mobile toggle on window resize
        */
               (function($) {
                    var $window = $(window),
                        $html = $('html');

                    function resize() {
                        if ($window.width() > 514) {
                            $(".hamburger").removeClass('is-open');
                            $(".sidebar-slide-in").removeClass('is-open');
                            $(".main-content").removeClass('is-open');
                            return $html.addClass('mobile');
                        }

                        $html.removeClass('mobile');
                    }

                    $window
                        .resize(resize)
                        .trigger('resize');
                })(jQuery);

        /**
         * Snippet used to ensure that homepage columns are of equal height 
         
        (function($){
             var $window = $(window);
            function resizeBoxes(){
                var $wrapperHeight = $('#sidebar-main-content-wrapper').height(); 
                $boxHeight = ($wrapperHeight - 20) / 2;
                $('.box').height($boxHeight);
                console.log($boxHeight);
            }
            $window
                .resize(resizeBoxes)
                .trigger('resizeBoxes');
        })(jQuery);
        **/


    /**
     * Snippets used for the admin uploads popup.
     * 
     */
    $('#reportType').change(function(){
        var reportType = $('#reportType').val();
        $('#modalReportType').html( reportType );
    });  
    $('#reportDate').change(function(){
        var reportDate = $('#reportDate').val();
        $('#modalReportDate').html( reportDate );
    }); 
    $('#reportFile').change(function(){
        var reportFile = $('#reportFile').val();
        var x = reportFile.lastIndexOf("\\");
        var realName = reportFile.slice(x+1, -1);
        $('#modalReportFile').html( realName );
    });  

    /**
     * Snippets used for the templates upload page
     */
      $('#templateDate').change(function(){
        var templateDate = $('#templateDate').val();
        $('#modalTemplateDate').html( templateDate );
    }); 

    $('#templateFile').change(function(){
        var templateFile = $('#templateFile').val();
        var x = templateFile.lastIndexOf("\\");
        var realName = templateFile.slice(x+1, -1);
        $('#modalTemplateFile').html( realName );
    });  
     $('#templateType').change(function(){
        var templateType = $('#templateType').val();
        $('#modalTemplateType').html( templateType );
    });  
    
                        

	/**
     * Code snippet used for the toggling of the mobile navbar.                                                                                                                                                                 [description]
     */
	$(".hamburger").click(function(){
		$(".hamburger").toggleClass('is-open');
		$(".sidebar-slide-in").toggleClass('is-open');
		$(".main-content").toggleClass('is-open');
		element.offsetHeight;
	});

    /**
     * Initialising the dataTable for the company info tab.
     */
    $('#instrument-company-info-table').dataTable({
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
   

    /**
     * Initialising the dataTable for the presentation Tab.
     */
    $('#presentationTabTable').dataTable({
           "paging": false,
            "scrollY": "75vh",
            "sScrollX": "90%",
            "sScrollXInner": "100%",
            "bInfo" : false,
            "columnDefs" : [
                {
                    "targets": [2],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ],  
    });
   
   /**
     * Initialising the dataTable for the research reports Tab.
     */
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

    
    /**
     * Initialising the dataTable for the financial reports Tab.
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

    /**
     * Initialising the dataTable for the dividends & Bonus Tab.
     */
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
    
    /**
     * Snippet used to correct wrong display of dataTables headers in bootstrap tabs
     */
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    e.target // activated tab 
    e.relatedTarget // previous tab 
    var table = $.fn.dataTable.fnTables(true);
    if (table.length > 0) {
        $(table).dataTable().fnAdjustColumnSizing();
    }
});

   

   /**
     * Initialising the dataTable for the priceList Table.
     */
   var priceListTable =  $('#priceListTable').dataTable({
           "paging": false,
            "scrollY": "65vh",
            "bInfo" : false,
            "columnDefs" : [
                {
                    "targets": [1],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ],
    });

    /**
     * Initialising the dataTable for the corporate results Table.
     */
    var corporateResultsTable = $('#xTable').dataTable({
            "paging": false,
            "scrollY": "75vh",
            "bInfo" : false,
            "columnDefs" : [
                {
                    "targets": [8],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ],
    });

	/**
	 * Initialising the dataTable for the reports Table.
	 */
	var reportTable = $('#reportsTable').dataTable({
           "paging": false,
            "scrollY": "65vh",
            "bInfo" : false,
             "aaSorting": [ [3,'desc']],
            "columnDefs" : [
                {
                    "targets": [4],
                    "sortable": false //Ensures that the table isn't sortable by download buttons.
                }
            ],
            "columns": [
                { "width": "30%" },
                null,
                null,
                null,
                null
              ]
       
    });
    //Filter the reports table based on the button clicked
    reportTable.fnFilter(phpvar.reportsTableFilter);
    
      

   /**
    * Code for the graph on the homepage
    */
  
   $.getJSON('getNseAsiData', function(data){

            var marketIndexes = [];
            for (var i = 0; i < data.length; i++) {
                marketIndexes.push( data[i].market_index );
            }
             var maxIndex = Math.max(marketIndexes[0],marketIndexes[1],marketIndexes[2],marketIndexes[3],marketIndexes[4] );
             var minIndex = Math.min(marketIndexes[0],marketIndexes[1],marketIndexes[2],marketIndexes[3],marketIndexes[4] );

             maxIndex = Math.ceil(maxIndex / 100) *100;
             minIndex = Math.floor(minIndex / 100) *100;
             var initialIndex = maxIndex - minIndex;

             if(initialIndex <= 100)
             {
                  indexInterval = Math.ceil ( (maxIndex - minIndex) / 500) * 10 ;
             }else{
                  indexInterval = Math.ceil ( (maxIndex - minIndex) / 500) * 100;
             }

             indexInterval = Math.round(initialIndex / 5 );
             
             maxIndex = Math.ceil(maxIndex / 100) *100;
             minIndex = Math.floor(minIndex / 100) *100;

          $('#homepage-graph').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: ''
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 50,
            y: 00,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            title:{
                text: ""
            },
            categories: [
               phpvar.nseAsi[4].date,
               phpvar.nseAsi[3].date,
               phpvar.nseAsi[2].date,
               phpvar.nseAsi[1].date,
               phpvar.nseAsi[0].date,
                
            ],
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: ''
            },
            labels:{
                format: '{value:,.0f}'
            },
            min: minIndex,
            max: maxIndex,
            tickInterval: indexInterval
        },
        tooltip: {
            shared: true,
            valueSuffix: ' bps'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.6
            }
        },
        series: [{
           name: " ",
            showInLegend: false,  
            data: [
              phpvar.nseAsi[4].market_index,
               phpvar.nseAsi[3].market_index,
                 phpvar.nseAsi[2].market_index,
                phpvar.nseAsi[1].market_index,
                phpvar.nseAsi[0].market_index,
            ]
        }]
    })


   });
   /**
    * END OF HOMEPAGE GRAPH
    */

    /**
     * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
     */
    $(function() {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');
            
            // Dividing by two centers the modal exactly, but dividing by three 
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }
        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });

    //Modifying the height of market data table modals
    $('#marketDataModal').on('show.bs.modal', function () {
        $('.modal-content').css('height',$( window ).height()*0.6);
    });


     /**
     * Code for the NSE-ASI main graph on the nse-asi-page
     */
        $(function () {
            $.getJSON('getNseAsiHistoricalData' , function (data) {
                console.log(2);
                console.log(data);
                // Create the chart
                $('#nse-asi-main-graph').highcharts('StockChart', {
                    rangeSelector: {
                        selected: 1
                    },
                    title: {
                        text: ''
                    },
                    series: [{
                        name: 'NSE ASI',
                        data: data,
                        type: 'areaspline',
                        threshold: null,
                        tooltip: {
                            valueDecimals: 0
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
 * Snippet used to ensure that the nse-asi chart fits the modal well
 * @type {[type]}
 */
var chart = $('#nse-asi-main-graph').highcharts();
$('#nseAsiGraphModal').on('show.bs.modal', function() {
    console.log('here');
    $('#container').css('visibility', 'hidden');
});
$('#nseAsiGraphModal').on('shown.bs.modal', function() {
    $('#container').css('visibility', 'initial');
   $('#nse-asi-main-graph').highcharts().reflow();
});
   


});//End of main JQUERY READY FUNCTION




 
