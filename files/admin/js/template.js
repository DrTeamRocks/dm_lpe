$(document).ready(function() {
    // Submit changes to database
    $('#save_template').on('click', function() {
        save_template();
    });
});

function save_template(){
    var top = $('#dm_top').val();
    var bottom = $('#dm_bottom').val();
    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            top: top,
            bottom: bottom
        },
        beforeSend: function() {
            $('#save_template').button('loading');
        },
        success: function (html) {
            console.log(html);
        },
        complete: function() {
            $('#save_template').button('reset');
        }
    });
}
