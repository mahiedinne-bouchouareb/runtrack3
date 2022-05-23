$(document).ready(function () {
    //Dès qu'on clique sur #var1, on applique hide() au titre
    $("#var1").click(function () {
        $("p").show();
    });

    //Dès qu'on clique sur #var2, on applique show() au titre
    $("#var2").click(function () {
        $("p").hide();
    });
});