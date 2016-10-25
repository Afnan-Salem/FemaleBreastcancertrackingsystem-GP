
function addmsgg(type, msg) {

    $('#message_count').html(msg);

}

function waitForMsgg() {

    $.ajax({
        type: "GET",
        url: "../model/selectMessages.php",

        async: true,
        cache: false,
        timeout: 50000,

        success: function(data) {
            addmsgg("new", data);
            setTimeout(
                waitForMsgg,
                1000
            );
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            addmsgg("error", textStatus + " (" + errorThrown + ")");
            setTimeout(
                waitForMsgg,
                15000);
        }
    });
};

$(document).ready(function() {

    waitForMsgg();

});

function getMessage() {



    $.ajax({
        type: "POST",
        url: "../model/updateMessages.php",

    });

};