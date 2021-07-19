/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

// Select
$(document).ready(function(){
    $(".select").select2({
        placeholder: "Select"
    });
});

// Daterangepicker
$(document).ready(function(){
    $('#period').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        drops: 'auto',
        locale: {
            format: 'DD MMMM Y',
            separator: ' s/d ',
        }
    })
    
    $('#period').val('');
});