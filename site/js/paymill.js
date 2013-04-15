$(document).ready(function() {
    $("#payment-form").submit(function(event) {
        // Deactivate submit button to avoid further clicks
        $('.submit-button').attr("disabled", "disabled");
        $('.payment-errors').html('<span style="color: #808080">Payment is proceeded...</span>');

        if (false == paymill.validateCardNumber($(".card-number").val())) {
            $(".payment-errors").html("<span style='color: #ff0000'>Invalid Card Number</span>");
            return false;
        }
        if (false == paymill.validateExpiry($(".card-expiry-month").val(), $(".card-expiry-year").val())) {
            $(".payment-errors").html("<span style='color: #ff0000'>Invalid 'Valid To'-Date</span>");
            return false;
        }
        if (false == paymill.validateCvc($(".card-cvc").val())) {
            $(".payment-errors").html("<span style='color: #ff0000'>Invalid CVC</span>");
            return false;
        }

        paymill.createToken({
          number: $('.card-number').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val(),
          cvc: $('.card-cvc').val(),
          amount: $('.card-amount').val(),
          currency: $('.card-currency').val(),
          cardholdername: $('.card-holdername').val()
        }, PaymillResponseHandler);

        return false;
    });
});

function PaymillResponseHandler(error, result) {
    if (error) {
        // Shows the error above the form
        $(".payment-errors").text(error.apierror);
        $(".submit-button").removeAttr("disabled");
    } else {
        var form = $("#payment-form");
        // Output token
        var token = result.token;
        // Insert token into form in order to submit to server
        form.append("<input type='hidden' name='paymillToken' value='" + token + "'/>");

        $.post(
            "index.php?option=com_paymill&task=payCC",
            $("#payment-form").serialize(),
            function(result) {
                //very simple frontend test if API response sets transaction to closed
                if(result.indexOf('closed') != -1) {
                    $('.payment-errors').html('<span style="color: #009900">Payment successfully done!</span>');
                }
                else {
                    $(".submit-button").removeAttr("disabled");
                    $('.payment-errors').html('<span style="color: #ff0000;font-weight: normal">There was an error: ' + error.apierror + '</span>');
                }
            },
            'text'
        );
    }
}