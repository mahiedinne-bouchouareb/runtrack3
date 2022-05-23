
function showhide() {

    document.addEventListener("DOMContentLoaded", (event) => {

        var button = document.getElementById("button")
        var article = document.getElementById('citation')
        button.addEventListener("click", () => {

            if (article.style.display !== 'none') {

                article.style.display = 'none'
            }
            else {
                article.style.display = 'block'
            }
        })
    })
}
showhide()