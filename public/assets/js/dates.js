jQuery(document).ready(function($) {
  
  /**
     * Setting up Date picker for reports upload
     * @type {Boolean}
     */
    $('#reportDate').datetimepicker({
         timepicker:false,
         format: 'Y-m-d',
    });

    /**
     * Setting up Date picker for templates upload
     * @type {Boolean}
     */
    $('#templateDate').datetimepicker({
         timepicker:false,
         format: 'Y-m-d',
    });


});