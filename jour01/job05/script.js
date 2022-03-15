afficherJoursSemaine()

function afficherJoursSemaine() {
    const jours = [
        "Lundi",
        "Mardi",
        "Mercredi",
        "Jeudi",
        "Vendredi",
        "Samedi",
        "Dimanche"
    ]

    // Tant que i est inférieur à la longueur du tableau jours
    // on boucle en incrementant i (i = i + 1)
    // Dès que la condition (i < jours.length) n'est plus vérifiée
    // on sort de la boucle 
    for(let i = 0; i < jours.length; i=i+1) {
        console.log(jours[i])
    }
}
