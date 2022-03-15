var nombre1 = 3
var nombre2 = 3

// alert(sommeNombresPremiers(nombre1,nombre2))
sommeNombresPremiers(nombre1, nombre2)

// console.log(sommeNombresPremiers(resulat))

function sommeNombresPremiers(nombre1, nombre2) {

    for (i = 2; i < nombre1; i++) {
        if (Number.isInteger(nombre1 / i)) {
            var nombre1_non_premier = true
        }
    }

    for (i = 2; i < nombre2; i++) {
        if (Number.isInteger(nombre1 / i)) {
            var nombre2_non_premier = true
        }
    }

    if (!nombre1_non_premier && !nombre2_non_premier) {
        alert(nombre1 + ' et ' + nombre2 + ' sont des nombres premiers')

        alert(resultat = nombre1 + nombre2)
    }
    else {
        alert('false')
    }
}