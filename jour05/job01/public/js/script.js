document.addEventListener("DOMContentLoaded", function (event) {

    const formInscription = document.getElementById('formInscription')

    formInscription.onsubmit = async (e) => {
        e.preventDefault()
        const form = new FormData(formInscription)
        const data = Object.fromEntries(new Map([...form]))

    }
});

const requetePost = async (data) => {
    await fetch("./controleur/request.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify({ "action": "connexion", "data": data }) //Transformation du json en chaine de caractère
    }).then(res => {
        return res.json()
    }).then(body => {
        console.log(body)
    })

}
