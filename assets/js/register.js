$(document).ready(function () {

    //On click signup, hid login and show registration form
    $("#signup").click(function () {
        $("#first").slideUp("slow", function () {
            $("#second").slideDown("slow");
        });
    });
    //On click register, hid login and show registration form
    $("#sign_in").click(function () {
        $("#second").slideUp("slow", function () {
            $("#first").slideDown("slow");
        });
    });


});