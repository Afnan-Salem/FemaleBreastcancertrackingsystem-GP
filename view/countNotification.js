
function addmsg(type, msg) {

    $('#notification_count').html(msg);

}

function waitForMsg() {

    $.ajax({
        type: "GET",
        url: "../model/selectNotifications.php",

        async: true,
        cache: false,
        timeout: 60000,

        success: function(data) {
            addmsg("new", data);
            setTimeout(
                waitForMsg,
                1000
            );
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            addmsg("error", textStatus + " (" + errorThrown + ")");
            setTimeout(
                waitForMsg,
                15000);
        }
    });
};

$(document).ready(function() {

    waitForMsg();

});

function getNotification() {



    $.ajax({
        type: "POST",
        url: "../model/updateNotifications.php",

    });




};