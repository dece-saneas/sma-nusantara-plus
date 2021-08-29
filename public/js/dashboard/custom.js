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
        placeholder: "Select",
        theme: "bootstrap4",
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
    
    $('#exam').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        drops: 'auto',
        locale: {
            format: 'DD MMMM Y - HH:mm',
            separator: ' s/d ',
        }
    })
});

// Daterangepicker
$(document).ready(function(){
    $('.datepicker').datetimepicker({
        format: "L",
    })
});

// Modal Confirm Delete
$('#DeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var uri = button.data('uri')
    // var modal = $(this)
    
    // modal.find('.modal-title').text(uri)
    
    $("#DeleteForm").attr("action", uri);
})