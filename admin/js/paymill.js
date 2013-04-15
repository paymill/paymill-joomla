$(document).ready(function () {
    $("#paymill-settings").submit(function(event) {
        // Deactivate submit button to avoid further clicks
        $('.submit-button').attr('disabled', 'disabled');

        var data = $('#paymill-settings').serialize();

        $.ajax({
            type: 'GET',
            url: ROOT + 'index.php?option=com_paymill&task=saveKeys',
            data: data,
            success: function(response) {
                alert('Saved successfully!');
                return false;
            },
            error: function(response) {
                alert('Saved successfully!');
                return false;
            }
        });
    });
});