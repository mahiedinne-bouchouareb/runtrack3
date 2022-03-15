 // On boucle de l'année 1900 à 3000 
for(let i = 1900; i <= 3000; i=i+1) {
    // Si la fonction nous retourne true (si l'année est bissextile)
    if (anneeBissextile(i)) {
        console.log("L'année", i, "est bissextile")
    } else {
        console.log("L'année", i, "n'est pas bissextile")
    }
}

// Fonction année bissextile prend en paramètre annee
function anneeBissextile(annee) {

    /**
     * Une année est bissextile (comportant 366 jours) seulement si elle respecte 
     * l’un des deux critères suivants :
     *   C1 : l'année est divisible par 4 sans être divisible 
     *        par 100 (cas des années qui ne sont pas des multiples de 100)
     * 
     *   C2 : l'année est divisible par 400 (cas des années multiples de 100).
     */

    // Si le modulo (le reste de la division) de l'année par 100 
    // vaut 0 et de même pour 400, alors l'année est bissextile
    if (annee % 100 === 0 && annee % 400 === 0) {
        return true
    //Aussi, si elle n'est pas divisible (modulo = 0) par 100 mais par 4, alors
    // elle est aussi bissextile 
    } else if (annee % 100 !== 0 && annee % 4 === 0) {
        return true
    // Sinon, si elle n'entre dans aucun cas ci-dessus
    // l'année n'est pas bissextile
    } else {
        return false
    }
}