$(document).ready(() => {
    let btn = $("#button");
    let img1 = $("#img1");
    let img2 = $("#img2");
    let img3 = $("#img3");
    let img4 = $("#img4");
    let img5 = $("#img5");
    let img6 = $("#img6");

    btn.click(() => {
        $(() => {
            var parent = $("#melangees");
            var divs = parent.children();
            while (divs.length) {
                parent.append(
                    divs.splice(Math.floor(Math.random() * divs.length), 1).shift()
                );
            }
        });
    });
    img1.click(() => {
        $("#img1").detach().appendTo("#rangees");
    });
    img2.click(() => {
        $("#img2").detach().appendTo("#rangees");
    });
    img3.click(() => {
        $("#img3").detach().appendTo("#rangees");
    });
    img4.click(() => {
        $("#img4").detach().appendTo("#rangees");
    });
    img5.click(() => {
        $("#img5").detach().appendTo("#rangees");
    });
    img6.click(() => {
        $("#img6").detach().appendTo("#rangees");
    });
});