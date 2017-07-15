var flage = false;
var loginResult = $('#login-result');
$('#form').on('submit', function(e) {
    e.preventDefault()
    var form = $(this);
    var requestUrl = form.attr('action');
    var requestType = form.attr('method');
    var requestData = form.serialize();
    if (flage === true) { return false; }
    $.ajax({
        type: requestType,
        url: requestUrl,
        dataType: 'json',
        data: requestData,
        beforeSend: function() {
            flag = true;
            $('#myButton').on('click', function() {
                $(this).button('loading')
            });
            loginResult.removeClass().addClass('alert alert-info').html('Loading........ ');

        },
        success: function(result) {
            flage = false;
            if (result.error) {
                loginResult.removeClass().addClass('alert alert-danger').html('');
                var errorLength = result.error.length;
                for (var i = 0; i < errorLength; i++) {
                    loginResult.append('<li>' + result.error[i] + '</li>');
                }
                $('#myButton').on('click', function() {
                    $(this).button('reset');
                });
            }
            if (result.Success) {
                $('#myButton').on('click', function() {
                    $(this).button('loading')
                });
                loginResult.removeClass().addClass('alert alert-success').html(result.Success);
            }
            if (result.redirect) {
                setTimeout(function() {
                    window.location.href = result.redirect;
                }, 5000);
            }


        },
        error: function() {}

    });

});